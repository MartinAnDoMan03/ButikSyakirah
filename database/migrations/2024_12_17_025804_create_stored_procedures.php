<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
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
        GROUP BY 
            o.order_id
        ORDER BY 
            o.order_date;
    END
");



    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stored_procedures');
        DB::unprepared('DROP PROCEDURE IF EXISTS GenerateOrderReport');
    }
};
