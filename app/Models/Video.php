<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $table = 'videos';
    protected $primarykey = 'id';
    protected $fillabel = ['video_title', 'youtube_video_link', 'upload_video'];
}
