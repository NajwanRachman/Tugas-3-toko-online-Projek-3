<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class RoleManagementService
{
    /**
     * Role yang boleh diberikan oleh admin.
     * Role admin tidak boleh diberikan lewat form ini.
     */
    private const ASSIGNABLE_ROLES = ['customer', 'staff'];

    public function changeRole(User $target, string $newRole): bool
    {
        $actor = Auth::user();

        // Hanya admin yang boleh mengubah role.
        if (! $actor || $actor->role !== 'admin') {
            abort(403, 'Hanya admin yang boleh mengubah role.');
        }

        // Admin tidak boleh mengubah role dirinya sendiri.
        if ($actor->id_user === $target->id_user) {
            throw ValidationException::withMessages([
                'role' => 'Admin tidak boleh mengubah role dirinya sendiri.',
            ]);
        }

        // Admin tidak boleh mengubah role admin lain.
        if ($target->role === 'admin') {
            throw ValidationException::withMessages([
                'role' => 'Role admin tidak boleh diubah melalui fitur ini.',
            ]);
        }

        // Admin hanya boleh memberikan role customer atau staff.
        if (! in_array($newRole, self::ASSIGNABLE_ROLES, true)) {
            throw ValidationException::withMessages([
                'role' => 'Role yang dipilih tidak diizinkan.',
            ]);
        }

        // Role sama: tidak menyimpan dan tidak menghasilkan log.
        if ($target->role === $newRole) {
            return false;
        }

        // Simpan perubahan agar event Eloquent Observer dijalankan.
        $target->role = $newRole;

        return $target->save();
    }
}
