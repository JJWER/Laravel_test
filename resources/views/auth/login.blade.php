<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>เข้าสู่ระบบ</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white text-center">
                        <h3>เข้าสู่ระบบ</h3>
                    </div>
                    <div class="card-body">
                        <!-- แสดงสถานะการเข้าสู่ระบบ -->
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- อีเมล -->
                            <div class="mb-3">
                                <label for="email" class="form-label">อีเมล</label>
                                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus>
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

                            <!-- จดจำฉัน -->
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                                <label class="form-check-label" for="remember_me">จดจำฉัน</label>
                            </div>

                            <!-- ส่วนลิงก์เพิ่มเติม -->
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <a href="{{ route('register') }}" class="text-decoration-none">ยังไม่มีบัญชี? สมัครสมาชิก</a>
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="text-decoration-none">ลืมรหัสผ่าน?</a>
                                @endif
                            </div>

                            <!-- ปุ่มเข้าสู่ระบบ -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">เข้าสู่ระบบ</button>
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
