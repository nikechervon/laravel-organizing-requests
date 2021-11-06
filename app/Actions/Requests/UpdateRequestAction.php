<?php

namespace App\Actions\Requests;

use App\Actions\AbstractAction;
use App\Enums\MediaCollections;
use App\Http\Requests\ApplicationUpdateRequest;
use App\Models\Request;
use App\Tasks\Requests\UpdateRequestTask;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

/**
 * @action UpdateRequestAction
 * @description Обновить заявку
 */
class UpdateRequestAction extends AbstractAction
{
    /**
     * @param ApplicationUpdateRequest $updateRequest
     * @param Request $request
     * @return Request
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public static function run(ApplicationUpdateRequest $updateRequest, Request $request): Request
    {
        // Обновление заявки
        $data = self::getRequestData($updateRequest);
        $request = UpdateRequestTask::run($request, $data);

        // Добавление изображения
        if ($image = $updateRequest->file('image')) {
            $request->addMedia($image)->toMediaCollection(MediaCollections::REQUESTS_IMAGES);
        }

        return $request;
    }

    /**
     * @param ApplicationUpdateRequest $updateRequest
     * @return array
     */
    private static function getRequestData(ApplicationUpdateRequest $updateRequest): array
    {
        return [
            'title' => $updateRequest->get('title'),
            'content' => $updateRequest->get('content'),
            'completion_at' => $updateRequest->get('date'),
            'status_id' => $updateRequest->get('status'),
        ];
    }
}
