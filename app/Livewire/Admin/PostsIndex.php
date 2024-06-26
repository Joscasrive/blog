<?php

namespace App\Livewire\Admin;

use App\Models\Post;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class PostsIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    #[Url(as:'s')]
    public $search;
    public function updatingSearch(){
        $this->resetPage();
    }
    public function render()
    {
        $posts = Post::where('user_id', auth()->user()->id)
        ->where('name','LIKE','%'.$this->search.'%')->latest('id')->paginate(10);
        return view('livewire.admin.posts-index',compact('posts'));
    }
}
