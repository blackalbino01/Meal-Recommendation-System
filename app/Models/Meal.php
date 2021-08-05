<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SideItem;
use App\Models\Allergy;

class Meal extends Model
{
    use HasFactory;



    public function allergy(){

        return $this->belongsTo(Allergy::class);
    }


    public function sideItems(){
        return $this->hasMany(SideItem::class);
    }
}
