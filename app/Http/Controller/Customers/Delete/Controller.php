<?php

declare(strict_types=1);

namespace App\Http\Controller\Customers\Delete;

use Illuminate\Http\JsonResponse;

class Controller extends \App\Http\Controller\Controller
{
    public function __invoke(string $id): JsonResponse
    {
        try {
            (new \App\Http\Actions\Customer\DeleteCostumer())->execute($id);
            return response()->json([
                'message' => 'Customer deleted successfully'
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to delete customer',
                'details' => $e->getMessage()
            ], 500);
        }
    }
}
