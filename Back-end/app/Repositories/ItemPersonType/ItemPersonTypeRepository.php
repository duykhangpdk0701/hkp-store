<?php

namespace App\Repositories\ItemPersonType;

use App\Models\ItemPersonType;
use App\Repositories\BaseRepository;
use Illuminate\Support\Str;

/**
 * The repository for Item Person Type Model
 */
class ItemPersonTypeRepository extends BaseRepository implements ItemPersonTypeRepositoryInterface
{
    /**
     * @inheritdoc
     */
    protected $model;

    /**
     * @inheritdoc
     */
    public function __construct(ItemPersonType $model)
    {
        $this->model = $model;
        parent::__construct($model);
    }

    /**
     * @inheritDoc
     */
    public function findByCode($code)
    {
        return $this->model->where('code', $code)->first();
    }
}
