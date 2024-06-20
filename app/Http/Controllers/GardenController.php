<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plant;

class GardenController extends Controller
{
    public function index()
    {
        $plants = Plant::where('user_id', auth()->id())->get();
        return view('garden.index', compact('plants'));
    }
}
