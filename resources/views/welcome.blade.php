<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ยินดีต้อนรับสู่ระบบ HR</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }
        .feature-icon {
            color: #0d6efd;
            transition: transform 0.3s ease, color 0.3s ease;
        }
        .feature-icon:hover {
            color: #6610f2;
            transform: scale(1.2);
        }
        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: #0d6efd;
        }
        .navbar-brand:hover {
            color: #6610f2;
        }
        .section-heading {
            color: #0d6efd;
            font-weight: bold;
        }
        .footer {
            background-color: #f8f9fa;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">ระบบ HR</a>
        </div>
    </nav>

    <!-- Header -->
    <header class="bg-primary text-white text-center py-5">
        <div class="container">
            <h1 class="display-4 fw-bold">ยินดีต้อนรับสู่ระบบ HR</h1>
            <p class="lead">ระบบจัดการพนักงานที่ทันสมัย สะดวก และใช้งานง่าย</p>
            <a href="/login" class="btn btn-light btn-lg mt-3 shadow">เข้าสู่ระบบ</a>
        </div>
    </header>

    <!-- Features Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center section-heading mb-4">ฟีเจอร์ที่คุณสามารถใช้งานได้</h2>
            <div class="row g-4">
                <div class="col-md-4 text-center">
                    <i class="bi bi-person-plus-fill display-1 feature-icon"></i>
                    <h3 class="mt-3 fw-bold">เพิ่มพนักงานใหม่</h3>
                    <p>บันทึกข้อมูลพนักงานใหม่ลงในระบบได้อย่างรวดเร็วและง่ายดาย</p>
                </div>
                <div class="col-md-4 text-center">
                    <i class="bi bi-person-lines-fill display-1 feature-icon"></i>
                    <h3 class="mt-3 fw-bold">จัดการข้อมูลพนักงาน</h3>
                    <p>อัปเดตและแก้ไขข้อมูลของพนักงานแต่ละคนได้ตามต้องการ</p>
                </div>
                <div class="col-md-4 text-center">
                    <i class="bi bi-file-earmark-text-fill display-1 feature-icon"></i>
                    <h3 class="mt-3 fw-bold">สร้างรายงาน</h3>
                    <p>สามารถสร้างรายงานต่าง ๆ ที่จำเป็นต่อการบริหารงานบุคคล</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer text-center py-4">
        <div class="container">
            <p class="mb-0">© 2024 ระบบ HR | พัฒนาโดยนาย ธนาธิป เตชะ</p>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
