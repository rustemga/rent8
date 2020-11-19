<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rents extends Model
{
    use HasFactory;

    protected $fillable = [
        'rent_name', 'rent_description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
