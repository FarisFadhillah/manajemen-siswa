@extends('dashboard.guru.base')
@section('content')
<div class="page-heading d-flex justify-content-between items-center">
    <h3>Data Siswa</h3>
</div>

<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>NIS (Nomor Induk Siswa)</th>
                            <th>NISN (Nomor Induk Siswa Nasional)</th>
                            <th>Nama Siswa</th>
                            {{-- <th>Semester</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($siswas) == 0)
                            <tr class="text-center">
                                <td colspan="7" class="p-5">Tidak Ada Data</td>
                            </tr>
                        @else
                            @foreach ($siswas as $val)
                            <tr>
                                <td>{{ $val->nis }}</td>
                                <td>{{ $val->nisn }}</td>
                                <td>{{ $val->nama_siswa }}</td>
                                {{-- <td>{{ $val->semester }}</td> --}}
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>
@endsection