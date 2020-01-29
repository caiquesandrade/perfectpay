<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ['quantity', 'discount', 'sale amout', 'status'];
    protected $guarded = ['id','product_id','customer_id', 'created_at', 'updated_at'];
    protected $table ='products';

    public function customers(){
        return $this->hasMany(Customer::class);
    }

    public function products(){
        return $this->hasOne(Product::class);
    }

}
