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
        $scaleObject = ScaleObject::create([
            'email' => $request->email
        ]);

        $scaleObject
            ->addFromMediaLibraryRequest($request->file)
            ->toMediaCollection('file');

        return redirect()->back();
    }

    protected function tmp()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Token fe547a148511249ebf5155aaf11f5a8607fd3cb2',
        ])->post(
            'https://api.replicate.com/v1/predictions',
            [
                'version' => '1b976a4d456ed9e4d1a846597b7614e79eadad3032e9124fa63859db0fd59b56',
                'input' => [
                    'img' => 'https://jvc-file-uploads.s3.amazonaws.com/134134134_1668634206/315721841_835295867784933_5716862856436847682_n.jpg',
                    'version' => 'General - RealESRGANplus',
                    'scale' => 10,
                    'face_enhance' => false,
                    'tile '=> 0,
                ],
                'webhook_completed' => 'https://eog75bb66lse6mm.m.pipedream.net',
            ]
        );

        return $response;
    }
}
