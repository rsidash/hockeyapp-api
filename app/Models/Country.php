<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = [ 'deleted_at' ];

    protected $fillable = [
        'country_code',
        'name_en',
        'name_ru',
        'phone_code',
    ];

    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
