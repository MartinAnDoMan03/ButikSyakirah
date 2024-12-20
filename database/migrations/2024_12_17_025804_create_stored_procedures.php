<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Drop and create the GenerateOrderReport procedure
        DB::unprepared('DROP PROCEDURE IF EXISTS GenerateOrderReport');
        DB::unprepared("
            CREATE PROCEDURE GenerateOrderReport(
                IN start_date DATE, 
                IN end_date DATE
            )
            BEGIN
                SELECT 
                    o.order_id AS `Order ID`,
                    c.customer_name AS `Customer Name`,
                    o.order_date AS `Order Date`,
                    o.completion_date AS `Completion Date`,
                    o.status AS `Order Status`,
                    od.price AS `Total Price`
                FROM 
                    orders o
                LEFT JOIN 
                    customers c ON o.customer_id = c.customer_id
                LEFT JOIN 
                    order_details od ON o.order_id = od.order_id
                WHERE 
                    o.order_date BETWEEN start_date AND end_date
                ORDER BY 
                    o.order_date;
            END
        ");

        // Drop and create the GenerateSalesReport procedure
        DB::unprepared('DROP PROCEDURE IF EXISTS GenerateSalesReport');
        DB::unprepared("
            CREATE PROCEDURE GenerateSalesReport(
                IN start_date DATE, 
                IN end_date DATE
            )
            BEGIN
                SELECT 
                    o.order_id AS OrderID,
                    c.customer_name AS CustomerName,
                    od.price AS Price
                FROM 
                    orders o
                LEFT JOIN 
                    customers c ON o.customer_id = c.customer_id
                LEFT JOIN 
                    order_details od ON o.order_id = od.order_id
                WHERE 
                    o.order_date BETWEEN start_date AND end_date
                    AND o.status = 'Selesai'; -- Only include completed orders

                SELECT 
                    CalculateTotalSales(start_date, end_date) AS TotalSales;
            END
        ");

        DB::unprepared('
            CREATE PROCEDURE seamer_job()
            BEGIN
                INSERT INTO jobs (user_id, job_type, start_date)
                SELECT 
                    seamer_id AS user_id,
                    "seaming" AS job_type,
                    NOW() AS start_date
                FROM seams
                WHERE seam_status = "Belum-Selesai" AND seamer_id IS NOT NULL;
            END
        ');
        
        DB::unprepared('
            CREATE PROCEDURE sequiner_job()
            BEGIN
                -- Insert data into jobs table based on sequin table
                INSERT INTO jobs (user_id, job_type, start_date)
                SELECT 
                    sequiner_id AS user_id,
                    "sequining" AS job_type,
                    NOW() AS start_date
                FROM sequin
                WHERE sequiner_id IS NOT NULL;
            END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS GenerateOrderReport');
        DB::unprepared('DROP PROCEDURE IF EXISTS GenerateSalesReport');
    }
};
