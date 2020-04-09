@extends('layouts.app') 

@section('content')
<div class="container mt-32">
    <div class="form-container bg-white shadow-sm rounded sm:w-1/2 sm:mx-auto mt-20">
        <h1 class="text-center pt-8 text-xl text-gray-600">Post your review</h1>
        <form class="p-4" action="{{route('store-review')}}" method="POST" enctype="multipart/form-data">
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
                <trix-editor input="x" class="ashmif-content"></trix-editor>
            </div>
            <div class="form-group">
                <label for="review_cover" class="text-sm block text-gray-600"
                    >Cover Image</label
                >
                <input
                    type="file"
                    name="review_cover"
                    id="review_cover"
                    class="appearance-none bg-gray-100 p-2 rounded w-full"
                />
            </div>
            <div>
                <button 
                type="submit"
                class="bg-blue-400 px-2 py-1 rounded-full text-white shadow font-semibold"
                >Save Your Review</button>
            </div>
        </form>
    </div>
</div>
@endsection


