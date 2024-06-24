<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plant;
use function App\Helpers\getPlantStageDescription;

class GardenController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $plants = $user->plants; // Fetch all plants of the logged-in user

        foreach ($plants as $plant) {
            $plant->stageDescription = getPlantStageDescription($plant->stage);
            $plant->wateringProgress = $this->calculateOverallProgress($plant);
        }

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
        if ($user->droplet_count < 1) {
            return back()->with('error', 'Not enough droplets to water the plant.');
        }

        // Deduct one droplet
        $user->droplet_count -= 1;
        $user->save();

        // Increment current watering count
        $plant->current_watering_count += 1;

        // Check if the plant should advance to the next stage
        if ($plant->current_watering_count >= $this->getRequiredWateringsForStage($plant->stage)) {
            $plant->stage++;
            $plant->current_watering_count = 0; // Reset watering count for the new stage
        }

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

    private function calculateOverallProgress($plant)
    {
        $totalWaterings = 10; // Total waterings required to reach full bloom
        $currentWateringCount = ($plant->stage - 1) * 3 + $plant->current_watering_count;

        // Check if plant is in full bloom stage
        if ($plant->stage >= 4) {
            return 100; // Set progress to 100% for full bloom
        }

        // Calculate the overall progress percentage
        return ($currentWateringCount / $totalWaterings) * 100;
    }

    private function getRequiredWateringsForStage($stage)
    {
        switch ($stage) {
            case 1:
            case 2:
                return 3; // To reach next stage
            case 3:
                return 4; // To reach full bloom
            default:
                return 0;
        }
    }
}
