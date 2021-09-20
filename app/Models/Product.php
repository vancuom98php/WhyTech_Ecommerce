<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use Notifiable, SoftDeletes;

    protected $primaryKey = 'product_id';
    protected $table = 'products';

    public $timestamps = true; //set time to true 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_name',
        'product_quantity',
        'product_sold',
        'product_slug',
        'category_id',
        'brand_id',
        'product_desc',
        'product_content',
        'product_price',
        'product_image_name',
        'product_image_path',
        'product_status',
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tags', 'product_id', 'tag_id')->withTimestamps();
    }

    public function category()
    {
        return $this->belongsTo(CategoryProduct::class, 'category_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function order_details()
    {
        return $this->hasMany(OrderDetail::class, 'product_id');
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'product_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'product_id');
    }
}
