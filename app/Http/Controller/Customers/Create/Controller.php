<?php

declare(strict_types=1);

namespace App\Http\Controller\Customers\Create;

use App\Http\Actions\Customer\CreateCustomer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class Controller extends \App\Http\Controller\Controller
{
    public function __invoke(Request $request, CreateCustomer $createCustomer): JsonResponse
    {
        try {
            $data = $request->validate([
                'name' => 'required',
                'phone' => 'required',
                'cpf' => 'required|unique:customers,cpf',
            ]);

            $customer = $createCustomer->execute($data);

            return response()->json([
                'message' => 'Customer created successfully',
                'customer' => $customer,
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while creating the customer',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
