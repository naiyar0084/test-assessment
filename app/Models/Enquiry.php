<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Listing;
class Enquiry extends Model
{
    protected $fillable = [
        'listing_id',
        'name',
        'email',
        'message',
    ];

    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }

}
