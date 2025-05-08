@extends('layouts.app_crud')

@section('title', 'Tambah Member')

@section('content')
<div class="container mt-4">
    <h1>Tambah Member</h1>
    
    <form action="{{ route('member.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Member</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="mb-3">
            <label for="telp" class="form-label">Nomer Telepon</label>
            <input type="number" class="form-control" id="telp" name="telp" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('member.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection