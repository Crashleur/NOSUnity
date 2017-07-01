<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use File;
use Storage;

use Auth;
use App\Link;


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
        $auth = Auth::user()->with('link');
        $data = array(
            'auth' => $auth,
        );
        return view('user.profil', $data);
    }

    public function postEditAuth(){

    }

    public function postAvatar(Request $request){
        try {
            $rules = array(
                'avatar' => 'image',
            );

            $auth = Auth::user();

            if ($request->hasFile('avatar')) {
                if ($request->avatar->isValid()) {
                    $media_config = array(
                        'upload_disk' => 'web_public',
            			'upload_subfolder' => '/img/avatar',
            			'leaf_folder_date_format' => 'Ym',
            			'storage_path_function' => 'public_path',
            			'prepend_path' => '',
            			'json_field_name' => 'config',
                    );

                    $fileName = 'avatar' . $auth->id . '.' . $request->avatar->extension();
                    //$t = File::delete(public_path() . 'img/avatar/' . $auth->avatar);
                    $path = $request->file('avatar')->storeAs('img/avatar', $fileName, 'web_public');

                    $destination = 'img/avatar/avatar'.$auth->id . '.' . $request->avatar->extension();
                    return array('state' => 'success', 'return_object' => $destination);
                }
            }
            else {
                return array('state' => 'exception_error', 'error_message' => 'non1 :\'(');
            }
        }
        catch (\Exception $e) {
            return array('state' => 'exception_error', 'error_message' => $e->getMessage()."\n Line".$e->getLine()."\n Trace ".$e->getTraceAsString());
        }
    }
}
