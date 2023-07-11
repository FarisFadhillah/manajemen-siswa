@extends('dashboard.guru.base')
@section('content')
<div class="page-heading d-flex justify-content-between items-center">
    <h3>Data Nilai</h3>
    <div>
        <a href="/guru/absens/create" class="btn btn-outline-primary">+ Input Total Absen</a>
    <a href="/guru/nilais/create" class="btn btn-outline-primary">+ Input Total Nilai</a>
    <a href="/guru/absens/create" class="btn btn-outline-primary">
        <i class="bi bi-printer"></i> Print Laporan</a>
    </div>
</div>

<div class="page-content">
    <section class="section">
        <div class="card overflow-auto">
            <div class="card-body">
                <table class="table table-striped text-center" id="table1">
                    <thead>
                        <tr>
                            <th rowspan="2">NIS</th>
                            <th rowspan="2">NISN</th>
                            <th rowspan="2">Nama Siswa</th>
                            <th colspan="4">Total Absen</th>
                            <th colspan="{{ count($mata_pelajarans) }}">Mata Pelajaran</th>
                            <th rowspan="2">Action</th>
                        </tr>
                        <tr>
                            <th>Masuk</th>
                            <th>Sakit</th>
                            <th>Izin</th>
                            <th>Tanpa Keterangan</th>
                            @foreach ( $mata_pelajarans as $val)
                            <th>{{ $val->pelajaran }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($siswas) == 0)
                            <tr class="text-center">
                                <td colspan="{{ count($mata_pelajarans) + 3 }}" class="p-5">Tidak Ada Data</td>
                            </tr>
                        @else
                            @foreach ($siswas as $val)
                            <tr>
                                <td>{{ $val->nis }}</td>
                                <td>{{ $val->nisn }}</td>
                                <td>{{ $val->nama_siswa }}</td>
                                <td>{{ $val->absen ? $val->absen->total_masuk : 0 }}</td>
                                <td>{{ $val->absen ? $val->absen->total_sakit : 0 }}</td>
                                <td>{{ $val->absen ? $val->absen->total_izin : 0 }}</td>
                                <td>{{ $val->absen ? $val->absen->total_tanpa_keterangan : 0 }}</td>
                                @if (count($val->nilais) == 0)
                                    @foreach ( $mata_pelajarans as $mat)
                                    <td>0</td>
                                    @endforeach
                                @else
                                    @foreach ($val->nilais as $item)
                                        <td>
                                            {{ $item->nilai }}/
                                            @if ($item->nilai >= 93)
                                                A
                                            @elseif($item->nilai <= 92 && $item->nilai >= 86)
                                                B
                                            @elseif($item->nilai <= 86 && $item->nilai >= 80)
                                                C
                                            @else
                                                D
                                            @endif
                                        </td>
                                    @endforeach
                                @endif
                                <td class="d-flex justify-content-center">
                                    @if (count($val->nilais) != 0)
                                    <a href="/guru/nilais/{{ $val->id }}/edit" class="btn icon btn-primary me-2"><i class="bi bi-pencil"></i> Update Nilai</a>
                                    @endif
                                    @if ($val->absen)
                                    <a href="/guru/absens/{{ $val->id }}/edit" class="btn icon btn-primary me-2"><i class="bi bi-pencil"></i> Update Absen</a>
                                    @endif
                                    <a href="/guru/nilais/{{ $val->id }}" class="btn icon btn-secondary"><i class="bi bi-person"></i> Detail Nilai Siswa</a>
                            
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