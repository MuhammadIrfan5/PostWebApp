<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = [
        'name','slug','details','price','shipping_cost','description','image_path',
    ];
    use HasFactory;
}
