<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;


    protected $fillable = ['name'];
    protected $table = 'attributes';

    public function values()
    {
        return $this->hasMany(AttributeValue::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_attribute_values')->withPivot('attribute_value_id');
    }

}
