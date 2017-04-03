<?php

namespace App\Repositories;

use App\Models\movie;
use InfyOm\Generator\Common\BaseRepository;

class movieRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'categorie_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return movie::class;
    }
}
