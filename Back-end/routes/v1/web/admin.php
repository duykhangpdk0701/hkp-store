<?php

use App\Acl\Acl;
use App\Http\Controllers\Admin\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::prefix('/')->name('admin.')->group(function () {
    include('admin/auth.php');

    Route::middleware(['auth.admin', 'role_or_permission:' . Acl::ROLE_SUPER_ADMIN . '|' . Acl::ROLE_ADMIN . '|' . Acl::ROLE_STAFF . '|' . Acl::PERMISSION_VIEW_MENU_ADMIN . '|' . Acl::ROLE_SHIPPER])->group(function () {
        include('admin/dashboard.php');
        include('admin/user.php');
        include('admin/role.php');
        include('admin/address.php');
        include('admin/brand.php');
        include('admin/item-category.php');
        include('admin/item-color.php');
        include('admin/item-size.php');
        include('admin/item.php');
        include('admin/item-variant.php');
        include('admin/item-stock.php');
        include('admin/coupon-code-event.php');
        include('admin/coupon-code.php');
        include('admin/order.php');
        include('admin/order-status.php');
    });
});
