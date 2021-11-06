<?php

namespace App\Http\Controllers;

use App\Actions\Requests\GetPagedRequestsAction;
use App\Http\Sort\RequestSort;
use App\Models\Request;
use Illuminate\View\View;

/**
 * @controller RequestController
 * @description Отвечает за работу с заявками
 */
class RequestController extends Controller
{
    /**
     * Страница со списком заявок
     *
     * @param RequestSort $sort
     * @return View
     */
    public function index(RequestSort $sort): View
    {
        $requests = GetPagedRequestsAction::run($sort);

        return view('requests.index')->with([
            'requests' => $requests,
        ]);
    }

    /**
     * Детальная страница заявки
     *
     * @param Request $request
     * @return View
     */
    public function show(Request $request): View
    {
        return view('requests.show')->with([
            'request' => $request,
        ]);
    }
}
