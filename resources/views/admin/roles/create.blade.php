@extends('adminlte::page')
@section('title', 'Administrator')

@section('content_header')
    <h1>Role Create</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {{html()->form('POST',route('admin.roles.store'))->open()}}
           @include('admin.roles.partials.form')
            {{ html()->submit('Create Rol')->class('btn btn-primary')}}
            {{html()->form()->close()}}
        </div>
    </div>
@stop



@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (session('info'))
<script>  
Swal.fire({
       title: "Success!",
       text: "{{session('info')}}",
      icon: "success"
     });
</script>
@endif
@stop