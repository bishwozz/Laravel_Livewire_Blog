<?php
 
namespace App\Http\Livewire;
 
use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Http\Request\ValidationRule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
 
class PostList extends Component
{
    use WithFileUploads;
    use WithPagination;
    
    protected $paginationTheme = 'bootstrap';
    
 
    public $title, $content, $category_id, $tags, $image, $user_id, $postId,
        $updatePost = false, $addPost = false;
    public $tags_list = [];

    public $searchTitle;
    public $userFilter;
    public $tagFilter = [];
    public $categoryFilter;
 



    /**
     * delete action listener
     */
    protected $listeners = [
        'deletePostListner'=>'deletePost'
    ];
 
    /**
     * Reseting all inputted fields
     */
    public function resetFields(){

        $this->title = '';
        $this->content = '';
        $this->image = '';
        $this->category_id = '';
        $this->user_id = '';
        $this->tag_id = '';
    }
 
    /**
     * render the post data
     */
    public function render()
    {

        $posts = Post::where('title', 'LIKE', '%' . ($this->searchTitle ?? '') . '%')
            ->when($this->userFilter, function ($query, $userFilter) {
                return $query->where('user_id', $userFilter);
            })
            ->when($this->tagFilter, function ($query) {
                return $query->where(function ($subquery) {
                    foreach ($this->tagFilter as $tagId) {
                        $subquery->orWhereJsonContains('tag_id', $tagId);
                    }
                });
            })
            ->when($this->categoryFilter, function ($query) {
                return $query->whereIn('category_id', $this->categoryFilter);
            })
            ->paginate(2);


        $data = [
            'posts' => $posts,
            'current_user' => Auth::user()->id,
            'categories' => Category::all(),
            'userData' => User::all(),
            'tagsDetail' => Tag::all(),
            // 'tags' => Tag::whereIn('category_id', [$this->category_id, null])->get(),

        ];
        return view('livewire.post-list', $data)->layout('layout.base');
    }
 
    /**
     * Open Add Post form
     */
    public function addPost()
    {
        $this->resetFields();
        $this->addPost = true;
        $this->updatePost = false;
    }
     /**
      * store the user inputted post data in the posts table
      */
    public function storePost()
    {
        // validate 
        $this->validate(
            ValidationRule::createPostRules($this)
        );

        try {
            // Handle image upload if applicable
            if ($this->image) {
                $imagePath = $this->image->store('images');
                $image = $imagePath;
            }

            Post::create([
                'title' => $this->title,
                'content' => $this->content,
                'image' => $image??null,
                'category_id' => $this->category_id,
                'user_id' => Auth::user()->id,
                'tag_id' => json_encode($this->tags),
            ]);

            session()->flash('success','Post Created Successfully!!');
            $this->resetFields();
            $this->addPost = false;
        } catch (\Exception $ex) {
            session()->flash('error','Something goes wrong!!');
        }
    }
 
    /**
     * show existing post data in edit post form
     */
    public function editPost($id){

        try {
            $post = Post::findOrFail($id);
            if( !$post) {
                session()->flash('error','Post not found');
            } else {
                $this->tags_list = Tag::where('category_id', $post->category_id)->pluck('name', 'id')->toArray();

                $this->tags = Tag::whereIn('id', json_decode($post->tag_id))->pluck('id')->toArray();

                $this->title = $post->title;
                $this->content = $post->content;
                $this->category_id = $post->category_id;
                $this->image = $post->image;
                $this->user_id = $post->user_id;
                $this->postId = $post->id;
                $this->updatePost = true;
                $this->addPost = false;
            }
        } catch (\Exception $ex) {
            session()->flash('error','Something goes wrong!!');
        }
    }
 
    /**
     * update the post data
     * @return void
     */
    public function updatePost(Request $request)
    {
        // validate 
        $this->validate(
            ValidationRule::updatePostRules($this)
        );

        try {
            // Handle image upload if applicable
            if ($this->image) {
                // Check if the image with the same hash already exists in storage
                $existingImagePath = $this->image;
                if (Storage::disk('local')->exists($existingImagePath)) {
                    $image = $existingImagePath;
                } else {
                    $imagePath = $this->image->store('images');
                    $image = $imagePath;
                }
            }
            

            Post::whereId($this->postId)->update([
                'title' => $this->title,
                'content' => $this->content,
                'image' => $image??null,
                'category_id' => $this->category_id,
                'tag_id' => json_encode($this->tags),
            ]);
            session()->flash('success','Post Updated Successfully!!');
            $this->resetFields();
            $this->updatePost = false;
        } catch (\Exception $ex) {
            session()->flash('success','Something goes wrong!!');
        }
    }
 
    /**
     * Cancel Add/Edit form and redirect to post listing page
     */
    public function cancelPost()
    {
        $this->addPost = false;
        $this->updatePost = false;
        $this->resetFields();
    }
 
    /**
     * delete specific post data from the posts table
     */
    public function deletePost($id)
    {
        try{
            Post::find($id)->delete();
            session()->flash('success',"Post Deleted Successfully!!");
        }catch(\Exception $e){
            session()->flash('error',"Something goes wrong!!");
        }
    }

    /**
     * updating tag upon category id change
    */
    public function updatedCategoryId($category_id)
    {
        $this->tags_list = Tag::where('category_id', $category_id)->pluck('name', 'id')->toArray();
        // dd($this->tags_list);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
    public function clearFilters()
    {
        $this->reset(['searchTitle', 'userFilter', 'categoryFilter', 'tagFilter']);
    }
}