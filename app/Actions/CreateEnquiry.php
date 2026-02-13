<?php 
namespace App\Actions;

use App\Models\Enquiry;

class CreateEnquiry
{
    public function handle(array $data): Enquiry
    {
        return Enquiry::create($data);
    }
}
