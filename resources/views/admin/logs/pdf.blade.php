<html>
<head>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #888; padding: 6px; text-align: left; }
        th { background: #4CAF50; color: #fff; }
    </style>
</head>
<body>
    <h2>Log Aktivitas Admin</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Waktu</th>
                <th>Admin</th>
                <th>Aksi</th>
                <th>Tabel</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
            @foreach($logs as $log)
            <tr>
                <td>{{ $log->id }}</td>
                <td>{{ $log->created_at->format('d-m-Y H:i') }}</td>
                <td>{{ $log->admin }}</td>
                <td>{{ $log->action }}</td>
                <td>{{ $log->table }}</td>
                <td>{{ $log->data }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html> 