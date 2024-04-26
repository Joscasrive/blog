<x-app-layout>
    <div class="container py-8">
        <h1 class="text-4xl font-bold text-gray-600">{{$post->name}}</h1>
        <div class="text-gray-500 text-lg mb-2">
            {!!$post->extract!!}
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
           {{-- contenido principal --}}
            <div class="lg:col-span-2">
                <figure>
                    @if($post->image)
                    <img class="w-full h-80 object-cover object-center" src="{{Storage::url($post->image->url)}}">
                    @else
                    <img class="w-full h-72 object-cover object-center" src="https://cdn.pixabay.com/photo/2015/10/04/08/06/blog-970722_960_720.jpg" >
                    @endif
                    
                </figure>
                <div class="text-base text-gray-500 mt-4">{!!$post->body!!}</div>
            </div>
            {{-- //contenido relacionado --}}
            <aside>
                <h1 class="text-2xl font-bold text-gray-600 mb-4">Mas en {{$post->category->name}}</h1>
                <ul>
                    @foreach($similares as $similar)
                    <li class="mb-4">
                        <a href="{{route('posts.show',$similar)}}" class="flex">
                            @if($similar->image)
                            <img class="w-36 h-20 object-cover object-center" src="{{Storage::url($similar->image->url)}}">
                            @else
                            <img class="w-36 h-20 object-cover object-center" src="https://cdn.pixabay.com/photo/2015/10/04/08/06/blog-970722_960_720.jpg">
                            @endif
                            <span class="ml-2 text-gray-600">{{$similar->name}}</span>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </aside>
        </div>
    </div>
</x-app-layout>