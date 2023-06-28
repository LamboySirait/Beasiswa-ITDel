@extends('layouts.app')
@section('title','Buat Beasiswa Internal')
@section('background', 'bg-white')
@section('content')

<div class="flex flex-col min-h-screen">
  <div class="flex-grow">
    @if($postsbeasiswainternal)
      <h1 class="text-center font-bold font-sans my-10 text-4xl">{{ $postsbeasiswainternal->title }}</h1>
      <div class="my-10 w-3/4 mx-auto">
        {!! $postsbeasiswainternal->content !!}
        @if ($postsbeasiswainternal->image)
            <img src="{{ asset('images/' . $postsbeasiswainternal->image) }}" alt="Post Image" width="200">
        @else
        @endif
      </div>
    @else
      <p>No post found.</p>
    @endif
  </div>
  <footer class="text-center py-4 bg-gray-200">
    <!-- Isi konten footer di sini -->
  </footer>
</div>
@endsection