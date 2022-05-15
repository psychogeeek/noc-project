<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PopPoint extends Model
{
    use HasFactory;

    public function servicetypes(){
        return $this->belongsToMany(ServiceType::class , 'pop_point_service_types');
    }
    public function services(){
        return $this->hasMany('App\Models\Service');
    }
}
