<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Contracts\Logging\Log;

class CouponPoolController extends Controller
{

    /**
     * @var Log
     */
    private $logger;

    public function __construct(Log $logger)
    {
        $this->logger = $logger;
    }

    /**
     * Get list of users and free coupons
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('coupons.index', [
            'users' => User::all(),
            'coupons' => Coupon::whereNull('user_id')->get(),
        ]);
    }

    /**
     * Specific user obtain coupon
     *
     * @param $userId int
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function obtainCoupon(Request $request)
    {
        $userId = $request->request->get('user_id');

        try {
            Coupon::obtain($userId);
            Redis::set('next_obtain_time', time() + 10);
            $this->logger->info("The coupon had been obtained by user:{$userId}");
        } catch (\Exception $e) {
            $this->logger->error($e->getMessage());
        }

        return redirect(route('coupons.index'));
    }

    /**
     * Release all coupons
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function releaseCoupons()
    {
        try {
            Coupon::release();
            $this->logger->info('All coupons were successfully released!');
        } catch (\Exception $e) {
            $this->logger->error($e->getMessage());
        }

        return redirect(route('coupons.index'));
    }
}
