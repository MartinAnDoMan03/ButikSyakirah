<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared('
            CREATE TRIGGER log_new_stock AFTER INSERT ON stocks
            FOR EACH ROW
            BEGIN
                INSERT INTO inventory_logs (stock_id, reference_type, supplier_reference_id, transaction_type, quantity, transaction_date)
                SELECT NEW.stock_id, \'Supplier\', ss.supplier_id, \'Addition\', NEW.quantity, CURRENT_DATE
                FROM stock_suppliers ss WHERE ss.stock_id = NEW.stock_id;
            END
        ');

        DB::unprepared('
            CREATE TRIGGER log_stock_update AFTER UPDATE ON stocks FOR EACH ROW
            BEGIN
            IF NEW.quantity != OLD.quantity THEN
                INSERT INTO inventory_logs (stock_id, reference_type, supplier_reference_id, transaction_type, quantity, transaction_date)
                VALUES (NEW.stock_id, "Supplier", NULL, "Addition", NEW.quantity - OLD.quantity, CURRENT_DATE);
            END IF;
            END
        ');

        DB::unprepared("
        CREATE TRIGGER after_order_status_update
        AFTER UPDATE ON orders
        FOR EACH ROW
        BEGIN
    -- Check if the status has actually changed
    IF OLD.status != NEW.status THEN
        -- Insert a log into the order_logs table
        INSERT INTO order_logs (order_id, old_status, new_status, created_at, updated_at)
        VALUES (NEW.order_id, OLD.status, NEW.status, NOW(), NOW());
    END IF;
END");

        DB::unprepared("
        CREATE TRIGGER cutter_job
        AFTER INSERT ON size_details
        FOR EACH ROW
        BEGIN
        INSERT INTO jobs (user_id, job_type, start_date)
    VALUES (3, 'cutting', CURRENT_TIMESTAMP);
END");
    }




    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('database_triggers');
        DB::unprepared('DROP TRIGGER IF EXISTS log_stock_update');
    }
};
