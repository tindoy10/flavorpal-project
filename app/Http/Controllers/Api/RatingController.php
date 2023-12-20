<?php

namespace App\Http\Controllers\Api;

use App\Models\Rating;
use App\Http\Controllers\Controller;
use App\Http\Requests\RatingRequest;

class RatingController extends Controller
{
    public function store(RatingRequest $request)
    {
        $rating = Rating::create($request->all());

        return $rating;
    }
}
