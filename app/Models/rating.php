<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;
use App\Models\movie;

/**
 * Class rating
 * @package App\Models
 * 
 */
class rating extends Model
{
    use SoftDeletes;

    public $table = 'ratings';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'rating',
        'movie_id',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'movie_id' => 'integer',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'rating' => 'required'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function movie()
    {
        return $this->belongsTo(movie::class);
    }
}
