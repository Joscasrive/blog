@extends('adminlte::page')
@section('title', 'Administrator')

@section('content_header')
  <a class="btn btn-secondary float-right" href="{{route('admin.posts.create')}}">New Post</a>
    <h1>Post List</h1>
@stop

@section('content')
    @livewire('admin.posts-index')
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $('.form').submit(function(e){
        e.preventDefault();
        Swal.fire({
  title: "Are you sure?",
  text: "You won't be able to revert this!",
  icon: "warning",
  showCancelButton: true,
  confirmButtonColor: "#3085d6",
  cancelButtonColor: "#d33",
  confirmButtonText: "Yes, delete it!"
}).then((result) => {
  if (result.isConfirmed) {
    this.submit();
  }
});
    });
</script>
</script>
@if (session('info'))
<script>  
Swal.fire({
       title: "Deleted!",
       text: "{{session('info')}}",
      icon: "success"
     });
</script>
@endif
@stop