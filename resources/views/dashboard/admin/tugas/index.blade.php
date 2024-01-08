@extends('dashboard.admin.base')
@section('content')
<div class="page-heading d-flex justify-content-between items-center">
    <h3>Data Tugas</h3>
    <a href="/admin/tugas/create" class="btn btn-outline-primary">+ Tambah Tugas</a>
</div>

<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($data) == 0)
                            <tr class="text-center">
                                <td colspan="3" class="p-5">Tidak Ada Data</td>
                            </tr>
                        @else
                            @foreach ($data as $val)
                            <tr>
                                <td>{{ $val->karyawan->nama }}</td>
                                <td>{{ $val->jabatan->jabatan }}</td>
                                <td class="d-flex">
                                    <a href="/admin/tugas/{{ $val->id }}/edit" class="btn icon btn-primary me-2"><i class="bi bi-pencil"></i></a>
                                    <form action="/admin/tugas/{{ $val->id }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn icon btn-danger"><i class="bi bi-x"></i></button>
                                    </form>
                                </td>
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