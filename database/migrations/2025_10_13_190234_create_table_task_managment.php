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
        Schema::create('table_task_managment', function (Blueprint $table) {
            $table->id();
            $table->string('task_name');
            $table->string('task_category');
            $table->string('project');
            $table->string('assign_to');
            $table->date('start_date');
            $table->date('due_date');
            $table->string('description');
            $table->string('task_status')->default('In Process');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_task_managment');
    }
};
