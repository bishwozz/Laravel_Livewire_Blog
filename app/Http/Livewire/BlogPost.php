<?php

namespace App\Http\Livewire;

use App\Models\Tag;
use App\Models\Post;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;
use App\Http\Request\ValidationRule;
use Illuminate\Support\Facades\Auth;

class BlogPost extends Component
{
    use WithFileUploads;

    public $title, $content, $category_id, $tags, $image;
    public $tags_list = [];
    public $updatePost = false;


    public function render()
    { 
        $data = [
            'categories' => Category::all(),
            'user' => Auth::user(),
            'tags' => Tag::whereIn('category_id', [$this->category_id, null])->get(),
            'current_user' => Auth::user()->id,
        ];
       

        return view('livewire.blog-post',$data)->layout('layout.base');
    }

    public function store()
    {
        // validate 
        $this->validate(
            ValidationRule::createPostRules($this)
        );

        try{
            
            // Handle image upload if applicable
            if ($this->image) {
                $imagePath = $this->image->store('public/images');
                $image = $imagePath;
            }

            $inputData = [
                'title' => $this->title,
                'content' => $this->content,
                'image' => $image??null,
                'category_id' => $this->category_id,
                'user_id' => Auth::user()->id,
                'tag_id' => json_encode($this->tags),
            ];
            // Create the post
            $post = Post::create($inputData);
            
            return redirect('/home')->with('success','Successfully created post.');

        }catch (\Exception $e){
            session()->flash('error', 'Unsuccessfully');
            dd($e);
        }

        
        
        // Redirect or perform any other desired action
    }


    protected $rules = [
        'category_id' => 'required',
        'tags' => 'required|array',
    ];

    public function updatedCategoryId($category_id)
    {
        $this->tags_list = Tag::where('category_id', $category_id)->pluck('name', 'id')->toArray();
        // dd($this->tags_list);
    }

    public function postEdit($id){

        try {
            $post = Post::findOrFail($id);
            if( !$post) {
                session()->flash('error','Post not found');
            } else {
                $this->title = $post->title;
                $this->description = $post->description;
                $this->postId = $post->id;
                $this->updatePost = true;
                $this->addPost = false;
            }

            // Pass the blog details to the Blade template
            // return view('Page.postEdit',$data)->layout('layout.base');
        } catch (\Exception $ex) {
            session()->flash('error','Something goes wrong!!');
        }


    }
 
  
}
