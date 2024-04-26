<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index',compact('tags'));
    }

    
    public function create()
    { $colors=[
        'red'=>'Color Red',
        'yellow'=>'Color Yellow',
        'green'=>'Color Green',
        'blue'=>'Color Blue',
        'indigo'=>'Color Indigo',
        'purple'=>'Color Purple',
        'pink'=>'Color Pink'];
        return view('admin.tags.create',compact('colors'));
    }

    
    public function store(Request $request)
    {
        $request->validate(['name'=>'required',
        'slug'=>'required|unique:tags',
        'color'=>'required']);
        Tag::create($request->all());
        return redirect()->route('admin.tags.create')->with('info','The tag was create successfully.');
    }

    

    
    public function edit(Tag $tag)
    {
        $colors=[
        'red'=>'Color Red',
        'yellow'=>'Color Yellow',
        'green'=>'Color Green',
        'blue'=>'Color Blue',
        'indigo'=>'Color Indigo',
        'purple'=>'Color Purple',
        'pink'=>'Color Pink'];
        return view('admin.tags.edit',compact('tag','colors'));
    }

   
    public function update(Request $request, Tag $tag)
    {
        $request->validate(['name'=>'required',
        'slug'=>"required|unique:tags,slug, $tag->id",
        'color'=>'required']);
        $tag->update($request->all());
        return redirect()->route('admin.tags.edit',compact('tag'))->with('info','The tag was update successfully.');
    }

    
    public function destroy(Tag $tag)
    {
       $tag->delete();
       return redirect()->route('admin.tags.index')->with('info','The tag was delete successfully.');
    }
}
