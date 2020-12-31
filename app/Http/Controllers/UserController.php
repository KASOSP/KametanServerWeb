<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\RecaptchaService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function bonus(Request $request){
        var_dump($request->all());
    }

    public function search(Request $request){
        $data = $request->all();
        $validator = \Validator::make($data, [
            'search' => 'required|string',
            'perfect_equal' => 'string',
            'g-recaptcha-response' => 'required|string',
        ]);
        if ($validator->fails()) {
            return redirect('search')
                ->withErrors($validator)
                ->withInput();
        }

        if(isset($data['perfect_equal']) and $data['perfect_equal'] == 'on'){
            $users = User::where('username', 'LIKE', $data['search'])->limit(10)->get();
        }else{
            $users = User::where('username', 'LIKE', $data['search'] . '%')->limit(10)->get();
        }
        return view('search')->with('users', $users);
    }
}
