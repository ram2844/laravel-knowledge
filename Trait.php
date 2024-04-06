<?php

namespace App\Traits;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use Carbon\Carbon;
use DB;
use Hash;
use Image;
use Auth;
use ImageUploadHelper;
use FileUploadHelper;

trait UserTrait
{
    /**
     * Update a {{moduleTitle}}.
     *
     * @param  \App\Http\Requests\UserRequest $request
     * @param  int $user_id | null
     * @return \App\Models\User $User
     */
    public function storeUpdate(Request $request, $user_id = NULL)
    {
        // dd($request->all());
        if (empty($user_id)) {

            $user_id = Auth::user()->id;
            $user = User::findOrFail($user_id);

        } else {

            $user = User::findOrFail($user_id);

            if (empty($user)) {
                $user = new User();
            }
        }

        if ($request->has('name') && $request->filled('name')) {
            $user->name = $request->name;
        }

        if ($request->has('designation') && $request->filled('designation')) {
            $user->designation = $request->designation;
        }

        if ($request->has('role_id') && $request->filled('role_id')) {
            $user->role_id = $request->role_id;
        }

        if ($request->has('region_id') && $request->filled('region_id')) {
            $user->region_id = $request->region_id;
        }

        if ($request->has('city_id') && $request->filled('city_id')) {
            $user->city_id = $request->city_id;
        }

        if ($request->has('company_details') && $request->filled('company_details')) {
            $user->company_details = $request->company_details;
        }

        if ($request->has('company_address') && $request->filled('company_address')) {
            $user->company_address = $request->company_address;
        }

        if ($request->has('company_usp_ids') && $request->filled('company_usp_ids')) {
            $user->company_usp_ids = $request->company_usp_ids;
        }

        if ($request->has('website') && $request->filled('website')) {
            $user->website = $request->website;
        }

        if ($request->has('email') && $request->filled('email')) {
            $user->email = $request->email;
        }

        if ($request->has('contact') && $request->filled('contact')) {
            $user->contact = $request->contact;
        }

        if ($request->has('password') && $request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        if ($request->has('meta_title') && $request->filled('meta_title')) {
            $user->meta_title = $request->meta_title;
        }

        if ($request->has('meta_keywords') && $request->filled('meta_keywords')) {
            $user->meta_keywords = $request->meta_keywords;
        }

        if ($request->has('meta_description') && $request->filled('meta_description')) {
            $user->meta_description = $request->meta_description;
        }

        if ($request->hasFile('user_image')) {

            $user_image = $request->file('user_image');
            $user_image = ImageUploadHelper::UploadImage((new \App\Http\Controllers\Admin\UserController)::$moduleConfig['imageUploadFolder'], $user_image, $request->input('title'), 900, 900, true);
            $user->user_image = $user_image;
        }

        $user->save();
        return $user;

    }

}