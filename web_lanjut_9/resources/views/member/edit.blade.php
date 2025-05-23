@extends('layouts.app_crud')

@section('title', 'Edit Member')

@section('content')
<div class="container mt-4">
    <h1>Edit Member</h1>
    
    <form action="{{ route('member.update', $member->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Member</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $member->nama }}" required>
        </div>
        <div class="mb-3">
            <label for="telp" class="form-label">No Telepon</label>
            <input type="number" class="form-control" id="telp" name="telp" value="{{ $member->telp }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('member.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection