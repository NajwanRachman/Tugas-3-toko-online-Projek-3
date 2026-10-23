<?php

namespace Tests\Unit;

use App\Models\User;
use App\Services\RoleManagementService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class RoleManagementServiceTest extends TestCase
{
    public function test_admin_cannot_change_own_role(): void
    {
        // Membuat objek admin tanpa mengambil data dari database.
        $admin = new User();

        $admin->setRawAttributes([
            'id_user' => '1',
            'role' => 'admin',
        ]);

        // Simulasikan admin yang sedang login.
        Auth::shouldReceive('user')
            ->once()
            ->andReturn($admin);

        try {
            app(RoleManagementService::class)
                ->changeRole($admin, 'staff');

            $this->fail(
                'Perubahan role admin seharusnya ditolak.'
            );
        } catch (ValidationException $e) {
            $this->assertArrayHasKey('role', $e->errors());

            $this->assertSame(
                'Admin tidak boleh mengubah role dirinya sendiri.',
                $e->errors()['role'][0]
            );
        }

        // Pastikan objek admin tidak berubah.
        $this->assertSame('admin', $admin->role);
    }
}
