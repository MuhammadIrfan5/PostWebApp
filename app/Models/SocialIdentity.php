<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class SocialIdentity extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'provider_name', 'provider_id'];

    public function myuser() {
        return $this->belongsTo(User::class);
    }
}
