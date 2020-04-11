@extends('layouts.app') 

@section('content')
<div class="container mt-6">
    <div class="sm:flex sm:justify-start hidden sm:ml-8">
        <a
            class="bg-blue-400 px-3 py-1 rounded-full text-white shadow sm:mr-8 font-semibold hover:no-underline"
            href="{{route('new-article')}}"
            >New Article</a
        >
    </div>
    <div
        class="sm:px-6 lg:px-8 mx-w-lg mx-auto py-6 grid gap-4 lg:grid-cols-3 lg:mx-w-none hover:translate-x-2"
    >
        @forelse ($articles as $article) 
          <a href="{{$article->path()}}" class="no-underline hover:no-underline">
              @include('includes.articles._article-card')
          </a>
        @empty
            <p>No relevant articles yet</p>
        @endforelse
    </div>
    <a
    href="{{route('new-article')}}"
        class="shiwaki-pen bg-green-400 text-lg shadow font-normal rounded-full w-16 h-16 right-0 mr-6 flex items-center sm:hidden"
        style="{right:25px; bottom:25px;position:fixed;}"
    >
        <svg
            class="text-white text-sm h-10 justify-center mx-auto"
            fill="none"
            stroke="currentColor"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            viewBox="0 0 24 24"
            
        >
            <path
                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"
            ></path>
        </svg>
    </a>
    <div class="sm:ml-8">
        {{-- {{$articles->links()}} --}}
    </div>
</div>

@endsection
