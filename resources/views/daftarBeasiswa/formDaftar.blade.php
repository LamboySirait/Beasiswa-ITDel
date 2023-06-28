@extends('layouts.app')
@section('title', 'Daftar Beasiswa')
@section('background', 'bg-white')
@section('content')
<form action="{{route('store-daftar-beasiswa')}}" method="POST" enctype="multipart/form-data">>
    @csrf
    <div class="text-center" style="background-color: #0D285F; padding:115px;">
        <!--Breadcrumb-->
        <nav class="w-full rounded-md">
            <ol class="list-reset flex">
                <li>
                    <a href="#" class="text-white">Home</a>
                </li>
                <li>
                    <span class="mx-2 text-neutral-500 dark:text-neutral-400">/</span>
                </li>
                <li>
                    <a href="#" class="text-white">Beasiswa</a>
                </li>
                <li>
                    <span class="mx-2 text-neutral-500 dark:text-neutral-400">/</span>
                </li>
                <li style="color: #F49D1A;">Pendaftaran</li>
            </ol>
        </nav>
        <div>
            <h1 class="font-bold font-sans text-4xl text-white">PENDAFTARAN</h1>
        </div>
    </div>
    <div class="w-3/4 border rounded-lg mx-auto my-24 shadow-2xl bg-white" style="margin-top: -80px;">
        <div class="my-10 w-3/4 mx-auto">
            <div class="mb-10">
                <label class="text-xl p-1 tracking-wide" for="email">Email<span style="color:red">*</span></label>
                <input class="block w-full px-4 py-3 text-black border border-gray-300 bg-neutral-400 rounded leading-tight focus:outline-none " id="email" name="email" type="email" value="{{$user->email}}" readonly>
                @error('email')
                <div class="text-red-600  pl-2">{{ $message }}</ @enderror </div>
                    <div class="mb-10">
                        <label class="text-xl p-1 tracking-wide" for="nama">Nama Mahasiswa (sesuai data di CIS)<span style="color:red">*</span></label>
                        <input class="block w-full px-4 py-3 text-black border border-gray-300 bg-neutral-400 rounded leading-tight focus:outline-none" id="nama" name="nama" type="text" value="{{$userDetail->nama}}" readonly>

                    </div>
                    <div class="mb-10">
                        <label class="text-xl p-1 tracking-wide" for="nim">NIM (sesuai data di CIS)<span style="color:red">*</span></label>
                        <input class="block w-full px-4 py-3 text-black border border-gray-300 bg-neutral-400 rounded leading-tight focus:outline-none " id="nim" name="nim" type="text" value="{{$userDetail->nim}}" readonly>
                    </div>
                    <div class="mb-10">
                        <label class="text-xl p-1 tracking-wide" for="prodi">Prodi<span style="color:red">*</span></label>
                        <input class="block w-full px-4 py-3 text-black border border-gray-300 bg-neutral-400 rounded leading-tight focus:outline-none" id="prodi" name="prodi" type="text" value="{{$userDetail->prodi}}" readonly>
                    </div>
                    <div class="mb-10">
                        <label class="text-xl p-1 tracking-wide" for="tipe">Jenis Beasiswa<span style="color:red">*</span></label>
                        <select id="tipe" name="tipe" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected disabled="disabled">Pilih Beasiswa yang Tersedia</option>
                            @foreach($beasiswa as $key )
                            <option value='{{$key->title}}'>{{$key->title}}</option>
                            @endforeach
                            @error('tipe')
                            <div class="text-red-600  pl-2">{{ $message }}</ @enderror </select>
                            </div>
                            <div class="mb-10">
                                <label class="text-xl p-1 tracking-wide" for="emailPribadi">Alamat Email Pribadi<span style="color:red">*</span></label>
                                <input class="block w-full px-4 py-3 text-black border border-gray-300 bg-gray-100 rounded leading-tight focus:outline-none focus:bg-white hover:shadow-md" id="emailPribadi" name="emailPribadi" type="email" placeholder="masukkan email pribadi anda" required>
                                @error('emailPribadi')
                                <div class="text-red-600  pl-2">{{ $message }}</ @enderror </div>
                                    <div class="mb-10">
                                        <label class="text-xl p-1 tracking-wide" for="hp">No. Handphone<span style="color:red">*</span></label>
                                        <input class="block w-full px-4 py-3 text-black border border-gray-300 bg-neutral-400 rounded leading-tight focus:outline-none" id="hp" name="hp" type="text" value="{{$noHp}}" readonly>
                                        @error('hp')
                                        <div class="text-red-600  pl-2">{{ $message }}</ @enderror </div>
                                            <div class="mb-10">

                                                <label class="text-xl p-1 tracking-wide" for="tgl">Tanggal Lahir<span style="color:red">*</span></label>
                                                <input class="block w-full px-4 py-3 text-black border border-gray-300 bg-neutral-400 rounded leading-tight focus:outline-none" id="tgl_lahir" name="tgl_lahir" type="date" value="{{$tanggalLahir}}" readonly>
                                                @error('tgl')
                                                <div class="text-red-600  pl-2">{{ $message }}</ @enderror </div>
                                                    <div class="mb-10">
                                                        <label class="text-xl p-1 tracking-wide" for="ipk">IPK<span style="color:red">*</span></label>
                                                        <input class="block w-full px-4 py-3 text-black border border-gray-300 bg-neutral-400 rounded leading-tight focus:outline-none" id="ipk" name="ipk" type="text" value="{{$userIP}}" readonly>
                                                        {{-- <p class=" px-1 py-1 text-sm">format: 3.04</p> --}}
                                                        @error('ipk')
                                                        <div class="text-red-600  pl-2">{{ $message }}</ @enderror </div>
                                                            <div class="mb-10">
                                                                <label class="text-xl p-1 tracking-wide" for="nilaiPerilaku">Nilai Perilaku<span style="color:red">*</span></label>
                                                                <input class="block w-full px-4 py-3 text-black border border-gray-300 bg-neutral-400 rounded leading-tight focus:outline-none" value="{{$nilaiPerilaku}}" id="nilaiPerilaku" name="nilaiPerilaku" type="text" readonly>
                                                                @error('nilaiPerilaku')
                                                                <div class="text-red-600  pl-2">{{ $message }}</ @enderror </div>
                                                                    <div class="mb-10">
                                                                        <label class="text-xl p-1 tracking-wide" for="live">Alamat Tempat Tinggal<span style="color:red">*</span></label>
                                                                        <input class="block w-full px-4 py-3 text-black border border-gray-300 bg-neutral-400 rounded leading-tight focus:outline-none" id="live" name="live" type="text" value="{{$tempatTinggal}}" readonly >
                                                                        @error('live')
                                                                        <div class="text-red-600  pl-2">{{ $message }}</ @enderror </div>


                                                                                <!-- Existing form fields -->

                                                                                <div class="mb-10">
                                                                                    <label class="text-xl p-1 tracking-wide" for="ktm">Softcopy KTM (pdf)<span style="color:red">*</span></label>
                                                                                    <input class="block w-full px-4 py-3 text-black border border-gray-300 bg-gray-100 rounded leading-tight focus:outline-none focus:bg-white hover:shadow-md" id="ktm" name="ktm" type="file" accept=".pdf" required>
                                                                                </div>
                                                                                <div class="mb-10">
                                                                                    <label class="text-xl p-1 tracking-wide" for="ktp">Softcopy KTP (pdf)<span style="color:red">*</span></label>
                                                                                    <input class="block w-full px-4 py-3 text-black border border-gray-300 bg-gray-100 rounded leading-tight focus:outline-none focus:bg-white hover:shadow-md" id="ktp" name="ktp" type="file" accept=".pdf" required>
                                                                                </div>
                                                                                <div class="mb-10">
                                                                                    <label class="text-xl p-1 tracking-wide" for="transkrip">Softcopy Transkrip Nilai (pdf)<span style="color:red">*</span></label>
                                                                                    <input class="block w-full px-4 py-3 text-black border border-gray-300 bg-gray-100 rounded leading-tight focus:outline-none focus:bg-white hover:shadow-md" id="transkrip" name="transkrip" type="file" accept=".pdf" required>
                                                                                </div>
                                                                                <div class="mb-10">
                                                                                    <label class="text-xl p-1 tracking-wide" for="suratPernyataan">Softcopy Surat Pernyataan Tidak Menerima Beasiswa Lain Bermaterai 10000 (pdf)<span style="color:red">*</span></label>
                                                                                    <input class="block w-full px-4 py-3 text-black border border-gray-300 bg-gray-100 rounded leading-tight focus:outline-none focus:bg-white hover:shadow-md" id="suratPernyataan" name="suratPernyataan" type="file" accept=".pdf" required>
                                                                                </div>
                                                                                <div class="mb-10">
                                                                                    <label class="text-xl p-1 tracking-wide" for="lainnya">Lainnya (pdf)</label>
                                                                                    <input class="block w-full px-4 py-3 text-black border border-gray-300 bg-gray-100 rounded leading-tight focus:outline-none focus:bg-white hover:shadow-md" id="lainnya" name="lainnya" type="file" accept=".pdf">
                                                                                </div>


                                                                                <!-- ================================================================================================================== -->

                                                                                <div class="flex items-center">
                                                                                    <input checked id="checked-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" required>
                                                                                    <label for="checked-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                                                                        Saya menyatakan dan menjamin kebenaran data yang telah saya input<span style="color:red">*</span>
                                                                                    </label>
                                                                                </div>

                                                                                <div id="verification-prompt" style="display: none;">
                                                                                    <!-- Verification prompt content here -->
                                                                                    <p style="color:red">Verifikasi data anda!</p>
                                                                                </div>

                                                                                <!-- <div class="flex items-center">
                                                                                    <input checked id="checked-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                                                    <label for="checked-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Saya menyatakan dan menjamin kebenaran data yang telah saya input<span style="color:red">*</span></label>
                                                                                </div>
                                                                                <p><span style="color:red">*</span>)wajib diisi</p> -->
                                                                                <div class="mt-10">
                                                                                    <button type="submit" class="px-8 py-3 mt-4 text-base font-semibold text-white transition duration-200 bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:bg-blue-800">Submit</button>
                                                                                </div>

                                                                        </div>
                                                                    </div>
</form>

<script>
    const checkbox = document.getElementById('checked-checkbox');
    const verificationPrompt = document.getElementById('verification-prompt');

    checkbox.addEventListener('change', function() {
        if (this.checked) {
            const isFormValid = validateForm();
            if (isFormValid) {
                verificationPrompt.style.display = 'none';
            } else {
                verificationPrompt.style.display = 'block';
            }
        } else {
            verificationPrompt.style.display = 'block';
        }
    });

    function validateForm() {
        // Perform form validation here
        const input1 = document.getElementById('input1').value;
        const input2 = document.getElementById('input2').value;
        // Add more form inputs as needed

        if (input1 === '' || input2 === '') {
            return false; // Form is not valid
        }

        return true; // Form is valid
    }
</script>
@endsection