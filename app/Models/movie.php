<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use App\Models\rating;
use App\Models\category;

/**
 * Class movie
 * @package App\Models
 *
 */
class movie extends Model
{
    use SoftDeletes;

    public $table = 'movies';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'title',
        'categorie_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'categorie_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'categorie_id' => 'required'
    ];

    public function ratings()
    {
        return $this->hasMany(rating::class);
    }

    public function categorie()
    {
        return $this->belongsTo(category::class);
    }

    public function getvaloracionAttribute()
    {
       return $this->ratings->where('user_id',Auth::id());

    }

    public function getclientesAttribute()
    {
        if($this->ratings->count())
        return $this->ratings->count();
        else
        return 'SIN CALIFICACIONES';
    }

    public function getpromedioAttribute()
    {
        if($this->ratings->avg('rating'))
       return $this->ratings->avg('rating');
        else
        return 'SIN PROMEDIO';
    }
    
}
