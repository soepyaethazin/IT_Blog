<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentCount extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'student_counts';
    protected $fillable = ['count'];
}
