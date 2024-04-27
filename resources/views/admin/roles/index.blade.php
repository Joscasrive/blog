@extends('adminlte::page')
@section('title', 'Administrator')

@section('content_header')
<a class="btn btn-secondary float-right" href="{{route('admin.roles.create')}}">New Role</a>
    <h1>Role List</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                   <tr>
                    <th>Id</th>
                    <th>Role</th>
                    <th colspan="2"></th>
                   </tr>
                </thead>
                <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{$role->id}}</td>
                        <td>{{$role->name}}</td>
                        <td width="10px"><a href="{{route('admin.roles.edit',$role)}}" class="btn btn-sm btn-primary">Edit</a></td>
                        <td width="10px">
                            <form class="form" action="{{route('admin.roles.destroy',$role)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
  
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