<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->renameColumn('price', 'price_master');
        });

        Schema::table('services', function (Blueprint $table) {
            $table->decimal('price_top_master', 4, 0)->default(0);
            $table->dropColumn(['master', 'top_master']);
        });
    }

    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn('price_top_master');
            $table->string('master')->nullable();
            $table->string('top_master')->nullable();
        });

        Schema::table('services', function (Blueprint $table) {
            $table->renameColumn('price_master', 'price');
        });
    }
};

