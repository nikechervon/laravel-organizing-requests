<?php

namespace App\Models;

use App\Enums\MediaCollections;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Request extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return void
     */
    public function registerAllMediaConversions(): void
    {
        $this->addMediaCollection(MediaCollections::REQUESTS_IMAGES)
            ->singleFile();
    }
}
