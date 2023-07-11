@extends('dashboard.admin.base')
@section('content')
<div class="page-heading d-flex justify-content-between items-center">
    <h3>Edit Kelas</h3>
</div>

<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <form action="/admin/kelases/{{ $kelas_bridge->id }}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">

                    <fieldset class="form-group">
                        <label for="basicSelect">Daftar Siswa</label>
                        <select name="siswa_id" class="form-select @error('siswa_id') is-invalid @enderror" id="basicSelect">
                            @foreach ($siswas as $val)
                                <option {{ $kelas_bridge->siswa_id == $val->id ? "selected" : "" }} value="{{ $val->id }}">{{ $val->nama_siswa }}</option>
                            @endforeach
                        </select>
                        @error('siswa_id')
                        <div class="invalid-feedback">
                            <i class="bx bx-radio-circle"></i>
                            {{ $message }}
                        </div>
                        @enderror
                    </fieldset>

                    <fieldset class="form-group">
                        <label for="basicSelect">Daftar Guru</label>
                        <select class="form-select @error('guru_id') is-invalid @enderror" name="guru_id" id="basicSelect">
                            <option selected hidden>Pilih Guru</option>
                            @foreach ($gurus as $val)
                                <option {{ $kelas_bridge->guru_id == $val->id ? "selected" : "" }} value="{{ $val->id }}">{{ $val->nama_guru }}</option>
                            @endforeach
                        </select>
                        @error('guru_id')
                        <div class="invalid-feedback">
                            <i class="bx bx-radio-circle"></i>
                            {{ $message }}
                        </div>
                        @enderror
                    </fieldset>

                    <fieldset class="form-group">
                        <label for="basicSelect">Daftar Kelas</label>
                        <select class="form-select @error('kelas_id') is-invalid @enderror" name="kelas_id" id="basicSelect">
                            <option selected hidden>Pilih Kelas</option>
                            @foreach ($kelases as $val)
                                <option {{ $kelas_bridge->kelas_id == $val->id ? "selected" : "" }} value="{{ $val->id }}">{{ $val->kelas }}</option>
                            @endforeach
                        </select>
                        @error('kelas_id')
                        <div class="invalid-feedback">
                            <i class="bx bx-radio-circle"></i>
                            {{ $message }}
                        </div>
                        @enderror
                    </fieldset>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{asset("assets/extensions/choices.js/public/assets/styles/choices.css")}}">
@endpush

@push('scripts')
<script src="{{ asset("assets/extensions/choices.js/public/assets/scripts/choices.js") }}"></script>
<script src="{{ asset("assets/js/pages/form-element-select.js") }}"></script>
@endpush