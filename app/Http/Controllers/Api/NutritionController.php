<?php

namespace App\Http\Controllers\Api;

use App\Models\Nutrition;
use App\Http\Controllers\Controller;
use App\Http\Requests\NutritionRequest;

class NutritionController extends Controller
{
    public function store(NutritionRequest $request)
    {
        $nutrition = Nutrition::create($request->all());

        return $nutrition;
    }

    public function getLatestNutritionId()
    {
        $latestNutrition = Nutrition::latest()->first();

        return response()->json(['latest_nutrition_id' => $latestNutrition->nutrition_id]);
    }
}
