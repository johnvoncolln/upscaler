<?php

namespace App\Observers;

use App\Models\ScaleObject;
use Illuminate\Support\Facades\Http;

class ScaleObjectObserver
{
    public function created(ScaleObject $scaleObject)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Token fe547a148511249ebf5155aaf11f5a8607fd3cb2',
        ])->post(
            'https://api.replicate.com/v1/predictions',
            [
                'version' => '1b976a4d456ed9e4d1a846597b7614e79eadad3032e9124fa63859db0fd59b56',
                'input' => [
                    'img' => $scaleObject->getFirstMedia('file')->getUrl(),
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
