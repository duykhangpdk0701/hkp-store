<?php

namespace App\Repositories\QuoteDetail;

use App\Repositories\RepositoryInterface;

/**
 * The repository interface for the SysDistrict Model
 */
interface QuoteDetailRepositoryInterface extends RepositoryInterface
{
    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all();

    /**
     * @param $data
     * @return mixed
     */
    public function create($data);

    /**
     * @param $model
     * @param mixed $data
     * @return mixed
     */
    public function update($model, $data);

    /**
     * @param $model
     * @return bool
     */
    public function destroy($model);

    /**
     * @param int $id
     * @return mixed
     */
    public function find($id);

    /**
     * @param $quoteId
     * @return mixed
     */
    public function getWithItemAndSize($quoteId);

    /**
     * @param $quoteDetailId
     * @return mixed
     */
    public function findItemWithQuote($quoteDetailId);

    /**
     * @param $quoteId
     * @param $coupon
     * @return mixed
     */
    public function countCouponInQuote($quoteId, $coupon);
}
