<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Role - Najwan Store</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 32px;
            font-family: Arial, sans-serif;
            background: #f8f5f0;
            color: #292929;
        }

        .container {
            max-width: 1100px;
            margin: auto;
        }

        h1 {
            color: #702c3b;
        }

        .table-wrapper {
            overflow-x: auto;
            background: white;
            border-radius: 10px;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 14px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        th {
            background: #702c3b;
            color: white;
        }

        select, button {
            padding: 9px 12px;
            border-radius: 5px;
        }

        select {
            border: 1px solid #ccc;
            background: white;
        }

        button {
            border: none;
            background: #702c3b;
            color: white;
            cursor: pointer;
        }

        button:hover {
            background: #51202b;
        }

        .message {
            margin-bottom: 15px;
            padding: 12px;
            border-radius: 6px;
            background: #e3f4e5;
        }

        .info {
            background: #e4efff;
        }

        .error {
            background: #fbe4e4;
        }

        .back-link {
            display: inline-block;
            margin-bottom: 18px;
            color: #702c3b;
            text-decoration: none;
        }

        @media (max-width: 600px) {
            body {
                padding: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="{{ route('home') }}" class="back-link">
            &larr; Kembali ke toko
        </a>

        <h1>Manajemen Role Pengguna</h1>
        <p>Kelola role customer dan staff di Najwan Store.</p>

        @if (session('success'))
            <div class="message">
                {{ session('success') }}
            </div>
        @endif

        @if (session('info'))
            <div class="message info">
                {{ session('info') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="message error">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Role Saat Ini</th>
                        <th>Ubah Role</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->id_user }}</td>
                            <td>{{ $user->nama_lengkap }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                @if ($user->role !== 'admin')
                                    <form
                                        action="{{ route('admin.users.role.update', $user->id_user) }}"
                                        method="POST"
                                    >
                                        @csrf
                                        @method('PATCH')

                                        <select name="role" required>
                                            <option
                                                value="customer"
                                                {{ $user->role === 'customer' ? 'selected' : '' }}
                                            >
                                                Customer
                                            </option>

                                            <option
                                                value="staff"
                                                {{ $user->role === 'staff' ? 'selected' : '' }}
                                            >
                                                Staff
                                            </option>
                                        </select>

                                        <button type="submit">
                                            Simpan
                                        </button>
                                    </form>
                                @else
                                    <span>Tidak dapat diubah</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">Belum ada pengguna.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
