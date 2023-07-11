@extends('dashboard.admin.base')
@section('content')
<div class="page-heading d-flex justify-content-between items-center">
    <h3>Edit Tahun Ajaran</h3>
</div>

<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <form action="/admin/gurus/{{ $guru->id }}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
    
                    <div class="form-group">
                        <label for="basicInput">NIP (Nomor Induk Pegawai)</label>
                        <input type="text" value="{{ $guru->nip }}" class="form-control @error('nip') is-invalid @enderror" name="nip" id="basicInput" placeholder="1950285020">
                        @error('nip')
                        <div class="invalid-feedback">
                            <i class="bx bx-radio-circle"></i>
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="basicInput">Nama Guru</label>
                        <input type="text" value="{{ $guru->nama_guru }}" class="form-control @error('nama_guru') is-invalid @enderror" name="nama_guru" id="basicInput" placeholder="Jhon Doe">
                        @error('nama_guru')
                        <div class="invalid-feedback">
                            <i class="bx bx-radio-circle"></i>
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="basicInput">Email</label>
                        <input type="text" value="{{ $guru->email }}" class="form-control @error('email') is-invalid @enderror" name="email" id="basicInput" placeholder="JhonDoe@example.com">
                        @error('email')
                        <div class="invalid-feedback">
                            <i class="bx bx-radio-circle"></i>
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection