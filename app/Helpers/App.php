<?php
use Illuminate\Database\Eloquent\ModelNotFoundException;


if (!function_exists('QueryModelsAll')) {
    function QueryModelsAll($models){

        $data =  "App\\Models\\".$models;
        if(!class_exists($data)){
            throw new ModelNotFoundException("Model \"$models\" not found.");
        }
        return $data::orderByDESC('id');
    }
}

if (!function_exists('alert_quantity')) {
    function alert_quantity($numbers){
        if ($numbers < 1) {
            return '<span class="badge bg-danger">غير متوافر</span>';
        } elseif ($numbers >= 1 && $numbers <=   3) {
            return '<span class="badge bg-warning">لقد قرب المنتج على الانتهاء</span>';
        } else {
            return '<span class="badge bg-success">' . $numbers . ' متوفر</span>';
        }
    }
}

if (!function_exists('check_coupons')){
    function check_coupons($id_coupons, $orderTotal)
    {
        $checkCoupons = \App\Models\Coupon::find($id_coupons);

        if (!$checkCoupons) {
            return response(['error' => 'The coupon was not found'], 404);
        }

        if (!$checkCoupons->status) {
            return response(['error' => 'The coupon is not active'], 404);
        }

        $currentDate = now()->toDateString();
        if ($currentDate < $checkCoupons->start_date || $currentDate > $checkCoupons->end_date) {
            return response(['error' => 'The coupon is expired or not yet valid'], 404);
        }

        if ($checkCoupons->times_used >= $checkCoupons->max_used) {
            return response(['error' => 'The coupon usage limit has been reached'], 404);
        }

        $discountAmount = 0;
        if ($checkCoupons->discount_type === 'cash') {
            $discountAmount = (float) $checkCoupons->discount_value;
        } elseif ($checkCoupons->discount_type === 'relative') {
            $discountPercentage = (float) $checkCoupons->discount_value;
            $discountAmount = $orderTotal * ($discountPercentage / 100);
        }
        $discountAmount = min($discountAmount, $orderTotal);
        $finalTotal = $orderTotal - $discountAmount;
        return response([
            'message' => 'The coupon is valid',
            'coupon' => $checkCoupons,
            'discount_amount' => $discountAmount,
            'final_total' => $finalTotal
        ], 200);
    }
}


