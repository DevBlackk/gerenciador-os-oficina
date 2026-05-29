<?php

declare(strict_types=1);

namespace App\Http\Controller\Customers\Create;

use App\Domain\Customer\UseCase;
use App\Http\Requests\Customer\Create\Request;

class Controller extends \App\Http\Controller\Controller
{
    public function __invoke(Request $request, UseCase $useCase): \Illuminate\Http\JsonResponse
    {
        try {
            $customerId = $useCase->execute($request->validated());

            return response()->json([
                'message' => 'Customer created successfully',
                'customer_id' => $customerId,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while creating the customer',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
