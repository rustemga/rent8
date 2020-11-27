<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description',
    ];

    public function rents(){
        return $this->belongsToMany(Rents::class);
    }
}
