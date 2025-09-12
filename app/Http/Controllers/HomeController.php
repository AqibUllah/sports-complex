<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        return Inertia::render('Home',[
            'categories'    => Category::select('name','slug','description','icon','color')->get()
        ]);
    }
}
