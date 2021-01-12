<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controller\Auth;
use App\Models\likes;
use App\Models\User;
class Posts extends Model
{
	protected $fillable = [
        'description','filenames',
    ];
    use HasFactory;

    public function likedBy(User $user)
    {
       return $this->like->contains('user_id',$user->id);
    }
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function like()
    {
    	return $this->hasMany(likes::class);
    }
}
