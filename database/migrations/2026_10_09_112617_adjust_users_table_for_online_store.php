<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('id', 'id_user');
            $table->renameColumn('name', 'nama_lengkap');

            $table->string('username', 50)->unique()->after('email');
            $table->string('no_hp', 15)->after('password');
            $table->text('alamat')->after('no_hp');

            $table->dropColumn('email_verified_at');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropUnique(['username']);
            $table->dropColumn(['username', 'no_hp', 'alamat']);

            $table->renameColumn('id_user', 'id');
            $table->renameColumn('nama_lengkap', 'name');

            $table->timestamp('email_verified_at')->nullable();
        });
    }
};
