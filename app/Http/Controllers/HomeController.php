<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ContactForm;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function contact_form_submit(Request $request)
    {
        $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required', 'numeric', 'max:255'],
        ]);

        $response = array();

        $data = [
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
        ];

        $save_contact_form = ContactForm::create($data);


        // Send Email to Admin
        Mail::send('email_templates.enquiry_for_admin', $data, function ($message) use ($data) {
            $from = env('MAIL_USERNAME');
            $to = "reachus@gbcaindia.com";
            $subject = "Regarding : Enquiry from " . $data['full_name'];

            $message->from($from, env('APP_NAME'));
            $message->to($to, 'GBCAIndia')->subject($subject);
        });

        // Send Email to User
        Mail::send('email_templates.enquiry_for_user', $data, function ($message) use ($data) {
            $from = env('MAIL_USERNAME');
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

    public function resource_category(Request $request, $category = "")
    {
        $response = array();
        if ($request->ajax()) {
            if ($category == "") {
            } else {
                $category_exists = Category::where('category_slug', '=', $category)->first();

                if (!$category_exists) {
                    abort(404);
                } else {
                    $get_resources = DB::table('resources')
                        ->whereRaw('(resource_category_id = ? OR resource_subcategory_id = ?)', [$category_exists->id, $category_exists->id])
                        ->whereNull('deleted_at')
                        ->get();

                    $response = ['resources' => $get_resources];
                }
            }
            return response()->json($response);
        } else {
            if ($category == "") {
            } else {
                $category_exists = Category::where('category_slug', '=', $category)->first();

                if (!$category_exists) {
                    abort(404);
                } else {
                    $get_resources = DB::table('resources')
                        ->whereRaw('(resource_category_id = ? OR resource_subcategory_id = ?)', [$category_exists->id, $category_exists->id])
                        ->whereNull('deleted_at')
                        ->get();

                    $response = ['resources' => $get_resources];
                }
            }
            return view('frontend.pages.resources', $response);
        }
    }
}
