@extends('main')

@section('title', 'Mahasiswa')

@section('content')
    <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary">Tambah Mahasiswa</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Prodi</th>
                <th>NPM</th>
                <th>Foto</th>
                <th>Program Studi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mahasiswa as $key => $mhs)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $mhs->nama }}</td>
                    <td>{{ $mhs->npm }}</td>
                    <td>
                        @if ($mhs->foto)
                            <img src ="{{ asset('storage/' . $mhs->foto) }}" alt="Foto"
                            width="100"
                        @else
                            <p>Foto tidak tersedia</p>
                        @endif
                    </td>
                    <td>{{ $mhs->prodi->nama_prodi ?? '-'}}</td>
                    <td>
                        <a href="{{ route('mahasiswa.edit', $mhs->id) }}" 
                           class="btn btn-warning btn-rounded">Ubah</a>

                        <form method="POST" action="{{ route('mahasiswa.destroy', $mhs->id) }}" class="d-inline">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button type="submit" class="btn btn-xs btn-danger btn-rounded show_confirm"
                                data-toggle="tooltip" title='Delete'
                                data-nama='{{ $mhs->nama_mahasiswa }}'>Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection