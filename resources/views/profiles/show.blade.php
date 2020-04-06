@extends('layouts.app') 

@section('content')
<div class="container mt-16">
    <h1>Welcome, {{$profileUser->name}}</h1>
    <main class="sm:flex sm:mt-4">
        <section class="right sm:w-1/2 rounded mt-2">
            <div class="bg-white shadow-sm overflow-hidden sm:flex">
                <div class="flex justify-center sm:justify-start w-full">
                    <div class="avatar bg-red-300 overflow-hidden">
                        <img
                            class="object-cover h-24 w-24 sm:h-full sm:w-full sm:rounded-none rounded-full"
                            src="{{asset($profileUser->avatar_path)}}"
                            alt=""
                        />
                    </div>
                </div>
                <div class="sm:w-flex-1 ml-4 sm:p-3 py-2">
                    <h1 class="text-gray-800 text-2xl">About Me</h1>
                    <p class="leading-7 text-gray-600">{{$profileUser->bio}}</p>
                </div>
            </div>
            <div class="mt-3 sm:mx-auto bg-white shadow-sm">
                <div class="px-4 py-2">
                    <h1 class="text-xl text-gray-800 leading-tight">
                        Update your details
                    </h1>
                    <form
                        class="mx-auto"
                        action="{{route('save-profile')}}"
                        method="POST"
                        enctype="multipart/form-data"
                    >
                        @csrf
                        <div class="form-group">
                            <label
                                class="block text-sm text-gray-600"
                                for="username"
                                >Username</label
                            >
                            <input
                                class="bg-gray-100 outline-none focus:outline-none w-full sm:w-3/5 rounded p-2 border"
                                type="text"
                                name="username"
                                id="username"
                            />
                        </div>
                        <div class="form-group">
                            <label
                                class="block text-sm text-gray-600"
                                for="avatar"
                                >Avatar</label
                            >
                            <input
                                class="bg-gray-100 outline-none focus:outline-none w-full sm:w-3/5 rounded p-2 border"
                                type="file"
                                name="avatar"
                                id="avatar"
                            />
                        </div>
                        <div class="form-group">
                            <label class="block text-sm text-gray-600" for="bio"
                                >About you</label
                            >
                            <textarea
                                class="bg-gray-100 outline-none focus:outline-none w-full sm:w-3/5 rounded p-2 border"
                                type="text"
                                name="bio"
                                id="bio"
                            ></textarea>
                        </div>
                        <div class="form-group">
                            <button
                                class="bg-green-400 px-3 py-1 rounded-full shadow sm:shadow-xs text-white font-semibold text-lg"
                                type="submit"
                                role="button"
                            >
                                Save Details
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <section
            class="left sm:flex-1 sm:mr-3 bg-white p-3 rounded shadow-sm mt-2 sm:ml-4"
        >
            Right
        </section>
    </main>
</div>
@endsection
