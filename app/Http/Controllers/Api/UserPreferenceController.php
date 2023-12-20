<?php

namespace App\Http\Controllers\Api;

use App\Models\UserPreference;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserPreferenceRequest;

class UserPreferenceController extends Controller
{
    public function store(UserPreferenceRequest $request)
    {
        $userPreference = UserPreference::create($request->all());

        return $userPreference;
    }
}
