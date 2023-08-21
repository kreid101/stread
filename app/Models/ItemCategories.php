<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemCategories extends Model
{
    protected $guarded=[];
    protected $with=['categories:id,cat_name'];
    use HasFactory;
    public  function categories()
    {
        return $this->hasMany(Categories::class,'id','category_id');
    }
}
