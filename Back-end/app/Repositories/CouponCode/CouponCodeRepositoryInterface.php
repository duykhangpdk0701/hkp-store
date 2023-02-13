<?php

namespace App\Repositories\CouponCode;

use App\Repositories\RepositoryInterface;

/**
 * The repository interface for the Coupon Code Model
 */
interface CouponCodeRepositoryInterface extends RepositoryInterface
{
    public function getCoupon($id);
    public function saveRandomCode($post);

    /**
     * Get coupon code
     * @return mixed
     */
    public function getCouponCode(array $params = []);

    /**
     * @param $code
     * @return mixed
     */
    public function findCouponByCode($code);
}
