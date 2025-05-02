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
        Schema::create('task_solutions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('issue_id')->constrained('task_issues')->onDelete('cascade');
            $table->text('solution_text');
            $table->foreignId('solved_by')->nullable()->constrained('users');
            $table->timestamp('solved_at')->useCurrent();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_solutions');
    }
};
