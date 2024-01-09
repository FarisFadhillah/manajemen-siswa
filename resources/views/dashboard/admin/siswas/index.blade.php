@extends('dashboard.admin.base')
@section('content')
<div class="page-heading d-flex justify-content-between items-center">
    <h3>Data Siswa</h3>
    {{-- <a href="/admin/siswas/create" class="btn btn-outline-primary">+ Tambah Siswa</a> --}}
</div>

<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>NIS (Nomor Induk Siswa)</th>
                            <th>NISN (Nomor Induk Siswa Nasional)</th>
                            {{-- <th>Semester</th> --}}
                            {{-- <th>Action</th> --}}
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
                                <td>{{ $val->siswa->nama_siswa ?? 'Tidak Ada Data' }}</td>
                                <td>{{ $val->kelas->kelas ?? 'Tidak Ada Data'}}</td>
                                <td>{{ $val->siswa->nis ?? 'Tidak Ada Data' }}</td>
                                <td>{{ $val->siswa->nisn ?? 'Tidak Ada Data' }}</td>
                                {{-- <td>{{ $val->semester }}</td> --}}
                                {{-- <td class="d-flex">
                                    <a href="/admin/siswas/{{ $val->id }}/edit" class="btn icon btn-primary me-2"><i class="bi bi-pencil"></i></a>
                                    <form action="/admin/siswas/{{ $val->id }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn icon btn-danger"><i class="bi bi-x"></i></button>
                                    </form>
                                </td> --}}
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