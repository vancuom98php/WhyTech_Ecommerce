<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ProductTag extends Model
{
    use Notifiable;

    protected $primaryKey = 'product_tag_id';
    protected $table = 'product_tags';

    public $timestamps = true; //set time to true
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}
