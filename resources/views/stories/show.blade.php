@extends('layouts.app') 

@section('content')
<div class="container mt-6 sm:flex">
    <div class="bg-white sm:w-2/3 rounded overflow-hidden shadow-sm mb-2">
        <div>
            <div class="p-3">
                <h2 class="text-2xl text-gray-900 leading-6 mt-2">
                    {{$story->title}}
                </h2>
                <div class="text-gray-700 mt-3 text-base ashmif-content">
                    {!! $story->body !!}
                </div>
                @if (Auth::check()) 
                    @if($story->user->id===auth()->user()->id)
                    <div class="flex justify-end items-end mt-2">
                        <a
                            href="{{route('update-story',$story->slug)}}"
                            class="bg-blue-300 px-3 rounded-full text-white mr-2 hover:no-underline"
                            href=""
                            >Edit</a
                        >
                        <div class="">
                            <form action="{{route('delete-story',$story->slug)}}" method="POST">
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
                    @endif 
                @endif

            </div>
        </div>
    </div>

    <div class="block sm:flex-1 sm:ml-4 rounded">
        <h1 class="pb-2 sm:hidden text-base text-blue-400">Published by...</h1>
        <div class="shadow-sm bg-white rounded-lg px-4 p-3">
            <div class="author-info flex items-center mx-auto">
                <div>
                    <img
                        class="w-12 h-12 rounded-full"
                        src="{{asset($story->user->avatar())}}"
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
                    >{{$story->user->name}}</span
                >
            </div>
            <div class="mt-3">
                <a
                    class="bg-green-400 shadow px-4 py-2 block text-center no-underline hover:no-underline sm:w-2/3 text-white rounded-full w-full font-semibold"
                    href="{{route('member-profile',$story->user->name)}}"
                >
                    View Profile
                </a>
            </div>
        </div>
        <div class="mt-2 block shadow-sm rounded bg-white">
            <h1 class="px-3 pt-3 text-lg text-gray-500">
                Other from stories
                <span class=""><a href="">{{$story->user->name}}</a></span>
            </h1>
            <div
                class="main-carousel"
                data-flickity='{ "cellAlign": "left", "contain": true,"autoPlay":true }'
            >
                @foreach ($user_stories as $story)
                <div class="carousel-cell w-full mx-2">
                    <a
                        href="{{route('show-story',$story->slug)}}"
                        class="no-underline hover:no-underline px-2 w-full"
                    >
                    <div class="ashmif-content">
                         @include('includes.stories._story-card') 
                    </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
