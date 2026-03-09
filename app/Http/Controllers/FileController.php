<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileController extends Controller
{
    public function uploadTemp(Request $request)
    {
        try {
            $request->validate([
                'file' => 'required|image|mimes:jpeg,png,jpg|max:5120'
            ]);

            $file = $request->file('file');
            $tempId = Str::random(20);
            $extension = $file->getClientOriginalExtension();
            $filename = $tempId . '.' . $extension;

            // Simpan di folder temp
            $path = $file->storeAs('temp', $filename, 'public');

            return response()->json([
                'success' => true,
                'filename' => $filename,
                'path' => $path,
                'url' => asset('storage/' . $path)
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function deleteTemp(Request $request)
    {
        try {
            $filename = $request->filename;
            $files = Storage::disk('public')->files('temp');

            foreach ($files as $file) {
                if (strpos($file, str_replace('.*', '', $filename)) !== false) {
                    Storage::disk('public')->delete($file);
                    break;
                }
            }

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
