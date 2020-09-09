<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;    
use App\Events\UserRegisteredEvent;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(RegisterRequest $request)
    {
        $data = [];

        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')) 
        ]);

        $data['user'] = $user;

        event(new UserRegisteredEvent($user));

        return response()->json([
            'response_code' => '00',
            'response_message' => 'Successfully created a user.',
            'data' => $data,
        ], 200);
    }
}
