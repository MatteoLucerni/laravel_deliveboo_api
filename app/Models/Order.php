<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['order_date', 'name', 'surname', 'satatus', 'address', 'note', 'total_price'];

    public function plates()
    {
        return $this->belongsToMany(Plate::class);
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
