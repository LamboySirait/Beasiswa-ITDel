
@extends('layouts.app')
@section('title', 'Data Pendaftar')
@section('background', 'bg-white')
@section('content')
<div class="text-center" style="background-color: #0D285F; padding:115px;">
    <div>
        <h1 class="font-bold font-sans text-4xl text-white">DATA PENDAFTAR</h1>
    </div>
</div>
<div class="w-3/4 border rounded-lg mx-auto my-24 shadow-2xl bg-white" style="margin-top: -80px;">
    <div class="my-10 w-3/4 mx-auto">
        <div class="mb-10">
            <label class="text-xl p-1 tracking-wide" for="email">Email</label>
            <label class="block w-full px-4 py-3 text-black border border-gray-300 bg-gray-100 rounded leading-tight focus:outline-none focus:bg-white hover:shadow-md" id="email" name="email" type="email" readonly>{{ $beasiswa->emailMhs }}
            </label>
        </div>
        <div class="mb-10">
            <label class="text-xl p-1 tracking-wide" for="nama">Nama Mahasiswa (sesuai data di CIS)</label>
                <label class="block w-full px-4 py-3 text-black border border-gray-300 bg-gray-100 rounded leading-tight focus:outline-none focus:bg-white hover:shadow-md" id="nama" name="nama" type="text" readonly>{{ $beasiswa->nama }}
                </label>
        </div>
        <div class="mb-10">
            <label class="text-xl p-1 tracking-wide" for="nim">NIM (sesuai data di CIS)</label>
            <label class="block w-full px-4 py-3 text-black border border-gray-300 bg-gray-100 rounded leading-tight focus:outline-none focus:bg-white hover:shadow-md " id="nim" name="nim" type="text" readonly>{{ $beasiswa->nim}}
            </label>
        </div>
        <div class="mb-10">
            <label class="text-xl p-1 tracking-wide" for="prodi">Prodi</label>
            <label class="block w-full px-4 py-3 text-black border border-gray-300 bg-gray-100 rounded leading-tight focus:outline-none focus:bg-white hover:shadow-md" id="prodi" name="prodi" type="text" readonly>{{ $beasiswa->prodi }}</label>
        </div>
        <div class="mb-10">
            <label class="text-xl p-1 tracking-wide" for="tipe">Jenis Beasiswa</label>
            <div class="block w-full px-4 py-3 text-black border border-gray-300 bg-gray-100 rounded leading-tight focus:outline-none focus:bg-white hover:shadow-md">
                {{ $beasiswa->tipeBeasiswa }}
            </div>
        </div>
        <div class="mb-10">
            <label class="text-xl p-1 tracking-wide" for="emailPribadi">Alamat Email Pribadi</label>
            <label class="block w-full px-4 py-3 text-black border border-gray-300 bg-gray-100 rounded leading-tight focus:outline-none focus:bg-white hover:shadow-md" id="emailPribadi" name="emailPribadi" type="email" readonly>{{ $beasiswa->emailPribadi }}
            </label>
        </div>
        <div class="mb-10">
            <label class="text-xl p-1 tracking-wide" for="hp">No. Handphone</label>
            <label class="block w-full px-4 py-3 text-black border border-gray-300 bg-gray-100 rounded leading-tight focus:outline-none focus:bg-white hover:shadow-md" id="hp" name="hp" type="text" readonly>{{ $beasiswa->noHp }}
            </label>
        </div>
        <div class="mb-10">
            <label class="text-xl p-1 tracking-wide" for="tgl">Tanggal Lahir</label>
            <label class="block w-full px-4 py-3 text-black border border-gray-300 bg-gray-100 rounded leading-tight focus:outline-none focus:bg-white hover:shadow-md" id="tgl" name="tgl" type="date" readonly>{{ $beasiswa->tanggalLahir }}
            </label>
        </div>
        <div class="mb-10">
            <label class="text-xl p-1 tracking-wide" for="live">Alamat Tempat Tinggal</label>
            <label class="block w-full px-4 py-3 text-black border border-gray-300 bg-gray-100 rounded leading-tight focus:outline-none focus:bg-white hover:shadow-md" id="live" name="live" type="text" readonly>{{ $beasiswa->tempatTinggal }}</label>
        </div>
        <div class="mb-10">
            <label class="text-xl p-1 tracking-wide" for="ipk">IPK</label>
            <label class="block w-full px-4 py-3 text-black border border-gray-300 bg-gray-100 rounded leading-tight focus:outline-none " id="ipk" name="ipk" type="text" readonly>{{ $beasiswa->ipk }}</label>
        </div>
        <div class="mb-10">
            <label class="text-xl p-1 tracking-wide" for="live">Nilai Perilaku</label>
            <label class="block w-full px-4 py-3 text-black border border-gray-300 bg-gray-100 rounded leading-tight focus:outline-none focus:bg-white hover:shadow-md" id="nilaiPerilaku" name="nilaiPerilaku" type="text" readonly>{{ $beasiswa->nilaiPerilaku }}</label>
        </div>

        <div class="mb-10">
            <label class="text-xl p-1 tracking-wide" for="ktm">Softcopy KTM (pdf)</label>
            <label class="block w-full pt-1 " id="ktm" name="ktm" type="file" readonly>
                <a href="{{ asset('storage/' . str_replace('public/', '', $beasiswa->ktm)) }}" target="_blank">
                    <button class="block w-full inline-flex items-center h-10 px-5 text-black border border-gray-300 bg-gray-100 rounded leading-tight focus:outline-none focus:bg-white hover:shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                      </svg>
                    <span>Lihat berkas</span>
                  </button>
                </a>
            </label>
        </div>

        <div class="mb-10">
            <label class="text-xl p-1 tracking-wide" for="ktp">Softcopy KTP (pdf)</label>
            <label class="block w-full pt-1" id="ktp" name="ktp" type="file" readonly>
                <a href="{{ asset('storage/' . str_replace('public/', '', $beasiswa->ktp)) }}" target="_blank">
                <button class="block w-full inline-flex items-center h-10 px-5 text-black border border-gray-300 bg-gray-100 rounded leading-tight focus:outline-none focus:bg-white hover:shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                      </svg>
                    <span>Lihat berkas</span>
                  </button>
                </a>
            </label>

        </div>
        <div class="mb-10">
            <label class="text-xl p-1 tracking-wide" for="transkrip">Transkrip Nilai (pdf)</label>
            <label class="block w-full pt-1" id="transkrip" name="transkrip" type="file">
                <a href="{{ asset('storage/' . str_replace('public/', '', $beasiswa->transkrip)) }}" target="_blank">
                <button class="block w-full inline-flex items-center h-10 px-5 text-black border border-gray-300 bg-gray-100 rounded leading-tight focus:outline-none focus:bg-white hover:shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                      </svg>
                    <span>Lihat berkas</span>
                  </button>
                </a>
            </label>
        </div>
        <div class="mb-10">
            <label class="text-lg p-1 tracking-wide" for="suratPernyataan">Softcopy Surat Pernyataan Tidak Menerima Beasiswa Lain Bermaterai 10000 (pdf)</label>
            <label class="block w-full pt-1" id="suratPernyataan" name="suratPernyataan" type="file">
                <a href="{{ asset('storage/' . str_replace('public/', '', $beasiswa->suratPernyataan)) }}" target="_blank">
                <button class="block w-full inline-flex items-center h-10 px-5 text-black border border-gray-300 bg-gray-100 rounded leading-tight focus:outline-none focus:bg-white hover:shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                      </svg>
                    <span>Lihat berkas</span>
                  </button>
                </a>
            </label>
        </div>
        <div class="mb-10">
            <label class="text-xl p-1 tracking-wide" for="lainnya">Lainnya (pdf)</label>
            <label class="block w-full pt-1" id="lainnya" name="lainnya" type="file">
                <a href="{{ asset('storage/' . str_replace('public/', '', $beasiswa->lainnya)) }}" target="_blank">
                    <button class="block w-full inline-flex items-center h-10 px-5 text-black border border-gray-300 bg-gray-100 rounded leading-tight focus:outline-none focus:bg-white hover:shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                            </svg>
                        <span>Lihat berkas</span>
                        </button>
                    </a>
            </label>
        </div>

        <form action="/detail/{{ $beasiswa->nim }}" method="POST">
            @csrf
                <div class="mb-10">
                    <label class="text-xl p-1 tracking-wide" for="catatan">Catatan</label>
                    <textarea class="block w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-green-500" id="catatan" name="catatan" type="text" placeholder="Catatan">{{ $beasiswa->catatan }}</textarea>
                </div>

                <div class="flex justify-end">
                    <button class="bg-green-500 mx-1 px-5 py-2 text-white font-semibold rounded" type="submit" name="submit" value="diterima">Diterima</button>
                    <button class="bg-red-500 mx-1 px-5 py-2 text-white font-semibold rounded" type="submit" name="submit" value="ditolak">Ditolak</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection