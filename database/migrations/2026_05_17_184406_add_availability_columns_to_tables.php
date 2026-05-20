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
        if (!Schema::hasColumn('tour_packages', 'total_seats')) {
            Schema::table('tour_packages', function (Blueprint $table) {
                $table->integer('total_seats')->default(50);
            });
        }
        if (!Schema::hasColumn('tour_packages', 'available_seats')) {
            Schema::table('tour_packages', function (Blueprint $table) {
                $table->integer('available_seats')->default(50);
            });
        }

        if (!Schema::hasColumn('hotels', 'total_rooms')) {
            Schema::table('hotels', function (Blueprint $table) {
                $table->integer('total_rooms')->default(50);
            });
        }
        if (!Schema::hasColumn('hotels', 'available_rooms')) {
            Schema::table('hotels', function (Blueprint $table) {
                $table->integer('available_rooms')->default(50);
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tour_packages', function (Blueprint $table) {
            $table->dropColumn(['total_seats', 'available_seats']);
        });

        Schema::table('hotels', function (Blueprint $table) {
            $table->dropColumn(['total_rooms', 'available_rooms']);
        });
    }
};
