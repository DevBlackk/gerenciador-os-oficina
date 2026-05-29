<?php

namespace App\Http\Controller\Customers\Update;

use Illuminate\Http\Request;

class Controller extends \App\Http\Controller\Controller
{
    public function __invoke(Request $request, string $uuid, \App\Http\Actions\Customer\UpdateCustomer $updateCustomer): \Illuminate\Http\JsonResponse
    {
        try {
            $updateCustomer->execute(
                $uuid,
                $request->input('name'),
                $request->input('phone'),
                $request->input('cpf')
            );

            return response()->json([
                'message' => 'Customer updated successfully',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while updating the customer',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
