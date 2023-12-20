<?php

namespace App\Http\Controllers\Api;

use App\Models\SavedRecipe;
use App\Http\Controllers\Controller;
use App\Http\Requests\SavedRecipeRequest;

class SavedRecipeController extends Controller
{
    public function store(SavedRecipeRequest $request)
    {
        $savedRecipe = SavedRecipe::create($request->all());

        return $savedRecipe;
    }
}
