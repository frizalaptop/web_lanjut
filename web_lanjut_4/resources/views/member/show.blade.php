@extends('layouts.app_crud')

@section('title', 'Detail Member')

@section('content')
<div class="container mt-4">
    <h1>Detail Member</h1>
    
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $member->nama }}</h5>
            <p class="card-text"><strong>Nomer Telepon:</strong> {{ $member->telp }}</p>
            <a href="{{ route('member.edit', $member->id) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('member.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection