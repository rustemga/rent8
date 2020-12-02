<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Rents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class RentsController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'rent_name' => 'required|max:60',
            'description' => 'required|max:255',
        ]);

        $rent = new Rents();
        $rent->rent_name = $request['rent_name'];
        $rent->category_id = $request['category_id'];
        $rent->rent_description = $request['description'];
        $rent->published = $request['published'];
        $rent->user_id = Auth::user()->id;
        if($request['img']){
            $image = $request['img'];
            $extension = $image->getClientOriginalExtention();
            $name = time().'_'.$image->getClientOriginalExtention();
            Storage::disk('public')->put($name, File::get($image));
            $rent->img = $name;
        }else{
            $rent->img = 'default.jpg';
        }
        $rent->save();
        return redirect(route('home'));
    }

}
