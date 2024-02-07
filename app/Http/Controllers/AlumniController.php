<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AlumniController extends Controller
{
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

    public function view_profile(Request $request)
    {
        $data = array();

        $alumni = User::find(auth()->user()->id);

        $data = array(
            'pageTitle' => 'View Profile',
            'alumni' => $alumni
        );

        return view('frontend.pages.view-profile', $data);
    }

    public function edit_profile(Request $request)
    {
        $data = array();

        $alumni = User::find(auth()->user()->id);

        $data = array(
            'pageTitle' => 'Edit Profile',
            'alumni' => $alumni
        );

        return view('frontend.pages.edit-profile', $data);
    }

    public function alumni_directory(Request $request)
    {
        $data = array();

        $years = DB::table('users')
            ->selectRaw('DISTINCT year_of_joining')
            ->where('role', '=', 2)
            ->where('blocked', '=', 0)
            ->where('year_of_joining', '!=', '')
            ->whereNotNull('year_of_joining')
            ->orderBy('year_of_joining')
            ->get();

        $data = array(
            'pageTitle' => 'GBCA Alumni Directory',
            'years' => $years,
        );

        return view('frontend.pages.alumni-directory', $data);
    }

    public function get_alumnis(Request $request)
    {
        $response = array();

        $alumnis = DB::table('users')
            ->where('role', '=', 2)
            ->where('blocked', '=', 0)
            ->where('id', '!=', auth()->user()->id);

        if ($request->filled('year')) {
            $alumnis->whereYear('year_of_joining', $request->year);
        }

        if ($request->filled('search')) {

            $search = "%" . $request->search . "%";

            $alumnis->whereRaw("name LIKE ? OR designation LIKE ? ", [$search, $search]);
        }

        $alumnis->orderBy('name')->get();

        if ($alumnis) {

            foreach ($alumnis as $key => $value) {
                if ($value->profile_image != null && !filter_var($value->profile_image, FILTER_VALIDATE_URL)) {
                    $alumnis[$key]->profile_image = asset('storage/' . $value->profile_image);
                }
            }

            $response = [
                'code' => 1,
                'data' => $alumnis
            ];
        } else {
            $response = [
                'code' => 3,
                'data' => []
            ];
        }

        return response()->json($response);
    }
}
