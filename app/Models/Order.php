<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $incrementing = false; // Non-incrementing or non-numeric primary key

    protected static function boot()
    {
        parent::boot();

        // Set ID saat model sedang dibuat
        static::creating(function ($model) {
            $model->id = 'o-' . now()->format('dmyHis');
        });
    }

    protected $fillable = [
        'destination_id',
        'name',
        'email',
        'quantity',
        'total_price',
        'status',
        'payment_status',
        'payment_status_message'
    ];

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
}
