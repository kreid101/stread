<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;



class Items extends Model
{
    use Searchable;

    protected $guarded = [];
    protected $with = ['images', 'brand:id,brand_name', 'sizes', 'category'];
    use HasFactory;

    public function sizes()
    {
        return $this->belongsToMany(Sizes::class, 'items_sizes')->withPivot('quntity');
    }

    public function images()
    {
        return $this->hasMany(Images::class,'item_id');
    }
    public function brand()
    {
        return $this->hasOne(Brands::class,'id','brand_id');
    }
    public function category()
    {
        return $this->belongsToMany(Categories::class,'item_categories','item_id','category_id');
    }
    public function about()
    {
        return $this->hasOne(AboutItem::class,'item_id','id');
    }
    public function toSearchableArray()
    {
        $col = $this->toArray();
        $item=[$col['item_name'],$col['brand']['brand_name']];
        return $item;

    }


}
