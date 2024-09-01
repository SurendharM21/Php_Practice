<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function register(){
        return view('register');
    }
    public function login(){
        return view('login');
    }
    public function profile(){
         $user = Auth::user();
        //   $response['user'] = $user;
        //   return response()->json($response, 202);
             $profile=User::find($user->id);
             return view('profile',compact('profile'));
    }


    public function registerPost(RegisterRequest $request){
        $name=$request->input('name');
        $email=$request->input('email');
        $password=$request->input('password');
        $address=$request->input('address');
        $phone=$request->input('phone');
        $imageName=time().'.'.$request->image->extension();
        $request->image->move(public_path('images'),$imageName);
        $user=User::create([
        'name'=>$name,
        'email'=>$email,
        'password'=>Hash::make($password),
        'address'=>$address,
        'phone_number'=>$phone,
        'image'=>'images/'.$imageName,
        ]);
        $token=$user->createToken('practice')->accessToken;
       // return response()->json(['token'=>$token],201);
       Mail::send('registerEmail',[],function($message) use($email){
             $message->to($email);
             $message->subject('Registered Successfully');
       });
        return redirect()->back()->with('success','Registered Successfully');

    }

    public function loginPost(LoginRequest $request){
        $email=$request->input('email');
        $password=$request->input('password');
        if(Auth::attempt(['email'=>$email,'password'=>$password])){
            $user=Auth::user();
            $token=$user->createToken('practice')->accessToken;
          //  return response()->json(['token'=>$token]);
          return redirect()->route('profile');
        }


        return redirect()->back()->with('success','Login Successfully');

    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with('success','Logged Out');
    }
    public function edit(Request $request,$id){
        $user=User::find($id);
        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->address=$request->input('address');
        $user->phone_number=$request->input('phone');
        $user->save();
        return redirect()->back()->with('success','Updated  Successfully');
    }
    public function allUsers(){
        $users=User::all();
        return view('userCart',compact('users'));
    }
    public function deleteUser($id){
        $user=User::where('id',$id)->delete();
        return redirect()->back()->with('success','Deleted Succesfully');
    }
    public function image(){

    }
}
