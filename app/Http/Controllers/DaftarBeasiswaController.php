<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registrar;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\BeasiswaEksternal;
use Alert;

class DaftarBeasiswaController extends Controller
{
    
    public function getIP($nim, $token)
    {
        //$token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiIsImp0aSI6IlVOSVFVRS1KV1QtSURFTlRJRklFUiJ9.eyJpc3MiOiJodHRwczpcL1wvYXBpLmV4YW1wbGUuY29tIiwiYXVkIjoiaHR0cHM6XC9cL2Zyb250ZW5kLmV4YW1wbGUuY29tIiwianRpIjoiVU5JUVVFLUpXVC1JREVOVElGSUVSIiwiaWF0IjoxNjc5OTc2NjQ4LCJleHAiOjE2Nzk5Nzk2NDgsInVpZCI6NDkwM30.YyTqf6i8x3qCVa_9C-NFtb1Sic6nOJ8OswPeJ_Ff9eU";
        //$token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiIsImp0aSI6IlVOSVFVRS1KV1QtSURFTlRJRklFUiJ9.eyJpc3MiOiJodHRwczpcL1wvYXBpLmV4YW1wbGUuY29tIiwiYXVkIjoiaHR0cHM6XC9cL2Zyb250ZW5kLmV4YW1wbGUuY29tIiwianRpIjoiVU5JUVVFLUpXVC1JREVOVElGSUVSIiwiaWF0IjoxNjc5OTgwNDU1LCJleHAiOjE2Nzk5ODM0NTUsInVpZCI6NDkwMX0.LTh-Qtbewrhl3wwa6GVKztfOwemZQ6wM0RH0x703isU";
        $userIP = Http::withToken($token)->asForm()->post('https://cis.del.ac.id/api/library-api/get-penilaian?nim=' . $nim)->body();
        $jsonIP = json_decode($userIP, true);
        $userIP = $jsonIP['IP'];
        return $jsonIP['IP'];
    }

    public function getPerilaku($nim, $token)
    {
        $userIP = Http::withToken($token)->asForm()->post('https://cis.del.ac.id/api/library-api/get-penilaian?nim=' . $nim)->body();
        $jsonIP = json_decode($userIP, true);
        $perilaku = $jsonIP['Nilai Perilaku'];
        $currentPerilaku = $perilaku['2022_2']['nilai_huruf'];
        return $currentPerilaku;
    }

    public function getDetail($nim, $token)
    {
        $userIP = Http::withToken($token)->asForm()->post('https://cis-dev.del.ac.id/api/library-api/get-student-by-nim?nim=' . $nim)->body();
        $jsonIP = json_decode($userIP, true);
        $detail = $jsonIP['data'];
        return $detail;
    }
    public function getTglLahir($nim, $token)
    {
        $detail = $this->getDetail($nim, $token);
        return $detail['tgl_lahir'];
    }
    public function getNoHp($nim, $token)
    {
        $detail = $this->getDetail($nim, $token);
        return $detail['hp'];
    }
    public function getAlamat($nim, $token)
    {
        $detail = $this->getDetail($nim, $token);
        return $detail['alamat'];
    }

    public function create()
    {
        // Get the user data
        $beasiswa = BeasiswaEksternal::all();
        $user  = User::where('user_id', Auth::user()->user_id)->first();
        $userDetail = UserDetail::where('id_user', Auth::user()->user_id)->first();
        $userIP = $this->getIP($userDetail->nim, $user->remember_token);
        $nilaiPerilaku = $this->getPerilaku($userDetail->nim, $user->remember_token);
        $tanggalLahir = $this->getTglLahir($userDetail->nim, $user->remember_token);
        $noHp = $this->getNoHp($userDetail->nim, $user->remember_token);
        $tempatTinggal = $this->getAlamat($userDetail->nim, $user->remember_token);

        return view(
            'daftarBeasiswa.formDaftar',
            [
                'user' => $user,
                'userDetail' => $userDetail,
                'beasiswa' => $beasiswa,
                'userIP' => $userIP,
                'nilaiPerilaku' => $nilaiPerilaku,
                'tanggalLahir'=> $tanggalLahir,
                'noHp'=> $noHp,
                'tempatTinggal'=> $tempatTinggal
            ]
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipe' => 'required',
            'emailPribadi' => 'required',
            'hp' => 'required',
            'live' => 'required',
        ]);
        
        
        // Get the file from the request
        $file1 = $request->hasFile('ktm');
        $file_name1 = "";
        if ($file1) {
            $newFile = $request->file('ktm');
            $file_name1 .= $newFile->store('public/dokumen');
        }

        $file2 = $request->hasFile('ktp');
        $file_name2 = "";
        if ($file2) {
            $newFile = $request->file('ktp');
            $file_name2 .= $newFile->store('public/dokumen');
        }

        $file3 = $request->hasFile('transkrip');
        $file_name3 = "";
        if ($file3) {
            $newFile = $request->file('transkrip');
            $file_name3 .= $newFile->store('public/dokumen');
        }

        $file4 = $request->hasFile('suratPernyataan');
        $file_name4 = "";
        if ($file4) {
            $newFile = $request->file('suratPernyataan');
            $file_name4 .= $newFile->store('public/dokumen');
        }

        $file5 = $request->hasFile('lainnya');
        $file_name5 = "";
        if ($file5) {
            $newFile = $request->file('lainnya');
            $file_name5 .= $newFile->store('public/dokumen');
        }

        Registrar::insert([
            'id_daftar' => rand(1000, 10000),
            'emailMhs' => $request->email,
            'nama' => $request->nama,
            'nim' => $request->nim,
            'prodi' => $request->prodi,
            'tipeBeasiswa' => $request->tipe,
            'emailPribadi' => $request->emailPribadi,
            'noHp' => $request->hp,
            'tanggalLahir' => $request->tgl_lahir,
            'ipk' => $request->ipk,
            'nilaiPerilaku' => $request->nilaiPerilaku,
            'tempatTinggal' => $request->live,
            'ktm' => $file_name1,
            'ktp' => $file_name2,
            'transkrip' => $file_name3,
            'suratPernyataan' => $file_name4,
            'lainnya' => $file_name5,
            'status_beasiswa' => '', // Set the appropriate value here
            'catatan' => '',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Get all data registrars
        $registrars = Registrar::all();

        Alert::success('Sukses', 'Anda Berhasil Mendaftar.');
        return redirect()->route('seleksi', compact('registrars'));
    }


    public function show()
    {
        $query = Registrar::query();

        if (request()->has('prodi') && request()->query('prodi') != '') {
            $prodi = request()->query('prodi');
            $query = $query->where('prodi', $prodi);
        }

        if (request()->has('tipe') && request()->query('tipe') != '') {
            $jenis = request()->query('jenis');
            $query = $query->where('tipeBeasiswa', $tipe);
        }

        if (request()->has('status') && request()->query('status') != '') {
            $status = request()->query('status');
            $query = $query->where('status_beasiswa', $status);
        }

        if (request()->has('catatan') && request()->query('catatan') != '') {
            $catatan = request()->query('catatan');
            $query = $query->where('catatan', $catatan);
        }

        $data = $query->get();
        return view('seleksibeasiswa.seleksi', compact('data'));
    }

    public function detail($nim)
    {
        // dd($nim);
        $beasiswa = Registrar::where('nim', $nim)->first();
        // dd($beasiswa);
        return view('seleksibeasiswa.detail', compact('beasiswa'));
    }

    public function update(Request $request)
    {

        $beasiswa = Registrar::where('nim', $request->nim)->first();

        if ($request->submit == 'diterima') {
            $beasiswa->status_beasiswa = 'diterima';
            $beasiswa->catatan = $request->catatan;

        } elseif ($request->submit == 'ditolak') {
            $beasiswa->status_beasiswa = 'ditolak';
            $beasiswa->catatan = $request->catatan;
        }

        $beasiswa->save();

        return redirect()->route('seleksi');
    }
}
