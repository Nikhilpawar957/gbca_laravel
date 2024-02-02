<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Resources;
use Illuminate\Http\Request;
use App\Models\ContactForm;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function contact_form_submit(Request $request)
    {
        $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required', 'numeric'],
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
                    ->orderBy('resource_years')
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
                    ->where('resource_category_id', '=', $category_exists->id)
                    ->whereNull('deleted_at')
                    ->orderBy('resource_year')
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
                        ->selectRaw('resource_title, resource_short_desc')
                        ->whereRaw('(resource_category_id = ? OR resource_subcategory_id = ?)', [$first_category->id, $first_category->id])
                        ->whereNull('deleted_at')
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

                        $search = "'%" . $request->search . "%'";

                        $get_resources->whereRaw("resource_title LIKE ? OR resource_short_desc LIKE ? OR resource_slug LIKE ? ", [$search, $search, $search]);
                    }

                    $get_resources = $get_resources->get()->toArray();

                    if ($request->year != null && $request->year != "" && $request->month == null && $request->month == "") {
                        // Get Months
                        $get_months = DB::table('resources')
                            ->selectRaw("DISTINCT DATE_FORMAT(created_at, '%b') AS resource_month, MONTH(created_at) AS month_number")
                            ->where('resource_category_id', '=', $category_exists->id)
                            ->whereYear('created_at', $request->year)
                            ->whereNull('deleted_at')
                            ->orderByDesc('id')
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
}
