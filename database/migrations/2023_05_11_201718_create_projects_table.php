<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('venture_id');
            $table->string('project_name')->unique();
            $table->string('project_name_slug');
            $table->integer('number_of_plot', false);
            $table->float('square_feet_price', 8, 2);
            $table->tinyInteger('sales_status')->default(0)->comment('0 => not sale, 1 => sale');
            $table->timestamps();

            $table->foreign('venture_id')
                ->references('id')
                ->on('ventures');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
