@extends('adminlte::page')
@section('title', 'Administrator')

@section('content_header')
    <h1>Edit Category</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">
        {{ html()->modelForm($category,'PUT', route('admin.categories.update',$category))->open() }}
        <div class="form-group ">
            {{ html()->label('Name','name')}}
            {{ html()->text('name')->class('form-control')->placeholder('Enter the name of the category')->required() }}
            @error('name')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group ">
            {{ html()->label('Slug','slug')}}
            {{ html()->text('slug')->class('form-control')->isReadonly() }}
            @error('slug')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
       
        {{ html()->submit('Update Categoy')->class('btn btn-primary') }}

        {{ html()->form()->close() }}
    </div>
</div>
@stop


@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
<script>
    $(document).ready( function() {
  $("#name").stringToSlug({
    setEvents: 'keyup keydown blur',
    getPut: '#slug',
    space: '-'
  });
});
</script>
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