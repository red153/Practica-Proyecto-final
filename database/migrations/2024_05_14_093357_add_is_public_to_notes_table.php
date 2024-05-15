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
        Schema::table('notes', function (Blueprint $table) {
            Schema::table('notes', function (Blueprint $table) {
                $table->boolean('isPublic')->default(false)->after('importancia');
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('notes', function (Blueprint $table) {
            Schema::table('notes', function (Blueprint $table) {
                $table->dropColumn('isPublic');
            });
        });
    }
};
