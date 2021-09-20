<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Comment extends Model
{
    use Notifiable;

    protected $primaryKey = 'comment_id';
    protected $table = 'comments';

    public $timestamps = false; //set time to false 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'comment_content',
        'comment_name',
        'comment_phone',
        'comment_date',
        'product_id',
        'rating',
        'comment_parent_comment'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function commentParent()
    {
        return $this->belongsTo(Comment::class, 'comment_parent_comment');
    }

    public function commentChildren()
    {
        return $this->hasMany(Comment::class, 'comment_parent_comment');
    }
}
