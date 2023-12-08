<?php

namespace App\Models;

use App\Models\Categories;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Books extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'books';

    protected $fillable = [
        'kode_buku', 'judul', 'slug', 'cover', 'stok'
    ];

    public function categories() {
        return $this->belongsToMany(Categories::class, 'categories_books', 'books_id', 'categories_id');
    }
}
