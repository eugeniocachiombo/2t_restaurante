<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        "description",
        "province_id",
        "municipality_id",
    ];

    public function getProvince(){
        return $this->belongsTo(Province::class, "province_id", "id");
    }

    public function getMunicipality(){
        return $this->belongsTo(Municipality::class, "municipality_id", "id");
    }
}
