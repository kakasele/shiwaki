@extends('layouts.app') @section('content')
<div class="container mt-6 sm:flex">
    <div class="bg-white sm:w-2/3 rounded overflow-hidden shadow-sm mb-2">
        <div>
            <img
                class="object-cover w-full"
                src="{{asset($article->image_path)}}"
                alt=""
            />
        </div>

        <div class="p-3">
            <div class="text-center my-3">
                <h2
                    class="text-2xl text-gray-700 leading-6 mt-2 text-center font-semibold"
                >
                    {{$article->title}}
                </h2>
                <div class="text-gray-700 mt-3 text-base ashmif-content">
                    {!! $article->body !!}
                </div>
                @can('update',$article)
                <div class="flex justify-end items-end mt-2">
                    <a
                        href="{{route('edit-article',$article->slug)}}"
                        class="bg-blue-300 px-3 rounded-full text-white mr-2 hover:no-underline"
                        href=""
                        >Edit</a
                    >
                    <div class="">
                        <form
                            action="{{route('delete-article',$article->slug)}}"
                            method="POST"
                        >
                            @csrf @method('DELETE')
                            <button
                                class="bg-red-400 px-3 rounded-full text-white outline-none focus:outline-none "
                                type="submit"
                            >
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
                @endcan
            </div>
        </div>
        @include('articles._article-comments')
    </div>

    <div class="block sm:flex-1 sm:ml-4 rounded">
        <h1 class="pb-2 sm:hidden text-base text-blue-400">Posted by...</h1>
        <div class="shadow-sm bg-white rounded-lg px-4 p-3">
            <div class="author-info flex items-center mx-auto">
                <div>
                    <img
                        class="w-12 h-12 rounded-full"
                        src="{{asset($article->user->avatar())}}"
                        alt=""
                    />
                </div>
                <span class="verified">
                    <img
                        class="w-4 mx-1 rounded-full"
                        src="{{asset('/images/verified.png')}}"
                        alt=""
                    />
                </span>
                <span class="text-2xl text-gray-700"
                    >{{$article->user->name}}</span
                >
            </div>
            <div class="mt-3">
                <a
                    class="bg-green-400 shadow px-4 py-2 block text-center no-underline hover:no-underline sm:w-2/3 text-white rounded-full w-full font-semibold"
                    href="{{route('member-profile',$article->user->username)}}"
                >
                    View Profile
                </a>
            </div>
        </div>
        @if ($article->tags->count()>0)
        <div
            class="bg-white rounded-lg flex justify-around flex-wrap p-2 mt-2 shadow-xs"
        >
            @forelse ($article->tags as $tag)
            <a
                class="
                 @if($tag->name==='Laravel')
                 bg-green-300
                 @elseif($tag->name==='Business')
                 bg-pink-300
                 @elseif($tag->name==='Tech')
                 bg-blue-300                 
                 @else
                 bg-purple-500
                 @endif
                 px-3 rounded-full text-white hover:no-underline hover:text-white shadow-sm my-1"
                href="{{route('articles',['tag'=>$tag->name])}}"
                >{{$tag->name}}</a
            >
            @empty @endforelse
        </div>
        @else
        <p class="bg-white rounded-lg p-3 mt-2 shadow-sm text-gray-600">
            This article has no tags
        </p>
        @endif
        <div class="mt-2 block shadow-sm rounded bg-white">
            <h1 class="px-3 pt-3 text-lg text-gray-500">
                More article from
                <span class=""><a href="">{{$article->user->name}}</a></span>
            </h1>
            <div
                class="main-carousel"
                data-flickity='{ "cellAlign": "left", "contain": true,"autoPlay":true }'
            >
                @foreach ($user_articles as $article)
                <div class="carousel-cell w-full mx-2">
                    <a
                        href="{{route('show-article',$article->slug)}}"
                        class="no-underline hover:no-underline px-2 w-full"
                    >
                        <div class="ashmif-content">
                            @include('includes.articles._article-card')
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
