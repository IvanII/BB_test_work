<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\User;
use Illuminate\Http\Request;

class CouponPoolController extends Controller
{
    public function index()
    {
        return view('coupons.index', [
            'users' => User::all(),
            'coupons' => Coupon::all(),
        ]);
    }

    public function obtainCoupon($id)
    {
        \Log::info("The coupon had been obtained by user:{$id}");
        return redirect(route('coupons.index'));
    }

    public function releaseCoupons()
    {
        \Log::info('All coupons were successfully released!');
        return redirect(route('coupons.index'));
    }
}
