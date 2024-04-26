<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
   
    public function index()
    {
        return view('admin.posts.index');
    }

    
    public function create()
    {
        $categories = Category::pluck('name','id');
        $tags =Tag::all();
       
        return view('admin.posts.create',compact('categories','tags'));
    }

    
    public function store(PostRequest $request)
    { 
    
        
        $post = Post::create($request->all());
        if ($request->tags) {
            $post->tags()->attach($request->tags);
        }
        if($request->file('file')){
           $url = Storage::put('posts', $request->file('file'));
           $post->image()->create([
               'url' => $url
           ]);
        }
        return redirect()->route('admin.posts.create')->with('info','The posts was create successfully.');
        
    }

    public function edit(Post $post)
    {
        Gate::authorize('update', $post);
        $categories = Category::pluck('name','id');
        $tags = Tag::all();
        $select =$post->tags->pluck('id')->toArray();
        
        return view('admin.posts.edit', compact('post','categories','tags','select'));
    }

    
    public function update(PostRequest $request, Post $post)
    {
        Gate::authorize('update', $post);
       $post->update($request->all());
       if($request->tags){
        $post->tags()->sync($request->tags);
       }else{
        $post->tags()->detach($request->tags);
       }
       
       if($request->file('file')){
        $url = Storage::put('posts', $request->file('file'));
        if($post->image){
            //elmina la imagen del servidor
            Storage::delete($post->image->url);
            $post->image->update([
                'url' => $url
            ]);
        }else{
            $post->image()->create([
                'url' => $url
            ]);
        }
       }
       return redirect()->route('admin.posts.edit',$post)->with('info','The posts was update successfully.');
    
    }

   
    public function destroy(Post $post)
    { 
        Gate::authorize('update', $post);
        $post->delete();
        
        return redirect()->route('admin.posts.index',$post)->with('info','The posts was delete successfully.');      
    }
}
