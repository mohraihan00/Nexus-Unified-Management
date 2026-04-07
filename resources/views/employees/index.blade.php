@extends('layouts.app')

@section('title', 'Daftar Karyawan - Nexus Unified Management')

@section('content')
    <div class="page-header">
        <h1>Daftar Karyawan</h1>
        <a href="{{ route('employees.create') }}" class="btn btn-primary" id="btn-create-employee">
            + Tambah Karyawan
        </a>
    </div>

    <div class="card">
        @if($employees->count() > 0)
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Posisi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($employees as $index => $employee)
                        <tr id="employee-row-{{ $employee->id }}">
                            <td>{{ $employees->firstItem() + $index }}</td>
                            <td style="font-weight: 500;">{{ $employee->name }}</td>
                            <td style="color: var(--text-muted);">{{ $employee->email }}</td>
                            <td>{{ $employee->position }}</td>
                            <td>
                                <span class="badge {{ $employee->status === 'active' ? 'badge-active' : 'badge-inactive' }}">
                                    {{ ucfirst($employee->status) }}
                                </span>
                            </td>
                            <td>
                                <div class="actions">
                                    <a href="{{ route('employees.show', $employee) }}" class="btn btn-secondary btn-sm" id="btn-show-{{ $employee->id }}">Detail</a>
                                    <a href="{{ route('employees.edit', $employee) }}" class="btn btn-secondary btn-sm" id="btn-edit-{{ $employee->id }}">Edit</a>
                                    <form action="{{ route('employees.destroy', $employee) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus karyawan ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" id="btn-delete-{{ $employee->id }}">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            @if($employees->hasPages())
                <div class="pagination-wrapper">
                    {{ $employees->links() }}
                </div>
            @endif
        @else
            <div class="empty-state">
                <p>Belum ada data karyawan.</p>
                <a href="{{ route('employees.create') }}" class="btn btn-primary">+ Tambah Karyawan Pertama</a>
            </div>
        @endif
    </div>
@endsection
