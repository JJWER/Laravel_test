<!DOCTYPE html>
<html>
<head>
    <title>รายงานพนักงาน</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body style="font-family: 'THSarabunNew';">
    <h1 style="text-align: center;">รายงานพนักงาน</h1>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>ชื่อ - นามสกุล</th>
                <th>อีเมล</th>
                <th>เบอร์โทร</th>
                <th>ตำแหน่ง</th>
                <th>เงินเดือน</th>
                <th>วันที่เริ่มงาน</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->phone }}</td>
                    <td>{{ $employee->position }}</td>
                    <td>{{ number_format($employee->salary, 2) }}</td>
                    <td>{{ $employee->hired_date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

