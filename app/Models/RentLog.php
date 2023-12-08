<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RentLog extends Model
{
    use HasFactory;

    protected $table = 'rent_details';

    protected $fillable = [
        'user_id', 'books_id', 'started_at', 'ended_at'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function book(): BelongsTo
    {
        return $this->belongsTo(Books::class, 'books_id', 'id');
    }
    

}
