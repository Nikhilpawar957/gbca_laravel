<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Resources;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use Torann\Hashids\Facade\Hashids;

class AuthorController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.pages.home');
    }

    // Register Alumni's
    public function register(Request $request)
    {
        $response = array();

        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|digits:10'
        ], [
            'name.required' => 'Full Name is required',
            'name.min' => 'Full Name Cannot be less than 3 characters',
            'email.required' => 'Email is required',
            'email.email' => 'Invalid Email Address',
            'email.unique' => 'Email is already registered',
            'phone.required' => 'Phone Number is required',
            'phone.digits' => 'Phone Number must be 10 digits',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => isset($request->password) ? Hash::make($request->password) : Hash::make($request->phone),
            'doj' => isset($request->doj) ? $request->doj : Carbon::now()
        ]);

        if ($user) {

            $token = $user->createToken('auth_token')->plainTextToken;

            $response = array(
                'code' => 1,
                'token' => $token,
                'user' => $request->name,
                'msg' => 'User registration successful'
            );
        } else {
            $response = array(
                'code' => 3,
                'msg' => 'User registration failed'
            );
        }

        return response()->json($response);
    }

    // Login Admin
    public function login(Request $request)
    {

        $response = array();

        $fieldType = filter_var($request->login_id, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if ($fieldType == 'email') {
            $request->validate([
                'login_id' => 'required|email|exists:users,email',
                'password' => 'required|min:5'
            ], [
                'login_id.required' => 'Username or Email is required',
                'login_id.email' => 'Invalid Email Address',
                'login_id.exists' => 'Email is not registered with us',
                'password' => 'Password is required',
            ]);
        } else {
            $request->validate([
                'login_id' => 'required|exists:users,username',
                'password' => 'required|min:5'
            ], [
                'login_id.required' => 'Username or Email is required',
                'login_id.exists' => 'Username is not registered with us',
                'password' => 'Password is required',
            ]);
        }

        $creds = array($fieldType => $request->login_id, 'password' => $request->password);

        if (Auth::guard('web')->attempt($creds)) {
            $checkUser = User::where($fieldType, $request->login_id)->first();

            if ($checkUser->blocked == 1) {
                Auth::guard()->logout();

                $response = array(
                    'code' => 3,
                    'msg' => 'Your Account is Blocked, Please Contact Admin'
                );
            } else {
                //return redirect()->route('author.home');
                $token = $checkUser->createToken('auth_token')->plainTextToken;

                $response = array(
                    'code' => 1,
                    'token' => $token,
                    'user' => $checkUser->name,
                    'msg' => 'User Logged in successfully'
                );
            }
        } else {
            $response = array(
                'code' => 3,
                'msg' => 'Invalid Credentials'
            );
        }

        return response()->json($response);
    }

    // Logout Admin
    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('author.login');
    }

    // Reset Password Form
    public function ResetForm(Request $request, $token = null)
    {
        $data = [
            'pageTitle' => 'Reset Password',
        ];

        return view('admin.pages.auth.reset', $data)->with(['token' => $token, 'email' => $request->email]);
    }

    // Get Categories (Datatables)
    public function getCategories(Request $request)
    {
        if ($request->ajax()) {

            $data = DB::table('categories AS c')
                ->selectRaw('c.id,c.category_image,c.category_name,c.ordering, COUNT(DISTINCT s.id) AS subcat_count, COUNT(DISTINCT CASE WHEN r.resource_category_id IS NOT NULL THEN r.id END) as resources_count')
                ->selectRaw("date_format(c.created_at, '%M %d,%Y') as date")
                ->leftJoin('categories AS s', 'c.id', '=', 's.parent_category')
                ->leftJoin('resources AS r', 'c.id', '=', 'r.resource_category_id')
                ->whereRaw('(c.parent_category IS NULL OR c.parent_category = 0)')
                ->whereNull('r.deleted_at')
                ->groupBy('c.id')
                ->orderBy('c.ordering')
                ->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->setRowAttr([
                    'data-index' => function ($row) {
                        return $row->id;
                    },
                    'data-ordering' => function ($row) {
                        return $row->ordering;
                    },
                ])
                ->addColumn('action', function ($row) {
                    $actionBtn = '
                        <div class="btn-list flex-nowrap">
                            <a href="javascript:void(0);" class="edit text-warning" onclick="return edit_category(' . $row->id . ');">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-edit-circle" width="24"
                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M12 15l8.385 -8.415a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3z" />
                                    <path d="M16 5l3 3" />
                                    <path d="M9 7.07a7 7 0 0 0 1 13.93a7 7 0 0 0 6.929 -6" />
                                </svg>
                            </a>
                            <a href="javascript:void(0);" class="delete text-danger" onclick="return delete_category(' . $row->id . ');">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-circle-x-filled"
                                    width="24" height="24" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M17 3.34a10 10 0 1 1 -14.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 14.995 -8.336zm-6.489 5.8a1 1 0 0 0 -1.218 1.567l1.292 1.293l-1.292 1.293l-.083 .094a1 1 0 0 0 1.497 1.32l1.293 -1.292l1.293 1.292l.094 .083a1 1 0 0 0 1.32 -1.497l-1.292 -1.293l1.292 -1.293l.083 -.094a1 1 0 0 0 -1.497 -1.32l-1.293 1.292l-1.293 -1.292l-.094 -.083z"
                                        stroke-width="0" fill="currentColor" />
                                </svg>
                            </a>
                        </div>
                    ';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    // Get SubCategories (Datatables)
    public function getSubCategories(Request $request)
    {
        if ($request->ajax()) {

            //DB::enableQueryLog();

            $data = DB::table('categories AS s')
                ->selectRaw('s.id,s.category_image,c.category_name,s.ordering, s.category_name as subcategory_name,  COUNT(DISTINCT CASE WHEN r.resource_category_id IS NOT NULL THEN r.id END) AS resources_count')
                ->selectRaw("date_format(c.created_at, '%M %d,%Y') as date")
                ->leftJoin('categories AS c', 's.parent_category', '=', 'c.id')
                ->leftJoin('resources AS r', 's.id', '=', 'r.resource_subcategory_id')
                ->whereRaw('(s.parent_category IS NOT NULL AND s.parent_category != 0)')
                ->whereNull('r.deleted_at')
                ->groupBy('s.id', 's.parent_category', 'c.category_name', 's.category_name')
                ->orderBy('s.ordering')
                ->get();

            //dd(DB::getQueryLog());

            return Datatables::of($data)
                ->addIndexColumn()
                ->setRowAttr([
                    'data-index' => function ($row) {
                        return $row->id;
                    },
                    'data-ordering' => function ($row) {
                        return $row->ordering;
                    },
                ])
                ->addColumn('action', function ($row) {
                    $actionBtn = '
                        <div class="btn-list flex-nowrap">
                            <a href="javascript:void(0);" class="edit text-warning" onclick="return edit_subcategory(' . $row->id . ');">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-edit-circle" width="24"
                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M12 15l8.385 -8.415a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3z" />
                                    <path d="M16 5l3 3" />
                                    <path d="M9 7.07a7 7 0 0 0 1 13.93a7 7 0 0 0 6.929 -6" />
                                </svg>
                            </a>
                            <a href="javascript:void(0);" class="delete text-danger" onclick="return delete_subcategory(' . $row->id . ');">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-circle-x-filled"
                                    width="24" height="24" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M17 3.34a10 10 0 1 1 -14.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 14.995 -8.336zm-6.489 5.8a1 1 0 0 0 -1.218 1.567l1.292 1.293l-1.292 1.293l-.083 .094a1 1 0 0 0 1.497 1.32l1.293 -1.292l1.293 1.292l.094 .083a1 1 0 0 0 1.32 -1.497l-1.292 -1.293l1.292 -1.293l.083 -.094a1 1 0 0 0 -1.497 -1.32l-1.293 1.292l-1.293 -1.292l-.094 -.083z"
                                        stroke-width="0" fill="currentColor" />
                                </svg>
                            </a>
                        </div>
                    ';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    // Get Resources (Datatables)
    public function getResources(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('resources AS r')
                ->selectRaw("r.*,c.category_name AS 'category_name',s.category_name AS 'subcategory_name'")
                ->selectRaw("date_format(r.created_at, '%M %d,%Y') as date")
                ->leftJoin('categories AS c', 'r.resource_category_id', '=', 'c.id')
                ->leftJoin('categories AS s', 'r.resource_subcategory_id', '=', 's.id')
                ->whereNull('r.deleted_at')
                ->orderByDesc('r.id')
                ->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $encode_id = Hashids::encode($row->id);

                    $resourceId = ['resource_id' => $encode_id];
                    $actionBtn = '
                    <div class="btn-list flex-nowrap">
                        <a href="' . route("author.edit-resource", $resourceId) . '" class="edit text-warning" >
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-edit-circle" width="24"
                                height="24" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" fill="none" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M12 15l8.385 -8.415a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3z" />
                                <path d="M16 5l3 3" />
                                <path d="M9 7.07a7 7 0 0 0 1 13.93a7 7 0 0 0 6.929 -6" />
                            </svg>
                        </a>
                        <a href="javascript:void(0);" class="delete text-danger" onclick="return delete_resource(\'' . $encode_id . '\');">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-circle-x-filled"
                                width="24" height="24" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M17 3.34a10 10 0 1 1 -14.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 14.995 -8.336zm-6.489 5.8a1 1 0 0 0 -1.218 1.567l1.292 1.293l-1.292 1.293l-.083 .094a1 1 0 0 0 1.497 1.32l1.293 -1.292l1.293 1.292l.094 .083a1 1 0 0 0 1.32 -1.497l-1.292 -1.293l1.292 -1.293l.083 -.094a1 1 0 0 0 -1.497 -1.32l-1.293 1.292l-1.293 -1.292l-.094 -.083z"
                                    stroke-width="0" fill="currentColor" />
                            </svg>
                        </a>
                    </div>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    // Get Contact Form Data (Datatables)
    public function getContactFormData(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('contact_forms AS c')
                ->selectRaw("*,date_format(c.created_at, '%M %d,%Y') as date")
                ->orderByDesc('id');

            if ($request->filled('date_range')) {

                $date_range = $request->date_range;

                $dates = explode(' - ', $date_range);

                $start_date = $dates[0];
                $end_date = $dates[1];

                $data = $data->whereDate('c.created_at', '>=', $start_date)->whereDate('c.created_at', '<=', $end_date);
            }

            $data = $data->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->make(true);
        }
    }

    // Get Users (Datatables)
    public function getUsers(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('users AS u')
                ->selectRaw("*,date_format(u.created_at, '%M %d,%Y') as date")
                ->where('role', '!=', 1)
                ->orderByDesc('id');

            if ($request->filled('blocked')) {
                $data = $data->where('blocked', '=', $request->blocked);
            }

            $data = $data->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $encode_id = Hashids::encode($row->id);
                    $userId = ['user_id' => $encode_id];
                    $actionBtn = '
                    <div class="btn-list flex-nowrap">';

                    // Change Status Button
                    if ($row->blocked == 0) {
                        $actionBtn .= '
                        <a href="javascript:void(0);" onclick="return change_status(\'' . $encode_id . '\',1);" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="left" aria-label="Reject" title="Reject">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-user-x" width="24"
                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                <path d="M6 21v-2a4 4 0 0 1 4 -4h3.5" />
                                <path d="M22 22l-5 -5" />
                                <path d="M17 22l5 -5" />
                            </svg>
                        </a>';
                    } else if ($row->blocked == 1) {
                        $actionBtn .= '
                        <a href="javascript:void(0);" onclick="return change_status(\'' . $encode_id . '\',0);" class="text-success" data-bs-toggle="tooltip" data-bs-placement="left" aria-label="Approve" title="Approve">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-user-check" width="24"
                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                <path d="M6 21v-2a4 4 0 0 1 4 -4h4" />
                                <path d="M15 19l2 2l4 -4" />
                            </svg>
                        </a>';
                    } else if ($row->blocked == 2) {
                        $actionBtn .= '
                        <a href="javascript:void(0);" onclick="return change_status(\'' . $encode_id . '\',1);" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="left" aria-label="Reject" title="Reject">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-user-x" width="24"
                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                <path d="M6 21v-2a4 4 0 0 1 4 -4h3.5" />
                                <path d="M22 22l-5 -5" />
                                <path d="M17 22l5 -5" />
                            </svg>
                        </a>
                        <a href="javascript:void(0);" onclick="return change_status(\'' . $encode_id . '\',0);" class="text-success" data-bs-toggle="tooltip" data-bs-placement="left" aria-label="Approve" title="Approve">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-user-check" width="24"
                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                <path d="M6 21v-2a4 4 0 0 1 4 -4h4" />
                                <path d="M15 19l2 2l4 -4" />
                            </svg>
                        </a>
                        ';
                    }

                    // Edit & Delete button
                    $actionBtn .= '<a href="' . route("author.edit-user", $userId) . '" class="edit text-warning" data-bs-toggle="tooltip" data-bs-placement="left" title="Edit">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-edit-circle" width="24"
                                height="24" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" fill="none" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M12 15l8.385 -8.415a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3z" />
                                <path d="M16 5l3 3" />
                                <path d="M9 7.07a7 7 0 0 0 1 13.93a7 7 0 0 0 6.929 -6" />
                            </svg>
                        </a>
                        <a href="javascript:void(0);" class="delete text-danger" data-bs-toggle="tooltip" data-bs-placement="left" title="Delete" onclick="return delete_user(\'' . $encode_id . '\');">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-circle-x-filled"
                                width="24" height="24" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M17 3.34a10 10 0 1 1 -14.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 14.995 -8.336zm-6.489 5.8a1 1 0 0 0 -1.218 1.567l1.292 1.293l-1.292 1.293l-.083 .094a1 1 0 0 0 1.497 1.32l1.293 -1.292l1.293 1.292l.094 .083a1 1 0 0 0 1.32 -1.497l-1.292 -1.293l1.292 -1.293l.083 -.094a1 1 0 0 0 -1.497 -1.32l-1.293 1.292l-1.293 -1.292l-.094 -.083z"
                                    stroke-width="0" fill="currentColor" />
                            </svg>
                        </a>
                    </div>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    /* Category API Start */

    // Save Category API
    public function save_category(Request $request)
    {
        $response = array();

        $image_path = 'category/images/';

        if ($request->category_id != null || $request->category_id != "") {

            if ($request->hasFile('category_image')) {
                $request->validate([
                    'category_id' => ['required', 'integer', 'exists:categories,id'],
                    'category_name' => ['required', 'min:3', 'unique:categories,category_name,' . $request->category_id],
                    'category_image' => ['required', 'image', 'mimes:png,jpg,svg']
                ]);
            } else {
                $request->validate([
                    'category_id' => 'required', 'integer', 'exists:categories,id',
                    'category_name' => ['required', 'min:3', 'unique:categories,category_name,' . $request->category_id],
                ]);
            }


            $update_data = array(
                'category_name' => $request->category_name,
                'category_slug' => Str::slug($request->category_name),
                'created_by' => Auth::user()->id,
            );

            if ($request->hasFile('category_image')) {
                $image = $request->file('category_image');

                $imagename = $image->getClientOriginalName();
                $new_imagename = time() . '_' . $imagename;

                $image_upload = Storage::disk('public')->put($image_path . $new_imagename, (string) file_get_contents($image));

                $old_image = Category::find($request->category_id)->category_image;

                if ($old_image != null && Storage::disk('public')->exists($old_image)) {
                    Storage::disk('public')->delete($old_image);
                }

                if ($image_upload) {
                    $update_data['category_image'] = $image_path . $new_imagename;
                }
            }

            $save_category = Category::where('id', '=', $request->category_id)->update($update_data);

            if ($save_category) {
                $response = array(
                    'code' => 1,
                    'msg' => 'Category Updated',
                );
            } else {
                $response = array(
                    'code' => 3,
                    'msg' => 'Something went wrong while updating category',
                );
            }
        } else {

            if ($request->hasFile('category_image')) {
                $request->validate([
                    'category_name' => ['required', 'min:3', 'unique:categories,category_name'],
                    'category_image' => ['required', 'image', 'mimes:png,jpg,svg']
                ]);
            } else {
                $request->validate([
                    'category_name' => ['required', 'min:3', 'unique:categories,category_name'],
                ]);
            }

            $insert_data = array(
                'category_name' => $request->category_name,
                'created_by' => Auth::user()->id,
            );

            if ($request->hasFile('category_image')) {
                $image = $request->file('category_image');

                $imagename = $image->getClientOriginalName();
                $new_imagename = time() . '_' . $imagename;

                $image_upload = Storage::disk('public')->put($image_path . $new_imagename, (string) file_get_contents($image));

                if ($image_upload) {
                    $insert_data['category_image'] = $image_path . $new_imagename;
                }
            }

            $save_category = Category::create($insert_data);

            if ($save_category) {
                $response = array(
                    'code' => 1,
                    'msg' => 'Category Added',
                );
            } else {
                $response = array(
                    'code' => 3,
                    'msg' => 'Something went wrong while adding category',
                );
            }
        }
        return response()->json($response);
    }

    // Edit Category API
    public function edit_category(Request $request)
    {
        $response = array();

        $request->validate([
            'category_id' => 'required|integer|exists:categories,id',
        ], [
            'category_id.required' => 'Category ID must be provided',
            'category_id.integer' => 'Category ID must be an integer',
            'category_id.exists' => 'Category does not exists or already deleted',
        ]);

        $category = Category::where('id', '=', $request->category_id)->first();

        if ($category) {

            $category->category_image = asset('storage/' . $category->category_image);

            $response = array(
                'code' => 1,
                'msg' => 'Category Found',
                'data' => $category,
            );
        } else {
            $response = array(
                'code' => 3,
                'msg' => 'Category Not Found',
                'data' => [],
            );
        }

        return response()->json($response);
    }

    // Delete Category API
    public function delete_category(Request $request)
    {
        $response = array();

        $request->validate([
            'category_id' => 'required|integer|exists:categories,id',
        ]);

        $subcategories = Category::where('parent_category', '=', $request->category_id)->get();

        if (!empty($subcategories) && count($subcategories) > 0) {

            $totalResources = 0;

            foreach ($subcategories as $subcat) {
                $totalResources += Resources::where('resource_subcategory_id', $subcat->id)->get()->count();
            }

            if ($totalResources > 0) {
                $response = array(
                    'code' => 3,
                    'msg' => 'This Category has (' . $totalResources . ') ' . Str::of('resource')->plural($totalResources) . ' related to it cannot be deleted',
                );
            } else {
                $response = array(
                    'code' => 3,
                    'msg' => 'This Category has (' . count($subcategories) . ') ' . Str::of('subcategory')->plural(count($subcategories)) . ' related to it cannot be deleted',
                );
            }
        } else {
            $category = Category::where('id', '=', $request->category_id)->first();

            $old_image = $category->category_image;

            // Delete Resource Image
            if ($old_image != null && Storage::disk('public')->exists($old_image)) {
                Storage::disk('public')->delete($old_image);
            }

            $delete_category = $category->delete();

            if ($delete_category) {
                $response = array(
                    'code' => 1,
                    'msg' => 'Category Deleted',
                );
            } else {
                $response = array(
                    'code' => 3,
                    'msg' => 'Something went wrong while deleting category',
                );
            }
        }

        return response()->json($response);
    }

    // Change Ordering Category
    function change_category_order(Request $request)
    {
        $positions = isset($request->positions) ? $request->positions : "";

        $positions = array_chunk(explode(",", $positions[0]), 2);

        // echo count($positions)."<br>";

        // print_r($positions); exit;

        if ($positions) {
            foreach ($positions as $position) {
                $index = $position[0];
                $newPosition = $position[1];
                Category::where('id', $index)->update([
                    'ordering' => $newPosition,
                    'updated_by' => Auth::user()->name,
                ]);
            }
            return response()->json(['code' => 1, 'msg' => 'Position Changed Successfully']);
        } else {
            return response()->json(['code' => 3, 'msg' => 'Positions Not Recieved']);
        }
    }

    /* Category API End  -------------------------------- */

    /* Subcategory API Start */

    // Save Subcategory API
    public function save_subcategory(Request $request)
    {
        $response = array();

        if ($request->subcategory_id) {

            $request->validate([
                'subcategory_id' => 'required|integer|exists:categories,id',
                'parent_category' => 'required|integer|exists:categories,id',
                'category_name' => 'required|min:3|unique:categories,category_name,' . $request->subcategory_id,
            ]);

            $save_subcategory = Category::where('id', '=', $request->subcategory_id)->update(
                [
                    'parent_category' => $request->parent_category,
                    'category_name' => $request->category_name,
                    'updated_by' => Auth::user()->id,
                ]
            );

            if ($save_subcategory) {
                $response = array(
                    'code' => 1,
                    'msg' => 'SubCategory Updated',
                );
            } else {
                $response = array(
                    'code' => 3,
                    'msg' => 'Something went wrong while updating subcategory',
                );
            }
        } else {

            $request->validate([
                'parent_category' => 'required|integer|exists:categories,id',
                'category_name' => 'required|min:3|unique:categories,category_name',
            ], [
                'parent_category.required' => 'Category ID must be provided',
                'parent_category.integer' => 'Category ID must be an integer',
                'parent_category.exists' => 'Category does not exists or already deleted',
                'category_name.required' => 'Category Name must be provided',
                'category_name.min' => 'Category Name must be minimum 3 characters',
            ]);

            $save_subcategory = Category::create(
                [
                    'parent_category' => $request->parent_category,
                    'category_name' => $request->category_name,
                    'created_by' => Auth::user()->id,
                ]
            );

            if ($save_subcategory) {
                $response = array(
                    'code' => 1,
                    'msg' => 'SubCategory Added',
                );
            } else {
                $response = array(
                    'code' => 3,
                    'msg' => 'Something went wrong while adding subcategory',
                );
            }
        }

        return response()->json($response);
    }

    // Edit Subcategory API
    public function edit_subcategory(Request $request)
    {
        $response = array();

        $request->validate([
            'subcategory_id' => 'required|integer|exists:categories,id',
        ], [
            'subcategory_id.required' => 'SubCategory ID must be provided',
            'subcategory_id.integer' => 'SubCategory ID must be an integer',
            'subcategory_id.exists' => 'SubCategory does not exists or already deleted',
        ]);

        $subcategory = Category::where('id', '=', $request->subcategory_id)->first()->toArray();

        if ($subcategory) {
            $response = array(
                'code' => 1,
                'msg' => 'Sub Category Found',
                'data' => $subcategory,
            );
        } else {
            $response = array(
                'code' => 3,
                'msg' => 'Sub Category Not Found',
                'data' => [],
            );
        }

        return response()->json($response);
    }

    // Delete Subcategory API
    public function delete_subcategory(Request $request)
    {
        $response = array();

        $request->validate([
            'subcategory_id' => 'required|integer|exists:categories,id',
        ], [
            'subcategory_id.required' => 'SubCategory ID must be provided',
            'subcategory_id.integer' => 'SubCategory ID must be an integer',
            'subcategory_id.exists' => 'SubCategory does not exists or already deleted',
        ]);

        $totalResources = Resources::where('resource_subcategory_id', $request->subcategory_id)->count();

        if (!empty($totalResources) && $totalResources > 0) {

            $response = array(
                'code' => 3,
                'msg' => 'This SubCategory has (' . $totalResources . ') resources related to it cannot be deleted',
            );
        } else {
            $subcategory = Category::where('id', '=', $request->subcategory_id)->first();

            $old_image = $subcategory->category_image;

            // Delete Resource Image
            if ($old_image != null && Storage::disk('public')->exists($old_image)) {
                Storage::disk('public')->delete($old_image);
            }

            $delete_subcategory = $subcategory->delete();

            if ($delete_subcategory) {
                $response = array(
                    'code' => 1,
                    'msg' => 'SubCategory Deleted',
                );
            } else {
                $response = array(
                    'code' => 3,
                    'msg' => 'Something went wrong while deleting subcategory',
                );
            }
        }

        return response()->json($response);
    }

    // Change Ordering SubCategory
    function change_subcategory_order(Request $request)
    {
        $positions = isset($request->positions) ? $request->positions : "";

        $positions = array_chunk(explode(",", $positions[0]), 2);

        // echo count($positions)."<br>";

        // print_r($positions); exit;

        if ($positions) {
            foreach ($positions as $position) {
                $index = $position[0];
                $newPosition = $position[1];
                Category::where('id', $index)->update([
                    'ordering' => $newPosition,
                    'updated_by' => Auth::user()->name,
                ]);
            }
            return response()->json(['code' => 1, 'msg' => 'Position Changed Successfully']);
        } else {
            return response()->json(['code' => 3, 'msg' => 'Positions Not Recieved']);
        }
    }

    /* Subcategory API End -------------------------------- */

    /* Resources API Start -------------------------------- */

    // Save Resource API
    public function save_resource(Request $request)
    {
        $response = array();

        $file_path = 'resource/files/';

        $image_path = 'resource/images/';

        if ($request->resource_id) {

            $decoded_id = Hashids::decode($request->resource_id);

            if (empty($decoded_id)) {
                return response()->json(['code' => '3', 'message' => 'Invalid Resource']);
            }

            $request->merge([
                'resource_id' => $decoded_id[0],
            ]);

            if ($request->hasFile('resource_file') && $request->hasFile('resource_image')) {
                $request->validate([
                    'resource_id' => 'required|integer|exists:resources,id',
                    'resource_category_id' => 'required|integer',
                    'resource_title' => ['required', 'min:3', 'max:255', Rule::unique('resources')->ignore($request->resource_id)->where(function ($query) {
                        return $query->whereNull('deleted_at');
                    })],
                    'resource_file' => 'file|max:10600',
                    'resource_image' => 'file|max:2048',
                    'resource_short_desc' => 'required|min:3|max:255',
                    'resource_desc' => 'required|min:3',
                ]);
            } else if ($request->hasFile('resource_file')) {
                $request->validate([
                    'resource_id' => 'required|exists:resources,id',
                    'resource_category_id' => 'required|integer',
                    'resource_title' => ['required', 'min:3', 'max:255', Rule::unique('resources')->ignore($request->resource_id)->where(function ($query) {
                        return $query->whereNull('deleted_at');
                    })],
                    'resource_file' => 'file|max:10600',
                    'resource_short_desc' => 'required|min:3|max:255',
                    'resource_desc' => 'required|min:3',
                ]);
            } else if ($request->hasFile('resource_image')) {
                $request->validate([
                    'resource_id' => 'required|exists:resources,id',
                    'resource_category_id' => 'required|integer',
                    'resource_title' => ['required', 'min:3', 'max:255', Rule::unique('resources')->ignore($request->resource_id)->where(function ($query) {
                        return $query->whereNull('deleted_at');
                    })],
                    'resource_image' => 'file|max:2048',
                    'resource_short_desc' => 'required|min:3|max:255',
                    'resource_desc' => 'required|min:3',
                ]);
            } else {
                $request->validate([
                    'resource_id' => 'required|exists:resources,id',
                    'resource_category_id' => 'required|integer',
                    'resource_title' => ['required', 'min:3', 'max:255', Rule::unique('resources')->ignore($request->resource_id)->where(function ($query) {
                        return $query->whereNull('deleted_at');
                    })],
                    'resource_short_desc' => 'required|min:3|max:255',
                    'resource_desc' => 'required|min:3',
                ]);
            }

            $update_data = array(
                'resource_category_id' => $request->resource_category_id,
                'resource_subcategory_id' => $request->resource_subcategory_id,
                'resource_title' => $request->resource_title,
                'resource_short_desc' => $request->resource_short_desc,
                'resource_keywords' => $request->resource_keywords,
                'resource_desc' => $request->resource_desc,
            );

            if ($request->hasFile('resource_file')) {
                $file = $request->file('resource_file');
                $filename = $file->getClientOriginalName();
                $new_filename = time() . '_' . $filename;

                $resource = Resources::where('id', $request->resource_id)->first();

                // Get Old Resource File
                $old_file = $resource->resource_file;

                // Delete Resource File
                if ($old_file != null && Storage::disk('public')->exists($old_file)) {
                    Storage::disk('public')->delete($old_file);
                }


                $file_upload = Storage::disk('public')->put($file_path . $new_filename, (string) file_get_contents($file));

                if ($file_upload) {
                    $update_data['resource_file'] = $file_path . $new_filename;
                }
            }

            if ($request->hasFile('resource_image')) {
                $image = $request->file('resource_image');
                $imagename = $image->getClientOriginalName();
                $new_imagename = time() . '_' . $imagename;


                $resource = Resources::where('id', $request->resource_id)->first();

                // Get Old Resource Image
                $old_image = $resource->resource_image;

                // Delete Resource Image
                if ($old_image != null && Storage::disk('public')->exists($old_image)) {
                    Storage::disk('public')->delete($old_image);
                }

                $image_upload = Storage::disk('public')->put($image_path . $new_imagename, (string) file_get_contents($image));

                if ($image_upload) {
                    $update_data['resource_image'] = $image_path . $new_imagename;
                }
            }

            $save_resource = Resources::where('id', '=', $request->resource_id)->update($update_data);

            if ($save_resource) {
                $response = array(
                    'code' => 1,
                    'msg' => 'Resource Updated',
                );
            } else {
                $response = array(
                    'code' => 3,
                    'msg' => 'Something went wrong while updating resource',
                );
            }
        } else {
            if ($request->hasFile('resource_file') && $request->hasFile('resource_image')) {
                $request->validate([
                    'resource_category_id' => 'required|integer',
                    'resource_title' => ['required', 'min:3', 'max:255', Rule::unique('resources')->where(function ($query) {
                        return $query->whereNull('deleted_at');
                    })],
                    'resource_file' => 'file|max:10600',
                    'resource_image' => 'file|max:2048',
                    'resource_short_desc' => 'required|min:3|max:255',
                    'resource_desc' => 'required|min:3',
                ]);
            } else if ($request->hasFile('resource_file')) {
                $request->validate([
                    'resource_category_id' => 'required|integer',
                    'resource_title' => ['required', 'min:3', 'max:255', Rule::unique('resources')->where(function ($query) {
                        return $query->whereNull('deleted_at');
                    })],
                    'resource_file' => 'file|max:10600',
                    'resource_short_desc' => 'required|min:3|max:255',
                    'resource_desc' => 'required|min:3',
                ]);
            } else if ($request->hasFile('resource_image')) {
                $request->validate([
                    'resource_category_id' => 'required|integer',
                    'resource_title' => ['required', 'min:3', 'max:255', Rule::unique('resources')->where(function ($query) {
                        return $query->whereNull('deleted_at');
                    })],
                    'resource_image' => 'file|max:2048',
                    'resource_short_desc' => 'required|min:3|max:255',
                    'resource_desc' => 'required|min:3',
                ]);
            } else {
                $request->validate([
                    'resource_category_id' => 'required|integer',
                    'resource_title' => ['required', 'min:3', 'max:255', Rule::unique('resources')->where(function ($query) {
                        return $query->whereNull('deleted_at');
                    })],
                    'resource_short_desc' => 'required|min:3|max:255',
                    'resource_desc' => 'required|min:3',
                ]);
            }

            $insert_data = array(
                'resource_category_id' => $request->resource_category_id,
                'resource_subcategory_id' => $request->resource_subcategory_id,
                'resource_title' => $request->resource_title,
                'resource_short_desc' => $request->resource_short_desc,
                'resource_keywords' => $request->resource_keywords,
                'resource_desc' => $request->resource_desc,
                'created_by' => Auth::user()->id,
            );

            if ($request->file('resource_file')) {
                $file = $request->file('resource_file');
                $filename = $file->getClientOriginalName();
                $new_filename = time() . '_' . $filename;

                $file_upload = Storage::disk('public')->put($file_path . $new_filename, (string) file_get_contents($file));

                if ($file_upload) {
                    $insert_data['resource_file'] = $file_path . $new_filename;
                }
            }

            if ($request->file('resource_image')) {
                $image = $request->file('resource_image');
                $imagename = $image->getClientOriginalName();
                $new_imagename = time() . '_' . $imagename;

                $image_upload = Storage::disk('public')->put($image_path . $new_imagename, (string) file_get_contents($image));

                if ($image_upload) {
                    $insert_data['resource_image'] = $image_path . $new_imagename;
                }
            }

            $save_resource = Resources::create($insert_data);

            if ($save_resource) {
                $response = array(
                    'code' => 1,
                    'msg' => 'Resource Added',
                );
            } else {
                $response = array(
                    'code' => 3,
                    'msg' => 'Something went wrong while adding resource',
                );
            }
        }

        return response()->json($response);
    }

    // Edit Resource API
    public function edit_resource(Request $request, $resource_id)
    {
        $decoded_id = Hashids::decode($resource_id);

        if ($resource_id == "" || empty($decoded_id)) {
            abort(404);
        }

        $resource = Resources::find($decoded_id[0]);

        if (!filter_var($resource->resource_image, FILTER_VALIDATE_URL)) {
            $resource->resource_image = asset('/storage/' . $resource->resource_image);
        }

        $data = [
            'resource' => $resource,
            'pageTitle' => 'Edit Resource | ' . env('APP_NAME'),
        ];

        return view('admin.pages.edit-resource', $data);
    }

    // Delete Resource API
    public function delete_resource(Request $request)
    {
        $response = array();

        $decoded_id = Hashids::decode($request->resource_id);

        if (empty($decoded_id)) {
            return response()->json(['code' => '3', 'message' => 'Invalid Resource']);
        }

        $request->merge([
            'resource_id' => $decoded_id[0],
        ]);

        $resource = Resources::where('id', $request->resource_id)->first();

        if (!$resource) {
            return response()->json(['code' => '3', 'message' => 'Invalid Resource']);
        }

        DB::enableQueryLog();

        // Get Old Resource File
        $old_file = $resource->resource_file;

        // Delete Resource File
        if ($old_file != null && Storage::disk('public')->exists($old_file)) {
            Storage::disk('public')->delete($old_file);
        }

        // Get Old Resource Image
        $old_image = $resource->resource_image;

        // Delete Resource Image
        if ($old_image != null && Storage::disk('public')->exists($old_image)) {
            Storage::disk('public')->delete($old_image);
        }

        $delete_resource = $resource->delete();

        if ($delete_resource) {
            $response = array(
                'code' => 1,
                'msg' => 'Resource Deleted'
            );
        } else {
            $response = array(
                'code' => 3,
                'msg' => 'Something went wrong while deleting resource'
            );
        }

        return response()->json($response);
    }

    // Get Subcategory based on Category
    public function getSubCategoriesByCategory(Request $request)
    {
        $response = array();

        if ($request->category_id) {

            $subcategories = DB::table('categories')->where('parent_category', '=', $request->category_id)->get();

            if ($subcategories->isNotEmpty()) {
                $response = array(
                    'code' => 1,
                    'msg' => 'Subcategories Found',
                    'data' => $subcategories
                );
            } else {
                $response = array(
                    'code' => 3,
                    'msg' => 'Subcategories Not Found',
                );
            }
        } else {
            $response = array(
                'code' => 3,
                'msg' => 'Please Select Category'
            );
        }

        return response()->json($response);
    }

    /* Resources API End -------------------------------- */

    /* Users API Start -------------------------------- */

    // Save User Profile
    public function save_user(Request $request)
    {
        $response = array();

        if ($request->filled('user_id')) {
            $decoded_id = Hashids::decode($request->user_id);

            if (empty($decoded_id)) {
                return response()->json(['code' => '3', 'message' => 'Invalid User']);
            }

            $request->merge([
                'user_id' => $decoded_id[0],
            ]);

            $request->validate([
                'user_id' => ['required' . 'integer', 'exists:users,id'],
                'name' => ['required', 'string'],
                'email' => ['required', 'email', 'unique:users,email,' . $request->user_id],
                'phone' => ['required', 'number', 'unique:users,phone,' . $request->user_id],
            ]);

            $update_data = array(
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
            );

            $save_user = User::where('id', '=', $request->user_id)->update($update_data);

            if ($save_user) {
                $response = array(
                    'code' => 1,
                    'msg' => 'User Updated',
                );
            } else {
                $response = array(
                    'code' => 3,
                    'msg' => 'Something went wrong while updating user',
                );
            }
        } else {
            $request->validate([
                'name' => ['required', 'string'],
                'email' => ['required', 'email', 'unique:users,email,' . $request->user_id],
                'phone' => ['required', 'number', 'unique:users,phone,' . $request->user_id],
            ]);

            $insert_data = array(
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
            );

            $save_user = User::create($insert_data);

            if ($save_user) {
                $response = array(
                    'code' => 1,
                    'msg' => 'User Inserted',
                );
            } else {
                $response = array(
                    'code' => 3,
                    'msg' => 'Something went wrong while inserting user',
                );
            }
        }

        return response()->json($response);
    }

    // Edit User Profile
    public function edit_user(Request $request, $user_id)
    {
        $decoded_id = Hashids::decode($user_id);

        if ($user_id == "" || empty($decoded_id)) {
            abort(404);
        }

        $user = User::find($decoded_id[0]);

        $data = [
            'user' => $user,
            'pageTitle' => 'Edit User Profile | ' . env('APP_NAME')
        ];

        return view('admin.pages.edit-user', $data);
    }

    // Delete User Profile
    public function delete_user(Request $request)
    {
        $response = array();

        $decoded_id = Hashids::decode($request->user_id);

        if (empty($decoded_id)) {
            return response()->json(['code' => '3', 'message' => 'Invalid User']);
        }

        $request->merge([
            'user_id' => $decoded_id[0],
        ]);

        $user = User::where('id', '=', $request->user_id)->first();

        if (!$user) {
            return response()->json(['code' => '3', 'message' => 'Invalid User']);
        }

        $delete_user = $user->delete();

        if ($delete_user) {
            $response = array(
                'code' => 1,
                'msg' => 'User Deleted'
            );
        } else {
            $response = array(
                'code' => 3,
                'msg' => 'Something went wrong while deleting user'
            );
        }


        return response()->json($response);
    }

    // Change Status of User Profile
    public function change_user_status(Request $request)
    {
        $response = array();

        $decoded_id = Hashids::decode($request->user_id);

        if (empty($decoded_id)) {
            return response()->json(['code' => '3', 'message' => 'Invalid User']);
        }

        $request->merge([
            'user_id' => $decoded_id[0],
        ]);

        $request->validate([
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'status' => ['required'],
        ]);

        $update_user_status = User::where('id', '=', $request->user_id)->update(['blocked' => $request->status]);

        if ($update_user_status) {
            $response = array(
                'code' => 1,
                'msg' => 'Status Changed'
            );
        } else {
            $response = array(
                'code' => 3,
                'msg' => 'Something went wrong while changing status'
            );
        }

        return response()->json($response);
    }

    /* Users API End -------------------------------- */
}
