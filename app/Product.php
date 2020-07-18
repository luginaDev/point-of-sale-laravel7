<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;
class Product extends Model
{
   
    use AutoNumberTrait;
    protected $guarded = [];
    protected $fillable = ['code','name', 'description', 'stock', 'price','category_id', 'photo'];
    public function getAutoNumberOptions()
    {
        return [
            'code' => [
                'format' => function () {
                    return date('Y.m.d') . '/INV/?';
                },
                'length' => 5
            ]
        ];
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
