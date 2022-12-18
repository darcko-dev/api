<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DownloadController extends Controller
{
    public function download($file)
    {
        // Validar que el archivo exista en la carpeta public/vxsystem
        $path = public_path().'/vxsystem/'.$file;
        if(!File::exists($path)) {
            return response()->json(['error' => 'El archivo no existe'], 404);
        }
        
        // Descargar el archivo
        $headers = [
            'Content-Type' => 'application/octet-stream',
            'Content-Disposition' => 'attachment; filename="'.$file.'"',
        ];
        return response()->download($path, $file, $headers);
    }
}
