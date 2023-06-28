<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Registrar;

class StoreDaftarBeasiswaController extends Controller
{
    public function storeDaftarBeasiswa(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            // Existing validation rules...
            'ktm' => 'nullable|mimes:pdf|max:2048',
            'ktp' => 'nullable|mimes:pdf|max:2048',
            'transkrip' => 'nullable|mimes:pdf|max:2048',
            'suratPernyataan' => 'nullable|mimes:pdf|max:2048',
            'other' => 'nullable|mimes:pdf|max:2048',
        ]);

        // Handle file uploads

        $uploadedFiles = [];
        foreach ($validatedData as $fieldName => $file) {
            if ($request->hasFile($fieldName)) {
                $uploadedFile = $request->file($fieldName);
                $fileName = $uploadedFile->getClientOriginalName();
                $fileData = $uploadedFile->get();
                Storage::disk('local')->put($fileName, $fileData);
                $uploadedFiles[$fieldName] = [
                    'data' => $fileData,
                    'filename' => $fileName,
                ];
            }
        }

        // Save the data to the database
        $registrar = new Registrar();
        $registrar->id_daftar = $request->input('id_daftar');
        $registrar->emailMhs = $request->input('emailMhs');
        $registrar->nama = $request->input('nama');
        $registrar->nim = $request->input('nim');
        $registrar->prodi = $request->input('prodi');
        $registrar->tipeBeasiswa = $request->input('tipeBeasiswa');
        $registrar->emailPribadi = $request->input('emailPribadi');
        $registrar->noHp = $request->input('noHp');
        $registrar->tanggalLahir = $request->input('tanggalLahir');
        $registrar->ipk = $request->input('ipk');
        $registrar->nilaiPerilaku = $request->input('nilaiPerilaku');
        $registrar->tempatTinggal = $request->input('tempatTinggal');
        $registrar->status_beasiswa = 'Pending';
        $registrar->catatan = '';

        // Set the file data and filenames
        foreach ($uploadedFiles as $fieldName => $file) {
            $registrar->$fieldName = $file['data'];
            $registrar->{$fieldName.'_filename'} = $file['filename'];
        }

        // Save the registrar entry
        $registrar->save();

        // Redirect or show success message
        // ...

        return redirect()->back()->with('success', 'Form submitted successfully!');
    }
}