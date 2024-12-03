<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;


class RolePermissionController extends Controller
{
    /**
     * สร้าง Roles และ Permissions
     */
    public function createRolesAndPermissions()
    {
        // สร้าง Permissions
        $permissions = ['view employees', 'edit employees', 'delete employees', 'create employees'];
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]); // ตรวจสอบก่อนว่ามีอยู่แล้วหรือยัง
        }

        // สร้าง Roles
        $admin = Role::firstOrCreate(['name' => 'Admin']);
        $manager = Role::firstOrCreate(['name' => 'Manager']);
        $employee = Role::firstOrCreate(['name' => 'Employee']);

        // กำหนด Permissions ให้กับ Roles
        $admin->syncPermissions($permissions); // Admin ได้สิทธิ์ทั้งหมด
        $manager->syncPermissions(['view employees', 'edit employees']); // Manager ได้บางสิทธิ์
        $employee->syncPermissions(['view employees']); // Employee ดูได้อย่างเดียว

        return response()->json([
            'message' => 'Roles and Permissions created successfully!',
        ]);
    }


    /**
     * กำหนด Role ให้ผู้ใช้
     */
    public function assignRoleToUser(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'role_name' => 'required|exists:roles,name',
        ]);

        $user = User::findOrFail($request->user_id);

        // Check if the user already has this role
        if ($user->hasRole($request->role_name)) {
            return redirect()->back()->with('error', 'User already has this role.');
        }

        $user->assignRole($request->role_name);

        return redirect()->route('roles.index')->with('success', 'Role assigned successfully!');
    }


    /**
     * ทดสอบสิทธิ์ของผู้ใช้
     */
    public function checkUserPermission($userId, $permission)
    {
        $user = User::find($userId);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        if ($user->can($permission)) {
            return response()->json([
                'message' => "User '{$user->name}' has permission '{$permission}'"
            ]);
        } else {
            return response()->json([
                'message' => "User '{$user->name}' does not have permission '{$permission}'"
            ]);
        }

    }

    public function index()
    {
        $roles = Role::all(); // ดึง Roles ทั้งหมด
        $permissions = Permission::all(); // ดึง Permissions ทั้งหมด
        return view('roles.index', compact('roles', 'permissions'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles',
            'permissions' => 'array',
        ]);

        $role = Role::create(['name' => $request->name]);
        $role->permissions()->sync($request->permissions);

        return redirect()->route('roles.index')->with('success', 'Role created successfully!');
    }

    public function edit(Role $role)
    {
        return view('roles.edit', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id,
            'permissions' => 'array',
        ]);

        $role->update(['name' => $request->name]);
        $role->permissions()->sync($request->permissions);

        return redirect()->route('roles.index')->with('success', 'Role updated successfully!');
    }


    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('roles.index')->with('success', 'Role deleted successfully!');
    }

    public function createOrEdit($roleId = null)
    {
        // ดึง Role และ Permissions
        $role = $roleId ? Role::findOrFail($roleId) : null;
        $permissions = Permission::all();

        return view('roles.form', compact('role', 'permissions'));
    }

}

