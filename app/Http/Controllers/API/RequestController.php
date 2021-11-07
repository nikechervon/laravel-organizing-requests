<?php

namespace App\Http\Controllers\API;

use App\Actions\Requests\GetPagedRequestsAction;
use App\Http\Controllers\Controller;
use App\Http\Resources\RequestResource;
use App\Http\Sort\RequestSort;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * @controller RequestController
 * @description Отвечает за работу с заявками (API)
 */
class RequestController extends Controller
{
    /**
     * Получение списка заявок
     *
     * @param RequestSort $sort
     * @return AnonymousResourceCollection
     */
    public function index(RequestSort $sort): AnonymousResourceCollection
    {
        $requests = GetPagedRequestsAction::run($sort);
        return RequestResource::collection($requests);
    }
}
