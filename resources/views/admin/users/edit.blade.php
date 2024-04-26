@extends('adminlte::page')
@section('title', 'Administrator')

@section('content_header')
    <h1>Assign Role</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <p class="h5">Nombre:
        <p class="form-control">{{$user->name}}</p>
        <h2 class="h5">Role List</h2>
        {{html()->form('PUT',route('admin.users.update',$user))->open()}}
        @foreach ($roles as $role)
        <div>
            <label >
                <input type="checkbox" name="roles[]" value="{{ $role->id }}" @isset($select){{ in_array($role->id, $select)? 'checked' : '' }}@endisset>
        
                {{ $role->name }}
            </label>
        </div>
            
        @endforeach
        {{html()->submit('Assign role')->class('btn btn-primary')}}
        {{html()->form()->open()}}
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