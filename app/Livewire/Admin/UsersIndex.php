<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class UsersIndex extends Component
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
        $users = User::where('name','LIKE','%'.$this->search.'%')->orwhere('email','LIKE','%'.$this->search.'%')->paginate(5);
        return view('livewire.admin.users-index',compact('users'));
    }
}
