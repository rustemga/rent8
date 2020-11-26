<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class RentsController extends Controller
{
    public function create(){
        $categories = Categories::get();
        return $categories;
    }
}
