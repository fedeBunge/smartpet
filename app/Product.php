<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Brand;
use App\Animal;

class Product extends Model
{
  protected $guarded=[];

  public function category(){
    return $this->belongsTo(Category::class);
  }

  public function brand(){
    return $this->belongsTo(Brand::class);
  }

  public function animal(){
    return $this->belongsTo(Animal::class);
  }

}
