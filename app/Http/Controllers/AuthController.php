<?php
namespace App\Http\Controllers;
use App\User;
use JWTAuth;
use Illuminate\Http\Request;
class AuthController extends Controller
{
public $loginAfterSignUp = true;

public function register(Request $request)
{
    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    // $user->name = "admin";
    // $user->email = "admin@msn.com";
    $user->password = bcrypt($request->password);
    $user->save();

    if ($this->loginAfterSignUp) {
        return $this->login($request);
    }

    return response()->json([
        'success'   =>  true,
        'data'      =>  $user
    ], 200);
}//register

public function login(Request $request)
{
$input = $request->only('email', 'password');
//dd($input);
//$input = ["email"=>"admin@msn.com", "password"=>   "pass123456"];
$token = null;
    if (!$token = JWTAuth::attempt($input)) {
        return response()->json([
            'success' => false,
            'message' => 'Invalid Email or Password',
        ], 401);
    }

    return response()->json([
        'success' => true,
        'token' => $token,
    ]);
}

public function logout(Request $request)
{
    //JWTAuth::invalidate($request->token);
    JWTAuth::invalidate(JWTAuth::getToken());
    return response()->json(['message' => 'Successfully logged out']);
}
public function getUser(Request $request){
    $user =   JWTAuth::user($request->token);
    if($user !== null){
        return $user;
    }else{
        return [
            "success"=> "false",
            "msg"=> "No user found"
        ];
    }
}
}//class
