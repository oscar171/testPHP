<?php

namespace App\Repositories;

use App\Models\rating;
use InfyOm\Generator\Common\BaseRepository;

class ratingRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'rating',
        'movie_id',
        'user_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return rating::class;
    }
}
