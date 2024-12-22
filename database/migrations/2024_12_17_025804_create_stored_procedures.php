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
                    o.price AS `Total Price`
                FROM 
                    orders o
                LEFT JOIN 
                    customers c ON o.customer_id = c.customer_id
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
                    o.price AS Price
                FROM 
                    orders o
                LEFT JOIN 
                    customers c ON o.customer_id = c.customer_id
                WHERE 
                    o.order_date BETWEEN start_date AND end_date
                    AND o.status = 'Selesai'; -- Only include completed orders

                SELECT 
                   CalculateTotalIncomeByDate(start_date, end_date) AS TotalSales;
            END
        ");

        DB::unprepared('DROP PROCEDURE IF EXISTS InsertJob');
        
        DB::unprepared('
            CREATE PROCEDURE InsertJob(
                IN userId INT,
                IN jobType ENUM("seaming", "cutting", "sequining"),
                IN startDate DATE
            )
            BEGIN
                INSERT INTO jobs (user_id, job_type, start_date)
                VALUES (userId, jobType, startDate);
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
