<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Hash;
use App\Models\User;
use App\Mail\ResigrationUserMail;
use Carbon;
use Mail;
use App\Events;
use App\Events\NewCustomerHasRegisteredEvent;
use App\Models\Order;
class AuthController extends Controller
{


    
    public function showLoginForm()
    {
        return view('frontend.auth.login');
    }

    public function showRegisterForm()
    {
        return view('frontend.auth.register');
    }

    public function processLogin(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email'        => 'required|email',
            'password'     => 'required|min:6'
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $credentials = request()->only(['email','password']);
        
        if(auth()->attempt($credentials))
        {
            $this->setSuccess("User logged in.");
            return redirect('/');
        }
         
        $this->setError('Invalid Credentials');
        return redirect()->back();

        
    }
    public function processRegister(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'         => 'required',
            'email'        => 'required|email|unique:users,email',
            'phone_number' => 'required|min:11|max:13|unique:users,phone_number',
            'password'     => 'required|min:6'
        ]);
       
       if($validator->fails())
       {
           return redirect()->back()->withErrors($validator)->withInput();
       }
       
       try{
         
            $user = User::create([

                'name'         => request()->input('name'),
                'email'        => strtolower(request()->input('email')),
                'phone_number' => request()->input('phone_number'),
                'password'     => Hash::make(request()->input('password')),
                'email_verification_token' =>uniqid(time(),true).str_random(16)
            ]);
            
            // $user->notify(new RegistrationEmailNotification($user));
           
            // event(new NewCustomerHasRegisteredEvent($user));
            Mail::to($user->email)->send(new ResigrationUserMail($user));

            $this->setSuccess("Account registered");
            return redirect()->route('login');
       }
        catch(\Exception $e){

           $this->setError($e->getMessage());
           return  redirect()->back();
       }

       
    }

    // public function activate($token = null)
    // {
    //     if($token == null){

    //         return redirect('/');
    //     }
    //     $user = User::where('email_verification_token',$token)->firstOrFail();

    //     if($user){
           
    //         $user->update([
    //            'email_verified_at' => Carbon::now(),
    //            'email_verification_token' => null
    //         ]);
    //         $this->setSuccess("Account registered");
    //         return redirect()->route('login');
    //     }

    //     $this->setError('Invalid token.');
    //     return redirect('/');
    // }

    public function logout()
    {
        auth()->logout();
        return redirect('login');
    }
    
    public function profile(){
        
        $data           = [];
        $data['orders'] = Order::where('user_id',auth()->user()->id)->get();
        return view('frontend.auth.profile',$data);
    }

}

