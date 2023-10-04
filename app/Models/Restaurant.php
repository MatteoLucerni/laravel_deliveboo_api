<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'address', 'phone_number', 'description', 'image', 'vat_number', 'is_visible'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function plates()
    {
        return $this->hasMany(Plate::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function types()
    {
        return $this->belongsToMany(Type::class);
    }
}
