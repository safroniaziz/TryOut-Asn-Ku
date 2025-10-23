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
        Schema::table('activity_log', function (Blueprint $table) {
            // Add indexes for frequently queried columns
            $table->index(['causer_id', 'created_at'], 'activity_log_causer_created_index');
            $table->index(['log_name', 'created_at'], 'activity_log_log_name_created_index');
            $table->index(['created_at'], 'activity_log_created_at_index');
            $table->index(['causer_type', 'causer_id'], 'activity_log_causer_type_id_index');
            $table->index(['subject_type', 'subject_id'], 'activity_log_subject_type_id_index');
            $table->index(['log_name'], 'activity_log_log_name_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('activity_log', function (Blueprint $table) {
            // Drop indexes
            $table->dropIndex('activity_log_causer_created_index');
            $table->dropIndex('activity_log_log_name_created_index'); 
            $table->dropIndex('activity_log_created_at_index');
            $table->dropIndex('activity_log_causer_type_id_index');
            $table->dropIndex('activity_log_subject_type_id_index');
            $table->dropIndex('activity_log_log_name_index');
        });
    }
};
