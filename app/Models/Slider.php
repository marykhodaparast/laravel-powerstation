<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\UploadedFile;



class Slider extends Model
{
    use Sluggable;
    use SoftDeletes;
     /**
     * @var array
     */
    protected $fillable=['title','body','image','link'];
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    /**
     * @param $value
     */
    public function setImageAttribute($value)
    {
        if($value instanceof UploadedFile){
            $this->attributes['image'] = Storage::disk('public')->put('images',$value);
        }else if($value == null){
            $this->attributes['image'] = null;
        }
    }

    /**
     * @param $value
     * @return string
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function getImageAttribute($value)
    {
        return ($value)?Storage::url($value):null;
    }
}
