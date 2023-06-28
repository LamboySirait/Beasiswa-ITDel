@extends('layouts.app')
@section('title', 'Buat Beasiswa Internal')
@section('background', 'bg-white')
@section('content')

<div class="w-3/4 mx-auto font-montserrat font-medium">
    <h1 class="py-10 text-4xl font-bold">Tambah Content</h1>
    @if ($errors->any())
        <div class="relative px-3 py-3 mb-4 border rounded bg-red-200 border-red-300 text-red-800">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('postsbeasiswainternal.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="flex flex-wrap">
            <div class="sm:w-full pr-4 pl-4 sm:w-full pr-4 pl-4 md:w-full pr-4 pl-4">
                <div class="mb-4">
                    <strong>Title:</strong>
                    <input type="text" name="title" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded" placeholder="Title">
                </div>
            </div>
            <div class="sm:w-full pr-4 pl-4 sm:w-full pr-4 pl-4 md:w-full pr-4 pl-4">
                <div class="mb-4">
                    <strong>Content:</strong>
                    <textarea id="mytextarea" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded" style="height:150px" name="content" placeholder="Content"></textarea>
                </div>
            </div>
            <div class="sm:w-full pr-4 pl-4 sm:w-full pr-4 pl-4 md:w-full pr-4 pl-4">
                <div class="mb-4">
                    <strong>Image:</strong>
                    <input type="file" name="image" class="block appearance-none">
                </div>
            </div>
            <div class="sm:w-full pr-4 pl-4 sm:w-full pr-4 pl-4 md:w-full pr-4 pl-4">
                <div class="mb-4">
                    <strong>Start Date:</strong>
                    <input type="date" name="start_date" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded" placeholder="Start Date">
                </div>
            </div>
            <div class="sm:w-full pr-4 pl-4 sm:w-full pr-4 pl-4 md:w-full pr-4 pl-4">
                <div class="mb-4">
                    <strong>End Date:</strong>
                    <input type="date" name="end_date" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded" placeholder="End Date">
                </div>
            </div>
        </div>
        <div class="flex flex-row-reverse">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white px-5 py-2 my-4 rounded-md">Submit</button>
            <a href="/" class="bg-red-500 hover:bg-red-700 text-white px-5 py-3 mx-4 my-4 rounded-md">Cancel</a>
        </div>
    </form>
</div>
@endsection
