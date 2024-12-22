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
        DB::unprepared("DROP FUNCTION IF EXISTS CalculateTotalIncomeByDate");
        DB::unprepared("
            CREATE FUNCTION CalculateTotalIncomeByDate(start_date DATE, end_date DATE)
            RETURNS DECIMAL(10, 2)
            DETERMINISTIC
            BEGIN
                DECLARE total_income DECIMAL(10, 2);

                SELECT SUM(price) INTO total_income
                FROM orders
                WHERE order_date BETWEEN start_date AND end_date;

                RETURN IFNULL(total_income, 0);
            END
        ");

        DB::unprepared("DROP FUNCTION IF EXISTS calculate_order_price");
        DB::unprepared("
            CREATE FUNCTION calculate_order_price(order_id INT) 
            RETURNS DECIMAL(10,2)
            DETERMINISTIC
            BEGIN
                DECLARE total_price DECIMAL(10,2) DEFAULT 0;

                SELECT SUM(price)
                INTO total_price
                FROM order_details od
                WHERE od.order_id = order_id;

                RETURN total_price;
            END
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared("DROP FUNCTION IF EXISTS CalculateTotalIncomeByDate");
        DB::unprepared("DROP FUNCTION IF EXISTS calculate_order_price");
    }
};
