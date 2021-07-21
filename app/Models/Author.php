<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Book;

class Author extends Model
{
    use HasFactory;
    use SoftDeletes;

//    protected $table = 't_author';
//    protected $primaryKey = 'author_id';
//    protected $timestamp  = false;
    protected $fillable = [
        'name',
        'kana',
    ];
//    protected $guarded = [
//        'id',
//        'created_at',
//        'updated_at',
//    ];

    public function books()
    {
        return $this->hasMany('Book');
    }

    public function getKanaAttribute(string $value): string
    {
        return mb_convert_kana($value,"k");
    }

    public function setKanaAttribute(string $value)
    {
        $this->attributes['kana'] = mb_convert_kana($value,"KV");
    }

}
