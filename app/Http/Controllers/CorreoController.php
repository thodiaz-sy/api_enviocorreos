<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\CorreoMailable;
use Illuminate\Support\Facades\Mail;

class CorreoController extends Controller
{
    public function enviarCorreo(Request $request)
    {
        $request->validate([
            'destinatario' => 'required|email',
            'plantilla' => 'required|string',
            'asunto' => 'required|string',
            'mensaje' => 'required|string',
            'nombre' => 'required|string',
        ]);
        
        $correo = new CorreoMailable($request->mensaje, $request->plantilla, $request->asunto);
        
        Mail::to($request->destinatario)
            //->cc()
            //->bcc()
            ->send($correo->subject($request->asunto));
        return response()->json(['message' => 'Correo enviado con éxito.']);
    }

    public function correoRecuperaPass(Request $request)
    {
        $request->validate([
            'destinatario' => 'required|email',
            'asunto' => 'required|string',
            'mensaje' => 'required|string',
        ]);
        
        $correo = new CorreoMailable($request->mensaje);
        
        Mail::to($request->destinatario)
            ->send($correo->subject($request->asunto));

            
        return response()->json(['message' => 'Correo enviado con éxito.']);
    }
}
