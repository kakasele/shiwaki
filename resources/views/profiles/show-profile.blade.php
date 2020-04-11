@extends('layouts.app') @section('content')
<div class="container">
    <main class="">
        <header class="rounded text-center ">
            <div class="bg-white rounded-b flex items-center flex-col pt-3">
                <div class="overflow-hidden">
                    <img
                        class="w-24 object-cover h-24 border-2 border-blue-300 rounded-full"
                        src="{{asset($profileUser->avatar())}}"
                        alt=""
                    />
                </div>
                <div class="sm:w-1/2 sm:flex flex-col justify-between p-3 ">
                    <h1 class="text-xl sm:text-2xl text-gray-700">
                        {{$profileUser->name}}
                    </h1>
                    <p class="text-gray-700 text-base">
                       {{$profileUser->bio}}
                    </p>
                    <p class="text-gray-500 mt-1">
                        Member since
                        <span class=""
                            >{{$profileUser->created_at->toFormattedDateString()}}</span
                        >
                    </p>
                </div>
                @if (auth()->user()->id===$profileUser->id)
                <div class="mb-4">
                    <a
                        href="{{route("member-profile-edit",$profileUser->username)}}"
                        class="inline-block bg-green-300 px-3 py-1 rounded-full text-white text-lg font-semibold shadow-outline hover:no-underline"
                        >Edit Profile</a
                    >
                </div>                    
                @endif
            </div>
        </header>
    </main>
</div>
@endsection
