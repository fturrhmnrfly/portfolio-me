<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminCertificateController extends Controller
{
    public function index()
    {
        $certificates = Certificates::latest()->get();
        return view('admin.certificates.index', compact('certificates'));
    }

    public function create()
    {
        return view('admin.certificates.create');
    }

    public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'issued_by' => 'required',
        'issued_at' => 'required|date',
        'description' => 'required',
        'file' => 'required|mimes:pdf|max:2048'
    ]);

    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput();
    }

    $file = $request->file('file');
    
    // Gunakan nama file yang unik
    $filename = uniqid() . '_' . $file->getClientOriginalName();
    
    // Sesuaikan path penyimpanan
    $file->move(public_path('storage/public/certificates'), $filename);

    Certificates::create([
        'name' => $request->name,
        'issued_by' => $request->issued_by,
        'issued_at' => $request->issued_at,
        'description' => $request->description,
        'file' => $filename
    ]);

    return redirect()->route('admin.certificates.index')
        ->with('success', 'Certificate created successfully.');
}

public function edit(Certificates $certificate)
{
    return view('admin.certificates.edit', compact('certificate'));
}

public function update(Request $request, Certificates $certificate)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'issued_by' => 'required',
        'issued_at' => 'required|date',
        'description' => 'required',
        'file' => 'nullable|mimes:pdf|max:2048'
    ]);

    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput();
    }

    $data = $request->except('file');

    if ($request->hasFile('file')) {
        // Hapus file lama
        $oldFilePath = public_path('storage/public/certificates/' . $certificate->file);
        if (file_exists($oldFilePath)) {
            unlink($oldFilePath);
        }
        
        // Upload file baru
        $file = $request->file('file');
        $filename = uniqid() . '_' . $file->getClientOriginalName();
        $file->move(public_path('storage/public/certificates'), $filename);
        
        $data['file'] = $filename;
    }

    $certificate->update($data);

    return redirect()->route('admin.certificates.index')
        ->with('success', 'Certificate updated successfully.');
}

public function destroy(Certificates $certificate)
{
    $filePath = public_path('storage/public/certificates/' . $certificate->file);
    
    // Hapus file fisik
    if (file_exists($filePath)) {
        unlink($filePath);
    }

    $certificate->delete();

    return redirect()->route('admin.certificates.index')
        ->with('success', 'Certificate deleted successfully.');
}
}