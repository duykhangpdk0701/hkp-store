<?php

return [

    /*
    |--------------------------------------------------------------------------
    | General Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during general use for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'login' => [
        'title' => 'Login',
        'subtitle' => 'Log in to your account to continue.',
        'password' => 'Password',
        'question' => "Doesn't have an account?",
        'or' => 'Or',
        'facebook' => 'Continue with Facebook',
        'google' => 'Continue with Google',
        'button' => [
            'submit' => 'Login'
        ]
    ],
    'register' => [
        'title' => 'Sign Up',
        'subtitle' => 'Register',
        'first_name' => 'First Name',
        'last_name' => 'Last Name',
        'password' => 'Password',
        'password_confirmation' => 'Password Confirmation',
        'cb_text' => [
            'start' => 'I agree to the HKPM’s',
            'terms' => 'Terms and Conditions',
            'between' => 'and',
            'policy' => 'Privacy Policy',
            'end' => '.'
        ],
        'button' => [
            'submit' => 'Sign Up'
        ],
        'text' => [
            'success' => 'Register successfully',
            'description_success' => 'Your account has been registered, you will be logged in automatically.'
        ]
    ],
    'forgot_password' => [
        'title' => 'Forgot password?',
        'subtitle' => 'Send Reset Password Mail',
        'button' => [
            'submit' => 'Reset Password'
        ]
    ],
    'sidebar' => [
        'user_management' => 'Manage User',
        'product_management' => 'Manage Product',
    ],
    'dashboard' => [
        'title' => 'Dashboard',
        'menu_title' => 'Dashboard',
        'subtitle' => 'Here is a quote to inspire your day'
    ],
    'user' => [
        'title' => 'Users',
        'menu_title' => 'Users',
        'subtitle' => 'Here is a quote to inspire your day',
        'logout' => 'Sign Out',
    ],
    'brand' => [
        'title' => 'Brands',
        'menu_title' => 'Brands'
    ],
    'item' => [
        'title' => 'Item Management',
        'menu_title' => 'Items',
        'box' => [
            'full_box' => 'Full Box',
            'no_box' => 'No Box',
            'box_with_defect' => 'Box With Defect'
        ],
        'filter' => [
            'title' => 'Filter',
            'no_selected' => 'No filter selected',
            'brands' => 'Brands',
            'categories' => 'Categories',
            'sub_categories' => 'Sub-Categories',
            'person_types' => 'Size Gender/Types',
            'sizes' => 'Sizes',
            'condition' => 'Condition',
            'price' => 'Price'
        ],
        'type' => [
            'sale' => 'Sale',
            'featured' => 'Featured Items',
            'new' => 'New Items',
        ],
        'person_types' => [
            'men' => 'Men',
            'women' => 'Women',
            'kids' => 'Kids',
        ],
        'empty' => 'There are no items available',
        'description' => 'Description',
        'retail_price' => 'Retail Price',
        'details' => 'Product details',
        'related_products' => 'Related Products',
        'select_size' => 'Select Your Size',
        'listing' => 'Listing',
        'no_listing' => 'Out of Listing',
        'offers' => [
            'lowest_sell' => 'Lowest Sell Offer',
            'highest_buy' => 'Highest Buy Offer',
            'latest_sell' => 'Latest Sell Offer'
        ],
        'popular_category' => 'Popular :Category',
        'price-table' => [
            'title' => 'Price Table',
            'size' => 'Size',
            'price' => 'Price',
            'condition' => 'Condition',
            'date' => 'Date'
        ],
        'size' => 'Size',
        'price' => 'Price',
        'price_chart' => [
            'title' => 'Price Chart',
            'six_months' => '6 Months',
            'one_year' => '1 Year',
            'all' => 'All'
        ],
        'order_bys' => [
            ITEM_ORDER_FEATURED_ITEMS => [
                'name' => 'Featured Items'
            ],
            ITEM_ORDER_LATEST_LISTING => [
                'name' => 'Latest Listings'
            ],
            ITEM_ORDER_MOST_POPULAR => [
                'name' => 'Most Popular'
            ],
            ITEM_ORDER_NEW => [
                'name' => 'New Items'
            ],
            ITEM_ORDER_OLD => [
                'name' => 'Old Items'
            ],
            ITEM_ORDER_TRENDING => [
                'name' => 'Trending Items'
            ],
            ITEM_ORDER_PRICE_DESC => [
                'name' => 'Price high to low'
            ],
            ITEM_ORDER_PRICE_ASC => [
                'name' => 'Price low to high'
            ],
        ]
    ],
    'item_variant' => [
        'title' => 'Item Variant Management',
        'menu_title' => 'Items',
    ],
    'item_stock' => [
        'title' => 'Item Stock Management',
        'menu_title' => 'Items',
        'status' => [
            CONST_STOCK_IN_STOCK => [
                'name' => 'In Stock'
            ],
            CONST_STOCK_PRE_ORDER => [
                'name' => 'Pre Order'
            ],
            CONST_STOCK_OUT_OF_STOCK => [
                'name' => 'Out Of Stock'
            ],
            CONST_STOCK_SOME_DAYS => [
                'name' => 'Some Days'
            ],
            CONST_STOCK_RECEIVING => [
                'name' => 'Receiving'
            ],
            CONST_STOCK_RECEIVED => [
                'name' => 'Received'
            ]
        ]
    ],
    'item_category' => [
        'title' => 'Item Categories',
        'menu_title' => 'Item Categories'
    ],
    'item_color' => [
        'title' => 'Item Colors',
        'menu_title' => 'Item Colors'
    ],
    'item_size' => [
        'title' => 'Item Sizes',
        'menu_title' => 'Item Sizes',
        'size_chart' => 'Size chart',
        'related_size' => 'Related size',
        'locale' => 'Locale',
        'choose_locale' => 'Please choose size locale to configure related size'
    ],
    'banner' => [
        'title' => 'Banners',
        'menu_title' => 'Banners'
    ],
    'coupon' => [
        'title' => 'Coupons',
        'menu_title' => 'Coupons'
    ],
    'role' => [
        'title' => 'Roles',
        'menu_title' => 'Roles'
    ],
    'news_home' => [
        'title' => 'News',
        'section' => [
            'title' => 'The news from G-Lab',
            'title_more' => 'More news from g-lab',
            'title_spotlight' => 'Spotlight News From G-Lab'
        ],
        'btn' => [
            'view_more' => 'View More'
        ],
        'text' => [
            'want_to_comment' => 'Want to comment?',
            'by_hkpm' => 'By H-KPM',
            'likes' => 'Likes',
            'comments' => 'Comments',
            'read_now' => 'Read
            Now',
            'latest_news' => 'Latest News'
        ]
    ],
    'news_category' => [
        'title' => 'News Categories',
        'menu_title' => 'News Categories',
        'table_index' => [
            'no' => 'No.',
            'name' => 'Name',
            'date_created' => 'Date created',
            'genres' => 'Genres',
            'posts' => 'Posts',
            'actions' => 'Actions'
        ],
        'tooltip' => [
            'edit' => 'Edit',
            'delete' => 'Delete'
        ]
    ],
    'news_genre' => [
        'title' => 'News Genres',
        'menu_title' => 'News Genres',
        'table_index' => [
            'no' => 'No.',
            'name' => 'Name',
            'category' => 'Category',
            'date_created' => 'Date created',
            'posts' => 'Posts',
            'actions' => 'Actions'
        ],
        'tooltip' => [
            'edit' => 'Edit',
            'delete' => 'Delete'
        ]
    ],
    'news_post' => [
        'title' => 'News Posts',
        'menu_title' => 'News Posts',
        'table_index' => [
            'no' => 'No.',
            'thumbnail' => 'Thumbnail',
            'title' => 'Title',
            'genre' => 'Genre',
            'detail' => 'Detail',
            'actions' => 'Actions'
        ],
        'views' => 'Views:',
        'likes' => 'Likes:',
        'all_comments' => 'All comments:',
        'comments_pending' => 'Comments pending:',
        'priority' => 'Priority:',
        'date_created' => 'Date Created:',
        'button' => [
            'show_hidden_posts' => 'Show hidden posts',
            'show_all_posts_on_the_site' => 'Show all posts on the site'
        ],
        'tooltip' => [
            'comments' => 'Comments',
            'edit' => 'Edit post',
            'hidden' => 'Hidden',
            'visible' => 'Visible',
            'delete' => 'Delete'
        ]
    ],
    'news_comment' => [
        'title' => 'News Comments',
        'menu_title' => 'News Comments',
        'button' => [
            'all_comments' => 'All comments',
            'comments_pending' => 'Comments pending',
            'comments_deleted' => 'Comments deleted',
            'view_more_comments' => 'View more comments',
            'view_more' => 'View More',
            'replies' => 'Replies',
            'approve' => 'Approve',
            'decline' => 'Decline',
            'edit' => 'Edit',
            'delete' => 'Delete',
            'love' => 'Love',
            'reply' => 'Reply',
            'comment' => 'Comment'
        ],
        'placeholder' => [
            'first_comment' => 'Write a comment...',
            'reply_to' => 'Reply to :user...',
            'reply' => 'Reply to comment...'
        ]
    ],
    'coupon_code' => [
        'title' => 'Coupon Code',
        'menu_title' => 'Coupon Code',
        'placeholder' => 'ADD PROMO CODE'
    ],
    'coupon_code_event' => [
        'title' => 'Coupon Code Event',
        'menu_title' => 'Coupon Code Event'
    ],
    'tooltip' => [
        'delete' => 'Delete',
        'edit' => 'Edit',
        'hidden' => 'Hidden',
        'visible' => 'Visible',
        'show' => 'View Detail',
        'comments' => 'Comments',
        'change_quote' => 'Change quote',
        'items' => 'Items list',
        'contracts' => 'Contracts list',
        'edit_config' => 'Edit config'
    ],
    'button' => [
        'add_note' => 'Add Note',
        'add_coupon' => 'Add coupon',
        'apply' => 'Apply',
        'update' => 'Update',
        'create' => 'Create',
        'confirm' => 'Confirm',
        'clear' => 'Clear',
        'close' => 'Close',
        'check_product' => 'Check Product',
        'add_product' => 'Add Product',
        'cancel' => 'Cancel',
        'save' => 'Save',
        'save_quote' => 'Save quote',
        'pending' => 'Pending',
        'approval' => 'Approval',
        'reject' => 'Reject',
        'block' => 'Block',
        'login' => 'Login',
        'clear_all' => 'Clear all',
        'view_more' => 'View more',
        'offer' => [
            'buy' => 'Buy/Offer',
            'sell' => 'Sell/Offer',
            'edit' => 'Edit bid',
            'destroy' => 'Cancel bid'
        ],
        'sell' => 'Sell',
        'add_to_cart' => 'Add To Cart',
        'continue_shopping' => 'Continue Shopping',
        'go_to_checkout' => 'Go to Checkout',
        'shop_now' => 'Shop Now',
        'change_status' => 'Change status',
        'response' => 'Response',
        'send' => 'Send',
        'export_excel' => 'Export excel',
        'export_csv' => 'Export csv',
        'add' => 'Add',
        'remove' => 'Remove',
        'previous' => 'Previous',
        'next' => 'Next',
        'audit' => 'Audit',
        'update_price' => 'Update price',
        'go_bid_confirm' => 'Go to bid confirm',
        'delete' => 'Delete',
        'next_step' => 'Next step',
        'back_to_step' => 'Back to previous step',
        'print' => 'Print',
        'print_order' => 'Print Order',
        'update_status' => 'Update Status',
        'edit_payment' => 'Edit Payment',
        'edit_shipping' => 'Edit Shipping',
        'edit_billing' => 'Edit Billing',
        'cancel_cart' => 'Cancel Cart',
        'shopping_cart' => 'Shopping cart',
        'filter' => 'Filter'

    ],
    'confirm' => [
        'delete' => [
            'title' => 'Are you sure?',
            'description' => "You will not be able to revert this!"
        ]
    ],
    'menu' => [
        'dashboard' => 'Dashboard',
        'user_management' => [
            'title' => 'Manage Users',
            'user' => 'Users',
            'role' => 'Roles',
            'permission' => 'Permissions',
        ],
        'product_management' => [
            'title' => 'Manage Products',
            'brand' => 'Brands',
            'category' => 'Categories',
            'sub_categories' => 'Sub-Categories',
            'size' => 'Sizes',
            'color' => 'Colors',
            'item' => 'Items',
            'item_stock' => 'Stocks',
            'supplier' => 'Partners',
        ],
        'bid_management' => [
            'title' => 'Manage Bidding',
            'confirmation_bids' => 'Matching Bids',
            'pending_bids' => "Pending Bids"
        ],
        'order_management' => [
            'title' => 'Manage Orders',
            'order' => 'Orders',
            'order_online' => 'Orders Online',
            'order_at_store' => 'Orders At Store',
        ],
        'contract_management' => [
            'title' => 'Manage Contracts',
            'contract' => 'Contracts List',
        ],
        'news_management' => [
            'title' => 'Manage News',
            'news_category' => 'Categories',
            'news_genre' => 'Genres',
            'news_post' => 'Posts',
            'news_comment' => 'Comments',
        ],
        'banner_management' => [
            'title' => 'Marketing',
            'banner' => 'Banner',
            'coupons' => 'Coupons',
            'permission' => 'Permissions',
            'section' => 'Section'
        ],
        'report_management' => [
            'title' => 'Manage Reports',
            'report_sales' => 'Sales Report',
            'report_sales_today' => 'Today Sales Report',
            'report_profit' => 'Profit Report',
            'permission' => 'Permissions',
            'report_inbound' => 'Report inbound items',
            'report_outbound' => 'Report outbound items',
            'report_item_cancel' => 'Report cancel items',
            'report_due_debt' => 'Due debt',
            'report_due_debt_history' => 'Due date history'
        ],
        'chat_management' => [
            'title' => 'Manage Chat',
            'message_list' => 'Message',
        ],
        'shipping_management' => [
            'title' => 'Manage Shipping',
            'shipping_provider' => 'Shipping Provider',
        ],
        'shipping_fee' => [
            'title' => 'Shipping fee',
            'shipping_fee_list' => 'Shipping Fee',
            'shipping' => 'Shipping Fee',
            'weight' => 'Weight'
        ],
        'staff_checkout' => [
            'title' => 'Staff checkout',
            'quote' => 'Quote',
            'list' => 'Quote list',
        ],

        'general' => [
            'title' => 'General',
            'footer' => 'Footer',
            'pages_support' => 'Pages Supports',
            'config' => 'Config'
        ],

        'email_subscribe' => [
            'title' => 'Manage Email Subscribe',
            'email_advertise' => 'Email Subscribe',
        ],
        'feedback' => [
            'title' => 'Manage Feedback',
            'feedbacks' => 'Feedbacks',
            'feedback_types' => 'Feedback Types'
        ],
        'api-docs' => [
            'title' => 'Api Documentation'
        ],

        'branch' => [
            'title' => 'Branch',
        ],
        'payment_method' => [
            'title' => 'Payment Methods'
        ]
    ],
    'messages' => [
        'title' => 'Messages',
        'menu_title' => 'Chat',
    ],
    'shipping_fee' => [
        'title' => 'Shipping fee',
        'create' => 'Create shipping fee',
        'update' => 'Update shipping fee',
        'weigh' => 'Weight',
        'active' => 'Active',
        'disable' => 'Disable'
    ],
    'my_profile' => [
        'title' => 'My Profile',
        'menu_title' => 'My Profile'
    ],
    'order' => [
        'title' => 'Manage Orders',
        'menu_title' => 'Orders',
        'subtotal_amount' => 'Sub Total',
        'total_amount' => 'Total',
        'total_discount_amount' => 'Total Discount',
        'total_revenue_amount' => 'Total Revenue',
        'ship_amount' => 'Shipping Fee',
        'discount_amount' => 'Discount',
        'payment_method' => 'Payment Method',
        'customer' => 'Customer',
        'email' => 'Email',
        'phone' => 'Phone',
        'address' => 'Address',
        'filter_order_code' => 'Filter Order Code',
        'phone_number' => 'Phone number',
        'select_date' => 'Select Date..',
        'filter_order_status' => 'Filter Order Status',
        'filter_order_staff' => 'Filter by Staff',
        'filter_branch' => 'Filter by Branch',
        'filter' => 'Filter',
        'code' => 'Code',
        'shipping_info' => 'Shipping Info',
        'seller' => 'Seller',
        'status' => 'Status',
        'price' => 'Price',
        'payment_method_change' => 'Change payment method',
        'change_status_order' => 'Change status order',
        'shipping_fee' => 'Shipping Fee',
        'total' => 'Total',
        'created_at' => 'Created At',
        'updated_at' => 'Updated At',
        'action' => 'Actions',
        'name' => 'Name',
        'fee' => 'Fee',
        'items' => 'Items',
        'discount' => 'Discount',
        'coupon' => 'Coupon',
        'payment_fee' => 'Payment fee',
        'change_status_form' => 'Change status',
        'change_payment_form' => 'Change payment',
        'order_status' => 'Order status',
        'choose_status' => 'Choose Status',
        'shipping_provider' => 'Shipping Provider',
        'choose_shipping_provider' => 'Choose shipping provider',
        'do_number' => 'DO Number',
        'password' => 'Password',
        'choose_payment_method' => 'Choose Payment Status'
    ],
    'order_details' => [
        'title' => 'Manage Orders <span class="text-primary">#:order_code</span>',
        'meta_title' => 'Order #:order_code'
    ],
    'quote' => [
        'title' => 'Staff checkout',
        'list_title' => 'Quote list',
    ],
    'item_report' => [
        'title_inbound' => 'Report inbound product',
        'title_outbound' => 'Report outbound product',
        'title_item_cancel' => 'Report item cancel product',
    ],
    'shipping_provider' => [
        'title' => 'Shipping Provider',
        'menu_title' => 'Shipping Provider'
    ],

    'footer' => [
        'title' => 'Footer',
        'menu_title' => 'Footer',
    ],
    'email_subscribe' => [
        'title' => 'Email Subscribe',
        'menu_title' => 'Email Subscribe',
        'footer' => [
            'title' => 'Sign up for promotions and events from G-Lab',
            'agreeing_terms' => 'By signing up, you confirm you want to receive G-Lab emails. Please see our Terms & Conditions and Privacy Policy for more details.',
            'input_placeholder' => 'Your email here...'
        ]
    ],
    'mail-template' => [
        'payment_on_delivery' => 'Pay on delivery',
        'subject' => [
            'confirm-order' => 'Confirm Order',
            'confirm-order-admin' => 'ĐƠN ĐẶT HÀNG ONLINE MỚI!',
            'shipped-order' => 'Shipping Order',
            'completed-order' => 'Completed Order',
            'cancel-order' => 'Cancel Order,',
            'new_bid' => 'New Offer at G-Lab',
            'bid_new_highest' => 'A new highest offer was placed at your item',
            'bid_bidder_cancel' => 'Confirmed offer was canceled',
            'bid_expire' => 'Offer was expired',
            'bid_matched_admin' => 'A new matched bid',
            'bid_matched_seller' => 'Your item got a matched',
            'bid_matched_bidder' => 'Your offer got a matched',
            'bid_out_of_stock' => 'Your matched item is out of stock',
            'bid_seller_denied' => 'Your offer was denied by the seller',
            'create_order' => 'Your order have been create.',

        ],
        'one_signal_order_pending' => 'Your order was change status to pending.',
        'one_signal_order_processed' => 'Your order is confirmed, and we are processing it.',
        'one_signal_order_create' => 'Your order create successfully.',
        'one_signal_order_shipped' => 'Your order was change status to shipped.',
        'one_signal_order_complete' => 'Your order was change status to completed.',
        'one_signal_order_canceled' => 'Your order was change status to canceled.',
        'one_signal_order_create_title' => 'Order is created successfully.',
        'one_signal_order_processed_title' => 'Order is confirmed.',
        'one_signal_order_pending_title' => 'Order is pending.',
        'one_signal_order_shipped_title' => 'Order is changed status to shipped.',
        'one_signal_order_completed_title' => 'Order is completed.',
        'one_signal_order_cancel_title' => 'Order is canceled.'
    ],
    'info' => [
        'payment_on_delivery' => 'Pay on delivery',
        'store_address' => '135/58 Tran Hung Dao, District 1, HCM City, Vietnam',
        'store_email' => '+84945378809',
        'store_phone' => 'hkpm.dev@gmail.com',
        'notice' => 'Note',
        'return_note' => '',
    ],
    'debt_report' => [
        'report_debt_due_date' => 'Debt due date'
    ],
    'config' => [
        'config_list_title' => 'Configs'
    ],
    'modal' => [
        'required_login' => [
            'title' => 'Please to login!',
            'body' => 'You have to login to use this feature.'
        ],
        'add_cart_success' => [
            'title' => 'Item added to your cart',
        ],
        'add_reason_for_supplier' => [
            'reject' => 'Please add reason why you reject',
            'block' => 'Please add reason why you block'
        ],
        'cancel_quote' => [
            'title' => 'Do you want to cancel quote?',
            'note' => 'Note to search quote easier'
        ],
        'save_quote' => [
            'title' => 'The quote will save and end, do you want to save?'
        ],
    ],
    'select_option' => [
        'default_filter_option' => 'Please select sort by options'
    ],
    'mobile_app' => [
        'intro' => [
            'title' => 'Get G-Lab APP Now!',
            'subtitle' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Dictum nibh egestas amet sapien sit. Massa eget faucibus viverra pulvinar mattis neque, suspendisse magna enim.',
            'promotion' => 'Now available on App Store and Google Play.'
        ]
    ],
    'empty' => 'Empty',
    'loading' => 'Loading...',
    'sort_by' => 'Sort by',
    'search' => 'Search...',
    'result' => 'Results',
    'showing_page' => 'Showing page :page of :pages',
    'close' => 'Close',
    'delete' => 'Delete',
    'save' => 'Save',
    'empty_table_message' => 'No data available in table',
    'feedback' => [
        'title' => 'Feedbacks',
        'column_no' => 'No.',
        'column_feedback_code' => 'Feedback Code',
        'column_feedback_type' => 'Feedback Type',
        'column_feedback_info' => 'Info',
        'column_feedback_content' => 'Content',
        'column_feedback_response' => 'Response',
        'column_feedback_status' => 'Status',
        'column_feedback_date' => 'Date',
        'column_feedback_action' => 'Actions',
        'field_name' => 'Name',
        'field_email' => 'Email',
        'field_phone' => 'Phone',
        'detail_image' => 'Detail Images'
    ],
    'feedback_type' => [
        'title' => 'Feedback Types',
        'field_name' => 'Name',
        'field_email' => 'Email',
        'field_phone' => 'Phone',
        'detail_image' => 'Detail Images',
        'field_description' => 'Description',
        'field_feedback_status' => 'Status',
        'field_status_enable' => 'Enable',
        'field_status_disable' => 'Disable',
        'column_no' => 'No.',
        'column_feedback_action' => 'Actions',
    ],
    'no_note' => 'No note',
    'free' => 'Free',
    'common' => [
        'actions' => 'Actions',
        'add_item_to_quote' => 'Add item to quote',
        'address' => 'Address',
        'all' => 'All',
        'allocated_items' => 'Allocated Items',
        'amount' => 'Amount',
        'amount_type' => 'Amount type',
        'are_you_sure_delete' => 'Are you sure you want to delete it ?',
        'attributes' => 'Attributes',
        'audit' => 'Audits',
        'back_to_homepage' => 'Back to homepage',
        'background_color' => 'Background color',
        'bank_info' => 'Bank info',
        'bank_name' => 'Bank name',
        'bank_number' => 'Bank number',
        'belong_to' => 'Belong to',
        'beneficiary_id' => 'Beneficiary ID',
        'beneficiary_name' => 'Beneficiary name',
        'bid_info' => 'Bid Info',
        'bid_status' => 'Bid Status',
        'bidder_info' => 'Bidder Info',
        'billing_info' => 'Billing Info',
        'box_condition' => 'Box condition',
        'brand' => 'Brand',
        'branch' => 'Branch',
        'buying' => 'Buying',
        'buy_offer' => 'Buy Offer',
        'canceled' => 'Canceled',
        'category' => 'Category',
        'change_status' => 'Change status',
        'checkout' => 'Checkout',
        'city' => 'City',
        'code' => 'Code',
        'color' => 'Item colors',
        'condition' => 'Condition',
        'confirmed_bid' => 'Confirmed Bids',
        'content' => 'Content',
        'contract_code' => 'Contract Code',
        'contract_info' => 'Contact Info',
        'contract_overview' => 'Contract overview',
        'contracts' => 'Contracts',
        'complete_order' => 'Complete order',
        'count' => 'Count',
        'country' => 'Country',
        'coupon' => 'Coupon',
        'coupon_applied' => 'Coupon applied',
        'coupon_event' => 'Coupon event',
        'coupon_limit' => 'Coupon limit',
        'created_at' => 'Created At',
        'customer' => 'Customer',
        'customer_name' => 'Customer
        name',
        'customer_pay' => 'Customer pay',
        'custom_value' => 'Custom value',
        'customer_receipt' => 'CUSTOMER RECEIPT',
        'current_highest_bid' => 'Current Highest Bid Price',
        'day' => 'Day',
        'date' => 'Date',
        'expire_date' => 'Expire Date',
        'current_price' => 'Item Price',
        'debt' => 'Debt',
        'debt_status' => 'Debt status',
        'default' => 'Default',
        'detail_images' => 'Detail Images',
        'detail_information' => 'Detail information',
        'description' => 'Description',
        'discount' => 'Discount',
        'discount_by' => 'Discount by',
        'disable' => 'Disable',
        'district' => 'District',
        'do_number' => 'DO Number',
        'edit_billing_info' => 'Edit billing info',
        'edit_shipping_info' => 'Edit shipping info',
        'email' => 'Email',
        'enable' => 'Enable',
        'end_date' => 'End date',
        'end_quote' => 'End quote',
        'event' => 'Event',
        'featured_item' => 'Featured Item',
        'fee' => 'Fee',
        'fee_type' => 'Fee type',
        'feedback_code' => 'Feedback Code',
        'feedback_type' => 'Feedback Type',
        'first_name' => 'First name',
        'filters' => 'Filters',
        'from_date' => 'From date',
        'from price' => 'From price',
        'heading' => 'Heading',
        'height' => 'Height',
        'identify_number' => 'Identify number',
        'image' => 'Image',
        'image_url' => 'Image Url',
        'inbound' => 'Inbound',
        'info' => 'Info',
        'item' => 'Item',
        'item_category' => 'Item category',
        'item_info' => 'Item info',
        'item_name' => 'Item name',
        'item_originality' => 'Item originality',
        'item_properties' => 'Item properties',
        'item_stock_status' => 'Item stock status',
        'item_variants' => 'Item variants',
        'general_information' => 'General information',
        'genre' => 'Genre',
        'last_name' => 'Last name',
        'length' => 'Length',
        'letter' => 'Letter',
        'limit' => 'Limit',
        'language' => 'Language',
        'message' => 'Message',
        'money_give_back' => 'Money give back to customer',
        'my_contracts' => 'My contracts',
        'my_purchases' => 'My purchases',
        'name' => 'Name',
        'new_price' => 'New Price',
        'no_order' => 'No',
        'no_parent' => 'No parent',
        'no_size_configured' => 'No size configured',
        'not_provided' => 'Not Provided',
        'note' => 'Note',
        'note_quote' => 'Note for this quote',
        'number' => 'Number',
        'number_of_coupons' => 'Number of coupons',
        'or' => 'Or',
        'order' => 'Order',
        'out_stock' => 'Out stock',
        'parameter' => 'Parameter',
        'parent_category' => 'Parent category',
        'partner' => 'Partner',
        'partner_code' => 'Partner code',
        'partner_info' => 'Partner info',
        'partner_name' => 'Partner name',
        'person_type' => 'Person type',
        'person_types' => 'Person types',
        'password' => 'Password',
        'password_confirm' => 'Password confirm',
        'payment_date' => 'Payment date',
        'payment_info' => 'Payment Info',
        'payment_method' => 'Payment method',
        'payment_of_debt' => 'Payment of Debt',
        'permissions' => 'Permissions',
        'percent' => 'Percent',
        'phone' => 'Phone',
        'phone_number' => 'Phone number',
        'pick_a_color' => 'Pick a color',
        'please_check_your_email' => 'Please check your email for payment instructions for this order!',
        'prefix' => 'Prefix',
        'price' => 'Price',
        'price_in' => 'Price in',
        'print' => 'Print',
        'process_bid' => 'Process this bid',
        'product' => 'Products',
        'product_price' => 'Product price',
        'profile' => 'Profile',
        'profit' => 'Profit',
        'profit_rate' => 'Profit rate',
        'purchases' => 'Purchases',
        'public' => 'Public',
        'old_price' => 'Old Price',
        'options' => 'Options',
        'ordering' => 'Ordering',
        'order_code' => 'Order Code',
        'order_info' => 'Order Info',
        'order_status' => 'Order status',
        'orders' => 'Orders',
        'other_matched_bids' => 'Other Matched Bids',
        'outbound' => 'Outbound',
        'quantity' => 'Quantity',
        'random_register' => 'Random register (include lowercase and uppercase)',
        'reason' => 'Reason',
        'reason_out_of_stock' => 'Reason out of stock',
        'reason_cancel_bid' => ' Why the bid is canceled',
        'receiver_name' => 'Receiver Name',
        'required_field' => 'Required field',
        'required_fields' => 'Required fields',
        'response' => 'Response',
        'response_to_customer' => 'Response to customer',
        'return_product' => 'Return product',
        'roles' => 'Roles',
        'role_name' => 'Role Name',
        'section' => 'Section',
        'seller' => 'Seller',
        'shipping_info' => 'Shipping Info',
        'shipping_provider' => 'Shipping Provider',
        'show' => 'Show',
        'size' => 'Size',
        'size_locale' => 'Size locale',
        'size_option' => 'Size option',
        'staff_note' => 'Staff Note',
        'start_date' => 'Start date',
        'status' => 'Status',
        'stocks' => 'Stocks',
        'stock_in' => 'Stock in',
        'stock_in_date' => 'Stock in date',
        'stock_out' => 'Stock out',
        'stock_status' => 'Stock status',
        'stock_type' => 'Stock type',
        'subtotal' => 'Subtotal',
        'sub_heading' => 'Sub heading',
        'suffix' => 'Suffix',
        'summary' => 'Summary',
        'supplier_code' => 'Supplier code',
        'supplier_info' => 'Supplier info',
        'supplier_name' => 'Supplier name',
        'supplier' => 'Supplier',
        'symbol' => 'Symbol',
        'system' => 'System',
        'tax' => 'Tax',
        'title' => 'Title',
        'to_date' => 'To date',
        'from_price' => 'From price',
        'to_price' => 'To price',
        'total' => 'Total',
        'original_total' => 'Original Total',
        'grand_total' => 'Grand Total',
        'total_items' => 'Total items',
        'total_payment_fee' => 'Total payment fee',
        'total_price' => 'Total price',
        'total_ship' => 'Total ship',
        'total_cancel' => 'Total cancel',
        'transfer_type' => 'Transfer Type',
        'type' => 'Type',
        'thanks_for_your_purchase' => 'THANK YOU AND HOPE YOU HAVE A GREAT TIME SHOPPING',
        'thumbnail' => 'Thumbnail',
        'thumbnail_upload_sub' => 'Upload Thumbnail (Single File Only)',
        'unallocated_items' => 'Unallocated Items',
        'updated_at' => 'Updated At',
        'update_stock_price' => 'Update the stock price',
        'update_your_note' => 'Update your note on this order',
        'upload_avatar' => 'Upload Avatar (Single File Only)',
        'upload_banner_desktop' => 'Upload (banner for desktop)',
        'upload_banner_mobile' => 'Upload (banner for mobile)',
        'upload_cccd_front' => 'Upload (CCCD Front Face)',
        'upload_cccd_back' => 'Upload (CCCD Back Face)',
        'upload_detail_image' => 'Upload Detail Images (Multiple Upload)',
        'upload_section' => 'Upload (Single File Only)',
        'used_at' => 'Time Of Application',
        'user_role' => 'User role',
        'value' => 'Value',
        'views' => 'Views',
        'ward' => 'Ward',
        'weight' => 'Weight',
        'dismiss' => 'Dismiss',
        'width' => 'Width',
        'your_order' => 'Your order',
        'add' => [
            'color' => 'Add color',
            'detail_image' => 'Add Detail Image',
            'image' => 'Add image',
            'item' => 'Add item',
            'size' => 'Add size',
            'stock' => 'Add stock',
            'coupon' => 'Add coupon',
            'coupon_success' => 'Add coupon success',
            'coupon_remove_success' => 'Remove coupon success',
        ],
        'choose' => [
            'banner_section' => 'Choose banner section',
            'brand' => 'Choose brand',
            'category' => 'Choose category',
            'choose' => 'Choose',
            'city' => 'Choose city',
            'color' => 'Choose color',
            'customer' => 'Choose customer',
            'date' => 'Choose date',
            'district' => 'Choose district',
            'fee_type' => 'Choose fee type',
            'genre' => 'Choose genre',
            'parent_category' => 'Choose parent category',
            'person_type' => 'Choose person type',
            'item_category' => 'Choose item category',
            'role' => 'Choose role',
            'section' => 'Choose section',
            'shipping_provider' => 'Choose Shipping Provider',
            'size' => 'Choose size',
            'size_locale' => 'Choose size locale',
            'status' => 'Choose status',
            'stock_status' => 'Choose stock status',
            'type' => 'Choose type',
            'value' => 'Choose value',
            'ward' => 'Choose ward',
        ],
        'create' => [
            'contract' => 'Create contract',
            'coupon_event' => 'Create a new coupon event',
            'customer' => 'Tạo khách hàng',
            'new_customer' => 'Create new customer',
            'random_coupon_code' => 'Create a random code',
        ],
        'filter' => [
            'branch' => 'Filter Branch',
            'brand' => 'Filter Brand',
            'category' => 'Filter Category',
            'city' => 'Filter city',
            'condition' => 'Filter Condition',
            'contract' => 'Filter Contract',
            'debt' => 'Filter by Debt Status',
            'payment_method' => 'Filter Payment method',
            'price' => 'Filter price',
            'size' => 'Filter Size',
            'staff' => 'Filter Staff',
            'supplier' => 'Filter supplier',
            'type' => 'Filter type'
        ],
        'from' => [
            'date' => 'From date',
            'price' => 'From price',
        ],
        'remove' => [
            'item' => 'Remove item',
        ],
        'select' => [
            'bid_status' => 'Select a bid status',
            'condition' => 'Select a condition',
            'date' => 'Select date',
            'item' => 'Select an item',
            'size' => 'Select a size',
            'supplier' => 'Select a partner',
            'stock_status' => 'Select a stock status',
            'stock_type' => 'Select a stock type',
        ],
        'update' => [
            'price' => 'Update price'
        ],
        'please_choose_person_type' => 'Please choose the person type for the item',
        'please_confirm_password' => 'Please confirm your password before continuing',
        'pending' => 'pending',
        'sell_offer' => 'sell offer',
        'selling' => 'selling',
        'consignment' => 'Consignment',
        'my_consignments' => 'My Consignments',
        'already' => [
            'add_coupon' => 'You have already applied this coupon',
        ],
        'please' => [
            'add_coupon' => 'Please add coupon code',
        ],
        'titles' => [
            'add_coupon' => 'Add coupon code',
            'already_add_coupon' => 'Already add coupon',
            'remove' => 'Remove coupon code',
            'remove_coupon' => 'Remove coupon code',
            'fail' => 'Fail',
            'success' => 'Success'
        ],
        'media_type' => 'Image zoom?'
    ],
    'account_info' => [
        'title' => 'Account information',
        'benefit' => [
            'title' => 'My benefits',
        ],
        'following' => [
            'title' => 'Following List'
        ]
    ],
    'payment_method' => [
        'title' => 'Payment Method',
        'subtitle' => 'You can add your payment methods here. When you purchase or sell an item, the credit will be transfer to one of your chosen payment method',
        'table_index' => [
            'no' => 'ID',
            'name' => 'Name',
            'key' => 'Key',
            'fee' => 'Fee',
            'fee_type' => 'Fee type',
            'status' => 'Show?',
            'actions' => 'Actions'
        ],
        'tooltip' => [
            'edit' => 'Edit',
            'delete' => 'Delete'
        ],
        'status' => [
            FEE_TYPE_PERCENT => [
                'name' => 'Percent',
                'badge' => 'badge-info',
                'bg' => 'bg-info',
                'text' => 'text-info'
            ],
            FEE_TYPE_PRICE => [
                'name' => 'Percent',
                'badge' => 'badge-secondary',
                'bg' => 'bg-secondary',
                'text' => 'text-secondary'
            ]
        ],
        'cash' => 'Cash',
        'transfer' => 'Transfer',
        'credit' => 'Credit',
        'order_online' => 'Order Online',
        'cash_on_delivery' => 'Cash On Delivery (COD)'
    ],
    'reset_password' => [
        'title' => 'Reset Password',
        'subtitle' => 'If you want to change your password, you can reset your password right here!',
        'old' => 'Old Password',
        'new' => 'New Password',
        'confirm' => 'Confirm New Password',
        'btn' => [
            'submit' => 'Reset Password'
        ],
        'send_mail' => 'Send Reset Password Mail',
        'modal_success' => [
            'noti' => 'Password reset successfully',
            'msg' => 'Your password has been updated. Now you can log in with your new password.'
        ]
    ],
    'address' => [
        'title' => 'All Addresses',
        'subtitle' => 'The addresses that the item will be delivered to you',
        'default' => 'Address Default',
        'mutiple' => 'Mutiple address',
        'applied' => 'Applied for shipping',
        'btn' => [
            'create' => 'New Address',
            'edit' => 'Edit',
            'delete' => 'Delete',
            'set_as_default' => 'Set As Default',
        ],
        'name' => 'Name',
        'city' => 'City',
        'district' => 'District',
        'ward' => 'Ward',
        'address' => 'Address',
        'title_edit_default' => 'Edit Address Default',
        'title_edit' => 'Edit Address',
        'title_create' => 'Create Address',
        'choose' => [
            'city' => '-- Choose City --',
            'district' => '-- Choose District --',
            'ward' => '-- Choose Ward --'
        ]
    ],
    'information' => [
        'title' => 'Your information',
        'subtitle' => 'You can edit your personal information here',
        'name' => 'Full Name',
        'first_name' => 'First Name',
        'last_name' => 'Last Name',
        'phone' => 'Phone Number',
        'email' => 'Email Address',
        'identify_number' => 'Identify Number',
        'bank_info' => 'Bank Information',
        'bank_number' => 'Bank Number',
        'upload_front_identification' => 'Upload citizen identification (Front Side)',
        'upload_back_identification' => 'Upload citizen identification (Back Side)',
        'btn' => [
            'upload_image' => 'Upload image'
        ]
    ],
    'checkout' => [
        'title' => 'Checkout',
        'review_order' => 'Review Order',
        'confirm_review' => 'Please confirm your purchase details below',
        'billing' => 'Billing',
        'subtotal' => 'Subtotal',
        'shipping' => 'Shipping',
        'tax' => 'Tax',
        'box' => 'Box',
        'discount' => 'Discount',
        'total_payout' => 'Total Payout',
        'shipping_detail' => 'Shipping Details',
        'receiver_name' => 'Receiver Name',
        'note' => 'Note',
        'price' => 'Price',
        'size' => 'Size',
        'condition' => 'Condition',
        'quantity' => 'Quantity',
        'add_promo_code' => 'ADD PROMO CODE',
        'btn' => [
            'confirm_order' => 'Confirm Order',
            'more_addresses' => 'More addresses',
            'return' => 'Return',
            'apply' => 'Apply',
            'continue' => 'Continue shipping'
        ],
        'order_confirmed' => 'Order Confirmed',
        'success' => 'Success',
        'response' => 'Your order has been confirmed!',
        'reminder' => [
            'title' => 'Reminder',
            'description' => ''
        ],
        'policy' => 'By continuing, you will confirm that you have read and accept our
                            <a href="#!" class="text-95">term and policy</a>',
        'confirm_order' => 'Confirm Order'
    ],
    'cart' => [
        'title' => 'Your Cart',
        'subtitle' => 'Welcome to Your Cart',
        'estimated_payout' => 'Estimated Payout*',
        'description_estimated' => '(*) Shipping fee and tax could be changed when checkout',
        'btn' => [
            'checkout' => 'Go to Checkout',
            'checkout_small' => 'Go to Checkout',
            'view' => 'View Cart'
        ]
    ],
    'feedback' => [
        'title' => 'Manage Feedback',
        'feedbacks' => 'Feedbacks',
        'name' => '',
        'feedback_types' => 'Feedback Types',
        'choose_type' => '-- Choose Type Feedback --',
        'content' => 'Content',
        'provide_info' => 'Provide information',
        'provide_images' => 'Provide your Feedback Images',
        'optional' => 'Optional',
        'btn' => [
            'submit' => 'Send Feedback',
            'return' => 'Back'
        ],
        'policy' => 'By submiting, you will confirm that you have read and accept our <a class="text-muted">term and
        policy</a>.'
    ],
    'home' => [
        'title' => 'Home'
    ],
    'benefit' => [
        'btn' => [
            'add' => 'Thêm mặt hàng',
            'basic' => 'Đơn giản',
            'advance' => 'Nâng cao',
            'click_here' => 'CLICK “HERE” TO START ADDING ITEMS TO YOUR PORTFOLIO.'
        ],
        'item_count' => 'Item Count',
        'market_value' => 'Market Value',
        'totals' => 'Totals',
        'items' => 'Items',
        'rank' => 'Rank',
        'percentile' => 'Percentile',
        'gain_or_loss' => 'Gain/Loss',
        'average_price' => 'Average Price',
        'portfolio_is_empty' => 'Seem like your Portfolio is empty.'
    ],
    'order_status' => [
        'allocated' => 'Allocated',
        'pending' => 'Pending',
        'processing' => 'Processing',
        'shipped' => 'Shipped',
        'completed' => 'Completed',
        'canceled' => 'Canceled',
        ORDER_STT_DRAFT => 'Draft',
        ORDER_STT_PENDING => 'Pending',
        ORDER_STT_PROCESSING => 'Processing',
        ORDER_STT_PROCESSED => 'Processed',
        ORDER_STT_SHIPPED => 'Shipped',
        ORDER_STT_COMPLETED => 'Completed',
        ORDER_STT_CANCELED => 'Canceled',
        ORDER_STT_DENIED => 'Denied',
        ORDER_STT_CANCELED_REVERSAL => 'Canceled reversal',
        ORDER_STT_FAILED => 'Fail',
        ORDER_STT_REFUNDED => 'Refund',
        ORDER_STT_REVERSED => 'Reversed',
        ORDER_STT_CHARGEBACK => 'Charge back',
        ORDER_STT_EXPIRED => 'Expired',
        ORDER_STT_VOIDED => 'Voided',
        ORDER_STT_ALLOCATED => 'Allocated',
        ORDER_STT_PARTIAL_CANCELED => 'Partial Canceled'
    ],
];
