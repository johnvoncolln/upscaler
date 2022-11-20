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
            'email' => $request->email
        ]);

        $scaleObject
            ->addFromMediaLibraryRequest($request->file)
            ->toMediaCollection('file', 's3');

        $response = Http::withHeaders([
            'Authorization' => 'Token fe547a148511249ebf5155aaf11f5a8607fd3cb2',
        ])->post(
            'https://api.replicate.com/v1/predictions',
            [
                'version' => '1b976a4d456ed9e4d1a846597b7614e79eadad3032e9124fa63859db0fd59b56',
                'input' => [
                    'img' => $scaleObject->fresh()->getFirstMedia('file')->getUrl(),
                    'version' => 'General - RealESRGANplus',
                    'scale' => 10,
                    'face_enhance' => false,
                    'tile '=> 0,
                ],
                'webhook_completed' => 'https://srp.us-1.sharedwithexpose.com/api/webhook',
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
