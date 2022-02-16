<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response as StatusResponse;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json( $validator->errors()->all());
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            $user = Auth::user();
            $data['user'] = new UserResource($user);
            $data['token'] = $user->createToken('my-app-token')->plainTextToken;
            return [
                'token' => $data['token'],
                'user' => $user
            ];
        }

        return Response::json([
            'message' => 'Invalid Credential Authentication'
        ], StatusResponse::HTTP_PAYMENT_REQUIRED);

    }//end of login

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->all());
        }

        $request->merge([
            'password' => bcrypt($request->password),
        ]);
        $user = User::create($request->all());
        $data['user'] = new UserResource($user);
        $data['token'] = $user->createToken('my-app-token')->plainTextToken;

        return response()->json($data);

    }//end of register

    public function user()
    {
        $data['user'] = new UserResource(auth('sanctum')->user());
        return response()->json($data);
    }// end of user
}
