<?php

namespace App\Http\ViewComposers;

use App\Acl\Acl;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class SidebarComposer
{
    /**
     * 'active' should check current routes (put in child and parent Route::is array)
     * 'show' should be used to check the permission to view the menu item
     * 'child' if menu have no child, leave it empty, don't delete it.
     */
    protected $menuItems;

    /**
     * Create a new sidebar composer.
     *
     * @return void
     */
    public function __construct()
    {
        $this->menuItems = [
            [
                'title' => __('general.menu.dashboard'),
                'url' => route('admin.dashboard'),
                'icon' => 'home',
                'active' => Route::is(['admin.dashboard']),
                'show' => auth()->user()->hasAnyPermission([Acl::PERMISSION_VIEW_MENU_DASHBOARD]),
                'child' => []
            ],
            [
                'title' => __('general.menu.product_management.title'),
                'url' => '',
                'icon' => 'tag',
                'active' => Route::is(['admin.brand.*', 'admin.item_category.*', 'admin.item_size.*', 'admin.item.*', 'admin.item_stock.*', 'admin.item_color.*']),
                'show' => auth()->user()->hasAnyPermission([Acl::PERMISSION_BRAND_LIST, Acl::PERMISSION_ITEM_CATEGORY_LIST, Acl::PERMISSION_ITEM_COLOR_LIST, Acl::PERMISSION_ITEM_SIZE_LIST, Acl::PERMISSION_ITEM_LIST, Acl::PERMISSION_ITEM_STOCK_LIST]),
                'child' => [
                    [
                        'title' => __('general.menu.product_management.brand'),
                        'url' => route('admin.brand.index'),
                        'active' => Route::is('admin.brand.*'),
                        'show' => auth()->user()->hasAnyPermission([Acl::PERMISSION_BRAND_LIST]),
                    ],
                    [
                        'title' => __('general.menu.product_management.category'),
                        'url' => route('admin.item_category.index'),
                        'active' => Route::is('admin.item_category.*'),
                        'show' => checkPermissions([Acl::PERMISSION_ITEM_CATEGORY_LIST]),
                    ],
                    [
                        'title' => __('general.menu.product_management.color'),
                        'url' => route('admin.item_color.index'),
                        'active' => Route::is('admin.item_color.*'),
                        'show' => checkPermissions([Acl::PERMISSION_ITEM_COLOR_LIST]),
                    ],
                    [
                        'title' => __('general.menu.product_management.size'),
                        'url' => route('admin.item_size.index'),
                        'active' => Route::is('admin.item_size.*'),
                        'show' => checkPermissions([Acl::PERMISSION_ITEM_SIZE_LIST]),
                    ],
                    [
                        'title' => __('general.menu.product_management.item'),
                        'url' => route('admin.item.index'),
                        'active' => Route::is('admin.item.*'),
                        'show' => checkPermissions([Acl::PERMISSION_ITEM_LIST]),
                    ],
                    [
                        'title' => __('general.menu.product_management.item_stock'),
                        'url' => route('admin.item_stock.index'),
                        'active' => Route::is('admin.item_stock.*'),
                        'show' => checkPermissions([Acl::PERMISSION_ITEM_STOCK_LIST]),
                    ]
                ],
            ],
            [
                'title' => __('general.menu.order_management.title'),
                'url' => route('admin.order.index'),
                'icon' => 'shopping-bag',
                'active' => Route::is(['admin.order.*']),
                'show' => checkPermissions([Acl::PERMISSION_ORDER_LIST]),
                'child' => [],
            ],
            [
                'title' => __('general.menu.user_management.title'),
                'url' => '',
                'icon' => 'users',
                'active' => Route::is(['admin.user.*', 'admin.role.*']),
                'show' => auth()->user()->hasAnyPermission([Acl::PERMISSION_USER_LIST, Acl::PERMISSION_VIEW_MENU_ROLE_PERMISSION]),
                'child' => [
                    [
                        'title' => __('general.menu.user_management.user'),
                        'url' => route('admin.user.index'),
                        'active' => Route::is('admin.user.*'),
                        'show' => auth()->user()->hasAnyPermission([Acl::PERMISSION_USER_LIST]),
                    ],
                    [
                        'title' => __('general.menu.user_management.role'),
                        'url' => route('admin.role.index'),
                        'active' => Route::is('admin.role.*'),
                        'show' => auth()->user()->hasAnyPermission([Acl::PERMISSION_VIEW_MENU_ROLE_PERMISSION]),
                    ],
                ],
            ],
            [
                'title' => __('general.menu.banner_management.title'),
                'url' => '',
                'icon' => 'tag',
                'active' => Route::is(['admin.coupon-code.*']),
                'show' => auth()->user()->hasAnyPermission([Acl::PERMISSION_COUPON_LIST]),
                'child' => [
                    [
                        'title' => __('general.menu.banner_management.coupons'),
                        'url' => route('admin.coupon-code.index'),
                        'active' => Route::is('admin.coupon-code.*'),
                        'show' => auth()->user()->hasAnyPermission([Acl::PERMISSION_COUPON_LIST]),
                    ]
                ],
            ],
            [
                'title' => __('general.menu.api-docs.title'),
                'url' => route('scribe'),
                'icon' => 'file-text',
                'active' => Route::is(['scribe']),
                'show' => auth()->user()->hasAnyPermission([Acl::PERMISSION_VIEW_API_DOCUMENTATION]),
                'child' => [],
            ]
        ];
    }

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('menuItems', $this->menuItems);
    }
}
