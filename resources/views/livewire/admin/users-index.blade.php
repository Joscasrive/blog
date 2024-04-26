<div>
    <div class="card-header">
        <input class="form-control" placeholder="Search" wire:model.live="search"/>
    </div>
   @if ($users->count())
   <div class="card-body">
    <table class="table table-striped">

        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td width="10px"><a class="btn btn-primary" href="{{route('admin.users.edit',$user)}}">Edit</a></td>
            
            </tr>

            @endforeach
        </tbody>
    </table>

</div>
<div class="card-footer">
    {{$users->links(data: ['scrollTo' => false])}}
</div>


@else

<div class="card-body"><strong>There is no record</strong></div>
   @endif

</div>
