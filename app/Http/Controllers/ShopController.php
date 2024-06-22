<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plant;
use App\Models\User;

class ShopController extends Controller
{
    public function index()
    {
        $seeds = ['lavender', 'sunflower', 'cactus', 'tulip', 'daisy','lilly'];
        return view('shop.index', compact('seeds'));
    }

    public function buy(Request $request)
    {
        $user = auth()->user();

        // Ensure the user has enough droplets
        if ($user->droplet_count < 10) {
            return back()->with('error', 'Not enough droplets');
        }

        // Deduct droplets
        $user->droplet_count -= 10;
        $user->save();

        // Create a new plant
        $plant = new Plant([
            'type' => $request->seed,
            'stage' => 1
        ]);

        $user->plants()->save($plant);

        return back()->with('success', 'Seed purchased successfully');
    }
}
