<?php

namespace App\Http\Controllers\CalonSiswa;

use App\Http\Controllers\Controller;
use App\Models\DataLengkapSiswa;
use App\Models\DataOrtuSiswa;
use App\Models\DataTambahanSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DataLengkapSiswaController extends Controller
{
    public function ortu(Request $request)
    {
        $siswa = $request->user();

        $data = DataOrtuSiswa::where('siswa_id', $siswa->id)->first();

        return view('dashboard.siswa.data-ortu', compact('data'));
    }

    public function update_ortu(Request $request, string $id)
    {
        $siswa = $request->user();
        $validate = $request->validate([
            'nama_ayah' => 'required',
            'nama_ibu' => 'required',
            'nama_wali' => 'nullable',
            'nik_ayah' => 'required',
            'nik_ibu' => 'required',
            'nik_wali' => 'nullable',
            'lahir_ayah' => 'required',
            'lahir_ibu' => 'required',
            'lahir_wali' => 'nullable',
            'pendidikan_ayah' => 'required',
            'pendidikan_ibu' => 'required',
            'pendidikan_wali' => 'nullable',
            'pekerjaan_ayah' => 'required',
            'pekerjaan_ibu' => 'required',
            'pekerjaan_wali' => 'nullable',
            'penghasilan_ayah' => 'required',
            'penghasilan_ibu' => 'required',
            'penghasilan_wali' => 'nullable',
            'no_telp_ayah' => 'required',
            'no_telp_ibu' => 'required',
            'no_telp_wali' => 'nullable',
        ]);

        if ($id == 'new') {
            // Ini operasi insert (baru)
            Data_ortu_siswa::create([
                'siswa_id' => $siswa->id,
                'nama_ayah' => $validate['nama_ayah'],
                'nama_ibu' => $validate['nama_ibu'],
                'nama_wali' => $validate['nama_wali'],
                'nik_ayah' => $validate['nik_ayah'],
                'nik_ibu' => $validate['nik_ibu'],
                'nik_wali' => $validate['nik_wali'],
                'lahir_ayah' => $validate['lahir_ayah'],
                'lahir_ibu' => $validate['lahir_ibu'],
                'lahir_wali' => $validate['lahir_wali'],
                'pendidikan_ayah' => $validate['pendidikan_ayah'],
                'pendidikan_ibu' => $validate['pendidikan_ibu'],
                'pendidikan_wali' => $validate['pendidikan_wali'],
                'pekerjaan_ayah' => $validate['pekerjaan_ayah'],
                'pekerjaan_ibu' => $validate['pekerjaan_ibu'],
                'pekerjaan_wali' => $validate['pekerjaan_wali'],
                'penghasilan_ayah' => $validate['penghasilan_ayah'],
                'penghasilan_ibu' => $validate['penghasilan_ibu'],
                'penghasilan_wali' => $validate['penghasilan_wali'],
                'no_telp_ayah' => $validate['no_telp_ayah'],
                'no_telp_ibu' => $validate['no_telp_ibu'],
                'no_telp_wali' => $validate['no_telp_wali']
            ]);
        } else {
            // Ini operasi update
            Data_ortu_siswa::where('id', $id)->update([
                'siswa_id' => $siswa->id,
                'nama_ayah' => $validate['nama_ayah'],
                'nama_ibu' => $validate['nama_ibu'],
                'nama_wali' => $validate['nama_wali'],
                'nik_ayah' => $validate['nik_ayah'],
                'nik_ibu' => $validate['nik_ibu'],
                'nik_wali' => $validate['nik_wali'],
                'lahir_ayah' => $validate['lahir_ayah'],
                'lahir_ibu' => $validate['lahir_ibu'],
                'lahir_wali' => $validate['lahir_wali'],
                'pendidikan_ayah' => $validate['pendidikan_ayah'],
                'pendidikan_ibu' => $validate['pendidikan_ibu'],
                'pendidikan_wali' => $validate['pendidikan_wali'],
                'pekerjaan_ayah' => $validate['pekerjaan_ayah'],
                'pekerjaan_ibu' => $validate['pekerjaan_ibu'],
                'pekerjaan_wali' => $validate['pekerjaan_wali'],
                'penghasilan_ayah' => $validate['penghasilan_ayah'],
                'penghasilan_ibu' => $validate['penghasilan_ibu'],
                'penghasilan_wali' => $validate['penghasilan_wali'],
                'no_telp_ayah' => $validate['no_telp_ayah'],
                'no_telp_ibu' => $validate['no_telp_ibu'],
                'no_telp_wali' => $validate['no_telp_wali']
            ]);
        }
        return redirect()->to('/siswa/data-ortu')->with('success', 'Successfully Add Data');
    }

    public function tambahan(Request $request)
    {
        $siswa = $request->user();

        $data = DataTambahanSiswa::where('siswa_id', $siswa->id)->first();

        return view('dashboard.siswa.data-tambahan', compact('data'));
    }

    public function update_tambahan(Request $request, string $id)
    {
        // dd($request);
        $siswa = $request->user();
        $validate = $request->validate([
            'asal_sekolah' => 'required',
            'nis' => 'required',
            'nomor_peserta' => 'required',
            'nomor_ijasah' => 'required',
            'hobi' => 'required',
            'cita_cita' => 'required',
            'doc_ijasah' => 'nullable|image|mimes:jpeg,png,jpg',
            'doc_akte' => 'nullable|image|mimes:jpeg,png,jpg',
            'doc_kk' => 'nullable|image|mimes:jpeg,png,jpg',
            'doc_ktp' => 'nullable|image|mimes:jpeg,png,jpg',
            'doc_kip' => 'nullable|image|mimes:jpeg,png,jpg'
        ]);
        // dd($validate);
        
        // Inisialisasi data
        $data = [
            'siswa_id' => $siswa->id,
            'asal_sekolah' => $validate['asal_sekolah'],
            'nis' => $validate['nis'],
            'nomor_peserta' => $validate['nomor_peserta'],
            'nomor_ijasah' => $validate['nomor_ijasah'],
            'hobi' => $validate['hobi'],
            'cita_cita' => $validate['cita_cita'],
        ];

        // Operasi insert atau update
        if ($id == 'new') {
            $this->uploadAndSaveImage($request, 'doc_ijasah', $data);
            $this->uploadAndSaveImage($request, 'doc_akte', $data);
            $this->uploadAndSaveImage($request, 'doc_kk', $data);
            $this->uploadAndSaveImage($request, 'doc_ktp', $data);
            $this->uploadAndSaveImage($request, 'doc_kip', $data);

            // Ini operasi insert (baru)
            DataTambahanSiswa::create($data);
        } else {
            $this->uploadAndSaveImage($request, 'doc_ijasah', $data);
            $this->uploadAndSaveImage($request, 'doc_akte', $data);
            $this->uploadAndSaveImage($request, 'doc_kk', $data);
            $this->uploadAndSaveImage($request, 'doc_ktp', $data);
            $this->uploadAndSaveImage($request, 'doc_kip', $data);

            // Ini operasi update
            DataTambahanSiswa::where('id', $id)->update($data);
        }

        // if ($id == 'new') {
        //     // dd($id);
        //     // Ini operasi insert (baru)
        //     DataTambahanSiswa::create([
        //         'siswa_id' => $siswa->id,
        //         'asal_sekolah' => $validate['asal_sekolah'],
        //         'nis' => $validate['nis'],
        //         'nomor_peserta' => $validate['nomor_peserta'],
        //         'nomor_ijasah' => $validate['nomor_ijasah'],
        //         'hobi' => $validate['hobi'],
        //         'cita_cita' => $validate['cita_cita'],

        //         // 'doc_ijasah' => $validate['doc_ijasah'],
        //         'doc_akte' => $validate['doc_akte'],
        //         // 'doc_kk' => $validate['doc_kk'],
        //         // 'doc_ktp' => $validate['doc_ktp'],
        //         // 'doc_kip' => $validate['doc_kip'],
        //     ]);
        // } else {
        //     // Ini operasi update
        //     DataTambahanSiswa::where('id', $id)->update([
        //         'siswa_id' => $siswa->id,
        //         'asal_sekolah' => $validate['asal_sekolah'],
        //         'nis' => $validate['nis'],
        //         'nomor_peserta' => $validate['nomor_peserta'],
        //         'nomor_ijasah' => $validate['nomor_ijasah'],
        //         'hobi' => $validate['hobi'],
        //         'cita_cita' => $validate['cita_cita'],
        //         // 'doc_ijasah' => $validate['doc_ijasah'],
        //         'doc_akte' => $validate['doc_akte'],
        //         // 'doc_kk' => $validate['doc_kk'],
        //         // 'doc_ktp' => $validate['doc_ktp'],
        //         // 'doc_kip' => $validate['doc_kip'],
        //     ]);
        // }

        return redirect()->to('/siswa/data-tambahan')->with('success', 'Successfully Add Data');
    }

    protected function uploadAndSaveImage($request, $fieldName, &$data)
    {
        if ($request->hasFile($fieldName)) {
            // Hapus gambar lama jika ada
            if (isset($data[$fieldName])) {
                Storage::delete('public/images/dokumenPendaftaran/' . $data[$fieldName]);
            }

            // Simpan gambar baru
            $image = $request->file($fieldName);
            $imageName = time() . '_' . $image->getClientOriginalName();
            Storage::putFileAs('public/images/dokumenPendaftaran/', $image, $imageName);

            // Simpan nama gambar ke dalam data
            $data[$fieldName] = $imageName;
        }
    }

    public function lengkap(Request $request){
        $siswa = $request->user();

        $data = DataLengkapSiswa::where('siswa_id', $siswa->id)->first();

        return view('dashboard.siswa.data-lengkap', compact('data'));
    }

    public function update_lengkap(Request $request, string $id)
    {
        $siswa = $request->user();
        $validate = $request->validate([
            'nokk' => 'required',
            'no_akta' => 'required',
            'agama' => 'required',
            'kewarganegaraan' => 'required',
            'kip' => 'required',
            'prestasi' => 'required',
            'anak_ke' => 'required',
            'jumlah_sodara' => 'required',
            'tb' => 'required',
            'bb' => 'required',
            'tinggal_bersama' => 'required',
            'moda_transportasi' => 'required',
            'lintang' => 'required',
            'bujur' => 'required',
            'jarak_tempuh' => 'required',
            'waktu_tempuh' => 'required',
        ]);

        if ($id == 'new') {
            // Ini operasi insert (baru)
            Data_lengkap_siswa::create([
                'siswa_id' => $siswa->id,
                'nokk' => $validate['nokk'],
                'no_akta' => $validate['no_akta'],
                'agama' => $validate['agama'],
                'kewarganegaraan' => $validate['kewarganegaraan'],
                'kip' => $validate['kip'],
                'prestasi' => $validate['prestasi'],
                'anak_ke' => $validate['anak_ke'],
                'jumlah_sodara' => $validate['jumlah_sodara'],
                'tb' => $validate['tb'],
                'bb' => $validate['bb'],
                'tinggal_bersama' => $validate['tinggal_bersama'],
                'moda_transportasi' => $validate['moda_transportasi'],
                'lintang' => $validate['lintang'],
                'bujur' => $validate['bujur'],
                'jarak_rumah' => $validate['jarak_rumah'],
                'waktu_tempuh' => $validate['waktu_tempuh']
            ]);
        } else {
            // Ini operasi update
            Data_lengkap_siswa::where('id', $id)->update([
                'siswa_id' => $siswa->id,
                'siswa_id' => $siswa->id,
                'nokk' => $validate['nokk'],
                'no_akta' => $validate['no_akta'],
                'agama' => $validate['agama'],
                'kewarganegaraan' => $validate['kewarganegaraan'],
                'kip' => $validate['kip'],
                'prestasi' => $validate['prestasi'],
                'anak_ke' => $validate['anak_ke'],
                'jumlah_sodara' => $validate['jumlah_sodara'],
                'tb' => $validate['tb'],
                'bb' => $validate['bb'],
                'tinggal_bersama' => $validate['tinggal_bersama'],
                'moda_transportasi' => $validate['moda_transportasi'],
                'lintang' => $validate['lintang'],
                'bujur' => $validate['bujur'],
                'jarak_rumah' => $validate['jarak_rumah'],
                'waktu_tempuh' => $validate['waktu_tempuh']
            ]);
        }
        return redirect()->to('/siswa/data-lengkap')->with('success', 'Successfully Add Data');
    }
}
