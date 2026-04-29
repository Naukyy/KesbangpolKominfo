<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendDocumentMail;

class EmailDocumentController extends Controller
{
    public function showForm()
    {
        return view('email-pdf.form');
    }

    public function sendEmail(Request $request)
    {
        // Validasi input
        $request->validate([
            'email_tujuan' => 'required|email',
            'keterangan' => 'nullable|string',
            'file_pdf' => 'required|mimes:pdf|max:10240', // Maksimal 10MB
        ]);

        // Ambil file yang diupload user
        $file = $request->file('file_pdf');
        
        try {
            // Proses pengiriman email
            Mail::to($request->email_tujuan)->send(new SendDocumentMail($request->keterangan, $file));
            
            return back()->with('success', 'Email dan file PDF berhasil dikirim ke ' . $request->email_tujuan);
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal mengirim email: ' . $e->getMessage());
        }
    }
}