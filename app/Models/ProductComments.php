<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class ProductComments extends Model
{
    protected $fillable=['body','user_id','confirmation'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
       return $this->hasMany(ProductComments::class,'reply_id');
    }
}
