<div class="form-group">
    {{html()->label('Name','name')}}
    {{html()->text('name')->class('form-control')->placeholder('enter the name of the publications')->autocomplete(false)->required()}}
    @error('name')
     <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<div class="form-group">
    {{html()->label('Slug','slug')}}
    {{html()->text('slug')->class('form-control')->isReadonly()}}
    @error('slug')
     <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<div class="form-group">
    {{ html()->label('Category','category_id')}}
    {{ html()->select('category_id')->class('form-control')->options($categories) }}
    @error('category_id')
    <small class="text-danger">{{$message}}</small>
   @enderror
</div>

<div class="form-group">
    <p class="font-weight-bold">Tags</p>
    @foreach ($tags as $tag)
    <label class="mr-2">
        <input type="checkbox" name="tags[]" value="{{ $tag->id }}" @isset($select){{ in_array($tag->id, $select)? 'checked' : '' }}@endisset>
        {{ $tag->name }}
    </label>
@endforeach
   
   @error('tags')
        <br>
     <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<div class="form-group">
    <p class="font-weight-bold">Estatus</p>
    <label class="mr-2">
        {{html()->radio('status',false,1)->required()}}
        Draft
    </label>
    <label >
        {{html()->radio('status',false,2)->required()}}
        Published
    </label>
    
    @error('status')
        <br>
      <small class="text-danger">{{$message}}</small>
     @enderror
</div>
 <div class="row mb-3">
    <div class="col">
        <div class="form-group">
            {{html()->label('Image','file')}}
            {{html()->file('file')->class('form-control-file')->acceptImage('image/')}}
            @error('file')
            <span class="text-danger">{{$message}}</span>
           @enderror
        </div>
        <p > You can add your preferred image with the button that appears in the button bar above the edit box (although it may not appear in your browser). Select the file name and press the button.</p>
            <hr>
           <p> "Image_name" is the name of the image including its extension, which is used to indicate the format of the added image (.jpg, .png, etc.).</p>
        <hr>
        <p>Only formats corresponding to an image will be accepted (Exclusive).</p>
    </div>
    <div class="col">
        <div class="image-wrapper"> 
            @isset ($post->image)
            
            <img id="picture" src="{{Storage::url($post->image->url)}}" >
                
            @else
                
            <img id="picture" src="https://cdn.pixabay.com/photo/2015/10/04/08/06/blog-970722_960_720.jpg" >
            @endisset
        </div>
       
    </div>
    
    
 </div>
<div class="form-group">
    {{ html()->label('Extract:','extract')}}
    {{ html()->textarea('extract')->class('form-control')}}
    
    @error('extract')
      <small class="text-danger">{{$message}}</small>
     @enderror
</div>

<div class="form-group">
    {{ html()->label('Body Post:','body')}}
    {{ html()->textarea('body')->class('form-control')}}
   
    @error('body')
      <small class="text-danger">{{$message}}</small>
     @enderror
</div>