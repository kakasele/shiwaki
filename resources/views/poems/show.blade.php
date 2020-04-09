@extends('layouts.app') 

@section('content')
<div class="container mt-6 sm:flex">
    <div class="bg-white sm:w-2/3 rounded overflow-hidden shadow-sm mb-2">
        <div>
            <div class="p-3">
                <h2 class="text-2xl text-gray-900 leading-6 mt-2">
                    {{$poem->title}}
                </h2>
                <div class="text-gray-700 mt-3 text-base ashmif-content">
                    {!! $poem->body !!}
                </div>
            </div>
        </div>
    </div>

    <div class="block sm:flex-1 sm:ml-4 rounded">
        <h1 class="pb-2 sm:hidden text-base text-blue-400">Posted by...</h1>
        <div class="shadow-sm bg-white rounded-lg px-4 p-3">
            <div class="author-info flex items-center mx-auto">
                <div>
                    <img
                        class="w-12 h-12 rounded-full"
                        src="{{asset($poem->user->avatar())}}"
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
                    >{{$poem->user->name}}</span
                >
            </div>
            <div class="mt-3">
                <a
                    class="bg-green-400 shadow px-4 py-2 block text-center no-underline hover:no-underline sm:w-2/3 text-white rounded-full w-full font-semibold"
                    href="{{route('member-profile',$poem->user->name)}}"
                >
                    View Profile
                </a>
            </div>
        </div>
        <div class="mt-2 block shadow-sm rounded bg-white">
            <h1 class="px-3 pt-3 text-lg text-gray-500">
                Other from poems
                <span class=""><a href="">{{$poem->user->name}}</a></span>
            </h1>
            <div
                class="main-carousel"
                data-flickity='{ "cellAlign": "left", "contain": true,"autoPlay":true }'
            >
                @foreach ($user_poems as $poem)
                <div class="carousel-cell w-full mx-2">
                    <a
                        href="{{route('show-poem',$poem->slug)}}"
                        class="no-underline hover:no-underline px-2 w-full"
                    >
                    <div class="ashmif-content mx-auto">
                         @include('includes.poems._poem-card') 
                    </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
