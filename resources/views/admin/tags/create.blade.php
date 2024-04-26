@extends('adminlte::page')
@section('title', 'Administrator')

@section('content_header')
    <h1>Create Tag</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            {{ html()->form('POST', route('admin.tags.store'))->open() }}
           @include('admin.tags.partials.form')
           
            {{ html()->submit('Create Categoy')->class('btn btn-primary') }}

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