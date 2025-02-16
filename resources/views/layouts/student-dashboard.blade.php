<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

$student_id = DB::table('student')
    ->where('user_id', '=', Auth::user()->id)
    ->value('id');

$department_id = DB::table('student')
    ->where('user_id', '=', Auth::user()->id)
    ->value('department_id');

$faculties = DB::table('faculty')
    ->where('department_id', "=",  $department_id)
    ->select("faculty.id", "faculty.first_name", "faculty.last_name")
    ->get();
?>

@section('content')
<table class="min-w-full bg-white border border-gray-200">
    <thead>
        <tr class="hidden md:table-row">
            <th class="py-2 px-4 border-b">ID</th>
            <th class="py-2 px-4 border-b">Title</th>
            <th class="py-2 px-4 border-b">Abstract</th>
            <th class="py-2 px-4 border-b">Field</th>
            <th class="py-2 px-4 border-b">Status</th>
            <th class="py-2 px-4 border-b">First Name</th>
            <th class="py-2 px-4 border-b">Last Name</th>
            <th class="py-2 px-4 border-b">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($documents as $item)
        <tr class="block md:table-row border-b md:border-none">
            <td class="py-2 px-4 border-b md:border-none text-center block md:table-cell">
                <span class="md:hidden font-bold">ID:
                </span>
                {{ $item->id }}
            </td>
            <td class="py-2 px-4 border-b md:border-none text-center block md:table-cell">
                <span class="md:hidden font-bold">Title:
                </span>
                {{ $item->title }}
            </td>
            <td class="py-2 px-4 border-b md:border-none text-center block md:table-cell">
                <span class="md:hidden font-bold">Abstract:
                </span>
                {{ $item->abstract }}
            </td>
            <td class="py-2 px-4 border-b md:border-none text-center block md:table-cell">
                <span class="md:hidden font-bold">Field/Topic
                </span>
                {{ $item->field_topic }}
            </td>
            <td class="py-2 px-4 border-b md:border-none text-center block md:table-cell">
                <span class="md:hidden font-bold">Status:
                </span>
                {{ $item->name }}
            </td>
            <td class="py-2 px-4 border-b md:border-none text-center block md:table-cell">
                <span class="md:hidden font-bold">First Name:
                </span>
                {{ $item->first_name }}
            </td>
            <td class="py-2 px-4 border-b md:border-none text-center block md:table-cell">
                <span class="md:hidden font-bold">Last Name:
                </span>
                {{ $item->last_name }}
            </td>
            <td class="py-2 px-4 border-b md:border-none text-center block md:table-cell">
                <span class="md:hidden font-bold">Actions: 
                </span>
            </td>
        </tr>
        <tr class="block md:hidden">
            <td colspan="8" class="py-2 px-4">
                <hr class="border-t border-gray-300">
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

@section('button')
<!-- Submit Document Button -->
<div class="mt-4">
    <button class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700" onclick="openModal()">
        Submit Document
    </button>
</div>

<!-- Modal -->
<div id="modal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-lg mx-4 sm:mx-6 md:mx-8 lg:mx-10 xl:mx-12">
        <h2 class="text-xl font-bold mb-4">Submit Document</h2>
        <form method="POST" action="/submit-document" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-gray-700">Title</label>
                <input type="text" id="title" name="title" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter the title of your document">
            </div>
            <div class="mb-4">
                <label for="abstract" class="block text-gray-700">Abstract</label>
                <textarea id="abstract" name="abstract" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Provide a brief summary of your document"></textarea>
            </div>
            <div class="mb-4">
                <label for="field_topic" class="block text-gray-700">Field/Topic</label>
                <textarea id="field_topic" name="field_topic" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Specify the field or topic of your document"></textarea>
            </div>
            <div class="mb-4">
                <label for="faculty" class="block text-gray-700">Faculty</label>
                <select id="faculty" name="faculty" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="" hidden>Select Faculty</option>
                    @foreach ($faculties as $faculty)
                    <option value="{{ $faculty->id }}">{{ $faculty->first_name . " " .$faculty->last_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="file" class="block text-gray-700">Upload File (*.pdf only)</label>
                <input type="file" id="file" name="file" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Upload your document in PDF format">
            </div>
            <div class="flex justify-end">
                <button type="button" class="bg-gray-500 text-white py-2 px-4 rounded hover:bg-gray-700 mr-2" onclick="closeModal()">Cancel</button>
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">Submit</button>
            </div>
        </form>
    </div>
</div>

@endsection