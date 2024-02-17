<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'type',
        'color',
        'date',
        'quantity',
        'price',
        'image',
        'end_date_rental',
        'user_id',
        'days_rental',
        'bill',
    ];
    protected $casts = [
        'image' => 'json',
    ];
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
