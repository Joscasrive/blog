<div class="form-group ">
    {{ html()->label('Name','name')}}
    {{ html()->text('name')->class('form-control')->placeholder('Enter the name of the tag')->required() }}
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
<div class="form-group ">
    {{ html()->label('Color','color')}}
    {{ html()->Select('color')->class('form-control')->options($colors) }}
    @error('color')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>