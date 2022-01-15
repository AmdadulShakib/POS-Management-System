<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function supplier()
    {
        return $this->belongsTo(Supplier::class,'supplier_id','id');
    }
    public function category()
     {
        return $this->belongsTo(Category::class,'category_id','id');
     }
    public function customer()
     {
        return $this->belongsTo(Customer::class,'customer_id','id');
     }
}
