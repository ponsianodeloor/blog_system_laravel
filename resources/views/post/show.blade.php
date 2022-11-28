<x-app-layout>
    <div class="container py-8">
        <h1 class="text-4xl font-bold text-gray-600">
            {{$post->name}}
        </h1>

        <div class="text-lg text-gray-500 mb-2">
            {{$post->extract}}
        </div>

        <div class="grid gap-6 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1">
            {{--Contenido principal--}}
            <div class="col-span-2">
                <figure>
                    <img class="w-full h-80 object-cover object-center" src="@if($post->images) {{$post->images->url}}  @endif"/>
                </figure>
                <div class="text-base text-gray-500 mt-4">
                    {{$post->body}}
                </div>
            </div>
            {{--Contenido Relacionado--}}
            <aside>
                <h1 class="text-2xl font-bold text-gray-600 mb-4">Mas en {{$post->category->name}}</h1>
                <ul>
                    @foreach($posts_similares as $post_similar)
                        <li class="mb-4">
                            <a href="{{route('posts.show', $post_similar)}}">
                                <img class="w-36 h-20 object-cover object-center"  src="@if($post->images) {{$post->images->url}}  @endif">
                                <span class="ml-2 text-gray-600">
                                    {{$post_similar->name}}
                                </span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </aside>
        </div>
    </div>
</x-app-layout>
