<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DocumentStatus; // Assuming your model is named DocumentStatus

class DocumentStatusSeeder extends Seeder
{
    public function run()
    {
        $statuses = [
            'Pending',
            'Approved',
            'Annotated',
            'Rejected'
        ];

        foreach($statuses as $status) {
            DocumentStatus::create([
                'name' => $status
            ]);
        }
    }
}
