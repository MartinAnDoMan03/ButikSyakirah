<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
    //    DB::unprepared('
    //      CREATE TRIGGER log_new_stock
    //         AFTER INSERT ON stocks
    //         FOR EACH ROW
    //         BEGIN
    //             INSERT INTO inventory_logs(stock_id, "reference_type", supplier_id, transaction_type, quantity, transaction_date)
    //             VALUES (NEW.stock_id, \'supplier\', NEW.supplier_id, \'addition\', NEW.quantity, CURRENT_TIMESTAMP);
    //         END
    //    ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('database_triggers');
    }
};
