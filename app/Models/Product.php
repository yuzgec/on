<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use Spatie\Sluggable\SlugOptions;
use Spatie\Sluggable\HasSlug;

class Product extends Model implements HasMedia,Viewable
{
    use HasFactory,SoftDeletes,InteractsWithMedia,LogsActivity,InteractsWithViews,HasSlug;

    protected $guarded = [];
    protected $table = 'products';


    public function attributes()
    {
        return $this->belongsToMany(Attribute::class, 'product_attribute_values')->withPivot('attribute_value_id');
    }

    public function attributeValues()
    {
        return $this->belongsToMany(AttributeValue::class, 'product_attribute_values')->withPivot('attribute_id');
    }

    public function categories()
    {
        return $this->belongsToMany(ProductCategory::class, 'product_category_pivots', 'product_id', 'category_id');
    }
    
    public function getCategory(){
        return $this->hasMany(ProductCategoryPivot::class, 'product_id', 'id');
    }

    public function firstCategory(){
        return $this->hasOne(ProductCategoryPivot::class, 'product_id', 'id')->orderBy('id')->take(1);
    }

    public function getFirstCategoryNameAttribute() {
        // İlk kategori ilişkisini kontrol eder ve varsa kategori adını döndürür
        $category = $this->firstCategory->productCategory ?? null;
        return $category ? $category->title : null;
    }

    public function getComment(){
        return $this->hasmany(Comment::class, 'product_id', 'id');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('img')->width(1000)->height(1000)
            ->watermark(public_path('/logo.png'))
            ->watermarkPosition(Manipulations::POSITION_CENTER)
            ->watermarkHeight(1000, Manipulations::UNIT_PERCENT)
            ->watermarkWidth(1000, Manipulations::UNIT_PERCENT)
            ->keepOriginalImageFormat();
        $this->addMediaConversion('imgpng')->width(1000)->height(1000)->keepOriginalImageFormat();
        $this->addMediaConversion('thumb')->width(500)->height(500)->nonOptimized();
        $this->addMediaConversion('thumbpng')->width(500)->height(500)->keepOriginalImageFormat();
        $this->addMediaConversion('small')->width(150)->height(150)->keepOriginalImageFormat();
        $this->addMediaConversion('smallpng')->width(150)->height(150)->nonOptimized();
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['title', 'slug', 'price']);
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()->generateSlugsFrom('title')->saveSlugsTo('slug');
    }

}
