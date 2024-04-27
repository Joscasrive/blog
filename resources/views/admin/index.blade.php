@extends('adminlte::page')
@section('title', 'Administrator')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="row">
    <div class="col-lg-3 col-6">
    
    <div class="small-box bg-info">
    <div class="inner">
    <h3>{{$posts}}</h3>
    <p>Published Blogs</p>
    </div>
    <div class="icon">
    <i class="fa-solid fa-blog"></i>
    </div>
    <a class="small-box-footer"><i class="fa-solid fa-circle-info"></i></a>
    </div>
    </div>
    
    <div class="col-lg-3 col-6">
    
    <div class="small-box bg-success">
    <div class="inner">
    <h3>{{$editor}}</h3>
    <p>Bloggers</p>
    </div>
    <div class="icon">
    <i class="fa-solid fa-user-pen"></i>
    </div>
    <a class="small-box-footer"><i class="fa-solid fa-circle-info"></i></a>
    </div>
    </div>
    
    <div class="col-lg-3 col-6">
    
    <div class="small-box bg-warning">
    <div class="inner">
    <h3>{{$users}}</h3>
    <p>User Registrations</p>
    </div>
    <div class="icon">
    <i class="fa-solid fa-user-plus"></i>
    </div>
    <a class="small-box-footer"><i class="fa-solid fa-circle-info"></i></a>
    </div>
    </div>
    
    <div class="col-lg-3 col-6">
    
    <div class="small-box bg-danger">
    <div class="inner">
    <h3>{{$admin}}</h3>
    <p>Administrators</p>
    </div>
    <div class="icon">
    <i class="fa-solid fa-user-tie"></i>
    </div>
    <a class="small-box-footer"><i class="fa-solid fa-circle-info"></i></a>
    </div>
    </div>
    
    </div>
    
    
       
@stop
@section('js')
<script src="https://kit.fontawesome.com/7b2e84a63f.js" crossorigin="anonymous"></script>


@stop

