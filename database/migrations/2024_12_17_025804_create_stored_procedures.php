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
                -- Select the sales report details directly
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

        // Drop and create the GenerateInvoice procedure
        DB::unprepared('DROP PROCEDURE IF EXISTS GenerateInvoice');
        DB::unprepared("
            CREATE PROCEDURE GenerateInvoice(
                IN order_id INT
            )
            BEGIN
                -- Select invoice details
                SELECT 
                    o.order_id AS OrderID,
                    c.customer_name AS CustomerName,
                    o.order_date AS OrderDate,
                    o.completion_date AS CompletionDate,
                    o.status AS Status,
                    (
                        SELECT SUM(od.price) 
                        FROM order_details od 
                        WHERE od.order_id = o.order_id
                    ) AS TotalCost
                FROM 
                    orders o
                LEFT JOIN 
                    customers c ON o.customer_id = c.customer_id
                WHERE 
                    o.order_id = order_id;

                -- Select menu items for the invoice
                SELECT 
                    od.menu_name AS MenuName,
                    od.price AS Price
                FROM 
                    order_details od
                WHERE 
                    od.order_id = order_id;
            END
        ");

        
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
