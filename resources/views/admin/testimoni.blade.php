@extends('layouts.app')
@section('title', 'Dashboard')
@section('background', 'bg-white')
@section('content')

<div class="w-3/4 mx-auto font-serif">
  <div class="flex justify-between items-center mb-5 mt-5">
    <h1 class="text-4xl font-bold">Tambah Testimoni</h1>
    <a href="{{ route('create-testimoni') }}" type="submit" class="bg-green-600 rounded-md px-7 py-2 text-white font-bold hover:shadow-slate-400 hover:bg-green-700 hover:shadow-md focus:ring-4 focus:outline-none focus:ring-green-500 mt-5" style="background-color:rgba(0, 118, 125, 1)">Tambah</a>
  </div>

  <table class="border-collapse border border-slate-400 mx-auto mt-4 mb-5">
    <tr style="background-color:rgba(13, 40, 95, 1); color:white">
      <th class="px-4 border border-slate-400 p-1">No</th>
      <th class="px-20 border border-slate-400">Nama</th>
      <th class="px-20 border border-slate-400">Isi Testimoni</th>
      {{-- <th class="px-10 border border-slate-400">Foto</th> --}}
      <th class="px-10 border border-slate-400">Author</th>
      <th class="px-18 border border-slate-400">Tanggal Pembuatan</th>
      <th class="px-5 border border-slate-400">Aksi</th>
    </tr>
    @foreach($testimoni as $row => $item)
    <tr class="border text-center">
      <td class="border border-slate-400 p-2">{{ $row + 1 }}</td>
      <td class="px-20 border border-slate-400">{{ $item->nama }}</td>
      <td class="px-20 border border-slate-400">{{ $item->isi }}</td>
      {{-- <td class="border border-slate-400">{{ $item->foto }}</td> --}}
      <td class="px-10 border border-slate-400">{{ $item->author }}</td>
      <td class="px-18 border border-slate-400">{{ $item->created_at }}</td>
      <td class="border border-slate-400">
        <form action="{{ route('delete-testimoni', $item->id) }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="text-red-600 hover:text-red-800">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" color="red " class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
            </svg>
          </button>
        </form>

        <button type="submit" class="text-red-600 hover:text-red-800">
          <a href="{{ route('edit-testimoni', $item->id) }}" class="text-blue-600 hover:text-blue-800">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
            </svg>
          </a>
        </button>
      </td>
    </tr>
    @endforeach
  </table>
</div>

@endsection