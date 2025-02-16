<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Documents;
use Illuminate\Support\Facades\DB;
use setasign\Fpdi\Tcpdf\Fpdi;

class DocumentStatusController extends Component
{
    public function download($id)
    {
        $document = DB::table('document_student')
            ->where('document_id', '=', "{$id}")
            ->select('document_student.id', 'document_id', 'student_id')
            ->first();

        $file_name = "{$document->id}{$document->document_id}{$document->student_id}";

        return response()->download(public_path("files/{$file_name}.pdf"));
    }

    public function approve($id)
    {
        $document = Documents::find($id);
        $document->document_status_id = 2;
        $document->save();

        $document_student = DB::table('document_student')
            ->where('document_id', '=', "{$id}")
            ->select('id', 'document_id', 'student_id')
            ->first();

        $file_name = "{$document_student->id}{$document_student->document_id}{$document_student->student_id}";
        $file_path = public_path("files/{$file_name}");
        $compressed_folder = storage_path('compressed');
        if (!is_dir($compressed_folder)) {
            mkdir($compressed_folder, 0777, true); // Create the folder if it doesn't exist
        }

        $data = file_get_contents($file_path . '.pdf');
        $gzdata = gzencode($data, 9);
        $compressed_file_path = "{$compressed_folder}/{$file_name}.gz";
        file_put_contents($compressed_file_path, $gzdata);

        return redirect()->back();
    }

    public function annotate($id)
    {
        $document = Documents::find($id);
        $document->document_status_id = 3;
        $document->save();

        $document_student = DB::table('document_student')
            ->where('document_id', '=', "{$id}")
            ->select('id', 'document_id', 'student_id')
            ->first();

        $file_name = "{$document_student->id}{$document_student->document_id}{$document_student->student_id}";
        $file_path = public_path("files/{$file_name}");

        return redirect()->back();
    }

    public function reject($id)
    {
        $document = Documents::find($id);
        $document->document_status_id = 4;
        $document->save();

        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.document-status-controller');
    }
}
