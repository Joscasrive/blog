<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
   
    public function run(): void
    {
       $role1=Role::create(['name'=>'admin']);
       $role2=Role::create(['name'=>'bolgger']);
       
       Permission::create(['name'=>'admin.home','description'=>'View admin panel'])->syncRoles([$role1,$role2]);

       Permission::create(['name'=>'admin.users.index','description'=>'See users list'])->syncRoles([$role1]);
       Permission::create(['name'=>'admin.users.edit','description'=>'Assign a Role'])->syncRoles([$role1]);
       

       Permission::create(['name'=>'admin.categories.index','description'=>'See list of categories'])->syncRoles([$role1,$role2]);
       Permission::create(['name'=>'admin.categories.create','description'=>'Create category'])->syncRoles([$role1]);
       Permission::create(['name'=>'admin.categories.edit','description'=>'Edit category'])->syncRoles([$role1]);
       Permission::create(['name'=>'admin.categories.destroy','description'=>'Delete category'])->syncRoles([$role1]);

       Permission::create(['name'=>'admin.tags.index','description'=>'See list of tags'])->syncRoles([$role1,$role2]);
       Permission::create(['name'=>'admin.tags.create','description'=>'Create tag'])->syncRoles([$role1]);
       Permission::create(['name'=>'admin.tags.edit','description'=>'Edit tag'])->syncRoles([$role1]);
       Permission::create(['name'=>'admin.tags.destroy','description'=>'Delete tag'])->syncRoles([$role1]);

       Permission::create(['name'=>'admin.posts.index','description'=>'See list of posts'])->syncRoles([$role1,$role2]);
       Permission::create(['name'=>'admin.posts.create','description'=>'Create post'])->syncRoles([$role1,$role2]);
       Permission::create(['name'=>'admin.posts.edit','description'=>'Edit post'])->syncRoles([$role1,$role2]);
       Permission::create(['name'=>'admin.posts.destroy','description'=>'Delete post'])->syncRoles([$role1,$role2]);
      
    }
}
