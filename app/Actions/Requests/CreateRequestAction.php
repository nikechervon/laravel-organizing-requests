<?php

namespace App\Actions\Requests;

use App\Actions\AbstractAction;
use App\Enums\MediaCollections;
use App\Http\Requests\ApplicationCreateRequest;
use App\Models\Request;
use App\Tasks\Requests\CreateRequestTask;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

/**
 * @action CreateRequestAction
 * @description Создание новой заявки
 */
class CreateRequestAction extends AbstractAction
{
    /**
     * @param ApplicationCreateRequest $applicationCreateRequest
     * @return Request
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public static function run(ApplicationCreateRequest $applicationCreateRequest): Request
    {
        // Создание заявки
        $data = self::getRequestData($applicationCreateRequest);
        $request = CreateRequestTask::run($data);

        // Добавление изображения
        $request->addMediaFromRequest('image')
            ->toMediaCollection(MediaCollections::REQUESTS_IMAGES);

        return $request;
    }

    /**
     * @param ApplicationCreateRequest $applicationCreateRequest
     * @return array
     */
    private static function getRequestData(ApplicationCreateRequest $applicationCreateRequest): array
    {
        return [
            'title' => $applicationCreateRequest->get('title'),
            'content' => $applicationCreateRequest->get('content'),
            'completion_at' => $applicationCreateRequest->get('date'),
            'status_id' => $applicationCreateRequest->get('status'),
        ];
    }
}
