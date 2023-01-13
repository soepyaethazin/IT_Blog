<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LikesDislike extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'likes_dislikes';
    protected $fillable = ['post_id','user_id','type'];
}
