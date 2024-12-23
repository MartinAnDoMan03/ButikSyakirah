<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
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
            GROUP BY jobs.job_id, users.user_id, users.name, jobs.job_type
        ');

        DB::statement('DROP VIEW IF EXISTS sequiner_view');
        DB::unprepared('
            CREATE VIEW sequiner_view AS
            SELECT 
                orders.order_id,
                order_details.order_detail_id,
                customers.customer_name,
                orders.order_date,
                orders.completion_date,
                order_details.sequin,
                order_details.note,
                sequin.sequin_status,
                sequin.sequiner_id,
                orders.status
            FROM 
                orders
                JOIN order_details ON orders.order_id = order_details.order_id
                JOIN sequin ON order_details.order_detail_id = sequin.order_detail_id
                JOIN customers ON orders.customer_id = customers.customer_id
        ');

        DB::statement('DROP VIEW IF EXISTS seamer_view');
        DB::unprepared('
            CREATE VIEW seamer_view AS
            SELECT 
                orders.order_id,
                order_details.order_detail_id,
                customers.customer_name,
                orders.order_date,
                orders.completion_date,
                order_details.order_type,
                order_details.store_cloth_type,
                order_details.store_cloth_length,
                order_details.note,
                size_details.chest_circumference,
                size_details.waist_circumference,
                size_details.arm_circumference,
                size_details.arm_length,
                size_details.shoulder_width,
                size_details.hip,
                size_details.wrist_circumference,
                size_details.clothes_length,
                seams.seamer_id,
                seams.seam_status
            FROM 
                orders
                JOIN order_details ON orders.order_id = order_details.order_id
                JOIN seams ON order_details.order_detail_id = seams.order_detail_id
                JOIN customers ON orders.customer_id = customers.customer_id
                JOIN size_details ON order_details.order_detail_id = size_details.order_detail_id
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop the views correctly
        DB::statement('DROP VIEW IF EXISTS job_view');
        DB::statement('DROP VIEW IF EXISTS sequiner_view');
        DB::statement('DROP VIEW IF EXISTS seamer_view');
    }
};
