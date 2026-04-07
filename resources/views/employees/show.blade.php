@extends('layouts.app')

@section('title', '{{ $employee->name }} - Nexus Unified Management')

@section('content')
    <div class="page-header">
        <h1>Detail Karyawan</h1>
        <div style="display: flex; gap: 0.5rem;">
            <a href="{{ route('employees.edit', $employee) }}" class="btn btn-primary btn-sm" id="btn-edit-detail">Edit</a>
            <a href="{{ route('employees.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="form-grid">
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <p style="font-size: 1rem; font-weight: 500;">{{ $employee->name }}</p>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <p style="font-size: 1rem; color: var(--text-muted);">{{ $employee->email }}</p>
                </div>

                <div class="form-group">
                    <label>Posisi</label>
                    <p style="font-size: 1rem;">{{ $employee->position }}</p>
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <p>
                        <span class="badge {{ $employee->status === 'active' ? 'badge-active' : 'badge-inactive' }}">
                            {{ ucfirst($employee->status) }}
                        </span>
                    </p>
                </div>

                <div class="form-group">
                    <label>Dibuat</label>
                    <p style="font-size: 0.875rem; color: var(--text-muted);">{{ $employee->created_at->format('d M Y, H:i') }}</p>
                </div>

                <div class="form-group">
                    <label>Terakhir Diperbarui</label>
                    <p style="font-size: 0.875rem; color: var(--text-muted);">{{ $employee->updated_at->format('d M Y, H:i') }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
