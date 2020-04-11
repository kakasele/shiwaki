@extends('layouts.app') 

@section('content')
<div class="container mt-6 sm:flex">
    <div class="bg-white sm:w-2/3 rounded overflow-hidden shadow-sm mb-2">
        <div>
            <img
                class="object-cover w-full"
                src="{{asset($article->image_path)}}"
                alt=""
            />
        </div>
        <div>
            <div class="p-3">
                <h2 class="text-2xl text-gray-900 leading-6 mt-2">
                    {{$article->title}}
                </h2>
                <div class="text-gray-700 mt-3 text-base ashmif-content">
                    {!! $article->body !!}
                </div>
            </div>
            <div>
                <div class="comments bg-gray-100 pb-3 py-4">
                    @if($article->comments->count() < 1)
                    <h1 class="px-3 pt-3 text-gray-600">
                        Be the first to comment &#x1F91F;
                    </h1>
                    @endif @forelse($article->comments as $comment)
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
                    @empty 
                    
                    @endforelse

                    <div class="text-input p-3">
                        <form
                            class="flex items-center"
                            action="{{route('post-article-comment',$article->slug)}}"
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
        <div class="shadow-sm bg-white rounded-lg px-4 p-3">
            <div class="author-info flex items-center mx-auto">
                <div>
                    <img
                        class="w-12 h-12 rounded-full"
                        src="{{asset($article->user->avatar())}}"
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
                    >{{$article->user->name}}</span
                >
            </div>
            <div class="mt-3">
                <a
                    class="bg-indigo-400 shadow px-4 py-2 block text-center no-underline hover:no-underline sm:w-2/3 text-white rounded-full w-full font-semibold"
                    href="{{route('member-profile',$article->user->username)}}"
                >
                    View Profile
                </a>
            </div>
        </div>
        @if ($article->tags->count()>0)
          <div class="bg-white rounded-lg flex justify-around flex-wrap p-2 mt-2 shadow-xs">
            @forelse ($article->tags as $tag)
                <a class="
                 @if($tag->name==='Laravel')
                 bg-green-300
                 @elseif($tag->name==='Business')
                 bg-pink-300
                 @elseif($tag->name==='Tech')
                 bg-blue-300                 
                 @else
                 bg-purple-500
                 @endif
                 px-3 rounded-full text-white hover:no-underline hover:text-white shadow-sm my-1" 
                href="{{route('articles',['tag'=>$tag->name])}}">{{$tag->name}}</a>
            @empty
                
            @endforelse
        </div>           
        @else
        <p class="bg-white rounded-lg p-3 mt-2 shadow-sm text-gray-600">
            This article has no tags
        </p>
        @endif
        <div class="mt-2 block shadow-sm rounded bg-white">
            <h1 class="px-3 pt-3 text-lg text-gray-500">
                More from
                <span class=""><a href="">{{$article->user->username}}</a></span>
            </h1>
            <div
                class="main-carousel"
                data-flickity='{ "cellAlign": "left", "contain": true,"autoPlay":true }'
            >
                @foreach ($user_articles as $article)
                <div class="carousel-cell w-full mx-2">
                    <a
                        href="{{route('show-article',$article->slug)}}"
                        class="no-underline hover:no-underline px-2 w-full"
                    >
                    <div class="ashmif-content">
                         @include('includes.articles._article-card') 
                    </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
