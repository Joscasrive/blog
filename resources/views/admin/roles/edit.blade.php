@extends('adminlte::page')
@section('title', 'Administrator')

@section('content_header')
    <h1>Role Edit</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {{html()->modelForm($role,'PUT',route('admin.roles.update',$role))->open()}}
            @include('admin.roles.partials.form')
            {{ html()->submit('Update Rol')->class('btn btn-primary')}}
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