<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
use Illuminate\Support\Facades\Storage;


class FileController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Recibe múltiples archivos y guarda cada uno.
        foreach ($request->files as $file) {

            //Valida que se haya cargado el archivo correctamente
            if ($file->isValid()) {
                //Guarda el archivo en storage/app/
                $hashedName = $file->store('');

                //Guarda registro en tabla archivos
                $regFile = File::create([
                    'modelo_id' => $request->modelo_id,
                    'modelo_type' => 'App\\' . $request->modelo_type,
                    'nombre' => $file->getClientOriginalName(),
                    'hashed' => $hashedName,
                    'mime' => $file->getClientMimeType(),
                    'size' => $file->getClientSize(),
                ]);
                $regFile->save();
            }
        }

        return redirect()->back();
    }

    /**
     * Descarga el archivo.
     *
     * @param  \App\Archivo  $archivo
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        $headers = ['Content-Type: ' . $file->mime];
        return Storage::download($file->hashed, $file->nombre, $headers);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Archivo  $archivo
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        Storage::delete($file->hashed);
        $file->delete();
        return redirect()->back();
    }

}
