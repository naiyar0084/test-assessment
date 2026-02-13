<?php

namespace App\Actions;

use App\Models\Listing;
use App\Models\User;

class SaveListing
{
    public function handle(array $data, User $user, ?Listing $listing = null): Listing
    {
        return $user->listings()->updateOrCreate(
            ['id' => $listing?->id],
            array_merge($data, [
                // Any create or edit goes back to moderation
                'status' => 'pending',
            ])
        );
    }
}

