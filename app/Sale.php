<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ['product_id', 'customer_id', 'quantity', 'discount', 'sale_amount', 'status'];
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $table ='sales';

    public function customers(){
        return $this->hasMany(Customer::class);
    }

    public function products(){
        return $this->hasOne(Product::class);
    }

}
