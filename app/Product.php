<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Brand;
use App\Animal;

class Product extends Model
{
  protected $guarded=[];
}

public function category(){
  return $this->belogsTo(Category::class);
}

public function brand(){
  return $this->belogsTo(Brand::class);
}

public function animal(){
  return $this->belogsTo(Animal::class);
}
