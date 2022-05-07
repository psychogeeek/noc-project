<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceType extends Model
{
    use HasFactory;
    public function poppoints(){
        return $this->belongsToMany(PopPoint::class,'pop_point_service_types');
    }
}
