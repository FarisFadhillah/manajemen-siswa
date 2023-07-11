@extends('dashboard.guru.base')
@section('content')
<div class="page-heading d-flex justify-content-between items-center">
    <h3>Input Nilai</h3>
</div>

<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <form action="/guru/nilais" method="POST">
                    @csrf

                    <fieldset class="form-group">
                        <label for="basicSelect">Daftar Siswa</label>
                        <select name="siswa_id" class="form-select @error('siswa_id') is-invalid @enderror" id="basicSelect">
                            <option selected hidden>Pilih Siswa</option>
                            @foreach ($siswas as $val)
                                @if (count($val->nilais) == 0)
                                <option value="{{ $val->id }}">{{ $val->nama_siswa }} || NIS: {{ $val->nis }} || NISN: {{ $val->nisn }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('siswa_id')
                        <div class="invalid-feedback">
                            <i class="bx bx-radio-circle"></i>
                            {{ $message }}
                        </div>
                        @enderror
                    </fieldset>

                    @foreach ($pelajarans as $key => $val)
                        <div>
                            <input type="hidden" name="pelajarans[{{$key}}][id]" value="{{ $val->id }}">
                            <div class="form-group">
                                <label for="basicInput">Nilai {{ $val->pelajaran }}</label>
                                <input type="number" value="0" name="pelajarans[{{$key}}][nilai]" class="form-control @error('pelajaran.{{$key}}.nilai') is-invalid @enderror" id="basicInput" placeholder="Masukan Nilai Pelajaran">
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