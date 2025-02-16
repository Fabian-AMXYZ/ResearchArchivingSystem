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
                <span class="md:hidden font-bold">ID: </span>{{ $item->id }}
            </td>
            <td class="py-2 px-4 border-b md:border-none text-center block md:table-cell">
                <span class="md:hidden font-bold">Title: </span>{{ $item->title }}
            </td>
            <td class="py-2 px-4 border-b md:border-none text-center block md:table-cell">
                <span class="md:hidden font-bold">Abstract: </span>{{ $item->abstract }}
            </td>
            <td class="py-2 px-4 border-b md:border-none text-center block md:table-cell">
                <span class="md:hidden font-bold">Field: </span>{{ $item->field_topic }}
            </td>
            <td class="py-2 px-4 border-b md:border-none text-center block md:table-cell">
                <span class="md:hidden font-bold">Status: </span>{{ $item->name }}
            </td>
            <td class="py-2 px-4 border-b md:border-none text-center block md:table-cell">
                <span class="md:hidden font-bold">First Name: </span>{{ $item->first_name }}
            </td>
            <td class="py-2 px-4 border-b md:border-none text-center block md:table-cell">
                <span class="md:hidden font-bold">Last Name: </span>{{ $item->last_name }}
            </td>
            <td class="py-2 px-4 border-b md:border-none text-center block md:table-cell">
                <span class="md:hidden font-bold">Actions: </span>
                <div class="flex justify-center space-x-2">
                    @if($item->document_status_id == 1)
                    <a href="{{ route('download-document', ['id' => $item->id]) }}" class="bg-blue-500 text-white py-1 px-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-300">Download</a>
                    <a href="{{ route('approve-documents', ['id' => $item->id]) }}" class="bg-green-500 text-white py-1 px-3 rounded focus:outline-none focus:ring-2 focus:ring-green-300">Approve</a>
                    <a href="{{ route('annotate-documents', ['id' => $item->id]) }}" class="bg-yellow-500 text-white py-1 px-3 rounded focus:outline-none focus:ring-2 focus:ring-yellow-300">Annotate</a>
                    <a href="{{ route('reject-documents', ['id' => $item->id]) }}" class="bg-red-500 text-white py-1 px-3 rounded focus:outline-none focus:ring-2 focus:ring-red-300">Reject</a>
                    @endif
                </div>
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