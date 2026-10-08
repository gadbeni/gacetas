<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * The `file` column stores a JSON payload (S3 path + original name)
     * which easily exceeds 255 characters.
     */
    public function up(): void
    {
        DB::statement('ALTER TABLE publications MODIFY `file` TEXT NULL');
    }

    public function down(): void
    {
        DB::statement('ALTER TABLE publications MODIFY `file` VARCHAR(255) NULL');
    }
};
