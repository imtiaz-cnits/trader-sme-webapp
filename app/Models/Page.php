<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'folder_id',
        'title',
        'cover_image',
        'icon',
        'content',
        'is_template'
    ];

    public function folder()
    {
        return $this->belongsTo(Folder::class);
    }
}
