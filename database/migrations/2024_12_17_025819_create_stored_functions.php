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
        DB::unprepared("
            CREATE FUNCTION CalculateTotalSales(
    start_date DATE, 
    end_date DATE
) RETURNS DECIMAL(10, 2)
DETERMINISTIC
READS SQL DATA
BEGIN
    DECLARE total_sales DECIMAL(10, 2);

    SELECT 
        SUM(od.price) 
    INTO 
        total_sales
    FROM 
        orders o
    LEFT JOIN 
        order_details od ON o.order_id = od.order_id
    WHERE 
        o.order_date BETWEEN start_date AND end_date
        AND o.status = 'Selesai';

    RETURN IFNULL(total_sales, 0);
END
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared("DROP FUNCTION IF EXISTS CalculateTotalSales");
    }
};
