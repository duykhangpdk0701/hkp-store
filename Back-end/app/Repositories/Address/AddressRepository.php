<?php

namespace App\Repositories\Address;

use App\Models\Address;
use App\Repositories\BaseRepository;

/**
 * The repository for Address Model
 */
class AddressRepository extends BaseRepository implements AddressRepositoryInterface
{
  /**
   * @inheritdoc
   */
  protected $model;


  /**
   * @inheritdoc
   */
  public function __construct(Address $model)
  {
    $this->model = $model;
    parent::__construct($model);
  }


  /**
   * @inheritdoc
   */
  public function create($data)
  {
    $address = $this->model->create([
      'user_id' => auth()->id(),
      'name' => $data['name'],
      'city_id' => $data['city_id'],
      'district_id' => $data['district_id'],
      'ward_id' => $data['ward_id'] ?? NULL,
      'address' => $data['address']
    ]);

    return $this->setAsDefault($address);
  }

  /**
   * @inheritdoc
   */
  public function update($model, $data)
  {
    if (auth()->id() == $model->user_id) {
      return $model->update($data);
    }
    return false;
  }

  /**
   * @inheritdoc
   */
  public function destroy($model)
  {
    if (auth()->id() == $model->user_id && $model->status != CONST_ENABLE) {
      return $model->delete();
    }
    return false;
  }

  public function setAsDefault($model)
  {
    if (auth()->id() == $model->user_id) {
      $modelExist = $this->findActiveByUserId(auth()->id());
      if ($modelExist)
        $modelExist->update(['status' => CONST_DISABLE]);
      return $model->update(['status' => CONST_ENABLE]);
    }
    return false;
  }

  public function findActiveByUserId($user_id)
  {
    $result = $this->model->where('status', CONST_ENABLE)->where('user_id', $user_id)->first();
    if (!empty($result)) {
      return $result;
    }
    return false;
  }
}
