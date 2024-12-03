<nav class="bg-dark text-white py-3">
    <div class="container d-flex justify-content-between align-items-center">
        <a href="{{ route('dashboard') }}" class="text-white text-decoration-none h5 mb-0">ระบบ HR</a>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('roles.form') }}">Roles</a>
            </li>
            @if (\Illuminate\Support\Facades\Auth::check())
                <li class="nav-item d-flex align-items-center">
                    <span class="me-3">{{ \Illuminate\Support\Facades\Auth::user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-outline-light btn-sm">ออกจากระบบ</button>
                    </form>
                </li>
            @else
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm">เข้าสู่ระบบ</a>
                </li>
            @endif

        </ul>
    </div>
</nav>
