@extends('adminlte::page')
@section('title', 'Administrator')

@section('content_header')
    <h1>Administrator</h1>
@stop

@section('content')
<div class="row">
    <div class="col-lg-3 col-6">
    
    <div class="small-box bg-info">
    <div class="inner">
    <h3>150</h3>
    <p>New Orders</p>
    </div>
    <div class="icon">
    <i class="fa-solid fa-bag-shopping"></i>
    </div>
    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
    </div>
    
    <div class="col-lg-3 col-6">
    
    <div class="small-box bg-success">
    <div class="inner">
    <h3>53<sup style="font-size: 20px">%</sup></h3>
    <p>Bounce Rate</p>
    </div>
    <div class="icon">
    <i class="fa-solid fa-chart-simple"></i>
    </div>
    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
    </div>
    
    <div class="col-lg-3 col-6">
    
    <div class="small-box bg-warning">
    <div class="inner">
    <h3>44</h3>
    <p>User Registrations</p>
    </div>
    <div class="icon">
    <i class="fa-solid fa-user-plus"></i>
    </div>
    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
    </div>
    
    <div class="col-lg-3 col-6">
    
    <div class="small-box bg-danger">
    <div class="inner">
    <h3>65</h3>
    <p>Unique Visitors</p>
    </div>
    <div class="icon">
    <i class="fa-solid fa-user-tie"></i>
    </div>
    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
    </div>
    
    </div>
@stop
@section('js')
<script src="https://kit.fontawesome.com/7b2e84a63f.js" crossorigin="anonymous"></script>
@stop

