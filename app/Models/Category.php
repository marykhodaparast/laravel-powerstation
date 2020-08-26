<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    protected $fillable=['name'];
    protected $table = 'product_categories';
    use SoftDeletes;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
