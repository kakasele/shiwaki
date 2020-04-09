@extends('layouts.app') 

@section('content')
<div class="container mt-6">
    <h1 class="mx-auto sm:text-center mb-3 text-xl font-semibold text-gray-600 mt-3">Write your Poem</h1>
        @if (session('error'))
            <div class="alert alert-error">
                {{session('error')}}
            </div>
        @endif
    <div class="form-container bg-white shadow-sm rounded sm:w-1/2 sm:mx-auto">
        <form class="p-4" action="{{route('store-poem')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title" class="text-sm block text-gray-600"
                    >Title</label
                >
                <input
                    type="text"
                    name="title"
                    id="title"
                    class="appearance-none bg-gray-100 p-2 rounded w-full"
                />
            </div>
            <div class="form-group">
                <label for="title" class="text-sm block text-gray-600"
                    >Body</label
                >

                <input id="x" type="hidden" name="body">
                <trix-editor input="x" class="trix-content"></trix-editor>
                {{-- <textarea
                    type="text"
                    name="body"
                    id="body"
                    class="appearance-none bg-gray-100 p-2 rounded w-full"
                    rows="5"
                ></textarea> --}}
            </div>

            <div>
                <button 
                type="submit"
                class="bg-blue-400 px-4 py-1 rounded-full text-white text-xl outline-none shadow w-full sm:block sm:w-auto"
                >Publish</button>
            </div>
        </form>
    </div>
</div>
@endsection


