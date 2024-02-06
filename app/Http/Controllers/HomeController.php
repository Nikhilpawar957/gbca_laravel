<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Resources;
use Illuminate\Http\Request;
use App\Models\ContactForm;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function contact_form_submit(Request $request)
    {
        $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required', 'min:10'],
        ]);

        $response = array();

        $data = [
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'messages' => $request->message,
        ];

        $save_contact_form = ContactForm::create($data);


        // Send Email to Admin
        Mail::send('email_templates.enquiry_for_admin', $data, function ($message) use ($data) {
            $from = "nikhil.pawar@onerooftech.com";
            $to = "nikhil.pawar@onerooftech.com";
            $subject = "Regarding : Enquiry from " . $data['full_name'];

            $message->from($from, env('APP_NAME'));
            $message->to($to, 'GBCAIndia')->subject($subject);
        });

        // Send Email to User
        Mail::send('email_templates.enquiry_for_user', $data, function ($message) use ($data) {
            $from = "nikhil.pawar@onerooftech.com";
            $to = $data['email'];
            $subject = "Thank you for your Enquiry";

            $message->from($from, env('APP_NAME'));
            $message->to($to, $data['full_name'])->subject($subject);
        });

        if ($save_contact_form) {
            $response = array(
                'code' => 1,
                'msg' => 'Your Enquiry is sent Successfully!!'
            );
        } else {
            $response = array(
                'code' => 3,
                'msg' => 'Something went wrong! Please Try Later'
            );
        }

        return response()->json($response);
    }

    public function profile_form_submit(Request $request)
    {
        $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required', 'min:10'],
        ]);

        $response = array();

        $data = [
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];

        $save_profile_form = DB::table('profile_form')->insert($data);

        $files = [
            public_path('assets/docs/GBCA-Profile.pdf'),
        ];

        // Send Email to Admin
        Mail::send('email_templates.profile_enquiry_for_admin', $data, function ($message) use ($data) {
            $from = "nikhil.pawar@onerooftech.com";
            $to = "nikhil.pawar@onerooftech.com";
            $subject = "GBCA-India Pvt. Ltd. Feedback Received From " . $data['full_name'];

            $message->from($from, env('APP_NAME'));
            $message->to($to, 'GBCAIndia')->subject($subject);
        });

        // Send Email to User
        Mail::send('email_templates.profile_enquiry_for_user', $data, function ($message) use ($data, $files) {
            $from = "nikhil.pawar@onerooftech.com";
            $to = $data['email'];
            $subject = "Thank you for your Enquiry";
            foreach ($files as $file) {
                $message->attach($file);
            }
            $message->from($from, env('APP_NAME'));
            $message->to($to, $data['full_name'])->subject($subject);
        });

        if ($save_profile_form) {
            $response = array(
                'code' => 1,
                'msg' => 'Your Enquiry is sent Successfully!!'
            );
        } else {
            $response = array(
                'code' => 3,
                'msg' => 'Something went wrong! Please Try Later'
            );
        }

        return response()->json($response);
    }

    public function resource_category(Request $request, $category = "")
    {
        $response = array();

        if ($category == "") {

            $first_category = Category::orderBy('ordering')->first();

            //dd($first_category);

            if (!$first_category) {
                abort(404);
            } else {

                $request->merge([
                    'category' => $first_category->category_slug,
                ]);

                // Get Years
                $get_years = DB::table('resources')
                    ->selectRaw("DISTINCT DATE_FORMAT(created_at, '%Y') AS resource_years")
                    ->where('resource_category_id', '=', $first_category->id)
                    ->whereNull('deleted_at')
                    ->orderByDesc('resource_years')
                    ->get()->toArray();

                $response = [
                    'pageTitle' => "Resources | GBCA & Associates LLP Chartered Accountants",
                    'meta_title' => "Resources | GBCA & Associates LLP Chartered Accountants",
                    'years' => $get_years
                ];
            }
        } else {
            $category_exists = Category::where('category_slug', '=', $category)->first();

            if (!$category_exists) {
                abort(404);
            } else {

                // Get Years
                $get_years = DB::table('resources')
                    ->selectRaw("DISTINCT DATE_FORMAT(created_at, '%Y') AS resource_year")
                    ->whereRaw('(resource_category_id = ? OR resource_subcategory_id = ?)', [$category_exists->id, $category_exists->id])
                    ->whereNull('deleted_at')
                    ->orderByDesc('resource_year')
                    ->get()->toArray();

                $response = [
                    'pageTitle' => $category_exists->category_name . " | GBCA & Associates LLP Chartered Accountants",
                    'meta_title' => $category_exists->category_name . " | GBCA & Associates LLP Chartered Accountants",
                    'years' => $get_years
                ];
            }
        }
        return view('frontend.pages.resources', $response);
    }

    public function get_resources(Request $request)
    {
        if ($request->ajax()) {
            if ($request->category_slug == "") {

                $first_category = Category::orderBy('ordering')->first();

                if (!$first_category) {
                    abort(404);
                } else {
                    $request->merge([
                        'category' => $first_category->category_slug,
                    ]);

                    $get_resources = DB::table('resources')
                        ->selectRaw("resource_title, resource_short_desc, resource_slug, resource_file, resource_image")
                        ->selectRaw("DATE_FORMAT(created_at, '%b %e, %Y') AS created_date")
                        ->whereRaw('(resource_category_id = ? OR resource_subcategory_id = ?)', [$first_category->id, $first_category->id])
                        ->whereNull('deleted_at')
                        ->orderByDesc('created_at')
                        ->limit(4)
                        ->get();

                    foreach ($get_resources as $key => $value) {
                        $get_resources[$key]->resource_url = route('resource', $value->resource_slug);
                    }

                    $response = ['resources' => $get_resources];
                }
            } else {
                $category_exists = Category::where('category_slug', '=', $request->category_slug)->first();

                if (!$category_exists) {
                    abort(404);
                } else {

                    DB::enableQueryLog();

                    $get_resources = DB::table('resources')
                        ->selectRaw("resource_title, resource_short_desc, resource_slug, resource_file, resource_image")
                        ->selectRaw("DATE_FORMAT(created_at, '%b %e, %Y') AS created_date")
                        ->whereRaw("(resource_category_id = ? OR resource_subcategory_id = ?)", [$category_exists->id, $category_exists->id])
                        ->whereNull("deleted_at")
                        ->limit(4)
                        ->orderByDesc('created_at');

                    if ($request->year != null && $request->year != "") {
                        $get_resources->whereYear('created_at', $request->year);
                    }

                    if ($request->month != null && $request->month != "") {
                        $get_resources->whereMonth('created_at', $request->month);
                    }

                    if ($request->search != null && $request->search != "") {

                        $search = "%" . $request->search . "%";

                        $get_resources->whereRaw("resource_title LIKE ? OR resource_short_desc LIKE ? OR resource_slug LIKE ? ", [$search, $search, $search]);
                    }

                    $get_resources = $get_resources->get()->toArray();

                    // $quries = DB::getQueryLog();

                    // dd($quries);

                    if ($request->year != null && $request->year != "" && $request->month == null && $request->month == "") {
                        // Get Months
                        $get_months = DB::table('resources')
                            ->selectRaw("DISTINCT DATE_FORMAT(created_at, '%b') AS resource_month, MONTH(created_at) AS month_number")
                            ->whereRaw("(resource_category_id = ? OR resource_subcategory_id = ?)", [$category_exists->id, $category_exists->id])
                            ->whereYear('created_at', $request->year)
                            ->whereNull('deleted_at')
                            ->orderByDesc('month_number')
                            ->get()->toArray();
                    } else {
                        $get_months = "";
                    }


                    //dd($get_resources);

                    foreach ($get_resources as $key => $value) {
                        $get_resources[$key]->resource_url = route('resource', $value->resource_slug);
                        if ($value->resource_file != null && Storage::disk('public')->exists($value->resource_file)) {
                            $get_resources[$key]->resource_file = asset('storage/' . $value->resource_file);
                        }
                        if ($value->resource_image != null) {
                            if (!filter_var($value->resource_image, FILTER_VALIDATE_URL) && Storage::disk('public')->exists($value->resource_image)) {
                                $get_resources[$key]->resource_image = asset('storage/' . $value->resource_image);
                            }
                        }
                    }

                    $response = ['resources' => $get_resources, 'months' => $get_months];
                }
            }
            return response()->json($response);
        }
    }

    public function read_resource($resource_slug)
    {
        if (!$resource_slug) {
            return abort(404);
        } else {

            $resource = Resources::selectRaw('resources.*,categories.category_name')
                ->leftJoin('categories', 'resources.resource_category_id', '=', 'categories.id')
                ->where('resource_slug', '=', $resource_slug)
                ->first();

            $response = [
                'pageTitle' => $resource->resource_title . " | GBCA & Associates LLP Chartered Accountants",
                'meta_title' => $resource->resource_title,
                'meta_desc' => $resource->resource_short_desc,
                'meta_keywords' => isset($resource->resource_keywords) ? $resource->resource_keywords : '',
                'meta_image' => isset($resource->resource_image) ? $resource->resource_image : '',
                'resource' => $resource,
            ];

            return view('frontend.pages.resource-detail', $response);
        }
    }

    public function sign_up_form_submit(Request $request)
    {
        $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'unique:users,email', 'max:255'],
            'phone' => ['required', 'min:10', 'unique:users,phone', 'max:10'],
            'doj' => ['required', 'numeric']
        ], [
            'fullname.required' => 'Full Name is Required',
            'email.required' => 'Email is Required',
            'phone.required' => 'Phone Number is Required',
            'doj.required' => 'Year of joining is Required',
        ]);

        $data = [
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'doj' => $request->doj,
            'password' => Hash::make($request->phone)
        ];

        $save_user = User::create($data);

        // Mail to Admin for User Signup
        Mail::send('email_templates.new_user_signup', $data, function ($message) use ($data) {
            $from = "nikhil.pawar@onerooftech.com";
            $to = "nikhil.pawar@onerooftech.com";
            $subject = "Regarding : New SignUp";

            $message->from($from, env('APP_NAME'));
            $message->to($to, 'GBCAIndia')->subject($subject);
        });

        // Mail to User for Signup
        Mail::send('email_templates.thank_you_user', $data, function ($message) use ($data) {
            $from = "nikhil.pawar@onerooftech.com";
            $to = $data['email'];
            $subject = "Thankyou For Registering With GBCA & Associates LLP. Please wait for Team Approval";

            $message->from($from, env('APP_NAME'));
            $message->to($to, $data['full_name'])->subject($subject);
        });

        if ($save_user) {
            $response = array(
                'code' => 1,
                'msg' => 'Thankyou for registering with GBCA, Please Wait for Approval from Admin!!'
            );
        } else {
            $response = array(
                'code' => 3,
                'msg' => 'Something went wrong! Please Try Later'
            );
        }

        return response()->json($response);
    }

    public function send_otp(Request $request)
    {
        $response = array();

        $fieldType = filter_var($request->login_id, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

        if ($fieldType == 'email') {
            $request->validate([
                'login_id' => 'required|email|exists:users,email',
            ], [
                'login_id.required' => 'Email or Phone is required',
                'login_id.email' => 'Invalid Email Address',
                'login_id.exists' => 'Email is not Registered',
            ]);
        } else {
            $request->validate([
                'login_id' => 'required|exists:users,phone',
            ], [
                'login_id.required' => 'Email or Phone is required',
                'login_id.exists' => 'Phone no. is not Registered',
            ]);
        }

        $checkUser = User::where($fieldType, $request->login_id)->where('role', '=', 2)->first();

        if ($checkUser) {

            if ($checkUser->blocked == 1) {
                $response = [
                    'code' => 3,
                    'msg' => 'Your Account has been rejected by admin'
                ];
            } else if ($checkUser->blocked == 2) {
                $response = [
                    'code' => 3,
                    'msg' => 'Your Account has not been approved by admin'
                ];
            } else {

                $data = [
                    'name' => $checkUser->name,
                    'phone' => $checkUser->phone,
                    'email' => $checkUser->email,
                    'otp' => rand(100000, 999999),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ];

                DB::table('otp_history')->whereRaw('phone = ? OR email = ?', [$request->login_id, $request->login_id])->update(['status' => 0]);

                $insert_otp = DB::table('otp_history')->insert($data);

                if ($insert_otp) {
                    Mail::send('email_templates.send_otp', $data, function ($message) use ($checkUser) {

                        $from = "nikhil.pawar@onerooftech.com";
                        $to = $checkUser->email;
                        $subject = "Regarding : Login OTP";

                        $message->from($from, env('APP_NAME'));
                        $message->to($to, $checkUser->name)->subject($subject);
                    });

                    $response = [
                        'code' => 1,
                        'msg' => 'Please check your email or phone for otp'
                    ];
                } else {
                    $response = [
                        'code' => 3,
                        'msg' => 'Something went wrong'
                    ];
                }
            }
        } else {
            $response = [
                'code' => 3,
                'msg' => 'User Does Not Exist'
            ];
        }

        return response()->json($response);
    }

    public function confirm_otp(Request $request)
    {

        $response = array();

        $fieldType = filter_var($request->login_id, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

        if ($fieldType == 'email') {
            $request->validate([
                'login_id' => 'required|email|exists:users,email',
                'otp' => 'required|numeric|min:6',
            ], [
                'login_id.required' => 'Email or Phone is required',
                'login_id.email' => 'Invalid Email Address',
                'login_id.exists' => 'Email is not Registered',
            ]);
        } else {
            $request->validate([
                'login_id' => 'required|exists:users,phone',
                'otp' => 'required|numeric|min:6',
            ], [
                'login_id.required' => 'Email or Phone is required',
                'login_id.exists' => 'Phone no. is not Registered',
            ]);
        }

        $checkOTP = DB::table('otp_history')
            ->where($fieldType, '=', $request->login_id)
            ->where('otp', $request->otp)
            ->where('status', '=', 1)
            ->get();

        if ($checkOTP->isNotEmpty()) {

            DB::table('otp_history')->where($fieldType, '=', $request->login_id)->update(['status' => 0]);

            $creds = array($fieldType => $request->login_id, 'role' => 2);

            $user = Auth::getProvider()->retrieveByCredentials($creds);

            Auth::login($user);

            $response = [
                'code' => 1,
                'msg' => 'Logged in successfully'
            ];
        } else {
            $response = [
                'code' => 3,
                'msg' => 'Invalid OTP or OTP Expired'
            ];
        }

        return response()->json($response);
    }

    public function expire_otp(Request $request)
    {
        $response = array();

        $fieldType = filter_var($request->login_id, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

        $expire_otp = DB::table('otp_history')->where($fieldType, '=', $request->login_id)->update(['status' => 0]);

        if ($expire_otp) {
            $response = [
                'code' => 1,
                'msg' => 'OTP Expired'
            ];
        } else {
            $response = [
                'code' => 3,
                'msg' => 'Something went wrong'
            ];
        }

        return response()->json($response);
    }
}
