<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
    public function index(){
        $posts=Post::where('status',2)->count();
        
        $users=User::count();
        $admin=Role::find('1')->users->count();
        $editor=Role::find('2')->users->count();
       
        
       
      
       

        return view('admin.index',compact('posts','users','admin','editor'));

    }
}
