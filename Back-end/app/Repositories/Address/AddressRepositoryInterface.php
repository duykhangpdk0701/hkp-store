<?php

namespace App\Repositories\Address;

use App\Repositories\RepositoryInterface;

/**
 * The repository interface for the Address Model
 */
interface AddressRepositoryInterface extends RepositoryInterface
{
  public function setAsDefault($model);
}
