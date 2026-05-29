<?php

declare(strict_types=1);

namespace App\Http\Controller\Customers\List;

use App\Http\Actions\Customer\ListCustomer;
use Illuminate\Http\JsonResponse;

class Controller extends \App\Http\Controller\Controller
{
    public function __invoke(ListCustomer $getCustomers): JsonResponse
    {
        try {
            $customers = $getCustomers->execute();

            return response()->json([
                'message' => 'Customers retrieved successfully',
                'customers' => $customers,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while retrieving customers',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
