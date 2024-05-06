<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'type_id'];

    public function type()
    {
        return $this->belongsTo(ProductType::class, 'type_id');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
