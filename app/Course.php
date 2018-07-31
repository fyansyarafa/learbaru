<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Course
 *
 * @package App
 * @property string $teachers
 * @property string $title
 * @property string $slug
 * @property text $description
 * @property decimal $price
 * @property string $course_image
 * @property string $start_date
 * @property tinyInteger $published
*/
class Course extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'slug', 'description', 'price', 'course_image', 'start_date', 'published', 'teachers_id'];
    protected $hidden = [];



    /**
     * Set to null if empty
     * @param $input
     */
    public function setTeachersIdAttribute($input)
    {
        $this->attributes['teachers_id'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setPriceAttribute($input)
    {
        $this->attributes['price'] = $input ? $input : null;
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setStartDateAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['start_date'] = Carbon::createFromFormat(config('app.date_format') . ' H:i:s', $input)->format('Y-m-d H:i:s');
        } else {
            $this->attributes['start_date'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getStartDateAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format') . ' H:i:s');

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d H:i:s', $input)->format(config('app.date_format') . ' H:i:s');
        } else {
            return '';
        }
    }

    public function teachers()
    {
        return $this->belongsTo(User::class, 'teachers_id');
    }
    public function scopeOfTeacher($query)
    {
      if (!Auth::user()->isAdmin()) {
        // code...
        return $query->whereHas('teachers',function($q){
          $q->where('user_id',Auth::user()->id);
        });
        return $query;



      }
    }

}
