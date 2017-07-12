<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\User;
use File;

class RemoveUsersAvatars implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    private $aut;
    /**
    * Create a new job instance.
    *
    * @return void
    */
    public function __construct(User $aut)
    {
        dd('oui');
        $this->aut = $aut;
    }

    /**
    * Execute the job.
    *
    * @return void
    */
    public function handle()
    {
        $currentavatars = array();
        foreach($this->aut->links as $curentavatar) {
            array_push($currentavatars, public_path().$curentavatar->destination);
        }
        $files = '/img/avatar/'.$this->aut->id.'/*';
        $log_files = File::glob(public_path().'/img/avatar/'.$this->aut->id.'/*');
        foreach ($log_files as $file) {
            if (!in_array($file, $currentavatars)){
                File::delete($file);
            }
        }
    }
}
