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
        Schema::table('users', function (Blueprint $table) {
            $table->string('google_id')->nullable()->unique()->after('email');
            $table->string('profile_image')->nullable()->after('google_id');
            $table->string('referral_code')->nullable()->unique()->after('remember_token');
            $table->unsignedBigInteger('referred_by')->nullable()->after('referral_code');
            $table->decimal('wallet_balance', 10, 2)->default(0.00)->after('referred_by');
            $table->integer('reward_points')->default(0)->after('wallet_balance');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'google_id',
                'profile_image',
                'referral_code',
                'referred_by',
                'wallet_balance',
                'reward_points',
            ]);
        });
    }
};
