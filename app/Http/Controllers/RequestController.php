<?php

namespace App\Http\Controllers;

use App\Actions\Requests\CreateRequestAction;
use App\Actions\Requests\GetPagedRequestsAction;
use App\Actions\Statuses\GetStatusesAction;
use App\Http\Requests\ApplicationCreateRequest;
use App\Http\Sort\RequestSort;
use App\Models\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

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

    /**
     * Страница создания новой заявки
     *
     * @return View
     */
    public function create(): View
    {
        $statuses = GetStatusesAction::run();
        return view('requests.create', [
            'statuses' => $statuses,
        ]);
    }

    /**
     * Создание заявки
     *
     * @param ApplicationCreateRequest $request
     * @return RedirectResponse
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function store(ApplicationCreateRequest $request): RedirectResponse
    {
        CreateRequestAction::run($request);
        session()->flash('success', 'Заявка успешно создана!');
        return back();
    }
}
