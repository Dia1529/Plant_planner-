<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plant;

class GardenController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $plants = $user->plants; // Fetch all plants of the logged-in user
        return view('garden.index', compact('plants'));
    }

    public function water(Request $request, Plant $plant)
    {
        $user = auth()->user();

        // Ensure the plant belongs to the user
        if ($plant->user_id !== $user->id) {
            return back()->with('error', 'Unauthorized action.');
        }

        // Ensure the user has enough droplets
        $dropletsRequired = $this->getDropletsRequired($plant->stage);
        if ($user->droplet_count < $dropletsRequired) {
            return back()->with('error', 'Not enough droplets to water the plant.');
        }

        // Deduct droplets and advance plant stage
        $user->droplet_count -= $dropletsRequired;
        $user->save();

        $plant->stage++;
        $plant->save();

        return back()->with('success', 'Plant watered successfully.');
    }

    public function memo(Request $request, Plant $plant)
    {
        $request->validate([
            'memo' => 'required|string|max:255',
        ]);

        // Ensure the plant belongs to the user
        $user = auth()->user();
        if ($plant->user_id !== $user->id) {
            return back()->with('error', 'Unauthorized action.');
        }

        $plant->memo = $request->memo;
        $plant->save();

        return back()->with('success', 'Memo added successfully.');
    }

    private function getDropletsRequired($stage)
    {
        switch ($stage) {
            case 1:
                return 3;
            case 2:
                return 3;
            case 3:
                return 4;
            default:
                return 0;
        }
    }
}
