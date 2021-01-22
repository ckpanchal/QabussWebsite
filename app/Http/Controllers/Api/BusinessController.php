<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Business;
use App\Models\Category;
use App\Models\Time;
use App\Models\Socialmedia;
use App\Models\Workinghours;
use App\Models\Facilities;
use App\Models\Favourite;
use App\Models\Location;

class BusinessController extends Controller
{

    // Single List Business
   
    public function getBusiness($id, Request $request)
    {
        $userId = $request->userId;
        $data = Business::FindBusiness($id);
        $favourite = Favourite::SearchFavourite($id, $userId);
        $val = 0;
        foreach ($data['business'] as $dataVal){
            $businessid = [$dataVal->companycategory];
            $relate= Business::FindRelateBusiness($businessid, $id);
        }
        foreach ($data['working'] as $date){
            // $timer= Business::working($date);
            // $day = [$date->monday];
            $Monday = $date->Monday;
            $Tuesday = $date->Tuesday;
            $Wednesday = $date->Wednesday;
            $Thursday = $date->Thursday;
            $Friday = $date->Friday;
            $Saturday = $date->Saturday;
            $Sunday = $date->Sunday;
            $day = date("l");

            $time = strtotime(date("h:i A"));
            if($day == "Monday" && $Monday != "24 Hours"){
                $timeer = (explode(" - ", $date->Monday));
                $start = strtotime($timeer[0]) ;
                $end = strtotime($timeer[1]) ;
                // if($start <= $time && $time <= $end)
                //     {
                //          $timer = "Open Now";
                //     }
                //     else
                //     {
                //          $timer = "Close";
                //     }
                if($end < $start){
                        if($start <= $time )
                        {
                             $timer = "Open Now";
                        }
                        else
                        {
                             $timer = "Close";
                        }
                    }
                else{                
                    if($start <= $time && $time <= $end)
                        {
                            $timer = "Open Now";
                        }
                    else
                        {
                            $timer = "Close";
                        }
                }
            }
            elseif ($day == "Tuesday" && $Tuesday != "24 Hours") {
                $timeer = (explode(" - ", $date->Tuesday));
                $start = strtotime($timeer[0]) ;
                $end = strtotime($timeer[1]) ;
                // if($start <= $time && $time <= $end)
                //     {
                //          $timer = "Open Now";
                //     }
                //     else
                //     {
                //          $timer = "Close";
                //     }
                if($end < $start){
                        if($start <= $time )
                        {
                             $timer = "Open Now";
                        }
                        else
                        {
                             $timer = "Close";
                        }
                    }
                else{                
                    if($start <= $time && $time <= $end)
                        {
                            $timer = "Open Now";
                        }
                    else
                        {
                            $timer = "Close";
                        }
                }
            }
            elseif ($day == "Wednesday" && $Wednesday != "24 Hours") {
                $timeer = (explode(" - ", $date->Wednesday));
                $start = strtotime($timeer[0]) ;
                $end = strtotime($timeer[1]) ;
                // if($start <= $time && $time <= $end)
                //     {
                //          $timer = "Open Now";
                //     }
                //     else
                //     {
                //          $timer = "Close";
                //     }
                if($end < $start){
                        if($start <= $time )
                        {
                             $timer = "Open Now";
                        }
                        else
                        {
                             $timer = "Close";
                        }
                    }
                else{                
                    if($start <= $time && $time <= $end)
                        {
                            $timer = "Open Now";
                        }
                    else
                        {
                            $timer = "Close";
                        }
                }
            }
            elseif ($day == "Thursday" && $Thursday != "24 Hours") {
                $timeer = (explode(" - ", $date->Thursday));
                $start = strtotime($timeer[0]) ;
                $end = strtotime($timeer[1]) ;
                // if($start <= $time && $time <= $end)
                //     {
                //          $timer = "Open Now";
                //     }
                //     else
                //     {
                //          $timer = "Close";
                //     }
                if($end < $start){
                        if($start <= $time )
                        {
                             $timer = "Open Now";
                        }
                        else
                        {
                             $timer = "Close";
                        }
                    }
                else{                
                    if($start <= $time && $time <= $end)
                        {
                            $timer = "Open Now";
                        }
                    else
                        {
                            $timer = "Close";
                        }
                }

            }
            elseif ($day == "Friday" && $Friday != "24 Hours") {
                $timeer = (explode(" - ", $date->Friday));
                $start = strtotime($timeer[0]) ;
                $end = strtotime($timeer[1]) ;
                // if($start <= $time && $time <= $end)
                //     {
                //          $timer = "Open Now";
                //     }
                //     else
                //     {
                //          $timer = "Close";
                //     }
                if($end < $start){
                        if($start <= $time )
                        {
                             $timer = "Open Now";
                        }
                        else
                        {
                             $timer = "Close";
                        }
                    }
                else{                
                    if($start <= $time && $time <= $end)
                        {
                            $timer = "Open Now";
                        }
                    else
                        {
                            $timer = "Close";
                        }
                }
            }
            elseif ($day == "Saturday" && $Saturday != "24 Hours") {

                $timeer = (explode(" - ", $date->Saturday));
                $start = strtotime($timeer[0]) ;
                $end = strtotime($timeer[1]) ;
                // if($start <= $time && $time <= $end)
                    // {
                    //      $timer = "Open Now";
                    // }
                    // else
                    // {
                    //      $timer = "Close";
                    // }
                    
                if($end < $start){
                        if($start <= $time )
                        {
                             $timer = "Open Now";
                        }
                        else
                        {
                             $timer = "Close";
                        }
                    }
                else{                
                    if($start <= $time && $time <= $end)
                        {
                            $timer = "Open Now";
                        }
                    else
                        {
                            $timer = "Close";
                        }
                }
            }
            elseif ($day == "Sunday" && $Sunday != "24 Hours") {
                $timeer = (explode(" - ", $date->Sunday));
                $start = strtotime($timeer[0]) ;
                $end = strtotime($timeer[1]) ;
                // if($start <= $time && $time <= $end)
                //     {
                //          $timer = "Open Now";
                //     }
                //     else
                //     {
                //          $timer = "Close";
                //     }
                if($end < $start){
                        if($start <= $time )
                        {
                             $timer = "Open Now";
                        }
                        else
                        {
                             $timer = "Close";
                        }
                    }
                else{                
                    if($start <= $time && $time <= $end)
                        {
                            $timer = "Open Now";
                        }
                    else
                        {
                            $timer = "Close";
                        }
                }
           }
            else{
                $timer = "Open Now";
            }

        }


        $json = $data;
        $json['time'] = $timer;
        $json['relate'] = $relate;
        $json['favourite'] = $favourite;
        $json['response'] = 1;
        $json['message'] = "success";
        return response()->json($json);
    }
    
    public function Addbusiness($userId, Request $request)
      {
          $BusinessId = "QZBL" . rand(999, 9999999);
          $Business = Business::create([
              'registerId' => $BusinessId,
              'userId' => $userId,
              'companyname' => $request->CompanyName,
              'companynameArb' => $request->CompanyNameArb,
              'companydescription' => $request->CompanyDescription,
              'companydescriptionArb' => $request->CompanyDescriptionArb,
              'companycategory' => $request->CompanyCategory,
              'companylocation' => $request->CompanyLocation,
              'companylocationArb' => $request->CompanyLocationArb,
              'location' => $request->location,
              'lat' => $request->lat,
              'lng' => $request->lng,
              'companyphone' => $request->companyphone,
              'company_tagline' => $request->company_tagline,
              'company_taglineArb' => $request->company_taglineArb,
              'company_website' => $request->company_website,
              'company_email' => $request->company_email,
              'approve' => "0",
              'view' => "0",
              'featured' => "0",
              'area' => $request->area,

              $image = $request->file('profileimage'),
              $main_image_src = '/image/company_dp/'.$BusinessId. ".png",
              $imagepath = public_path('/image/company_dp/'),
              $image->move($imagepath, $main_image_src),
              'profile_image' => $main_image_src,

              $backimage = $request->file('backgroundimage'),
              $main_backimage_src = '/image/company_back/'.$BusinessId. ".png",
              $backimagepath = public_path('/image/company_back/'),
              $backimage->move($backimagepath, $main_backimage_src),
              'background_image' => $main_backimage_src,

          ]);
          $facilities = Facilities::create([
              'userId' => $userId,
              'registerid' => $BusinessId,
              'carparking' => $request->CarParking,
              'wifi' => $request->Wifi,
              'prayerroom' => $request->PrayerRoom,
              'wheelchair' => $request->Wheelchair,
              'creditcard' => $request->CreditCard,
              'alltimeservice' => $request->AlltimeService,
          ]);
        $workinghours = Workinghours::create([
            'registerid' => $BusinessId,
            'userid' => $userId,
            'monday' => $request->monday,
            'tuesday' => $request->tuesday,
            'wednesday' => $request->wednesday,
            'thursday' => $request->thursday,
            'friday' => $request->friday,
            'saturday' => $request->saturday,
            'sunday' => $request->sunday,
        ]);
        $Socialmedia = Socialmedia::create([
            'RegisterId' => $BusinessId,
            'UserId' => $userId,
            'FaceBook' => $request->facebook,
            'Instagram' => $request->instagram,
            'Linked' => $request->linked,
            'Twitter' => $request->twitter,
            'Youtube' => $request->youtube,
        ]);
        $json['Business'] = $Business;
        $json['facilities'] = $facilities;
        $json['workinghours'] = $workinghours;
        $json['Socialmedia'] = $Socialmedia;
        $json['response'] = 1;
        $json['message'] = "success";
        return response()->json($json);
    }

    public function Editbusiness($userId, Request $request)
      {
        $BusinessId = $request->CompanyId;
          $profileimage = $request->file('profileimage');
          $backgroundimage = $request->file('backgroundimage');

          if($profileimage)
          {
            $image = $request->file('profileimage');
            $main_image_src = '/image/company_dp/'.$BusinessId. ".png";
            $imagepath = public_path('/image/company_dp/');
            $image->move($imagepath, $main_image_src);
            $updatedbackgroundimage = Business::where('registerId', $BusinessId)->update([
                'profile_image' => $main_image_src,
            ]);
          }

          if($backgroundimage)
          {
            $backimage = $request->file('backgroundimage');
            $main_backimage_src = '/image/company_back/'.$BusinessId. ".png";
            $backimagepath = public_path('/image/company_back/');
            $backimage->move($backimagepath, $main_backimage_src);
            $updatedbackgroundimage = Business::where('registerId', $BusinessId)->update([
                'background_image' => $main_backimage_src,
            ]);

          }

            $updatedBusiness = Business::where('registerId', $BusinessId)->update([
                'companyname' => $request->CompanyName,
                'companynameArb' => $request->CompanyNameArb,
                'companydescription' => $request->CompanyDescription,
                'companydescriptionArb' => $request->CompanyDescriptionArb,
                'companycategory' => $request->CompanyCategory,
                'companylocation' => $request->CompanyLocation,
                'companylocationArb' => $request->CompanyLocationArb,
                'location' => $request->location,
                'lat' => $request->lat,
                'lng' => $request->lng,
                'companyphone' => $request->companyphone,
                'company_tagline' => $request->company_tagline,
                'company_taglineArb' => $request->company_taglineArb,
                'company_website' => $request->company_website,
                'company_email' => $request->company_email,
                'area' => $request->area,
            ]);


            $updatedfacilities = facilities::where('registerId', $BusinessId)->update([
                'carparking' => $request->CarParking,
                'wifi' => $request->Wifi,
                'prayerroom' => $request->PrayerRoom,
                'wheelchair' => $request->Wheelchair,
                'creditcard' => $request->CreditCard,
                'alltimeservice' => $request->AlltimeService,
            ]);

            $updatedWorkinghours = Workinghours::where('registerId', $BusinessId)->update([
                'monday' => $request->monday,
                'tuesday' => $request->tuesday,
                'wednesday' => $request->wednesday,
                'thursday' => $request->thursday,
                'friday' => $request->friday,
                'saturday' => $request->saturday,
                'sunday' => $request->sunday,
            ]);

            $updatedSocialmedia = Socialmedia::where('registerId', $BusinessId)->update([
                'FaceBook' => $request->facebook,
                'Instagram' => $request->instagram,
                'Linked' => $request->linked,
                'Twitter' => $request->twitter,
                'Youtube' => $request->youtube,
            ]);
            $json['data'] = $updatedBusiness;
            $json['updatedfacilities'] = $updatedfacilities;
            $json['updatedWorkinghours'] = $updatedWorkinghours;
            $json['updatedSocialmedia'] = $updatedSocialmedia;
            $json['response'] = 1;
            $json['message'] = "success";
            return response()->json($json);

    }
    
    public function Deletebusiness($userId, $CompanyId)
    {
        $Business = Business::where('userId', $userId)->where('registerId', $CompanyId)->first();
        $facilities = facilities::where('userId', $userId)->where('registerid', $CompanyId)->first();
        $Workinghours = Workinghours::where('userid', $userId)->where('registerid', $CompanyId)->first();
        $Socialmedia = Socialmedia::where('UserId', $userId)->where('RegisterId', $CompanyId)->first();
        if($Business)
        {
            $Business->delete();
            $facilities->delete();
            $Workinghours->delete();
            $Socialmedia->delete();
            $json['response'] = 1;
            $json['message'] = "success";
            return response()->json($json);
        }

        else{
            $json['data'] = $Business;
            $json['response'] = 0;
            $json['message'] = "Error";
            return response()->json($json);

        }

    }

}
