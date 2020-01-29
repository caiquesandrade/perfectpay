<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'price'];
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $table ='products';

    public function sales(){
        return $this->belongsTo(Sale::class);
    }
}
