<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement('DROP VIEW IF EXISTS job_view');
        DB::unprepared('
            CREATE VIEW job_view AS
            SELECT 
                jobs.job_id,
                users.user_id,
                users.name,
                jobs.job_type,
                CURDATE() AS start_date
            FROM jobs
            LEFT JOIN users ON users.user_id = jobs.user_id
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop the view correctly
        DB::statement('DROP VIEW IF EXISTS job_view');
    }
};
