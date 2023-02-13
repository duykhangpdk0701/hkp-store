<?php

namespace App\Repositories\Brand;

use App\Models\Brand;
use App\Repositories\BaseRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

/**
 * The repository for Brand Model
 */
class BrandRepository extends BaseRepository implements BrandRepositoryInterface
{
    /**
     * @inheritdoc
     */
    protected $model;

    const PER_PAGE = 100;

    /**
     * @inheritdoc
     */
    public function __construct(Brand $model)
    {
        $this->model = $model;
        parent::__construct($model);
    }

    /**
     * @inheritDoc
     */
    public function serverFilterFor($searchParams)
    {
        $isShow = Arr::get($searchParams, 'is_show', false);

        $query = $this->model->query();

        if ($isShow) {
            $query->where('status', CONST_ENABLE);
        }

        return $query->get();
    }

    /**
     * @inheritDoc
     */
    public function serverPaginationFilterForApi($searchParams): LengthAwarePaginator
    {
        $isShow = Arr::get($searchParams, 'is_show', true);
        $limit = Arr::get($searchParams, 'limit', SELF::PER_PAGE);

        $query = $this->model->query();

        if ($isShow) {
            $query->where('status', CONST_ENABLE);
        }

        return $query->paginate($limit);
    }

    /**
     * @inheritdoc
     */
    public function create($data)
    {
        $data['slug'] = Str::slug($data['slug'], '-');

        if (!$data['slug']) {
            $data['slug'] = $this->generateSlug($data['name']);
        }

        $this->resetCache();

        return $this->model->create($data);
    }

    /**
     * @inheritdoc
     */
    public function update($model, $data)
    {
        $data['slug'] = $this->generateSlug($data['name'], $model->id);

        $this->resetCache();

        return $model->update($data);
    }

    /**
     * @inheritdoc
     */
    public function toggleStatus($model)
    {
        $brand = $model->update(['status' => !$model->status]);

        $this->resetCache();

        return $brand;
    }

    /**
     * @inheritdoc
     */
    public function destroy($model)
    {
        if ($model->items->count()) {
            session()->flash(NOTIFICATION_ERROR, __('error.brand.delete', ['name' => 'items']));
            return $model;
        }
        $model->delete();
        $this->resetCache();
        return session()->flash(NOTIFICATION_SUCCESS, __('success.brand.delete', ['brand' => $model->name]));
    }

    public function checkSlugExist($slug, $id = null)
    {
        return $this->model->where('id', '!=', $id)->where('slug', $slug)->first();
    }

    /**
     * Generate slug
     */
    function generateSlug($name, $id = null)
    {
        $slug = Str::slug($name, '-');
        $checkSlug = $this->checkSlugExist($slug, $id);
        while ($checkSlug) {
            $slug = $slug . '-1';
            $checkSlug = $this->checkSlugExist($slug, $id);
        }
        return $slug;
    }

    /**
     * Reset all the caches store for this resource
     *
     * @return void
     */
    function resetCache()
    {
        Cache::forget(Brand::CACHE_SUB_NAVBAR);
    }
}
