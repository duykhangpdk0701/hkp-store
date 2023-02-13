<?php

namespace App\Repositories\CouponCodeEvent;

use App\Models\CouponCodeEvent;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use Session;

/**
 * The repository for Coupon Code Model
 */
class CouponCodeEventRepository extends BaseRepository implements CouponCodeEventRepositoryInterface
{
    /**
     * @inheritdoc
     */
    protected $model;

    /**
     * @inheritdoc
     */
    public function __construct(CouponCodeEvent $model)
    {
        $this->model = $model;
        parent::__construct($model);
    }

    /**
     * @inheritdoc
     */
    public function create($data)
    {
        try {
            DB::beginTransaction();

            $cpevent = $this->model->create($data);

            DB::commit();
            return $cpevent;
        }catch (\Exception $e){
            DB::rollback();
            return false;
        }
    }

    /**
     * @inheritdoc
     */
    public function update($model, $data)
    {
        try {
            DB::beginTransaction();

            $cpevent = tap($model)->update($data);

            DB::commit();
            return $cpevent;
        }catch (\Exception $e){
            DB::rollback();
            return false;
        }
    }

    /**
     * @inheritdoc
     */
    public function destroy($model)
    {
        if ($model->couponCode->count()) {
            session()->flash(NOTIFICATION_ERROR, __('error.coupon_code_events.delete', ['name' => 'coupon codes']));
            return $model;
        }
        $model->delete();
        return session()->flash(NOTIFICATION_SUCCESS, __('success.delete', ['resource' => $model->name]));
    }
}
