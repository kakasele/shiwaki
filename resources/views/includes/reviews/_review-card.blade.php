<div class="bg-white flex flex-col rounded-lg shadow-lg overflow-hidden mt-2">
            <div class="text-center my-3">
            <h2 class="text-xl text-gray-700 leading-6 mt-2 text-center font-semibold">
                {{$review->title}}
            </h2>
            <span class="text-xs text-gray-600 italic">{{$review->created_at->toFormattedDateString()}}</span>
        </div>
    <div class="flex-shrink-0 shadow-sm">
        <img
            src="{{asset('storage'.'/'. $review->image_path)}}"
            alt=""
            loading="lazy"
            class="h-48 w-full object-cover"
        />
    </div>
    <div class="section-content p-6 flex flex-col justify-between">
        <div class="flex-1">
            <div class="mt-3 text-lg leading-6 text-gray-600 ashmif-content flex-1">
                {!!Str::of($review->body)->words(20,'</div>')!!}
            </div>
        </div>
        <div class="author flex items-center mt-6">
            <div class="flex-shrink-0">
                <img
                    class="h-10 w-10 rounded-full"
                    src="{{asset('storage'.'/'. $review->user->avatar())}}"
                    alt=""
                />
            </div>
            <div class="flex justify-between items-center w-full">
                <div class="author-details ml-3">
                    <p class="text-sm leading-5 font-medium text-gray-900">
                        {{$review->user->name}}
                    </p>
                    <div class="flex text-sm leading-5 text-gray-500">
                        <time datetime="2020-03-25">{{$review->created_at->toFormattedDateString()}}</time>
                        <span class="mx-1">
                            &middot;
                        </span>
                        <span>
                            3 min read
                        </span>
                    </div>
                </div>
                <div class="text-pink-400 mr-6 flex items-center">
                    <button 
                    type="submit"
                    class="text-sm"
                    >
                        <svg 
                        fill="none" 
                        stroke="currentColor" 
                        stroke-linecap="round" stroke-linejoin="round" 
                        stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6"><path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </button>
                    {{-- <span class="ml-2">3</span> --}}
                </div>
            </div>
        </div>
    </div>
</div>
