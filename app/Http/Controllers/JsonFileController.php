<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class JsonFileController extends Controller
{
    public function downloadJson(Request $request): \Symfony\Component\HttpFoundation\BinaryFileResponse
    {
        $data = $request->except('_token');
        $json = json_encode($data);
        $file = Str::uuid().'.json';
        $path = public_path($file);
        file_put_contents($path, $json);
        return response()->download($path);
    }
}
