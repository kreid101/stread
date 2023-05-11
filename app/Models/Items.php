<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    protected $guarded=[];
    protected $with=['images','brand:id,brand_name','sizes'];
    use HasFactory;
    public function sizes()
    {
        return $this->belongsToMany(sizes::class,'items_sizes')->withPivot('quntity');
    }
    public function images()
    {
        return $this->hasMany(Images::class,'item_id');
    }
    public function brand()
    {
        return $this->hasOne(Brands::class,'id','brand_id');
    }

}
