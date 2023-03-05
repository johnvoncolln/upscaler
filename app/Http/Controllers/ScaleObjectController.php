<?php

namespace App\Http\Controllers;

use App\Models\ScaleObject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ScaleObjectController extends Controller
{
    public function show()
    {
        return view('index');
    }

    public function store(Request $request)
    {
        // Todo: validation: file type, file size, runs per user per day

        $scaleObject = ScaleObject::create([
            'email' => 'john@shortrunposters.com',//$request->email
        ]);

        $scaleObject
            ->addFromMediaLibraryRequest($request->file)
            ->toMediaCollection('file', 's3');

        $response = Http::withHeaders([
            'Authorization' => 'Token c1791e28f4fd74307d2b968aa23a312e78a78f82',
        ])->post(
            'https://api.replicate.com/v1/predictions',
            [
                'version' => '1b976a4d456ed9e4d1a846597b7614e79eadad3032e9124fa63859db0fd59b56',
                'input' => [
                    'img' => $scaleObject->fresh()->getFirstMedia('file')->getUrl(),
                    'version' => 'General - RealESRGANplus',
                    'scale' => 5,
                    'face_enhance' => false,
                    'tile '=> 200,
                ],
                'webhook_completed' => 'https://upscaler.srp.xyz/api/webhook',
            ]
        );

        $scaleObject->update([
            'replicate_id' => $response['id']
        ]);


        return redirect()->back()->with([
            'message' => 'Your file has been uploaded',
        ]);
    }
}
