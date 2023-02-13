<?php

namespace App\Repositories\Quote;

use App\Repositories\RepositoryInterface;

/**
 * The repository interface for the SysDistrict Model
 */
interface QuoteRepositoryInterface extends RepositoryInterface
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

    public function getQuoteWithRelation($id);

    public function getQuoteByUser($userId);
}
