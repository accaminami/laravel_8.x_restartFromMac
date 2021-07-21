<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bookdetail;
use App\Models\Author;

class Book extends Model
{
    use HasFactory;

    public function detail()
    {
        return $this->hasOne('Bookdetail');
    }

    public function author()
    {
        return $this->belongsTo('Author');
    }
}
