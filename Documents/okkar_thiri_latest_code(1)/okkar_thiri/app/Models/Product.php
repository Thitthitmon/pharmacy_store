<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

	public $fillable = [
        'name',
        'image',
		'description',
		'price',
		'code',
        'type_id',
        'quantity'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name',
        'image',
        'description',
        'price',
        'code',
        'type_id',
        'quantity'
    ];

    public function types()
    {
        return $this->belongsTo(Type::class,'type_id');
    }
   
}
