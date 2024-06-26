<div class="card">
    <div class="card-header">
        <input class="form-control" placeholder="Search" wire:model.live="search"/>
    </div>
   @if ($posts->count())
   <div class="card-body">
    <table class="table table-striped">

        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th colspan="2"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->name}}</td>
                <td width="10px">
                    @can('admin.posts.edit')
                    <a class="btn btn-primary btn-sm" href="{{route('admin.posts.edit',$post)}}">Edit</a>
                    @endcan
                </td>
                <td width="10px">
                    @can('admin.posts.destroy')
                        <form  class="form" action="{{route('admin.posts.destroy',$post)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button  class="btn btn-danger btn-sm" type="submit">Delete</button>
                        </form>
                    @endcan
                    
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>

</div>
<div class="card-footer">
    {{$posts->links(data: ['scrollTo' => false])}}
</div>


@else

<div class="card-body"><strong>There is no record</strong></div>
   @endif

</div>
