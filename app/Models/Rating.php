<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
        'destination_id',
        'rating',
        'review'
    ];

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
}
