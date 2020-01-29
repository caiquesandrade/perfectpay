<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['name', 'identification_type', 'identification_number', 'email'];
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $table ='customers';

    public function sales(){
        return $this->belongsTo(Sale::class);
    }
}
