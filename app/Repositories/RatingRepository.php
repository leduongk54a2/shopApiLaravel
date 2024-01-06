<?php

namespace App\Repositories;

use App\Models\Rating;

class RatingRepository extends BaseRepository
{

    public function model(): string
    {
        return Rating::class;
    }
}
