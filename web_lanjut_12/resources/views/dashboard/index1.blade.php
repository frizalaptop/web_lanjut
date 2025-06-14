@extends('layouts.app_auth')

@section('title', 'Dashboard')

@push('styles')
<style>
    .dashboard-card {
        border-left: 4px solid var(--primary-soft-blue);
        transition: all 0.3s ease;
    }
    
    .dashboard-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(106, 155, 216, 0.2);
    }
    
    .stat-number {
        font-size: 2.2rem;
        font-weight: 600;
        color: var(--primary-blue);
    }
    
    .recent-activity-item {
        border-left: 3px solid var(--primary-soft-blue);
        transition: all 0.2s ease;
    }
    
    .recent-activity-item:hover {
        background-color: rgba(106, 155, 216, 0.05);
    }
    
    .badge-soft-blue {
        background-color: rgba(106, 155, 216, 0.1);
        color: var(--primary-blue);
    }
    
    .welcome-banner {
        background: linear-gradient(135deg, var(--primary-soft-blue), var(--primary-blue));
        border-radius: 12px;
    }
</style>
@endpush

@section('content')
<div class="container-fluid py-4">
    <!-- Welcome Banner -->
    <div class="welcome-banner text-white p-4 mb-4">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h2 class="mb-2">Selamat Datang, {{ Auth::user()->name }}!</h2>
                <p class="mb-0 opacity-75">Anda memiliki 5 tugas baru, 3 pesan belum dibaca</p>
            </div>
            <div class="col-md-4 text-md-end">
                <button class="btn btn-light btn-sm">
                    <i class="fas fa-bell me-1"></i> 3 Notifikasi
                </button>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row g-4 mb-4">
        <div class="col-md-3">
            <div class="card dashboard-card h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h6 class="text-uppercase text-muted mb-2">Total Pengguna</h6>
                            <h2 class="stat-number mb-0">1,245</h2>
                        </div>
                        <span class="badge bg-success rounded-pill">
                            <i class="fas fa-arrow-up me-1"></i> 12%
                        </span>
                    </div>
                    <div class="mt-3">
                        <a href="#" class="text-primary small">Lihat detail <i class="fas fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card dashboard-card h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h6 class="text-uppercase text-muted mb-2">Total Pendapatan</h6>
                            <h2 class="stat-number mb-0">$8,542</h2>
                        </div>
                        <span class="badge bg-success rounded-pill">
                            <i class="fas fa-arrow-up me-1"></i> 8%
                        </span>
                    </div>
                    <div class="mt-3">
                        <a href="#" class="text-primary small">Lihat laporan <i class="fas fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card dashboard-card h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h6 class="text-uppercase text-muted mb-2">Total Produk</h6>
                            <h2 class="stat-number mb-0">324</h2>
                        </div>
                        <span class="badge bg-danger rounded-pill">
                            <i class="fas fa-arrow-down me-1"></i> 3%
                        </span>
                    </div>
                    <div class="mt-3">
                        <a href="#" class="text-primary small">Kelola produk <i class="fas fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card dashboard-card h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h6 class="text-uppercase text-muted mb-2">Aktivitas Hari Ini</h6>
                            <h2 class="stat-number mb-0">48</h2>
                        </div>
                        <span class="badge bg-success rounded-pill">
                            <i class="fas fa-arrow-up me-1"></i> 22%
                        </span>
                    </div>
                    <div class="mt-3">
                        <a href="#" class="text-primary small">Lihat aktivitas <i class="fas fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <!-- Recent Activities -->
        <div class="col-lg-7">
            <div class="card">
                <div class="card-header bg-white border-bottom-0">
                    <h5 class="mb-0">Aktivitas Terkini</h5>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item recent-activity-item border-0 py-3 px-0">
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <span class="badge badge-soft-blue p-2">
                                        <i class="fas fa-user-plus"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-1">Pengguna baru terdaftar</h6>
                                    <p class="mb-0 text-muted">John Doe mendaftar sebagai pengguna baru</p>
                                    <small class="text-muted">10 menit yang lalu</small>
                                </div>
                            </div>
                        </div>
                        
                        <div class="list-group-item recent-activity-item border-0 py-3 px-0">
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <span class="badge badge-soft-blue p-2">
                                        <i class="fas fa-shopping-cart"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-1">Pesanan baru</h6>
                                    <p class="mb-0 text-muted">Pesanan #1234 telah dibuat</p>
                                    <small class="text-muted">1 jam yang lalu</small>
                                </div>
                            </div>
                        </div>
                        
                        <div class="list-group-item recent-activity-item border-0 py-3 px-0">
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <span class="badge badge-soft-blue p-2">
                                        <i class="fas fa-tasks"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-1">Tugas selesai</h6>
                                    <p class="mb-0 text-muted">Tugas "Update Dashboard" telah diselesaikan</p>
                                    <small class="text-muted">3 jam yang lalu</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="text-center mt-3">
                        <a href="#" class="btn btn-outline-primary">Lihat Semua Aktivitas</a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Quick Actions -->
        <div class="col-lg-5">
            <div class="card">
                <div class="card-header bg-white border-bottom-0">
                    <h5 class="mb-0">Aksi Cepat</h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <a href="#" class="card quick-action-card h-100 text-center p-3 text-decoration-none">
                                <div class="card-body">
                                    <div class="icon-circle bg-primary-soft mb-3">
                                        <i class="fas fa-plus text-primary"></i>
                                    </div>
                                    <h6 class="mb-0">Tambah Produk</h6>
                                </div>
                            </a>
                        </div>
                        
                        <div class="col-md-6">
                            <a href="#" class="card quick-action-card h-100 text-center p-3 text-decoration-none">
                                <div class="card-body">
                                    <div class="icon-circle bg-primary-soft mb-3">
                                        <i class="fas fa-users text-primary"></i>
                                    </div>
                                    <h6 class="mb-0">Kelola Pengguna</h6>
                                </div>
                            </a>
                        </div>
                        
                        <div class="col-md-6">
                            <a href="#" class="card quick-action-card h-100 text-center p-3 text-decoration-none">
                                <div class="card-body">
                                    <div class="icon-circle bg-primary-soft mb-3">
                                        <i class="fas fa-chart-line text-primary"></i>
                                    </div>
                                    <h6 class="mb-0">Lihat Laporan</h6>
                                </div>
                            </a>
                        </div>
                        
                        <div class="col-md-6">
                            <a href="#" class="card quick-action-card h-100 text-center p-3 text-decoration-none">
                                <div class="card-body">
                                    <div class="icon-circle bg-primary-soft mb-3">
                                        <i class="fas fa-cog text-primary"></i>
                                    </div>
                                    <h6 class="mb-0">Pengaturan</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Animasi untuk stat cards
    const statCards = document.querySelectorAll('.dashboard-card');
    statCards.forEach((card, index) => {
        card.style.animationDelay = `${index * 0.1}s`;
        card.classList.add('animated');
    });
    
    // Tooltip init
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
});
</script>
@endpush