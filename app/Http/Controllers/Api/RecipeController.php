<?php

namespace App\Http\Controllers\Api;

use App\Models\Recipe;
use App\Http\Controllers\Controller;
use App\Http\Requests\RecipeRequest;

class RecipeController extends Controller
{
    public function store(RecipeRequest $request)
    {
        $recipe = Recipe::create($request->all());

        return $recipe;
    }

    public function getLatestRecipeId()
    {
        $latestRecipe = Recipe::latest()->first();

        return response()->json(['latest_recipe_id' => $latestRecipe->recipe_id]);
    }
}
