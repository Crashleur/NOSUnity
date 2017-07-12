<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

use File;
use Carbon\Carbon;

use Auth;
use App\Link;

// use App\Jobs\ResizeUsersAvatars;
use App\Jobs\RemoveUsersAvatars;


class UserController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getEditAuth(){
        $auth = Auth::user();
        $data = array(
            'auth' => $auth,
        );
        $files = Link::where('user_id', $auth->id)->where('type', 'avatar')->first();
        if (isset($files)) {
            $data['files'] = json_decode($files->destination, true);
        }
        return view('user.profil', $data);
    }

    public function postEditAuth(){

    }

    public function newAvatar(Request $request){
        try {
            $this->validate($request, [
                'avatar' => "image",
            ]);
            $auth = Auth::user();
            $currentavatars = array();
            if ($request->hasFile('avatar')) {
                if ($request->avatar->isValid()) {
                    //$job1 = new RemoveUsersAvatars($auth);
                    //$this->dispatch($job1);
                    $uploadedFile = $request->file('avatar');
                    $file = $uploadedFile->move(public_path().'/img/avatar/'.$auth->id, $uploadedFile->getClientOriginalName());
                    $formats = [30, 96 , 200];

                    $endName = '_' . Carbon::now()->format('YmdHis');

                    if(!File::exists(public_path().'/img/avatar/'.$auth->id)) {
                        File::makeDirectory(public_path().'/img/avatar/'.$auth->id, 0775);
                    }

                    foreach ($formats as $format) {
                        $path_name = "/img/avatar/{$auth->id}/avatar_{$format}{$endName}.jpg";
                        array_push($currentavatars, $path_name);
                        Image::make($file)->resize($format, $format)->save(public_path().$path_name);
                    }
                    return array('state' => 'success', 'return_object' => $currentavatars);
                }
            }
        }
        catch (\Exception $e) {
            return array('state' => 'exception_error', 'error_message' => $e->getMessage()."\n Line".$e->getLine()."\n Trace ".$e->getTraceAsString());
        }
    }



    public function cancelAvatar(Request $request){
        $auth = Auth::user();
        // $job = new RemoveUsersAvatars($auth);
        // $this->dispatch($job);

        $link_avatars = Link::where('user_id', $auth->id)->where('type', 'avatar')->first();
        $currentavatars = array();
        if(isset($link_avatars)){
            $destinations = $link_avatars->destination;
            foreach(json_decode($destinations) as $curentavatar) {
                array_push($currentavatars, public_path().$curentavatar);
            }
        }
        $files = '/img/avatar/'.$auth->id.'/*';
        $log_files = File::glob(public_path().'/img/avatar/'.$auth->id.'/*');
        foreach ($log_files as $file) {
            if (!in_array($file, $currentavatars)){
                File::delete($file);
            }
        }
    }


    public function postAvatar(Request $request){
        // $sizes = ['30', '96', '200'];
        $auth = Auth::user();
        try {
            $link_avatar = Link::where('user_id', $auth->id)->where('type', 'avatar')->first();
            if(!isset($link_avatar)){
                $first_avatar = new Link;
                $first_avatar->destination = json_encode($request->input('avatars'), JSON_UNESCAPED_SLASHES);
                $first_avatar->type = 'avatar';
                $first_avatar->user_id = $auth->id;
                $first_avatar->save();
            }
            else{
                $link_avatar->destination = json_encode($request->input('avatars'), JSON_UNESCAPED_SLASHES);
                $link_avatar->save();
            }
            return array('state' => 'success', 'return_object' => $request->input('avatars'));
        }
        catch (\Exception $e) {
            return array('state' => 'exception_error', 'error_message' => $e->getMessage()."\n Line".$e->getLine()."\n Trace ".$e->getTraceAsString());
        }
    }

}
