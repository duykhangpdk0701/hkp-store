<?php

namespace App\Models;

use App\Traits\Viewable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\Support\ImageFactory;

class Item extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, Viewable;

    const THUMBNAIL_COLLECTION = 'thumbnail';
    const THUMBNAIL_RESIZE_NAME = 'thumbnail_resize';
    const THUMBNAIL_RESIZE_ZOOM_NAME = 'thumbnail_resize_zoom';
    const DETAIL_COLLECTION = 'detail_images';
    const CONVERSION_SIZE = [
        'width' => 350,
        'height' => 350
    ];

    const ORDER_TRENDING = 1;
    const ORDER_NEW = 2;
    const ORDER_OLD = 3;
    const ORDER_MOST_POPULAR = 4;
    const ORDER_LATEST_LISTING = 5;
    const ORDER_FEATURED_ITEMS = 6;
    const ORDER_PRICE_DESC = 7;
    const ORDER_PRICE_ASC = 8;

    const MEDIA_TYPE_NORMAL = 0;
    const MEDIA_TYPE_ZOOM = 1;

    public static array $discoverTypes = [
        self::ORDER_TRENDING => 'Trending',
        self::ORDER_NEW => 'New Products',
        self::ORDER_MOST_POPULAR => 'Most Popular',
        self::ORDER_LATEST_LISTING => 'Latest Listing',
        self::ORDER_FEATURED_ITEMS => 'Feature Items',
    ];

    public static array $orderTypes = [
        self::ORDER_TRENDING => 'Trending',
        self::ORDER_NEW => 'New Products',
        self::ORDER_OLD => 'Old Products',
        self::ORDER_MOST_POPULAR => 'Most Popular',
        self::ORDER_LATEST_LISTING => 'Latest Listing',
        self::ORDER_FEATURED_ITEMS => 'Feature Items',
        self::ORDER_PRICE_DESC => 'Price high to low',
        self::ORDER_PRICE_ASC => 'Price low to high',
    ];

    /**
     * @inheritdoc
     */
    protected $table = 'items';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'brand_id',
        'sku',
        'slug',
        'name',
        'description',
        'item_person_type_id',
        'stock_in',
        'stock_out',
        'item_stock_status_id',
        'order',
        'is_featured',
        'media_type',
        'status'
    ];

    /**
     * Attributes to include in the Audit.
     *
     * @var array
     */
    protected $auditInclude = [
        'name',
        'sku',
        'description',
        'status'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['thumbnail', 'min_in_stock_price'];

    protected $with = ['media'];

    /**
     * Return the item variants associated with the model
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function itemVariants()
    {
        return $this->hasMany(ItemVariant::class);
    }

    /**
     * Return the brand associated with the model
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * Return the active brand associated with the model
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function activeBrand()
    {
        return $this->belongsTo(Brand::class)->active();
    }

    /**
     * Return the collection of categories associated with the model
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function categories()
    {
        return $this->belongsToMany(ItemCategory::class);
    }

    /**
     * Return the collection of active categories associated with the model
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function activeCategories()
    {
        return $this->belongsToMany(ItemCategory::class)->active();
    }

    /**
     * Return the collection of sizes associated with the model
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function sizes()
    {
        return $this->belongsToMany(ItemSize::class)->orderBy('order', 'ASC');
    }

    /**
     * Return the collection of sizes associated with the model
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function colors()
    {
        return $this->belongsToMany(ItemColor::class)->orderBy('order', 'ASC');
    }

    /**
     * Return the collection of stocks associated with the model
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function stocks()
    {
        return $this->hasMany(ItemStock::class, 'item_id', 'id');
    }

    /**
     * Lowest Item Stock Relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function lowestInStockItemStock(): HasOne
    {
        return $this->hasOne(ItemStock::class)->inStock()->orderBy('price', 'ASC')->oldest();
    }

    /**
     * Return the personType associated with the model
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function personType()
    {
        return $this->belongsTo(ItemPersonType::class, 'item_person_type_id', 'id');
    }

    /**
     * Get the item's thumbnail image
     *
     * @param string $value
     * @return bool|string
     */
    public function getThumbnailAttribute($value): bool|string
    {
        if (!$this->relationLoaded('media')) {
            return false;
        }

        $conversionType = $this->media_type == self::MEDIA_TYPE_NORMAL ? self::THUMBNAIL_RESIZE_NAME : self::THUMBNAIL_RESIZE_ZOOM_NAME;

        $thumbnail = $this->getFirstMediaUrl(self::THUMBNAIL_COLLECTION, $conversionType);

        if ($thumbnail) {
            return $thumbnail;
        }

        return asset('frontend-assets/images/products/no-img.png');
    }

    /**
     * Scope a query to only include active items.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('status', CONST_ENABLE);
    }

    public function scopeOrderByPrice($query, $direction = 'desc')
    {
        $query->orderBy(
            ItemStock::select('price')
                ->whereColumn('item_stocks.item_id', '=', 'items.id')
                ->inStock()
                ->orderBy('price', 'ASC')
                ->latest()
                ->limit(1),
            $direction
        );
    }

    /**
     * Get the item created at date and format
     *
     * @param string $value
     * @return string
     */
    public function getCreatedAtAttribute($value)
    {
        return date("d/m/Y H:i", strtotime($value));
    }

    /**
     * Get the item updated at date and format
     *
     * @param string $value
     * @return string
     */
    public function getUpdatedAtAttribute($value)
    {
        return date("d/m/Y H:i", strtotime($value));
    }

    public function getMinInStockPriceAttribute()
    {
        if (!$this->relationLoaded('stocks')) {
            return false;
        }
        return $this->stocks->min('price');
    }

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection(self::THUMBNAIL_COLLECTION)
            ->singleFile();
    }

    /**
     * @throws \Spatie\Image\Exceptions\InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion(self::THUMBNAIL_RESIZE_NAME)
            ->fit(Manipulations::FIT_FILL, self::CONVERSION_SIZE['width'], self::CONVERSION_SIZE['height'])
            ->background('fff')
            ->performOnCollections(self::THUMBNAIL_COLLECTION)
            ->sharpen(10)
            ->nonQueued();

        $this->addMediaConversion(self::THUMBNAIL_RESIZE_ZOOM_NAME)
            ->crop(Manipulations::CROP_CENTER, self::CONVERSION_SIZE['width'] + 50, self::CONVERSION_SIZE['height'])
            ->apply()
            ->fit(Manipulations::FIT_FILL, self::CONVERSION_SIZE['width'], self::CONVERSION_SIZE['height'])
            ->background('fff')
            ->performOnCollections(self::THUMBNAIL_COLLECTION)
            ->sharpen(10)
            ->nonQueued();
    }
}
