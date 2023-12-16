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
        Schema::table('settings', function (Blueprint $table) {
            $table->string('aname');
            $table->text('moh');
            $table->text('abio');
            $table->string('aphoto');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn('aname');
            $table->dropColumn('moh');
            $table->dropColumn('abio');
            $table->dropColumn('aphoto');
        });
    }
};
