<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'address', 'image', 'vat_number'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function plates()
    {
        return $this->hasMany(Plates::class);
    }

    public function orders()
    {
        return $this->hasMany(Orders::class);
    }

    public function types()
    {
        return $this->belongsToMany(Type::class);
    }
}
