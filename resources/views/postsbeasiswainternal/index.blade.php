@extends('layouts.app')
@section('title','Beasiswa Internal')
@section('background', 'bg-white')
@section('content')

@if(Auth::user()->role == "Admin")
    <div class="container w-4/4 m-auto px-10 pb-20" style="background-color: #0D285F">
        <h1 class="text-center font-bold text-5xl pt-12 pb-3 text-white">BEASISWA INTERNAL</h1>
        <p class="text-center italic text-white">beasiswa yang diberikan oleh Institut Teknologi Del dengan sasaran dan</p>
        <p class="text-center italic text-white pb-10">ketentuan yang beragam sesuai dengan jenis beasiswa.</p>

        <div class="flex flex-col space-y-3 rounded-3xl" style="background-color: white">
            <div class="container w-3/4 m-auto px-10 pb-20">
                @foreach ($postsbeasiswainternal as $post)
                <section class="text-gray-600 body-font">
                    <div class="container flex flex-wrap px-2 py-10 mx-auto items-center">
                        <div class="md:w-1/2 md:pr-12 md:py-8 md:border-r md:border-b-0 mb-10 md:mb-0 pb-10 border-b border-gray-200">
                            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">
                                <a href="{{ route('postsbeasiswainternal.show', $post->id) }}">
                                    {{ $post->title }}
                                </a>
                            </h1>
                            <p class="leading-relaxed text-justify">
                                {!! substr($post->content, 0, 500) !!} <!-- Display first 500 characters -->
                            </p>
                        </div>
                        <div class="flex flex-col md:w-1/2 md:pl-12 ">
                            <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
                                <button class='group font-medium tracking-wide select-none text-base relative inline-flex items-center justify-center cursor-pointer h-10 border-2 border-solid py-0 px-6 rounded-md overflow-hidden z-10 transition-all duration-300 ease-in-out outline-0 bg-[#0D285F] text-white border-[#0D285F] hover:text-[#0D285F] focus:text-[#0D285F] mb-3'>
                                    <strong class='font-medium'>{{ date('d F Y', strtotime($post->start_date)) }} - {{ date('d F Y', strtotime($post->end_date)) }}</strong>
                                    <span class='absolute bg-white bottom-0 w-0 left-1/2 h-full -translate-x-1/2 transition-all ease-in-out duration-300 group-hover:w-[105%] -z-[1] group-focus:w-[105%]'></span>
                                </button>

                                <a href="{{ route('postsbeasiswainternal.show', $post->id) }}">
                                    <img class="object-cover h-48 w-full scale-100 rounded-lg" src="{{ asset('images/' . $post->image) }}">
                                </a>
                            </div>
                            <form action="{{ route('postsbeasiswainternal.destroy', $post->id) }}" method="POST" class="mt-5">
                                <a href="{{ route('postsbeasiswainternal.show', $post->id) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg" style="background-color: #F49D1A;">
                                    Show
                                    <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                </a>
                                <a href="{{ route('postsbeasiswainternal.edit', $post->id) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg" style="background-color: #F49D1A;">
                                    Edit
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 ml-2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                </a>
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg" style="background-color: #EF4444;">
                                    Delete
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 ml-2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </section>
                @endforeach
            </div>
        </div>
    </div>
@endif

@if(Auth::user()->role == "Mahasiswa") 
<div class="container w-4/4 m-auto px-10 pb-20" style="background-color: #0D285F">
    <h1 class="text-center font-bold text-5xl pt-12 pb-3 text-white">BEASISWA INTERNAL</h1>
    <p class="text-center italic text-white">beasiswa yang diberikan oleh Institut Teknologi Del dengan sasaran dan</p>
    <p class="text-center italic text-white pb-10">ketentuan yang beragam sesuai dengan jenis beasiswa.</p>

    <div class="flex flex-col space-y-3 rounded-3xl" style="background-color: white">
        <div class="container w-3/4 m-auto px-10 pb-20">
            @foreach ($postsbeasiswainternal as $post)
            @if ($post->end_date >= now()->toDateString()) <!-- Check if end_date is not yet over -->
            <section class="text-gray-600 body-font">
                <div class="container flex flex-wrap px-2 py-10 mx-auto items-center">
                    <div class="md:w-1/2 md:pr-12 md:py-8 md:border-r md:border-b-0 mb-10 md:mb-0 pb-10 border-b border-gray-200">
                        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">
                            <a href="{{ route('postsbeasiswainternal.show', $post->id) }}">
                                {{ $post->title }}
                            </a>
                        </h1>
                        <p class="leading-relaxed text-justify">
                            {!! substr($post->content, 0, 500) !!} <!-- Display first 500 characters -->
                        </p>
                    </div>
                    <div class="flex flex-col md:w-1/2 md:pl-12">
                        <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
                            <button class='group font-medium tracking-wide select-none text-base relative inline-flex items-center justify-center cursor-pointer h-10 border-2 border-solid py-0 px-6 rounded-md overflow-hidden z-10 transition-all duration-300 ease-in-out outline-0 bg-[#0D285F] text-white border-[#0D285F] hover:text-[#0D285F] focus:text-[#0D285F] mb-3'>
                                <strong class='font-medium'>{{ date('d F Y', strtotime($post->start_date)) }} - {{ date('d F Y', strtotime($post->end_date)) }}</strong>
                                <span class='absolute bg-white bottom-0 w-0 left-1/2 h-full -translate-x-1/2 transition-all ease-in-out duration-300 group-hover:w-[105%] -z-[1] group-focus:w-[105%]'></span>
                            </button>

                            <a href="{{ route('postsbeasiswainternal.show', $post->id) }}">
                                <img class="object-cover h-48 w-full scale-100 rounded-lg" src="{{ asset('images/' . $post->image) }}">
                            </a>
                        </div>
                        <form action="{{ route('postsbeasiswainternal.destroy', $post->id) }}" method="POST" class="mt-5">
                            <a href="{{ route('postsbeasiswainternal.show', $post->id) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg" style="background-color: #F49D1A;">
                                Daftar
                                <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            </a>
                        </form>
                    </div>
                </div>
            </section>
            @endif
            @endforeach
        </div>
    </div>
</div>
@endif
@endsection