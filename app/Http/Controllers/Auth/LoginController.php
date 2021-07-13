<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use DB;
use App\Customers;
class LoginController extends Controller
{
 

    use AuthenticatesUsers;

    public function userlogout() {
        Auth::logout();
        return '/alert_page';
      }
   
    public function redirectTo(){
        
      
            $role_allow = Auth::user()->role; 

            //echo $role;
        
            if($role_allow==1){
                return '/home';
            }else if($role_allow==2){
                return '/home';
            }else if($role_allow==3){
                return '/home';
            }else if($role_allow==4){
              
                $id = Auth::user()->id;
                $user=DB::table('users')->where('id',$id)->first();
                $customer=DB::table('customers')->where('cus_loginid',$id)->first();
                $email=Auth::user()->email;
                if(empty($customer)){
                 $cus=new Customers;
                 $cus->first_name=$user->name;
                 $cus->last_name=$user->name;
                 $cus->cus_loginid=$user->id;
                 $cus->status=0;
                 $cus->save();
                 Auth::logout();
                 return '/errorpage';
                }else{
                    if($customer->status==0){
                        $subject = 'EASY SHOP verification link';
                        $message = 'Dear Customer, Congratulations 
                                    You have successfully Registered Easy Shop
                                    Click below click to activate your account for wonderfull shopping
                                    Login Url : http://easyshop.espylabs.com/public/email_verification/'.encrypt($email).'';
                        $headers = 'From: yourmail@domain.com' . "\r\n" .
                            'Reply-To: yourmail@domain.com' . "\r\n" .
                            'X-Mailer: PHP/' . phpversion();
                        
                       
                        mail($email, $subject, $message, $headers);
                        $this->userlogout();
                       //return '/index'; 
                    }else{
                        return '/index'; 
                    }
                }
             
               
            }else if($role_allow==5){
                return '/home';
            }else{
                return '/home2'; 
            }
         
       
       
    }

    
   
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
   
}
