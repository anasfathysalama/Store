<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Product extends Model implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = ['name' , 'description'];
    protected $guarded = [];

   public function category()
   {
       return $this->belongsTo('App\Category');
   }

    protected $appends = ['image_path' , 'profit_percent'] ;

    public function getImagePathAttribute(){
        return asset('uploads/products_image/' . $this->image);
    }

    public function getProfitPercentAttribute(){
        $profit = $this->sale_price - $this->purshes_price ;
        $profit_percent = $profit * 100 / $this->purshes_price ;
        return number_format($profit_percent , 2) ;
    }

}
