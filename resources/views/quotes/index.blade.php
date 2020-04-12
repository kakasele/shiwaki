@extends('layouts.app') 
@section('content')
<div class="container mt-6">
    <div class="sm:flex sm:justify-start hidden sm:ml-8">
        <a
            class="bg-blue-400 px-3 py-1 rounded-full text-white shadow sm:mr-8 font-semibold hover:no-underline"
            href="{{route('new-quote')}}"
            >New quote</a
        >
    </div>
    <div
        class="sm:px-6 lg:px-8 mx-w-lg mx-auto py-6 grid gap-4 lg:grid-cols-3 lg:mx-w-none hover:translate-x-2"
    >
        @foreach ($quotes as $quote)
        <div class="bg-white rounded shadow-sm flex flex-col">
            <div class="p-6 flex-1">
                <p class="mb-2 px-1">
                    <i class="fas text-sm text-gray-400 fa-quote-left mr-2"></i
                    >{{$quote->body}}
                    <i
                        class="fas text-sm text-gray-400 fa-quote-right ml-2"
                    ></i>
                </p>

                <span
                    class="flex justify-end italic text-gray-600 font-semibold"
                    >{{$quote->source}}</span
                >
            </div>
                            @if (Auth::check()) 
                    @if($quote->user->id===auth()->user()->id)
                    <div class="flex justify-end items-end mt-2 mr-3">
                        <a
                            href="{{route('edit-quote',$quote->id)}}"
                            class="bg-blue-300 px-3 rounded-full text-white mr-2 hover:no-underline"
                            href=""
                            >Edit</a
                        >
                        <div class="">
                            <form action="{{route('delete-quote',$quote->id)}}" method="POST">
                                @csrf 
                                @method('DELETE')
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
            <div class="border-t border-green-300 mt-2 px-6 py-2 bg-gray-200">
                <span class="text-sm text-gray-500">Shared by</span>
                <a
                    class="ml-2 text-sm text-blue-300"
                    href="{{route('member-profile',$quote->user->name)}}"
                    >{{$quote->user->name}}</a
                >
            </div>
        </div>
        @endforeach
    </div>
    <a
        href="{{route('new-quote')}}"
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
        {{$quotes->links()}}
    </div>
</div>

@endsection
