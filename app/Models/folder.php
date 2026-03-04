<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'icon'];

    public function pages()
    {
        return $this->hasMany(Page::class);
    }
}
