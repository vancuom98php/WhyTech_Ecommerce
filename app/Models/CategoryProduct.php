<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class CategoryProduct extends Model
{
    use Notifiable, SoftDeletes;

    protected $primaryKey = 'category_id';
    protected $table = 'category_products';

    public $timestamps = true; //set time to true 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_name',
        'category_product_slug',
        'category_parent',
        'category_desc',
        'meta_keywords',
        'category_status'
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($category) {
            $category->products()->delete();
        });
    }

    public function categoryParent()
    {
        return $this->belongsTo(CategoryProduct::class, 'category_parent');
    }

    public function categoryChildren()
    {
        return $this->hasMany(CategoryProduct::class, 'category_parent');
    }

    public function childrenProducts()
    {
        return $this->hasManyThrough(Product::class, self::class, 'category_parent', 'category_id');
    }
}
