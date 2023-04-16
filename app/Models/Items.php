<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    protected $guarded=[];
    use HasFactory;
    public function sizes()
    {
        return $this->belongsToMany(sizes::class,'items_sizes')->withPivot('quntity');
    }
}
