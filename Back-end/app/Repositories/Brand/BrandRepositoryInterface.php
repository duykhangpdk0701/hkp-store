<?php

namespace App\Repositories\Brand;

use App\Repositories\RepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * The repository interface for the Brand Model
 */
interface BrandRepositoryInterface extends RepositoryInterface
{
    /**
     * Filter The Request
     *
     * @var array $searchParams
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function serverFilterFor(array $searchParams);

    /**
     * Filter the request from the api
     *
     * @param array $searchParams
     * @return LengthAwarePaginator
     */
    public function serverPaginationFilterForApi(array $searchParams): LengthAwarePaginator;

    /**
     * Toggle status of the current resource
     *
     * @param $model
     */
    public function toggleStatus($model);
}
