<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Nexus Unified Management')</title>
    <meta name="description" content="Nexus Unified Management - Sistem Manajemen Karyawan">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --primary: #6366f1;
            --primary-hover: #4f46e5;
            --primary-light: rgba(99, 102, 241, 0.1);
            --success: #10b981;
            --success-light: rgba(16, 185, 129, 0.1);
            --danger: #ef4444;
            --danger-hover: #dc2626;
            --danger-light: rgba(239, 68, 68, 0.1);
            --warning: #f59e0b;
            --bg: #0f172a;
            --bg-card: #1e293b;
            --bg-card-hover: #334155;
            --border: #334155;
            --text: #f1f5f9;
            --text-muted: #94a3b8;
            --radius: 12px;
            --shadow: 0 4px 6px -1px rgba(0,0,0,0.3), 0 2px 4px -2px rgba(0,0,0,0.2);
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
            line-height: 1.6;
        }

        .navbar {
            background: rgba(30, 41, 59, 0.8);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border);
            padding: 1rem 2rem;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .navbar-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            font-size: 1.25rem;
            font-weight: 700;
            background: linear-gradient(135deg, #6366f1, #a855f7, #ec4899);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: -0.025em;
        }

        .nav-links a {
            color: var(--text-muted);
            text-decoration: none;
            font-size: 0.875rem;
            font-weight: 500;
            transition: color 0.2s;
            margin-left: 1.5rem;
        }

        .nav-links a:hover { color: var(--text); }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 2rem;
        }

        .page-header h1 {
            font-size: 1.75rem;
            font-weight: 700;
            letter-spacing: -0.025em;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.625rem 1.25rem;
            border-radius: 8px;
            font-size: 0.875rem;
            font-weight: 500;
            font-family: 'Inter', sans-serif;
            text-decoration: none;
            cursor: pointer;
            border: none;
            transition: all 0.2s;
        }

        .btn-primary {
            background: var(--primary);
            color: #fff;
        }
        .btn-primary:hover { background: var(--primary-hover); transform: translateY(-1px); }

        .btn-secondary {
            background: var(--bg-card);
            color: var(--text-muted);
            border: 1px solid var(--border);
        }
        .btn-secondary:hover { background: var(--bg-card-hover); color: var(--text); }

        .btn-danger {
            background: var(--danger);
            color: #fff;
        }
        .btn-danger:hover { background: var(--danger-hover); }

        .btn-sm { padding: 0.375rem 0.75rem; font-size: 0.8125rem; }

        .card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        .alert {
            padding: 0.875rem 1.25rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            font-size: 0.875rem;
            font-weight: 500;
            animation: slideDown 0.3s ease-out;
        }

        .alert-success {
            background: var(--success-light);
            color: var(--success);
            border: 1px solid rgba(16, 185, 129, 0.2);
        }

        .alert-danger {
            background: var(--danger-light);
            color: var(--danger);
            border: 1px solid rgba(239, 68, 68, 0.2);
        }

        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            text-align: left;
            padding: 0.875rem 1.25rem;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--text-muted);
            background: rgba(51, 65, 85, 0.5);
            border-bottom: 1px solid var(--border);
        }

        td {
            padding: 1rem 1.25rem;
            font-size: 0.875rem;
            border-bottom: 1px solid var(--border);
            vertical-align: middle;
        }

        tr:last-child td { border-bottom: none; }

        tr:hover td {
            background: rgba(51, 65, 85, 0.3);
        }

        .badge {
            display: inline-flex;
            align-items: center;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .badge-active {
            background: var(--success-light);
            color: var(--success);
        }

        .badge-inactive {
            background: var(--danger-light);
            color: var(--danger);
        }

        .actions {
            display: flex;
            gap: 0.5rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            font-size: 0.875rem;
            font-weight: 500;
            margin-bottom: 0.5rem;
            color: var(--text-muted);
        }

        .form-control {
            width: 100%;
            padding: 0.75rem 1rem;
            background: var(--bg);
            border: 1px solid var(--border);
            border-radius: 8px;
            color: var(--text);
            font-size: 0.875rem;
            font-family: 'Inter', sans-serif;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px var(--primary-light);
        }

        .form-control.is-invalid {
            border-color: var(--danger);
        }

        .invalid-feedback {
            color: var(--danger);
            font-size: 0.8125rem;
            margin-top: 0.375rem;
        }

        select.form-control {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%2394a3b8' viewBox='0 0 16 16'%3E%3Cpath d='M4.646 6.646a.5.5 0 0 1 .708 0L8 9.293l2.646-2.647a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 0 1 0-.708z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            padding-right: 2.5rem;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
        }

        .form-actions {
            display: flex;
            gap: 0.75rem;
            padding-top: 1rem;
            border-top: 1px solid var(--border);
            margin-top: 0.5rem;
        }

        .card-body { padding: 1.5rem; }

        .pagination-wrapper {
            padding: 1rem 1.25rem;
            display: flex;
            justify-content: center;
        }

        .pagination-wrapper nav > div:first-child { display: none; }

        .empty-state {
            padding: 4rem 2rem;
            text-align: center;
        }

        .empty-state p {
            color: var(--text-muted);
            margin-bottom: 1.5rem;
        }

        @media (max-width: 768px) {
            .form-grid { grid-template-columns: 1fr; }
            .page-header { flex-direction: column; align-items: flex-start; gap: 1rem; }
            .container { padding: 1rem; }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-content">
            <span class="logo">⬡ Nexus Unified Management</span>
            <div class="nav-links">
                <a href="{{ url('/') }}">Home</a>
                <a href="{{ route('employees.index') }}">Karyawan</a>
            </div>
        </div>
    </nav>

    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                ✓ {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </div>
</body>
</html>
