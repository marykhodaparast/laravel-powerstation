<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
    use Sluggable;
    use SoftDeletes;

    /**
     * @var array
     */
    protected $fillable=['name','description','pdf','image','video','body','category_id'];
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
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

     /**
     * @param $value
     */
    /***
     * Start:pdf
     */
    public function setPdfAttribute($value)
    {
        if($value instanceof UploadedFile){
            $this->attributes['pdf'] = Storage::disk('public')->put('pdf',$value);
        }else if($value == null){
            $this->attributes['pdf'] = null;
        }
    }

    /**
     * @param $value
     * @return string
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function getPdfAttribute($value)
    {
        return ($value)?Storage::url($value):null;
    }
    /**
     * End:pdf
     */


     /**
     * @param $value
     */
    /***
     * Start:video
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
    /**
     * End:video
     */

     public function category()
     {
         return $this->belongsTo(Category::class);
     }
}
