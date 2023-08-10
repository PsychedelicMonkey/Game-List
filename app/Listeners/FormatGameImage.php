<?php

namespace App\Listeners;

use App\Events\GameImageCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Intervention\Image\Facades\Image;

class FormatGameImage implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(GameImageCreated $event): void
    {
        $image = $event->image;

        $filename = $image->file_name;
        $dirname = pathinfo($filename, PATHINFO_FILENAME);

        Storage::disk('public')->makeDirectory("photo/$dirname");

        $small_name = "public/photo/$dirname/sm-$dirname.jpg";
        $medium_name = "public/photo/$dirname/md-$dirname.jpg";
        $large_name = "public/photo/$dirname/lg-$dirname.jpg";

        $sm = Image::make(Storage::path("photo/$filename"))
            ->resize(450, 240, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })
            ->encode('jpg')
            ->save(Storage::path($small_name));

        $md = Image::make(Storage::path("photo/$filename"))
            ->resize(550, 340, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })
            ->encode('jpg')
            ->save(Storage::path($medium_name));

        $lg = Image::make(Storage::path("photo/$filename"))
            ->resize(1280, 720, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })
            ->encode('jpg')
            ->save(Storage::path($large_name));

        $image->update([
            'image' => array(
                'sm' => array(
                    'url' => URL::to(Storage::url($small_name)),
                    'width' => $sm->getWidth(),
                    'height' => $sm->getHeight(),
                ),
                'md' => array(
                    'url' => URL::to(Storage::url($medium_name)),
                    'width' => $md->getWidth(),
                    'height' => $md->getHeight(),
                ),
                'lg' => array(
                    'url' => URL::to(Storage::url($large_name)),
                    'width' => $lg->getWidth(),
                    'height' => $lg->getHeight(),
                ),
            ),
        ]);
    }
}
