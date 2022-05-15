<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    public function customer(){
        return $this->belongsTo('App\Models\Customer');
    }
    public function serviceType(){
        return $this->belongsTo('App\Models\ServiceType');
    }

    public function poppoint(){
        return $this->belongsTo('App\Models\PopPoint');
    }
    public function test($service){
      if (! Service::where($service->poppoint)->exists()){

      }
    }
}
