<x-app-layout>
    <div class="container bg-red-100 mt-5">
        <div class="grid lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 gap-6 mr-5 ml-5">
            @foreach($posts as $post)
                <div class="bg-center @if($loop->first) md:col-span-2 lg:col-span-2 @endif" style="background-image: url('{{$post->images->url}}'); height: 400px; weight:100%">
                    <div class="w-full h-full px-8 flex flex-col justify-center">

                        <div>
                            @foreach($post->tags as $tag)
                                <a href="" class="inline-block px-3 h-6 bg-{{$tag->color}}-600 text-white rounded-full">{{$tag->name}}</a>
                            @endforeach
                        </div>

                        <h1 class="text-4xl text-white leading-8 font-bold">
                            <a href="{{route('posts.show', $post)}}">{{$post->name}}</a>
                        </h1>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-4 mb-4">
            {{$posts->links()}}
        </div>
    </div>


</x-app-layout>
