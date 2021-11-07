<?php

namespace App\Repositories;

use App\Http\Sort\RequestSort;
use App\Models\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class RequestsRepository
{
    private const PER_PAGE = 12;

    /**
     * Получить список заявок
     *
     * @param RequestSort $sort
     * @return LengthAwarePaginator
     */
    public function getPaged(RequestSort $sort): LengthAwarePaginator
    {
        return Request::sort($sort)->paginate(self::PER_PAGE);
    }
}
