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