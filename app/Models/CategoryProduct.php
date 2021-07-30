<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

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
        'category_desc',
        'category_status'
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }

    protected static function boot() {
        parent::boot();
    
        static::deleting(function($category) {
            $category->products()->delete();
        });
    }
}
