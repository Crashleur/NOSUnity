<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Intervention\Image\ImageManagerStatic as Image;

use File;
use Carbon\Carbon;

class ResizeUsersAvatars implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    private $file;
    private $formats;
    private $aut_id;

    /**
     * Create a new job instance.
     * @var string
     * @return void
     */
    public function __construct($file, $aut_id, array $formats)
    {
        $this->file = $file;
        $this->formats = $formats;
        $this->aut_id = $aut_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        dd('oui');
        $endName = '_' . Carbon::now()->format('YmdHis');
        $test = File::exists(public_path().'/img/avatar/');
        if(!File::exists(public_path().'/img/avatar/'.$this->aut_id)) {
            File::makeDirectory(public_path().'/img/avatar/'.$this->aut_id, 0775);
        }

        foreach ($this->formats as $format) {
            Image::make($this->file)->resize($format, $format)->save(public_path(). "/img/avatar/{$this->aut_id}/avatar_{$format}{$endName}.jpg");
        }
    }
}
