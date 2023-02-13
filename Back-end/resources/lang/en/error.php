<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Error Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during error for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'message' => 'There is an error: :message',
    'exception' => 'There is an exception error, please try again later!',

    'brand' => [
        'delete' => 'There are :name using this brand. Cannot delete!'
    ],
    'item_category' => [
        'delete' => 'There are :name using this category. Cannot delete!'
    ],
    'item_size' => [
        'add' => 'No more size to add',
        'delete' => 'There are :name using this size. Cannot delete!'
    ],
    'item' => [
        '23000' => 'There are stocks in the variants using this size',
        'cannot_processed' => 'This item cannot be processed'
    ],
    'item_variant' => [
        'not_found' => 'There are no variants available'
    ],
    'item_stock' => [
        'not_found' => 'There are no stocks available'
    ],
    'item_bid' => [
        'already_bid' => 'You have already bid this item',
        'status_already_changed' => ':name have already changed the status of this confirmed bid',
        'cannot_processed' => 'This bid cannot be processed'
    ],
    //    Coupon code error
    'coupon_code_events' => [
        'delete' => 'There are :name using this coupon code event. Cannot delete!',
        'expired' => 'Event has expired',
    ]

    //    General error
    , 'general' => [
        'percent' => 'Amount percent must between 0 and 100. Please change value.'
    ]
    //Shipping fee error
    , 'shipping_fee' => [
        'store' => 'Create shipping fee fail',
        'delete' => 'Delete fail',
        'update' => 'Edit fail',
        'changed_status' => 'Change status fail'
    ],

    'news_category' => [
        'delete' => 'This category is in use. Cannot delete!',
        'name_required' => 'Field name :locale is required',
        'summary_required' => 'Field summary :locale is required',
        'content_required' => 'Field content :locale is required',
        'name_string' => 'Field name :locale must be string',
        'name_max' => 'Field name :locale must not exceed 255 characters',
        'item_cancel_empty' => 'Please choose item you want to cancel.',
        'category_id_required' => 'Field category is required'
    ],
    'news_genre' => [
        'delete' => 'This genre is in use. Cannot delete!'
    ],
    'news_post' => [
        'not_found' => 'There are no posts available',
        'thumbnail_required' => 'Thumbnail is required',
        'thumbnail_image' => 'Thumbnail is must be image',
        'thumbnail_mimes' => 'Thumbnail mines must be jpg or png',
        'thumbnail_max' => 'Thumbnail size must not over 2048GB',
        'news_genre_id_required' => 'New genre is required'
    ],
    'quote' => [
        'store' => 'Create order fail',
        'out_of_stock' => 'One of your item is out of stock',
        'empty_item' => 'You dont have any item in your cart',
        'delete_item' => 'Delete item fail',
        'quote_is_not_exist' => 'This quote is not exist',
        'minus_empty' => 'Your item have been update by another device, ple refresh the page',
        'completed' => 'Your Cart has been complete by another device.',
        'empty' => "Your items is empty in this cart, please add item to cart.",
        'require_payment' => 'Payment method is required',
        'delete_empty_quote_detail' => 'This item has been delete in another device.',
        'item_out_of_stock' => 'Item out of stock: ',
        'choose_user' => 'You must choose user',
        'can_not_update_order' => 'Something went wrong because can`t update the order',
        'delete_quote_fail' => 'Delete quote fail',
        'not_have_enough_stock' => 'Dont have enough stock for this item',
        'exist_item' => 'This item is in your stock',
        'permission_add_quote' => 'You don`t have permission to add item to cart.',
        'permission_create_quote' => 'You don`t have permission to add item to cart.',
        'permission_plus_cart' => 'You don`t have permission to plus quantity item.',
        'permission_minus_cart' => 'You don`t have permission to minus quantity item.',
        'permission_delete_item' => 'You don`t have permission to delete item.',
        'permission_quote_delete' => 'You don`t have permission to delete quote.'
    ],
    'order' => [
        'change_status_fail' => 'Please check the account you added in form math with current account',
        'change_payment_method_fail' => 'Please check the account you added in form math with current account',
        'phone_taken' => 'Phone number has already taken.',
        'out_of_stock' => 'Item :item_name currently is out of stock.',
        'out_of_stock_all' => 'All items in order currently are out of stock.',
        'update_order_detail' => 'Update order detail fail',
        'item_cancel_empty' => 'Please choose item to cancel',
        'already_canceled' => 'One or many item has been canceled. Please check again'
    ],
    'user_change_profile' => [
        'update' => 'Edit your profile fail',
        'store_address' => 'Create your address fail',
        'delete_address' => 'Delete your address fail',
        'update_address' => 'Edit your address fail',
        'update_addresses' => 'Edit your addresses fail',
        'set_default_address' => 'Set your default address fail'
    ],
    'email_subscribe' => [
        'is_exist' => 'Email :email_subscribe have already subscribed.',
    ],
    'oauth_provider' => [
        'not_exist' => ':driver is not currently supported',
        'unable_to_login' => 'Unable to login, :error_reason'
    ],
    'contract' => [
        'create_failed' => 'Create contract failed',
        'remove_stock' => 'Remove product stock failed',
        'empty_product' => 'Please choose any product to create contract',
        'missing_item' => 'Please select the item that you want to return',
    ],
    'user' => [
        'is_exist' => 'User doesnt exist with this email :email.',
    ],
    'coupon' => [
        'is_exist_in_cart' => 'Coupon :coupon has already used in cart.',
        'not_exist' => 'This code is not found',
        'used' => 'You used this code',
        'invalid' => 'This code is invalid',
        'warning_spaces' => 'Please do not fill in spaces at the beginning and the end'
    ],
    'config' => [
        'create_duplicate' => 'The key is already exist',
        'update_error' => 'Cannot update config',
        'delete_error' => 'Cannot delete config'
    ],
    'supplier' => [
        'verify' => 'Verification error. Please try again!'
    ],
    'pages_support' => [
        'not_found' => 'There are no pages available'
    ],
    'payment_method' => [
        'not_found' => 'There are no payment methods available'
    ],
    'payment_method' => [
        'store' => "Create payment method fail",
        'delete' => "Delete payment method fail",
        'update' => "Edit payment method :name fail",
        'key_required' => 'Field key is required',
        'key_string' => 'Field key must be string',
        'key_max' => 'Field key must not exceed 255 characters',
        'key_unique' => 'Field key is already exist',
        'fee_required' => 'Field fee is required',
        'fee_numeric' => 'Field key must be a number',
        'fee_type_required' => 'Field fee type is required',
        'fee_type_numeric' => 'Field fee type must be a number',
        'status_required' => 'Field Status is required',
        'status_numeric' => 'Field Status must be a number',
        'name_required' => 'Field name :locale is required',
        'name_string' => 'Field name :locale must be string',
        'name_max' => 'Field name :locale must not exceed 255 characters',
    ],
    'feedback' => [
        'store' => "Create feedback fail"
    ],
    'feedback_type' => [
        'not_found' => "There are no feedback types available"
    ],
    'conversation' => [
        'send_fail' => 'Send message fail'
    ],
    'banner' => [
        'delete' => 'Delete banner fail',
        'store' => 'Create banner fail',
        'update' => 'Update banner fail',
    ],
    'wishlist' => [
        'store' => 'Update wishlist fail',
        'delete' => 'Delete item from wishlist successfully'
    ],
    'section' => [
        'delete' => 'Delete section fail',
        'store' => 'Create section fail',
        'update' => 'Update section fail',
    ],
    'notification' => [
        'fail' => 'Update read at fail'
    ],
    'account' => [
        'delete' => 'Delete account fail'
    ],
    'recaptcha' => [
        'wrong_site_key' => 'Something went wrong.'
    ]
];
