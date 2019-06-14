<?php

namespace App\Repositories;

use App\Models\Type;
use App\Repositories\BaseRepository;

/**
 * Class TypeRepository
 * @package App\Repositories
 * @version March 27, 2019, 7:40 am UTC
*/

class TypeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Type::class;
    }
}
