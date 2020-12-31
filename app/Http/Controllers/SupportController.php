<?php

namespace App\Http\Controllers;

use App\Models\SupportRequest;
use App\Services\RecaptchaService;
use Illuminate\Http\Request;

class SupportController extends Controller
{

    public function send(Request $request){
        $data = $request->all();
        $validator = \Validator::make($data, [
            'username' => 'string',
            'email' => 'required|email|string',
            'not_require_reply' => 'required|boolean',
            'content' => 'required|string',
            'g-recaptcha-response' => 'required|string',
        ]);
        if ($validator->fails()) {
            return redirect('support')
                ->withErrors($validator)
                ->withInput();
        }
        if(!app(RecaptchaService::class)->isRecaptchaVisibleVerified($data['g-recaptcha-response'])) return view('support');
        SupportRequest::create([
            'user_id' => ($request->user()) ? $request->user()->id : null,
            'username' => ($request->user()) ? $request->user()->username : null,
            'input_username' => $data['username'] ?? null,
            'email' => $data['email'],
            'not_required_reply' => $data['not_required_reply'] ?? false,
            'content' => $data['content'],
        ]);
        return view('support');
    }
}
