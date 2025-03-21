<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AgeRange extends Model
{
    use HasFactory;
    protected $fillable = ['range'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
