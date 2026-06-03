<?php

declare(strict_types=1);

namespace App\Http\Controller\Customers\List;


use App\Domain\Customer\List\UseCase;

class Controller extends \App\Http\Controller\Controller
{
    public function __invoke(UseCase $useCase): \Illuminate\Http\JsonResponse
    {
        $customers = $useCase->execute();

        return response()->json($customers);
    }
}
