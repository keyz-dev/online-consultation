<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

abstract class Controller
{
    protected function file_handler(Request $request, $field,  $path){
        if ($request->hasFile($field) && $request->file($field)->isValid()) {
            $filePath = $request->file($field)->store($path, 'public');
            Log::info('File uploaded successfully: ' . $filePath);
            return $filePath;
        } else {
            return back()->withErrors([$field => 'Failed to upload profile image.']);
        }
    }
}
