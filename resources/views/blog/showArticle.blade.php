@extends('layouts.app')

@section('title', $post ? $post->tags : '')

@section('background', 'bg-white')

@section('content')
<div class="flex flex-col min-h-screen">
  <div class="flex-grow m-10">
    @if($post)
      <h1 class="text-center font-bold font-sans my-10 text-4xl mx-10">{{ $post->title }}</h1>
      <div class="my-10 w-3/4 mx-auto">
        {!! $post->description !!}
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