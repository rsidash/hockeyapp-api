<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = [ 'deleted_at' ];

    protected $fillable = [
        'name',
        'description',
        'image_id',
        'owner_id',
        'city_id',
    ];

    public function image()
    {
        return $this->belongsTo(Image::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
