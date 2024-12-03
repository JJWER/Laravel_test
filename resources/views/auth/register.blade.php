<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>สมัครสมาชิก</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-success text-white text-center">
                        <h3>สมัครสมาชิก</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <!-- ชื่อ -->
                            <div class="mb-3">
                                <label for="name" class="form-label">ชื่อ</label>
                                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required autofocus>
                                @error('name')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- อีเมล -->
                            <div class="mb-3">
                                <label for="email" class="form-label">อีเมล</label>
                                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- รหัสผ่าน -->
                            <div class="mb-3">
                                <label for="password" class="form-label">รหัสผ่าน</label>
                                <input type="password" id="password" name="password" class="form-control" required>
                                @error('password')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- ยืนยันรหัสผ่าน -->
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">ยืนยันรหัสผ่าน</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                                @error('password_confirmation')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- ปุ่มสมัครสมาชิก -->
                            <div class="d-grid mb-3">
                                <button type="submit" class="btn btn-success">สมัครสมาชิก</button>
                            </div>

                            <!-- ปุ่มย้อนกลับไปหน้าล็อกอิน -->
                            <div class="text-center">
                                <a href="{{ route('login') }}" class="btn btn-outline-secondary">ย้อนกลับไปหน้าล็อกอิน</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
