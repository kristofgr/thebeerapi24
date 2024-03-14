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
        Schema::table('beers', function (Blueprint $table) {
            $table->foreignId('color_id')
                ->after('description')
                ->nullable()
                ->constrained(
                    table: 'colors',
                    indexName: 'beers_color_id'
                )
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('beers', function (Blueprint $table) {
            $table->dropForeign('beers_color_id');
            $table->dropColumn('color_id');
        });
    }
};
