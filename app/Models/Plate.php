<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plate extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = ['name', 'image', 'price', 'ingredients', 'description', 'is_visible'];

    public function orders()
    {
        return $this->belongsToMany(Order::class)->withPivot('quantity');
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function category()
    {

        return $this->belongsTo(Category::class);
    }
}
