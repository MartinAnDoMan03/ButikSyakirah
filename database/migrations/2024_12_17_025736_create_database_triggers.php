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
                SELECT NEW.stock_id, \'Supplier\', ss.supplier_id, \'Addition\', NEW.quantity - OLD.quantity, CURRENT_DATE
                FROM stock_suppliers ss WHERE ss.stock_id = NEW.stock_id;
            END IF;
            END
        ');


        DB::unprepared('
            CREATE TRIGGER stock_run_out BEFORE UPDATE ON stocks FOR EACH ROW
            BEGIN
            IF NEW.quantity < 0 THEN
               SIGNAL SQLSTATE \'45000\'
        SET MESSAGE_TEXT = \'Stok tidak mencukupi\';
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
