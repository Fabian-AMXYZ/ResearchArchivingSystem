<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Documents;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Documents::create([
            'title' => 'Web and Mobile-Based 360° Faculty Evaluation System for Comprehensive Performance Assessment',
            'abstract' => 'Digital platform aimed at automating and streamlining the faculty evaluation process at educational institutions.',
            'keyword' => 'Evaluation System',
            'document_status_id' => 2,
        ]);

        Documents::create([
            'title' => 'Cloud-based Research Archiving System: A Design Framework for Scalable Repositories',
            'abstract' => 'Provide a platform that eases the submission process of papers related to Thesis, Research, and Capstone Projects.',
            'keyword' => 'Document Archiving',
            'document_status_id' => 2,
        ]);

    }
}
