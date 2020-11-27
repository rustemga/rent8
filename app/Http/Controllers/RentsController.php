<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Rents;
use Illuminate\Http\Request;

class RentsController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'rent_name' => 'required',
            'description' => 'required',
        ]);

        $rent = new Rents();
        $rent->rent_name = $request->rent_name;
        $rent->category_id = $request->category_id;
        $rent->rent_description = $request->description;
        $rent->published = $request->published;
        $rent->save();
    }
}
