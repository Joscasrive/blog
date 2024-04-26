@extends('adminlte::page')
@section('title', 'Administrator')

@section('content_header')
    <h1>Create Post</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {{html()->form('POST',route('admin.posts.store'))->acceptsFiles()->open()}}

          

       @include('admin.posts.partials.form')

        {{html()->submit('Create Post')->class('btn btn-primary')}}
        {{html()->form()->close()}}
    </div>
</div>
   
@stop

@section('css')
<style>
    .image-wrapper{
        position: relative;
        padding-bottom: 56.25%;
    }
    .image-wrapper img{
        position: absolute;
        object-fit: cover;
        width: 100%;
        height: 100%;
    }
</style>
@stop
@section('js')
{{-- CDN --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
{{-- JavaScript Manejo DOM --}}
<script>
    $(document).ready( function() {
  $("#name").stringToSlug({
    setEvents: 'keyup keydown blur',
    getPut: '#slug',
    space: '-'
  });
});
</script>
{{-- JavaScript Manejo Swalert --}}
@if (session('info'))
<script>  
     Swal.fire({
  title: "Success!",
  text: "{{session('info')}}",
  icon: "success"
});
</script>
@endif
{{-- JavaScript Manejo Word --}}
<script>
    ClassicEditor
        .create( document.querySelector( '#extract' ) )
        .catch( error => {
            console.error( error );
        } );

    ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error( error );
        } );
       
        // cambiar imagen
        $('#file').change(cambiarImagen);
        function cambiarImagen(e){
            let file = e.target.files[0]; //64bits
            let reader = new FileReader();
            reader.onload = (e) =>{
                document.getElementById('picture').setAttribute('src',e.target.result)
            }
            reader.readAsDataURL(file);

            
        }

</script>
@stop