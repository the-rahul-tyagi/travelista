<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "Today's Date: " . now()->toDateString() . "\n\n";

$coupons = \App\Models\Coupon::all();
foreach ($coupons as $coupon) {
    echo "--- Checking Code: {$coupon->code} ---\n";
    echo "Is Active (bool): " . ($coupon->is_active ? 'True' : 'False') . "\n";
    echo "Expires At: " . ($coupon->expires_at ? $coupon->expires_at->toDateString() : 'Never') . "\n";
    echo "Is Past? " . ($coupon->expires_at && $coupon->expires_at->isPast() ? 'Yes' : 'No') . "\n";
    echo "Is Valid? " . ($coupon->isValid() ? 'Yes' : 'No') . "\n";
    echo "Discount for amount 10000: " . $coupon->calculateDiscount(10000) . "\n\n";
}
