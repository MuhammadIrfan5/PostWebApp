<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Posts;
use App\Models\User;
class likes extends Model
{
    use HasFactory;
    protected $fillable = [
    	'user_id'
    ];
}
