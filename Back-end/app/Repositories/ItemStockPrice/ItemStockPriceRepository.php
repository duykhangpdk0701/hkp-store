<?php

namespace App\Repositories\ItemStockPrice;

use App\Models\ItemStockPrice;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

/**
 * The repository for Item Stock Price Model
 */
class ItemStockPriceRepository extends BaseRepository implements ItemStockPriceRepositoryInterface
{
    /**
     * @inheritdoc
     */
    protected $model;

    /**
     * @inheritdoc
     */
    public function __construct(ItemStockPrice $model)
    {
        $this->model = $model;
        parent::__construct($model);
    }
}

