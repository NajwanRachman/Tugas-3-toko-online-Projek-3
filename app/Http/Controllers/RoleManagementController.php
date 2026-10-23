<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRoleRequest;
use App\Models\User;
use App\Services\RoleManagementService;

class RoleManagementController extends Controller
{
    /**
     * Menampilkan daftar pengguna.
     */
    public function index()
    {
        $users = User::orderBy('id_user')->get();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Memperbarui role pengguna.
     */
    public function update(
        UpdateUserRoleRequest $request,
        User $user,
        RoleManagementService $service
    ) {
        $changed = $service->changeRole(
            $user,
            $request->validated()['role']
        );

        if (! $changed) {
            return back()->with(
                'info',
                'Role pengguna tidak berubah karena role yang dipilih sama.'
            );
        }

        return back()->with(
            'success',
            'Role pengguna berhasil diperbarui.'
        );
    }
}
