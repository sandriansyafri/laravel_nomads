<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TravelPackage extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['gallery'];

    public function gallery()
    {
        return $this->hasMany(Gallery::class, 'travel_package_id', 'id');
    }
}
