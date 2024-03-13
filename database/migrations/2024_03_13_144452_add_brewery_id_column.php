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
            $table->foreignId('brewery_id')
                ->after('name')
                ->nullable()
                ->constrained(
                    table: 'breweries',
                    indexName: 'beers_brewery_id'
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
            $table->dropColumn('brewery_id');
        });
    }
};
