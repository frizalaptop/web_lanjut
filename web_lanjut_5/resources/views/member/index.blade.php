@extends('layouts.app_crud')

@section('title', 'Daftar Member')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Daftar Member</h1>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('member.create') }}" class="btn btn-primary mb-3">Tambah Member</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Nomer Telepon</th>
            </tr>
        </thead>
        <tbody>
            @foreach($members as $key => $member)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $member->nama }}</td>
                <td>{{ $member->telp }}</td>
                <td>
                    <a href="{{ route('member.show', $member->id) }}" class="btn btn-info btn-sm">Lihat</a>
                    <a href="{{ route('member.edit', $member->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('member.destroy', $member->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection