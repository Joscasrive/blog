@props(['post'])
<article class="mb-8 bg-white shadow-lg rounded-lg overflow-hidden">
   @if($post->image)
   <img class="w-full h-72 object-cover object-center" src="{{Storage::url($post->image->url)}}" >
   @else
   <img class="w-full h-72 object-cover object-center" src="https://cdn.pixabay.com/photo/2015/10/04/08/06/blog-970722_960_720.jpg" >
   @endif
    <div class="px-6 py-4">
       <h1 class="text-xl font-bold mb-2">
           <a href="{{route('posts.show',$post)}}">{{$post->name}}</a>
       </h1>
    </div>
    <div class="mx-2">
       <p class="text-gray-700 text-base">
           {!!$post->extract!!}
       </p>
    </div>
    <div class="px-6 pt-4 pb-2">
       @foreach($post->tags as $tag)
       <a href="{{route('posts.tag',$tag)}}" class="inline-block rounded-full px-3 py-1 text-sm text-gray-700 mr-2 bg-gray-200">{{$tag->name}}</a>
       @endforeach
    </div>
   </article>