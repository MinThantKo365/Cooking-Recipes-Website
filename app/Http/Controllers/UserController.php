<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Message;
use App\Models\Review;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    public function contactUs(){
        if(session()->get('user')){
        return view('project.contactUs');
        }
        else
        return redirect('/LMC/login')->withErrors(['errors' =>'You should login first.']);
    }

    public function submitMsg(Request $request){
        $input = new Message();
        $input->user_id=session()->get('user')->id;
        $input->msg=$request->msg;
        $input->save();
    return back()->withErrors(['errors'=>'Your message has been sent']);
    }

    public function login(){
        return view('project.login');
    }

    public function register(){
        return view('project.register');
    }

    public function privacyNPolicy(){
        return view('project.privacyPolicy');
    }

    public function registerPost(Request $request){
        $request -> validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
        ],['password.confirmed'=>'password and confirm password are not match']);
    $data['name']= $request-> name;
    $data['email']= $request-> email;
    $data['password']= $request-> password;
    $user = User::create($data);

    if($user){
        Mail::raw('Your registration is successful to LMC Website.', function($message) use ($request) {
            $message->to($request->email)
                    ->subject('Registration Confirmation');
        });

        return redirect('/LMC/login')->with(['success'=>'Registration was successful']);
    }
    else
    return back()->withErrors(['errors'=>'Registration was failed']);
    }


    public function loginP(Request $request){
        $request -> validate([
            'email' => 'required',
            'password' => 'required',
        ]);

    $user=User::where(['email'=> $request->email])->first();
        if($user){
                $ans= $request->only('email','password');
               if(Auth::attempt($ans)){
                session()->put('user',$user);
                return redirect('/LMC');
            }
               return back()->withErrors(['errors'=>'email and password are not match']);
        }
        return back()->withErrors(['errors'=>'User`s email isn`t found']);
    }


    public function reviewUser($id){
        $reviews = Review::join('users',"reviews.user_id","=","users.id")
        ->join('projects','reviews.project_id','=','projects.id')
        ->where('projects.id',$id)
        ->select('users.name','reviews.*')
        ->latest()
        ->limit(4)
        ->paginate(5);

        return view('project.reviews',['reviews'=>$reviews]);
    }

    public function submitReview(Request $request,$pid){
        // Review::join('projects','reviews.project_id','=','projects.id')
        //         ->where('projects.id',$pid);

        $input = new Review();
        $input->user_id=session()->get('user')->id;
        $input->project_id = $pid;
        $input->review_msg=$request->review_msg;
        $input->save();

    // return back()->withErrors(['errors'=>'Your message has been sent']);
    return back();
    }

    static function countReview($pid){
        return Review::join('projects','reviews.project_id','=','projects.id')
        ->where('projects.id',$pid)
        ->count();
    }
    public function signOut(){
        session()->forget('user');
        // Session::getHandler()->gc(0);
       return redirect('/LMC/login');
    }



    // Forget Password Start
    public function ShowForgotPwd(){
        return view('project.forget_password');

    }

    public function forgotPwdPost(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
          ]);

        Mail::send('project.forgetpasswordLink', ['token' => $token], function($message) use($request){
            $message->to($request->email)
                    ->subject('Reset Password');
        });

        return back()->with('message', 'We have e-mailed your password reset link!');

    }

    public function displayResetPasswordForm($token) {
        return view('project.reset_password', ['token' => $token]);
     }

     public function submitResetPassword(Request $request)
{
    $request->validate([
        'email' => 'required|email|exists:users',
        'password' => 'required|confirmed',
        'password_confirmation' => 'required'
    ]);

    $updatePassword = DB::table('password_resets')
                        ->where([
                          'email' => $request->email,
                          'token' => $request->token
                        ])
                        ->first();

    if(!$updatePassword){
        return back()->withInput()->with('error', 'Invalid token!');
    }

    User::where('email', $request->email)
                ->update(['password' => Hash::make($request->password)]);


    DB::table('password_resets')->where(['email'=> $request->email])->delete();

    // return redirect('/LMC/login')->with('success', 'Your password has been changed!');
    return redirect()->to(route('login'))->with('success', 'Your password has been changed!');
      }

    // Forget Password End

}
