@extends('dashboard.guru.base')
@section('content')
<div class="page-heading d-flex justify-content-between items-center">
    <h3>Input Nilai</h3>
</div>

<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <form action="/guru/nilais/{{ $siswa->id }}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">

                    <fieldset class="form-group">
                        <label for="basicSelect">Data Siswa</label>
                        <select name="siswa_id" @readonly(true) class="form-select @error('siswa_id') is-invalid @enderror" id="basicSelect">
                            <option value="{{ $siswa->id }}">{{ $siswa->nama_siswa }} || NIS: {{ $siswa->nis }} || NISN: {{ $siswa->nisn }}</option>
                        </select>
                        @error('siswa_id')
                        <div class="invalid-feedback">
                            <i class="bx bx-radio-circle"></i>
                            {{ $message }}
                        </div>
                        @enderror
                    </fieldset>

                    @foreach ($siswa->nilais as $key => $val)
                        <div>
                            <input type="hidden" name="pelajarans[{{$key}}][id]" value="{{ $val->id }}">
                            <input type="hidden" name="pelajarans[{{$key}}][nilai_id]" value="{{ $val->pelajaran_id }}">
                            <div class="form-group">
                                <label for="basicInput">Nilai {{ $val->pelajaran->pelajaran }}</label>
                                <input type="number" value="{{ $val->nilai }}" name="pelajarans[{{$key}}][nilai]" class="form-control @error('pelajaran.{{$key}}.nilai') is-invalid @enderror" id="basicInput" placeholder="Masukan Nilai Pelajaran">
                            </div>
                            @error('pelajarans.{{$key}}.nilai')
                            <div class="invalid-feedback">
                                <i class="bx bx-radio-circle"></i>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    @endforeach
                    @error('pelajarans')
                    <div class="invalid-feedback">
                        <i class="bx bx-radio-circle"></i>
                        {{ $message }}
                    </div>
                    @enderror

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