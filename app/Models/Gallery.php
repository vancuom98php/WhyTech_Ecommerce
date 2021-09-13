<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Gallery extends Model
{
    use Notifiable;

    public $timestamps = false; //set time to false
    protected $fillable = [
        'gallery_name', 'gallery_image', 'product_id',
    ];
    protected $primaryKey = 'gallery_id';
    protected $table = 'galleries';

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
