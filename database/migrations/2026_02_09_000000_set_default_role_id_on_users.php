<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Set a default value for role_id at the database level so signups
        // that do not provide it will default to a normal user (2).
        // This uses a raw statement compatible with MySQL.
        DB::statement('ALTER TABLE `users` MODIFY `role_id` BIGINT UNSIGNED NOT NULL DEFAULT 2');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Remove the default, but keep the column not null
        DB::statement('ALTER TABLE `users` MODIFY `role_id` BIGINT UNSIGNED NOT NULL');
    }
};
