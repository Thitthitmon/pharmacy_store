<?php


namespace App\Repositories;


use App\Models\Order;

class OrderRepository extends BaseRepository
{

    protected $fieldSearchable = [
        'order_name'
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

    public function model()
    {
        return Order::class;
    }
}