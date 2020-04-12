@extends('layouts.app') 

@section('content')
<div class="container mt-6">
            <h1 class="mx-auto sm:text-center mb-3 text-xl font-semibold text-gray-600">Read & Approve</h1>
        @if (session('error'))
            <div class="alert alert-error">
                {{session('error')}}
            </div>
        @endif
    <div class="form-container bg-white shadow-sm rounded sm:w-1/2 sm:mx-auto mt-6">
        <form class="p-4" action="{{route('admin.stories.update',$story->id)}}" method="POST">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="title" class="text-sm block text-gray-600"
                    >Title</label
                >
                <input
                    type="text"
                    name="title"
                    id="title"
                    class="appearance-none bg-gray-100 p-2 rounded w-full"
                    value="{{$story->title}}"
                />
            </div>
            <div class="form-group">
                <label for="title" class="text-sm block text-gray-600"
                    >Body</label
                >
                <input id="x" type="hidden" name="body">
                <trix-editor input="x" class="ashmif-content">{!!$story->body!!}</trix-editor>
            </div>
            <div>
                <button 
                type="submit"
                class="bg-blue-400 px-2 py-1 rounded-full text-white shadow font-semibold"
                >Save story</button>
            </div>
        </form>
    </div>
</div>
@endsection


