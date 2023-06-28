@extends('layouts.app')
@section('title','Seleksi')
@section('background', 'bg-white')
@section('content')
<html>

<head>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <style>
        .form-container {
            display: none;
        }

        .menu-icon {
            cursor: pointer;
            display: block;
            margin-bottom: 10px;
        }

        .form-container.show {
            display: block;
        }
    </style>
    <script>
        $(document).ready(function() {
            $('.menu-icon').click(function() {
                $('.form-container').toggleClass('show');
            });
        });
    </script>
</head>

<body>
    <div class="container mx-auto my-4">
        @if(Auth::user()->role == 'Admin')
        <h1 class="text-center text-4xl font-bold py-10">Seleksi</h1>
        <div class="menu-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="3" y1="12" x2="21" y2="12" />
                <line x1="3" y1="6" x2="21" y2="6" />
                <line x1="3" y1="18" x2="21" y2="18" />
            </svg>
        </div>

        <form class="my-4 form-container" action="{{ route('seleksi') }}" method="GET">
            <table>
                <tr>
                    <td>
                        <label for="prodi" class="font-bold">Program Studi</label>
                    </td>
                    <td>
                        <select id="prodi" name="prodi" class="form-select block w-full max-w-xs">
                            <option value="">Semua</option>
                            <option value="DIII Teknologi Informasi" {{ request()->query('prodi') == 'DIII Teknologi Informasi' ? 'selected' : '' }}>D3 - TI</option>
                            <option value="DIII Teknologi Komputer" {{ request()->query('prodi') == 'DIII Teknologi Komputer' ? 'selected' : '' }}>D3 - TK</option>
                            <option value="DIV Sarjana Terapan Teknologi Rekayasa Perangkat Lunak" {{ request()->query('prodi') == 'DIV Sarjana Terapan Teknologi Rekayasa Perangkat Lunak' ? 'selected' : '' }}>D4 - TRPL</option>
                            <option value="S1 Informatika" {{ request()->query('prodi') == 'S1 Informatika' ? 'selected' : '' }}>S1 - IF</option>
                            <option value="S1 Sistem Informasi" {{ request()->query('prodi') == 'S1 Sistem Informasi' ? 'selected' : '' }}>S1 - SI</option>
                            <option value="S1 Teknik Elektro" {{ request()->query('prodi') == 'S1 Teknik Elektro' ? 'selected' : '' }}>S1 - TE</option>
                            <option value="S1 Manajemen Rekayasa" {{ request()->query('prodi') == 'Manajemen Rekayasa' ? 'selected' : '' }}>S1 - MR</option>
                            <option value="S1 Teknik Bioproses" {{ request()->query('prodi') == 'Teknik Bioproses' ? 'selected' : '' }}>S1 - TB</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="jenis" class="font-bold">Jenis Beasiswa</label>
                    </td>
                    <td>
                        <select id="jenis" name="jenis" class="form-select block w-full max-w-xs">
                            <option value="">Semua</option>
                            <option value="internal" {{ request()->query('jenis') == 'internal' ? 'selected' : '' }}>Internal</option>
                            <option value="eksternal" {{ request()->query('jenis') == 'eksternal' ? 'selected' : '' }}>Eksternal</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="status" class="font-bold">Status Beasiswa</label>
                    </td>
                    <td>
                        <select id="status" name="status" class="form-select block w-full max-w-xs">
                            <option value="">Semua</option>
                            <option value="sedang diproses" {{ request()->query('status') == 'sedang diproses' ? 'selected' : '' }}>Sedang Diproses</option>
                            <option value="diterima" {{ request()->query('status') == 'Diterima' ? 'selected' : '' }}>Diterima</option>
                            <option value="ditolak" {{ request()->query('status') == 'ditolak' ? 'selected' : '' }}>ditolak</option>
                        </select>
                    </td>
                </tr>
            </table>
            <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded my-4" style="background-color: #0D285F;;">Filter</button>
        </form>
        @endif
        @if ($data->isEmpty())
        <x-carbon-warning height=" 50px" color="red" class="w-1/4 m-auto mb-2" />
        <h1 class="text-center font-bold text-1xl border w-1/4 mx-auto my-7 py-2 rounded-xl bg-red-600 text-white">Tidak ada data yang dapat ditampilkan!</h1>
        @else

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-grey-100 dark:text-grey-100">
                @if(Auth::user()->role == 'Admin')
                <thead class="text-xs text-white uppercase border-b border-blue-400 dark:text-white" style="background-color: #0D285F;">
                    <tr>
                        <th class="px-4 py-2">No</th>
                        <th class="px-4 py-2">Nama</th>
                        <th class="px-4 py-2">NIM</th>
                        <th class="px-4 py-2">Program Studi</th>
                        <th class="px-4 py-2">Beasiswa</th>
                        <th class="px-4 py-2">Status Beasiswa</th>
                        <th class="px-4 py-2">Catatan</th>
                    </tr>
                </thead>
                @endif
                <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @foreach ($data as $beasiswa)
                    @if (Auth::user()->role == "Mahasiswa")
                    @if (Auth::user()->email == $beasiswa->emailMhs)
                    <!-- Tampilan Seleksi User -->
                    <section class="pt-16 bg-blueGray-50">
                        <div class="w-full lg:w-9/12 px-4 mx-auto">
                            <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg mt-16">
                                <div class="px-6">
                                    <div class="flex flex-wrap justify-center">
                                        <div class="w-full px-4 flex justify-center">
                                            <div class="relative">
                                                <h1 class="text-2xl font-medium title-font mb-4 text-gray-900 tracking-widest">
                                                    @if ($beasiswa->status_beasiswa == 'diterima')
                                                    <button class="bg-transparent hover:bg-green-500 text-green-700 font-semibold hover:text-white py-2 px-4 border border-green-500 hover:border-transparent rounded">
                                                        SELAMAT! ANDA DINYATAKAN LULUS
                                                    </button>
                                                    @elseif ($beasiswa->status_beasiswa == 'ditolak')
                                                    <button class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded">
                                                        ANDA DINYATAKAN TIDAK LULUS
                                                    </button>
                                                    @else
                                                    {{ $beasiswa->status_beasiswa }}
                                                    @endif
                                                </h1>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center mt-12">
                                        <h3 class="text-xl font-semibold leading-normal mb-2 text-blueGray-700 mb-2">
                                            {{ $beasiswa->nama }}
                                        </h3>
                                        <div class="text-sm leading-normal mt-0 mb-2 text-blueGray-400 font-bold uppercase">
                                            <i class="fas fa-map-marker-alt mr-2 text-lg text-blueGray-400"></i>
                                            {{ $beasiswa->nim }}
                                        </div>
                                        <div class="mb-2 text-blueGray-600 mt-10">
                                            <i class="fas fa-briefcase mr-2 text-lg text-blueGray-400"></i>
                                            {{ $beasiswa->tipeBeasiswa }}
                                        </div>
                                        <div class="mb-2 text-blueGray-600">
                                            <i class="fas fa-university mr-2 text-lg text-blueGray-400"></i>
                                            {{ $beasiswa->prodi }}
                                        </div>
                                    </div>
                                    <div class="mt-10 py-10 border-t border-blueGray-200 text-center">
                                        <div class="flex flex-wrap justify-center">
                                            <div class="w-full lg:w-11/12 px-4">
                                                <p class="mb-4 text-lg leading-relaxed text-blueGray-700">
                                                    @if ($beasiswa->status_beasiswa == 'diterima')
                                                    Selamat atas anda terpilih sebagai penerima <b>{{ $beasiswa->tipeBeasiswa }}</b>. Kami ingin memberitahukan bahwa Anda telah berhasil melewati proses seleksi dengan prestasi yang sangat baik. Kami akan memberikan informasi lebih lanjut mengenai tahapan selanjutnya dalam waktu dekat. Harap bersabar menunggu dan tetap siap untuk melanjutkan perjalanan pendidikan Anda yang cerah.
                                                    @elseif ($beasiswa->status_beasiswa == 'ditolak')
                                                    Mohon maaf, dengan berat hati kami sampaikan bahwa anda <b>belum terpilih</b> sebagai salah satu penerima beasiswa ini. Kami mengapresiasi usaha dan dedikasi Anda dalam mengikuti proses seleksi.

                                                    Kami mendorong Anda untuk tetap bersemangat dalam mengejar tujuan pendidikan Anda. Jangan pernah berkecil hati, teruslah belajar dan mencari peluang lain yang mungkin sesuai dengan kemampuan dan minat Anda. Dengan ketekunan dan kerja keras, Anda masih memiliki peluang besar untuk meraih kesuksesan di masa depan.

                                                    Terima kasih telah berpartisipasi dalam program seleksi Beasiswa <b>{{ $beasiswa->tipeBeasiswa }}</b>, kami berharap yang terbaik untuk perjalanan pendidikan dan karier Anda ke depannya.
                                                    @else
                                                    {{ $beasiswa->status_beasiswa }}
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                        <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                                            <p class="font-bold">CATATAN</p>
                                            {{ $beasiswa->catatan }}
                                          </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    @endif

                    @elseif (Auth::user()->role == "Admin")
                    <tr onclick="window.location='{{ route('detail', ['nim' => $beasiswa->nim]) }}'">
                        <td class="border px-4 py-2">{{ $no++ }}</td>
                        <td class="border px-4 py-2">{{ $beasiswa->nama }}</td>
                        <td class="border px-4 py-2">{{ $beasiswa->nim }}</td>
                        <td class="border px-4 py-2">{{ $beasiswa->prodi }}</td>
                        <td class="border px-4 py-2">{{ $beasiswa->tipeBeasiswa }}</td>
                        <td class="border px-4 py-2 flex justify-center">
                            @if ($beasiswa->status_beasiswa == 'diterima')
                            <button class="bg-transparent hover:bg-green-500 text-green-700 font-semibold hover:text-white py-2 px-4 border border-green-500 hover:border-transparent rounded">
                                Diterima
                            </button>
                            @elseif ($beasiswa->status_beasiswa == 'ditolak')
                            <button class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded">
                                Ditolak
                            </button>
                            @else
                            {{ $beasiswa->status_beasiswa }}
                            @endif
                        </td>
                        <td class="border px-4 py-2">{{ $beasiswa->catatan }}</td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
</body>

</html>
@endsection