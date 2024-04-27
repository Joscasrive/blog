@extends('adminlte::page')
@section('title', 'Administrator')

@section('content_header')
    <h1>Role Edit</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {{html()->modelForm($role,'PUT',route('admin.roles.update',$role))->open()}}
            <div class="form-group">
                {{html()->label('Name','name')}}
                {{html()->text('name')->class('form-control')->placeholder('Enter the role name')->required()}}
                @error('name')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <h2 class="h3">List Permissions</h2>
            @foreach ($permissions as $permission)
                <div>
                    <label>
                        <label class="mr-2">
                            <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" @isset($select){{ in_array($permission->id, $select)? 'checked' : '' }}@endisset>
                            {{ $permission->description }}
                        </label>
                    </label>
                </div>
            @endforeach
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