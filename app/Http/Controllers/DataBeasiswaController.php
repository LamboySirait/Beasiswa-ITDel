<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Kyslik\ColumnSortable\Sortable;
use App\Models\Prodi;
use App\Models\Angkatan;
use App\Models\BeasiswaEksternal;
use App\Models\DataBeasiswa;
use Alert;

class DataBeasiswaController extends Controller
{
    public function index($tahun){
        $year = $tahun;
        $dataBeasiswa = DataBeasiswa::select('data_beasiswa.*','prodi.nama_prodi','angkatan.angkatan')
        ->join('prodi','data_beasiswa.id_prodi','=','prodi.id_prodi' )
        ->join('angkatan','data_beasiswa.angkatan','=','angkatan.id')
        ->where('tahun','=', $year)->sortable()->paginate(15);
        return view('databeasiswa.dataBeasiswa',
        [
            'year' => $year,
            'data'=> $dataBeasiswa
        ]);
    }

    public function create($tahun)
    {
        $programStudi = Prodi::all();
        $angkatan = Angkatan::all();
        $beasiswa = BeasiswaEksternal::all();
        return view(
            'databeasiswa.createData',
            compact('programStudi', 'angkatan', 'beasiswa', 'programStudi'), // Add 'programStudi' to compact()
            [
                'tahun' => $tahun
            ]
        );
    }


    public function store(Request $request, $tahun)
    {
        $request->validate([
            'nama' => 'required',
            'nim' => 'required',
            'angkatan' => 'required',
            'beasiswa' => 'required',
            'tahunTerima' => 'required',
        ]);
        DataBeasiswa::create([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'id_prodi' => $request->id_prodi,
            'angkatan' => $request->angkatan,
            'beasiswa' => $request->beasiswa,
            'tahun' => $tahun,
            'status' => $request->status,
            'tahunTerima' => $request->tahunTerima,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Alert::success('Sukses', 'Data Telah Disimpan.');
        return redirect()->route('dataBeasiswa', $tahun);
    }

    public function destroy($id, $tahun)
    {
        $dataBeasiswa = DataBeasiswa::findorfail($id);
        $dataBeasiswa->delete();
        Alert::success('Sukses', 'Data Berhasil Dihapus.');
        return redirect()->route('dataBeasiswa', $tahun);
    }

    public function edit($id, $year)
    {
        // Mengambil data yang akan diedit berdasarkan $id dan $year
        $data = DataBeasiswa::find($id);
        $programStudi = Prodi::all();
        $beasiswa = BeasiswaEksternal::all();

        // Pastikan data ditemukan sebelum melanjutkan
        if (!$data) {
            return redirect()->route('dataBeasiswa', $year)->with('error', 'Data tidak ditemukan');
        }

        // Mendapatkan data program studi terpilih
        $selectedProdi = $data->id_prodi;
        // Mendapatkan data beasiswa terpilih
        $selectedBeasiswa = $data->beasiswa;

        // Lainnya logic yang diperlukan, seperti memproses form submission atau melakukan validasi data

        // Mengembalikan view edit dengan data yang diperlukan
        return view('databeasiswa.edit', compact('data', 'year', 'programStudi', 'beasiswa', 'selectedProdi', 'selectedBeasiswa'));
    }



    public function update(Request $request, $id, $year)
    {
        $request->validate([
            'nama' => 'required',
            'nim' => 'required',
            'angkatan' => 'required',
            'beasiswa' => 'required',
            'tahunTerima' => 'required',
        ]);

        $dataBeasiswa = DataBeasiswa::find($id);

        if (!$dataBeasiswa) {
            return redirect()->route('dataBeasiswa', $year)->with('error', 'Data tidak ditemukan');
        }

        $dataBeasiswa->nama = $request->nama;
        $dataBeasiswa->nim = $request->nim;
        $dataBeasiswa->id_prodi = $request->id_prodi;
        $dataBeasiswa->angkatan = $request->angkatan;
        $dataBeasiswa->beasiswa = $request->beasiswa;
        $dataBeasiswa->status = $request->status;
        $dataBeasiswa->tahunTerima = $request->tahunTerima;
        $dataBeasiswa->updated_at = now();
        $dataBeasiswa->save();

        Alert::success('Sukses', 'Data Berhasil Diperbarui.');
        return redirect()->route('dataBeasiswa', $year);
    }
}
