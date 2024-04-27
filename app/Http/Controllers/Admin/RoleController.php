<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
 
    public function index()
    {
        $roles = Role::all();
        
       return view('admin.roles.index',compact('roles',));
    }

    
    public function create()
    {
        $permissions = Permission::all();
        return view('admin.roles.create',compact('permissions'));
    }

    
    public function store(Request $request)
    {
       $request->validate(['name'=>'required']);
       $role = Role::create($request->all());
       $role->permissions()->sync($request->permissions);

       return redirect()->route('admin.roles.create')->with('info','The role was created successfully');
    }

   
    public function show(Role $role)
    {
        //
    }

    
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        $select =$role->permissions->pluck('id')->toArray();
        return view('admin.roles.edit',compact('role','permissions','select'));
    }

    
    public function update(Request $request, Role $role)
    {
        //
    }

    
    public function destroy(Role $role)
    {
        //
    }
}
