@extends('layouts.app') @section('content')
<div class="container mt-6 sm:flex">
    <div class="bg-white sm:w-2/3 rounded overflow-hidden shadow-sm mb-2">
        <div class="text-center my-3">
            <h2 class="text-2xl text-gray-700 leading-6 mt-2 text-center font-semibold">
                {{$review->title}}
            </h2>
            <span class="text-xs text-gray-600 italic">{{$review->created_at->toFormattedDateString()}}</span>
        </div>
        <div>
            <img
                class="object-cover w-full"
                src="{{asset($review->image_path)}}"
                alt=""
            />
        </div>
        <div>
            <div class="p-3">
                <div class="text-gray-700 mt-3 text-base ashmif-content">
                    {!! $review->body !!}
                </div>
                @if (Auth::check()) 
                    @if($review->user->id===auth()->user()->id)
                        <div class="flex justify-end items-end mt-2">
                            <a
                                href="{{route('edit-review',$review->slug)}}"
                                class="bg-blue-300 px-3 rounded-full text-white mr-2 hover:no-underline"
                                href=""
                                >Edit</a
                            >
                            <div class="">
                                <form
                                    action="{{route('delete-review',$review->slug)}}"
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
                    @endif 
                @endif
            </div>
            <div>

                <div class="comments bg-gray-200 pb-3 py-4">
                    @if($review->reviewcomments->count() < 1)
                    <h1 class="px-3 pt-3 text-gray-600">
                        Be the first to comment &#x1F91F;
                    </h1>
                    @endif @forelse($review->reviewcomments as $comment)
                    <div class="comment px-3 mb-3 flex items-center">
                        <img
                            src="{{asset($comment->user->avatar())}}"
                            class="w-12 h-12 rounded-full shadow-sm flex-shrink-0 z-10 mb-auto"
                            alt=""
                        />
                        <p
                            class="comment-body pl-10 pr-3 py-2 sm:max-w-4/5 bg-white shadow-sm -ml-8 text-gray-800"
                        >
                            {{$comment->body}}
                        </p>
                    </div>
                    @empty @endforelse

                    <div class="text-input p-3">
                        <form
                            class="flex items-center"
                            action="{{route('post-review-comment',$review->slug)}}"
                            method="POST"
                        >
                            @csrf
                            <input
                                name="body"
                                class="comment w-full sm:w-4/5 p-3 pl-8 shadow-sm border-l-2 border-green-400 outline-none text-gray-700"
                                type="text"
                                placeholder="Comment on the post..."
                            />
                            <div class="">
                                <button
                                    type="submit"
                                    class="bg-green-400 px-4 py-2 h-4/5 comment-btn text-white -ml-3 pl-3 text-lg font-semibold outline-none focus:no-outline active:no-outline"
                                >
                                    Post
                                </button>
                            </div>
                        </form>
                        <span class="text-red-500 text-xs"
                            >@error('body'){{$message}}@enderror</span
                        >
                    </div>
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
                        src="{{asset($review->user->avatar())}}"
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
                    >{{$review->user->name}}</span
                >
            </div>
            <div class="mt-3">
                <a
                    class="bg-green-400 shadow px-4 py-2 block text-center no-underline hover:no-underline sm:w-2/3 text-white rounded-full w-full font-semibold"
                    href="{{route('member-profile',$review->user->name)}}"
                >
                    View Profile
                </a>
            </div>
        </div>
        <div class="mt-2 block shadow-sm rounded bg-white">
            <h1 class="px-3 pt-3 text-lg text-gray-500">
                More reviews from
                <span class=""><a href="">{{$review->user->name}}</a></span>
            </h1>
            <div
                class="main-carousel"
                data-flickity='{ "cellAlign": "left", "contain": true,"autoPlay":true }'
            >
                @foreach ($user_reviews as $review)
                <div class="carousel-cell w-full mx-2">
                    <a
                        href="{{route('show-review',$review->slug)}}"
                        class="no-underline hover:no-underline px-2 w-full"
                    >
                        <div class="ashmif-content">
                            @include('includes.reviews._review-card')
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
