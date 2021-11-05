<?php

namespace App\Repositories;

use App\Models\Status;
use Illuminate\Database\Eloquent\Model;

class StatusesRepository
{
    /**
     * @return Model|Status
     */
    public function getRandom(): Model|Status
    {
        return Status::query()->inRandomOrder()->first();
    }
}
