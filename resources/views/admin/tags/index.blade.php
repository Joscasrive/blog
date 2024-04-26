@extends('adminlte::page')
@section('title', 'Administrator')

@section('content_header')
    <h1>Tag List</h1>
@stop

@section('content')

<div class="card">
    @can('admin.tags.create')
    <div class="card-header"><a class="btn btn-secondary" href="{{route('admin.tags.create')}}">Add Tag</a></div>
    @endcan
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <th>ID</th>
                <th>Name</th>
                <th colspan="2"></th>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                    <tr>
                       <td>{{$tag->id}}</td>
                       <td>{{$tag->name}}</td>
                       <td width="10px">
                        @can('admin.tags.edit')
                        <a class=" btn btn-primary btn-sm" href="{{route('admin.tags.edit',$tag)}}">Edit</a>
                        @endcan
                       </td>
                       <td width="10px">
                        @can('admin.tags.destroy')
                            <form class="form" action="{{route('admin.tags.destroy',$tag)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger btn-sm">Delete</button>
                    
                            </form>
                        @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
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