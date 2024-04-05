<?php

namespace App\Models;

use App\Models\District;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use HasFactory;

    protected $table = 'sehir';
    protected $guarded = [];


    public function districts()
    {
        return $this->hasMany(District::class, 'ilce_sehirkey', 'id');
    }
}
