<div class="border rounded w-full mb-1">
    <div class="flex items-center justify-between p-1 border-b">
        <svg
            fill="none"
            stroke="currentColor"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            viewBox="0 0 24 24"
            class="w-6 h-6 text-sm mr-2 text-gray-600"
        >
            <path
                d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"
            ></path>
        </svg>
        <span class="w-full">{{$file->name}}</span>
        <span class="w-full flex-1 mx-2 text-gray-600">{{round($file->file_size,2)}}MB</span>
    </div>
</div>