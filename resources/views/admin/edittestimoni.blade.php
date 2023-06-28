@extends('layouts.app')
@section('background', 'bg-white')
@section('title', 'Edit Testimoni')
@section('content')

<div class="flex justify-center items-center h-screen">
  <div class="w-3/5 font-montserrat">
    <h1 class="font-bold text-xl" style="font-size: 2rem; padding: 0 0 40px">Edit Testimoni</h1>
    <form class="space-y-4" action="{{ route('update-testimoni', $testimoni->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div>
        <label for="nama" class="block mb-2 font-medium text-gray-900">Nama<span style="color:red">*</span></label>
        <input autocomplete="off" type="text" id="nama" name="nama" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Silahkan Isi Nama" value="{{ $testimoni->nama }}">
      </div>

      <div>
        <label for="isi" class="block mb-2 font-medium text-gray-900">Isi Testimoni<span style="color:red">*</span></label>
        <textarea autocomplete="off" id="isi" name="isi" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Silahkan Isi Testimoni">{{ $testimoni->isi }}</textarea>
      </div>

      <div>
        <label for="author" class="block mb-2 font-medium text-gray-900">Author<span style="color:red">*</span></label>
        <input autocomplete="off" type="text" id="author" name="author" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Silahkan Isi Author" value="{{ $testimoni->author }}">
      </div>

      <div class="flex justify-end mt-6">
        <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-md font-bold hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-500 mt-5" style="background-color:rgba(0, 118, 125, 1)">Simpan</button>
      </div>
    </form>
  </div>
</div>

@endsection
