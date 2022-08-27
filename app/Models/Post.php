<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static paginate(int $int)
 */
class Post extends Model
{
    use HasFactory;
    protected $fillable = ['post_title', 'post_desc', 'post_content', 'post_view', 'post_category_id', 'post_image'];
    protected $table = 'posts';
    protected $primaryKey = 'post_id';

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'post_category_id');
    }

}
