<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Redis;
use Closure;

class CheckObtainAllow
{
    /**
     * @param $request
     * @param Closure $next
     * @param null $guard
     * @return $this|mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $nextObtainTime = Redis::get('next_obtain_time');

        if (empty($nextObtainTime)) {

            return $next($request);
        }

        if (time() >= $nextObtainTime) {

            return $next($request);
        }

        return redirect(route('coupons.index'))
                ->withErrors('You can\'t add a coupon more than once every 10 seconds');
    }
}

