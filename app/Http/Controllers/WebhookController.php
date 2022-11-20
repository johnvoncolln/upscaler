<?php

namespace App\Http\Controllers;

use App\Mail\UpscaledImageGenerated;
use App\Models\ScaleObject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class WebhookController extends Controller
{
    public function store(Request $request)
    {
        if ($request->status === "succeeded") {
            // conditional - if we don't find it
            $scaleObject = ScaleObject::where('replicate_id', $request->id)->first();

            $scaleObject->update([
                'replicate_img_url' => $request->output,
            ]);

            $ext  = pathinfo($scaleObject->getFirstMedia('file')->getPath(), PATHINFO_EXTENSION);

            $scaleObject
                ->addMediaFromUrl($scaleObject->replicate_img_url)
                ->usingFileName($scaleObject->replicate_id . '-output.' . $ext)
                ->toMediaCollection('upscaled', 's3');

            Mail::to($scaleObject->email)->send(new UpscaledImageGenerated($scaleObject->fresh()));
        }

        return response('OK', 200);
    }
}
