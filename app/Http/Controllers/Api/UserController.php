<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Auth;
use User;
use App\Models\Recommend;
use App\Models\Category;
use App\Models\Socialmedia;
use App\Models\Facilities;
use App\Models\Time;
use App\Models\Workinghours;
use App\Models\Business;
use App\Models\Reminder;
use App\Models\Offers;
use App\Models\Favourite;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    
    public function businesslist($id)
    {
        $data = array(
            'business' => Business::where('UserId', $id)->get()
        );
        return view('super-admin.User.BusinessList', $data);
        // return ($data);
    }
    public function open($id)
    {
        $data = array(
            'business' => Business::where('registerId', $id)->get(),
            'categorys' => Category::all(),
            'socialmedia' => Socialmedia::where('RegisterId', $id)->first(),
            'time' => Workinghours::where('RegisterId', $id)->first(),
            'facilities' => Facilities::where('RegisterId', $id)->first(),
        );
        return view('super-admin.User.ViewBusiness', $data);
        // return ($data);
    }


    //

    public function LoginUser(Request $request)
    {

        $validator =  Validator::make($request->all(), [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string', 'min:6'],
        ],[
            'email.required'=>"Please provide a valid email",
            'password.required'=>"Please provide a valid password",
        ]);
        if($validator->fails()){
            foreach ($validator->errors()->toArray() as $err){
                $json['data'] = 0;
                $json['response'] = 0;
                $json['message'] = $err[0];
                return response()->json($json, 500);
            }
        }

        $username = $request->email;
        $password = $request->password;

        if (Auth::attempt(array('email' => $username, 'password' => $password))){
            $user = Auth::user();
            $userId = $user->registerid;
            $category = Recommend::where('user_id', [$user->registerid])->get();
            $Favourite = Favourite::where('userId', [$user->registerid])->get();
            $val = count($Favourite);
            $count = 0;

            if($val != "0"){
                foreach ($Favourite as $dataVal){
                            $Business[$count] = Business::where('registerId', [$dataVal->businessId])->get();
                            $count++;
                    }
            }

            else{
                $Business =$Favourite;
            }

            // $Business = Business::FindUserBusiness($userId);
            $json['data'] = $user;
            $json['category'] = $category;
            $json['Favourite'] = $Business;
            $json['response'] = 1;
            $json['message'] = "success";
            return response()->json($json);
        }
        else {
            $json['data'] = [];
            $json['response'] = 0;
            $json['message'] = "Username or password not valid";
            return response()->json($json);
        }
    }

    public function RegisterUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6'],
        ],[
            'name.required'=>"Please provide a valid name",
            'email.required'=>"Please provide a valid email",
            'password.required'=>"Please provide a valid password",
            'email.unique'=>"Email is already registered",
        ]);
        if($validator->fails()){
            foreach ($validator->errors()->toArray() as $err){
                $json['data'] = 0;
                $json['response'] = 0;
                $json['message'] = $err[0];
                return response()->json($json, 500);
            }
        }
        $email = $request->email;
        $category = $request->category;
        $count = 0;
        $emails = [];
        $registerid = "QZBL" . rand(999, 9999999);
        $register = User::where('registerid', $registerid)->first();
        $emails['emails'] = User::where('email', $email)->first();


        if(!$emails['emails'] && !$register)
        {
            $val = count($category);

            while($count < $val){
                $Recommend = Recommend::create([
                   'user_id' => $registerid,
                   'category_id' => $request->category[$count],
               ]);
               $count++;

           }
            $data = User::create([
                'registerid' => $registerid,
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                // 'phone' => $request->phone,
                'image' => "/image/user_dp/image/user.jpg",
                'limit' => "3",
                // 'type' => "user",
            ]);

            $recomend =
            $data = $data;
            $Recommend = Recommend::Recommendlist($registerid);

            $json['data'] = $data;
            $json['Recommend'] = $Recommend;
            $json['response'] = 1;
            $json['message'] = "success";
            return response()->json($json);
        }
        else{
            $json['data'] = 0;
            $json['response'] = 0;
            $json['message'] = "Error";
            return response()->json($json);
        }

    }

    public function forgotpass(Request $request)
    {
        $email = $request->email;
        $code = Str::random(25);
        $user = User::where('email', $email)->first();

        if($user)
        {
            $data = Reminder::create([
                'user_id' => $user->registerid,
                'code' => $code,
            ]);
            Mail::send(['text'=>'emails.forgot_password'], ['name'=>$user->name,'code'=>$code], function($message)use ($user,$code) {
                $message->to($user->email, 'New Password for your Qabuss App ')->subject
                ('Reset Password Request');
                $message->from('test@qabuss.com','Qabuss');
            });
            $json['data'] = $data;
            $json['response'] = 1;
            $json['message'] = "success";
            return response()->json($json);
        }
        $json['data'] = [];
        $json['response'] = 0;
        $json['message'] = "Error";
        return response()->json($json);


    }

    // public function forgotpass($id, Request $request)
    // {
    //     $user = User::where('registerid', $id)->first();
    //     if($user){
    //         $value = $id .".png";
    //         if($request->image != ''){
    //             $image = $request->file('image');
    //             $main_image_src = '/image/user_dp/image/'.$value;
    //             $imagepath ='/image/user_dp/image/';
    //             $image->move($imagepath, $main_image_src);
    //             $main_image_src;
    //             }
    //             else{
    //             $main_image_src = $request->oldimage;
    //             }
    //         $updateduser = User::find($id)->update([
    //             'name' => $request->name,
    //             'email' => $request->email,
    //             'phone' => $request->phone,
    //             'image' => $main_image_src,

    //         ]);
    //         if($updateduser){
    //             $json['data'] = $updateduser;
    //             $json['response'] = 1;
    //             $json['message'] = "success";
    //             return response()->json($json);
    //         }else{
    //             $json['data'] = 0;
    //             $json['response'] = 0;
    //             $json['message'] = "error";
    //             return response()->json($json);
    //         }
    //     }else{
    //         $json['data'] = 0;
    //         $json['response'] = 0;
    //         $json['message'] = "error";
    //         return response()->json($json);
    //     }
    // }

    public function UpdateUserProfile($id, Request $request)
    {
        $user = User::where('registerid', $id)->first();

        if($user){
            $image = $request->file('image');
            if($image)
            {
                $filename = $id.".png";
                $image = $request->file('image');
                $main_image_src = '/image/user_dp/'.$filename;
                $imagepath = public_path('/image/user_dp/');
                $image->move($imagepath, $main_image_src);
                //   $val = response()->json(['url' => $main_image_src], 200);
                $updateduser = User::where('registerid', $id)->update([
                'image' => $main_image_src
            ]);

            if($updateduser){
                $json['data'] = $updateduser;
                $json['response'] = 1;
                $json['message'] = "success";
                return response()->json($json);
            }else{
                $json['data'] = [];
                $json['response'] = 0;
                $json['message'] = "error";
                return response()->json($json);
            }

            }
            else {
                $updateduser = User::where('registerid', $id)->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,

                ]);
                if($updateduser){
                    $json['data'] = $updateduser;
                    $json['response'] = 1;
                    $json['message'] = "success";
                    return response()->json($json);
                }else{
                    $json['data'] = [];
                    $json['response'] = 0;
                    $json['message'] = "error";
                    return response()->json($json);
                }
            }

        }else{
            $json['data'] = [];
            $json['response'] = 0;
            $json['message'] = "error";
            return response()->json($json);
        }
    }

    public function UserPasswordUpdate($registerid, Request $request)
    {
          $obj_user = User::where('registerid', $registerid)->first();
          $username = $obj_user->email;
        $oldpassword = $request->oldpassword;
        $oldpassword = $request->oldpassword;
        $newpassword = $request->newpassword;
        // $confirmpass = $request->confirmpass;

        if (Auth::attempt(array('email' => $username, 'password' => $oldpassword))){
            $current_password = Auth::User()->oldpassword;
            $request_password = $request->oldpassword;
            $obj_user->password = Hash::make($request->newpassword);;
            $obj_user->save();
            $json['data'] = $obj_user;
            $json['response'] = 1;
            $json['message'] = "success";
            return response()->json($json);
        }else
        {
            $json['data'] = [];
            $json['response'] = 0;
            $json['message'] = "error";
            return response()->json($json);
        }


        // $oldpassword = $request->oldpassword;
        // $newpassword = $request->newpassword;
        // $confirmpass = $request->confirmpass;

        // if (Auth::attempt(array('registerid' => $id, 'password' => $oldpassword))){
        //     $user = Auth::user();
        //     $updateduser = User::where('registerid', $id)->update([
        //         'password' => Hash::make($request->password),

        //     ]);
        //     $json['data'] = $updateduser;
        //     $json['response'] = 1;
        //     $json['message'] = "success";
        //     return response()->json($json);
        // }
        // else {
        //     $json['data'] = [];
        //     $json['response'] = 0;
        //     $json['message'] = "error";
        //     return response()->json($json);
        // }
    }


    public function UserRecommendList($registerid)
    {
        $Recommend = Recommend::Recommendlist($registerid);
        if(count($Recommend))
        {
            $json['Recommend'] = $Recommend;
            $json['response'] = 1;
            $json['message'] = "success";
            return response()->json($json);
        }
        else{
            $json['Offers'] = [];
            $json['response'] = 0;
            $json['message'] = "Error";
            return response()->json($json);
        }
    }


    public function UserDashboard($registerid)
    {
        $day = date("Y-m-d h:i:s");
        $User = User::where('registerid', $registerid)->get();
        $Recommend = Recommend::Recommendlist($registerid);
        $Business = Business::UserBusinesslist($registerid);
        $Offers = Offers::where('userId', $registerid)->get();

        $Favourite = Favourite::where('userId', $registerid)->pluck('businessId');

        $BusinessLists = array();
        foreach ($Favourite as $dataVal){
            $business = Business::where('registerId', $dataVal)->first();
            $business['time'] = "N/A";
            array_push($BusinessLists,$business);
        }
        $json['User'] = $User;
        $json['Recommend'] = $Recommend;
        $json['Business'] = $Business;
        $json['Offers'] = $Offers;
        $json['Favourite'] = $BusinessLists;
        $json['response'] = 1;
        $json['message'] = "success";

        return response()->json($json);

    }
}
