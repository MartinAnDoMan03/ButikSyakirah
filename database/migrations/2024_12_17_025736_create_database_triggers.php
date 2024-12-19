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

        DB::unprepared('
            CREATE TRIGGER log_deduction_on_order AFTER INSERT ON order_details FOR EACH ROW 
            BEGIN
            IF NEW.store_cloth IS NOT NULL THEN
                UPDATE stocks SET quantity = quantity - NEW.store_cloth WHERE stock_name = \'Cloth\';
                INSERT INTO inventory_logs (stock_id, reference_type, order_reference_id, transaction_type, quantity, transaction_date)
            VALUES ((SELECT stock_id FROM stocks WHERE stock_name = \'Cloth\'), \'Order\', NEW.order_id, \'Deduction\', NEW.store_cloth, CURRENT_DATE);
            END IF;
            END
        ');
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
