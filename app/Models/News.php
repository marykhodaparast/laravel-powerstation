<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class News extends Model
{
    use Sluggable;
    use SoftDeletes;
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
     * @var array
     */
    protected $fillable=['title','body','image','video','published','published_at','body'];


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


    /**
     * @param $value
     */
    public function setVideoAttribute($value)
    {
        if($value instanceof UploadedFile){
            $this->attributes['video'] = Storage::disk('public')->put('videos',$value);
        }else if($value == null){
            $this->attributes['video'] = null;
        }
    }

    /**
     * @param $value
     * @return string
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function getVideoAttribute($value)
    {
        return ($value)?Storage::url($value):null;

    }




}
