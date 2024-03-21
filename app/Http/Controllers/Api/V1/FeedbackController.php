<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Feedback;
use App\Http\Requests\StoreFeedbackRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\FeedbackResource;

class FeedbackController extends Controller
{

    /**
     * POST /api/v1/feedback
     *
     * This endpoint allows endusers to post feedback about our beautiful API.
     */
    public function store(StoreFeedbackRequest $request)
    {
        // Validation passed, get all validated data
        $data = $request->validated();

        // Add the current IP
        $data['ip'] = $request->ip();

        $feedback = Feedback::create($data);

        return response([
            'succes' => true,
            'data' => FeedbackResource::make($feedback)
        ], 201);
    }
}
