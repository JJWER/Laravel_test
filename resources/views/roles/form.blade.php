@extends('layouts.app')

@section('content')
<div class="container">
    <!-- เช็คว่าเป็นการสร้างหรือแก้ไข -->
    <h1>{{ isset($role) ? 'แก้ไข Role: ' . $role->name : 'สร้าง Role ใหม่' }}</h1>

    <form method="POST" 
          action="{{ isset($role) ? route('roles.update', $role->id) : route('roles.store') }}">
        @csrf
        @if(isset($role))
            @method('PUT')
        @endif

        <!-- ชื่อ Role -->
        <div class="mb-3">
            <label for="name" class="form-label">ชื่อ Role</label>
            <input type="text" name="name" 
                   class="form-control" 
                   value="{{ old('name', isset($role) ? $role->name : '') }}" 
                   required>
        </div>

        <!-- เลือก Permissions -->
        <div class="mb-3">
            <label for="permissions" class="form-label">Permissions</label>
            <div class="form-check">
                @foreach($permissions as $permission)
                    <input type="checkbox" name="permissions[]" 
                           value="{{ $permission->id }}" 
                           class="form-check-input" 
                           id="permission-{{ $permission->id }}"
                           {{ isset($role) && $role->permissions->contains($permission->id) ? 'checked' : '' }}>
                    <label class="form-check-label" for="permission-{{ $permission->id }}">
                        {{ $permission->name }}
                    </label><br>
                @endforeach
            </div>
        </div>

        <!-- ปุ่มบันทึก -->
        <button type="submit" class="btn btn-primary">
            {{ isset($role) ? 'บันทึกการเปลี่ยนแปลง' : 'สร้าง Role' }}
        </button>
    </form>
</div>
@endsection
