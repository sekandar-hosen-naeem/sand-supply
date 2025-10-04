<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('vehicle_trips', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_id')->constrained('vehicles')->onDelete('cascade');
            $table->string('driver_name');
            $table->date('trip_date');
            $table->foreignId('source_point_id')->constrained('sale_points')->onDelete('cascade');
            $table->foreignId('destination_point_id')->constrained('buyers')->onDelete('cascade');
            $table->decimal('quantity_cft', 10, 2);
            $table->decimal('rate_per_cft', 10, 2);
            $table->decimal('total_amount', 15, 2);
            $table->text('remarks')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vehicle_trips');
    }
};
