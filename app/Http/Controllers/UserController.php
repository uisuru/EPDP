<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Storage;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function profile()
    {
        return view('profile.profile', array('user' => Auth::user()));
    }

    public function showProfile($data)
    {
        $user = User::findByUsername($data);
        return view('profile.showProfile', ['user' => $user]);
    }

    public function update_Pass(Request $request)
    {
        $currentPassword = $request->current_password;
        $new_pass = $request->new_password;
        $new_pass_1 = $request->confirm_password;

        if ($new_pass === $new_pass_1) {
            $user = Auth::user();
            if (strlen($new_pass) >= 6) {
                if (\Hash::check($currentPassword, $user->password)) {
                    $user_id = $user->id;
                    $obj_user = User::find($user_id);
                    $obj_user->password = \Hash::make($new_pass);
                    $obj_user->save();

                    $request->session()->flash('alert-success', 'Password change succeed.');
                    return redirect()->to('/profile');
                } else {
                    $request->session()->flash('alert-danger', 'Current email password not match.');
                    return redirect()->to('/profile');
                }
            } else {
                $request->session()->flash('alert-danger', 'The password must be at least 6 characters.');
                return redirect()->to('/profile');
            }
        } else {
            $request->session()->flash('alert-danger', 'Password confirmation not matched.');
            return redirect()->to('/profile');
        }
    }

    public function update_Profile(Request $request)
    {
        $user = Auth::user();
        $user_id = $user->id;
        $obj_user = User::find($user_id);
        $obj_user->name = $request->name;
        $obj_user->lName = $request->lname;
        $obj_user->save();
        $request->session()->flash('alert-succes', 'Profile upload succeed.');
        return redirect()->to('/profile');
    }

    public function update_Avatar(Request $request)
    {
        // Handle uploads
        //dd($request->all());
        //if($request->hasFile('file')){
        $file = $request->file('file');
        $allowedFileType = 'jpg,png,jpeg';
        $maxFileSize = 2000;//1MB = 1000
        $rules = [
            'file' => 'required|mimes:' . $allowedFileType . '|max:' . $maxFileSize
        ];
        $this->validate($request, $rules);
        $filename = $file->getClientOriginalName();
        //$file_type = $file->clientExtension();
        $user = Auth::user();
        $destinationPath = config('app.avatarDestinationPath') . '/' . Auth::user()->email . $filename;
        $destinationPathLocal = 'users' . '/' . Auth::user()->email . $filename;
        $oldAvatar = $user->avatar;
        //dd($oldAvatar);
        Storage::delete('public/' . $oldAvatar);
        $uploaded = Storage::put($destinationPath, file_get_contents($file->getRealPath()));
        if ($uploaded) {
            $user->avatar = $destinationPathLocal;
            $user->save();
        }
        // }
        return redirect()->to('/profile');
    }
}
