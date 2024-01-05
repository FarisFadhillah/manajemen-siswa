@extends('dashboard.siswa.base')
@section('content')

<div class="page-heading d-flex justify-content-between items-center">
    <h3>Data Lengkap</h3>
</div>

<div class="page-content">
    <div class="section">
        <div class="card">
            <div class="card-body">
                <form action="/siswa/data-lengkap/update/{{ $data->id ?? 'new' }}" method="POST"">
                    @csrf
                    @method($data ? 'put' : 'post')
                    
                    {{-- no_kk&no_akta --}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Nomor Kartu Keluarga</label>
                                <input type="text" name="nokk" class="form-control" value="{{ old('nokk', $data->nokk ?? '') }}" id="basicInput">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Nomor Akta Kelahiran</label>
                                <input type="text" name="no_akta" class="form-control" value="{{ old('no_akta', $data->no_akta ?? '') }}" id="basicInput">
                            </div>
                        </div>
                    </div>

                    {{-- agama&kewarga --}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Agama</label>
                                <input type="text" name="agama" class="form-control" value="{{ old('agama', $data->agama ?? '') }}" id="basicInput">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Kewarganegaraan</label>
                                <input type="text" name="kewarganegaraan" class="form-control" value="{{ old('kewarganegaraan', $data->kewarganegaraan ?? '') }}" id="basicInput">
                            </div>
                        </div>
                    </div>

                    {{-- kip&prestasi --}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Kartu Indonesia Pintar</label>
                                <input type="text" name="kip" class="form-control" value="{{ old('kip', $data->kip ?? '') }}" id="basicInput">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Prestasi</label>
                                <input type="text" name="prestasi" class="form-control" value="{{ old('prestasi', $data->prestasi ?? '') }}" id="basicInput">
                            </div>
                        </div>
                    </div>

                    {{-- jumlahsodara&anakke --}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Anak Ke</label>
                                <input type="text" name="anak_ke" class="form-control" value="{{ old('anak_ke', $data->anak_ke ?? '') }}" id="basicInput">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Jumlah Sodara</label>
                                <input type="text" name="jumlah_sodara" class="form-control" value="{{ old('jumlah_sodara', $data->jumlah_sodara ?? '') }}" id="basicInput">
                            </div>
                        </div>
                    </div>

                    {{-- tb&bb --}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Tinggi Badan</label>
                                <input type="text" name="tb" class="form-control" value="{{ old('tb', $data->tb ?? '') }}" id="basicInput">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Berat Badan</label>
                                <input type="text" name="bb" class="form-control" value="{{ old('bb', $data->bb ?? '') }}" id="basicInput">
                            </div>
                        </div>
                    </div>

                    {{-- tinggal_bersama&moda_transportasi --}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Tinggal Bersama</label>
                                <input type="text" name="tinggal_bersama" class="form-control" value="{{ old('tinggal_bersama', $data->tinggal_bersama ?? '') }}" id="basicInput">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Moda Transportasi</label>
                                <input type="text" name="moda_transportasi" class="form-control" value="{{ old('moda_transportasi', $data->moda_transportasi ?? '') }}" id="basicInput">
                            </div>
                        </div>
                    </div>

                    {{-- lintang&bujur --}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Koordinat Lintang</label>
                                <input type="text" name="lintang" class="form-control" value="{{ old('lintang', $data->lintang ?? '') }}" id="basicInput">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Koordinat Bujur</label>
                                <input type="text" name="bujur" class="form-control" value="{{ old('bujur', $data->bujur ?? '') }}" id="basicInput">
                            </div>
                        </div>
                    </div>

                    {{-- jarak&waktu --}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Jarak Tempuh</label>
                                <input type="text" name="jarak_rumah" class="form-control" value="{{ old('jarak_rumah', $data->jarak_rumah ?? '') }}" id="basicInput">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Waktu Tempuh</label>
                                <input type="text" name="waktu_tempuh" class="form-control" value="{{ old('waktu_tempuh', $data->waktu_tempuh ?? '') }}" id="basicInput">
                            </div>
                        </div>
                    </div>

                    
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection