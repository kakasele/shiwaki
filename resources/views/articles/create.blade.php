@extends('layouts.app') 

@section('content')
<div class="container mt-32">
    <div class="form-container bg-white shadow-sm rounded sm:w-1/2 sm:mx-auto mt-20">
        <h1 class="text-center pt-8 text-xl text-gray-600">Create your article</h1>
        <form class="p-4" action="{{route('store-article')}}" method="POST" enctype="multipart/form-data">
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
                <textarea
                    type="text"
                    name="body"
                    id="body"
                    class="appearance-none bg-gray-100 p-2 rounded w-full"
                    rows="7"
                ></textarea>
            </div>
            <div class="form-group">
                <label for="article_cover" class="text-sm block text-gray-600"
                    >Cover Image</label
                >
                <input
                    type="file"
                    name="article_cover"
                    id="article_cover"
                    class="appearance-none bg-gray-100 p-2 rounded w-full"
                />
            </div>
            <div>
                <button 
                type="submit"
                class="bg-blue-400 px-2 py-1 rounded-full text-white shadow font-semibold"
                >Save Article</button>
            </div>
        </form>
    </div>
</div>
@endsection


