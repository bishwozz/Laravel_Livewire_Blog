<?php

namespace App\Http\Livewire;

use App\Models\Tag;
use App\Models\Post;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;


class Home extends Component
{
    public $username;

    public $titleFilter = null;
    public $userFilter = null;
    public $tagFilter = null;
    public $categoryFilter = null;
    
    // use WithPagination;
    // protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        // Retrieve the currently logged-in user
        $user = Auth::user();
        if ($user) {
            $this->username = $user->name;
        }

    }

    public function render()
    {
        $posts = $this->titleFilter
            ? Post::where('category_id', $this->titleFilter)->get()
            : Post::paginate(10);

        $data = [
            'categories' => Category::all(),
            'tags' => Tag::all(),
            'posts' => $posts,
            'username' => $this->username,
            'current_user' => Auth::user()->id,

        ];

        return view('livewire.home',$data)->layout('layout.base');
    }

    public function createPost(){

        return  redirect('/create-post');
    }

    public function postDetails($id){
        // Retrieve the blog details from the database based on the provided $id
        $data = [
            'postDetails' => Post::findOrFail($id),
            'username' => $this->username,
            'current_user' => Auth::user()->id,
        ];

        // Pass the blog details to the Blade template
        return view('page.postDetail',$data)->layout('layout.base');
    }

    public function postEdit($id){
        // Retrieve the blog details from the database based on the provided $id
        $data = [
            'posts' => Post::findOrFail($id),
            'username' => $this->username,
        ];

        // Pass the blog details to the Blade template
        return view('page.postDetail',$data)->layout('layout.base');
    }

    public function postDelete($id){
        // Retrieve the blog details from the database based on the provided $id
        $data = [
            'postDetails' => Post::findOrFail($id),
            'username' => $this->username,
            'current_user' => Auth::user()->id,
        ];

        // Pass the blog details to the Blade template
        return view('page.postDetail',$data)->layout('layout.base');
    }
}
