<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserDetailResource;
use App\Models\UserDetail;
use Illuminate\Http\Request;

class UsersDetailsController extends Controller
{
    //


    function AllUserDetails()
    {

        $user = UserDetail::all();
        return UserDetailResource::collection($user);
    }



    public function AddUserDetail(Request $request)
    {

        $details = new UserDetail();

        $details->u_details_emplo_add = $request->user_details_employee_address;
        $details->u_details_contact_add = $request->user_details_contact_adress;
        $details->u_details_nationality = $request->user_details_nationality;
        $details->u_details_state = $request->user_details_satate;
        $details->u_details_name_emplo = $request->user_details_name;

        $details->save();

        return response()->json(['massage' => 'added successfully', 'status' => 200]);
    }



    public function DeleteUserDetails($key)
    {

        $user = UserDetail::find($key);


        if ($user === Null) {

            return response()->json(['message' => 'the record does not exit', 'status' => 204]);
        }

        if ($user->status == 0) {
            return response()->json(['message' => 'the record does not exit', 'status' => 204]);
        }

        $user->status = 0;

        if ($user->save()) {
            return response()->json(['message' => 'the record has been deleted', 'status' => 200], 200);
        } else {
            return response()->json(['message' => 'unable to delete record', 'status' => 500], 500);
        }
    }




    public function UpdateUserDetails(Request $request, $id)
    {
        $user = UserDetail::find($id);

        if ($request->has('user_details_employee_address')) {

            $user->u_details_emplo_add = $request->user_details_employee_address;
        }


        if ($request->has('user_details_contact_adress')) {

            $user->u_details_contact_add = $request->user_details_contact_adress;
        }

        if ($request->has('user_details_nationality')) {

            $user->u_details_nationality = $request->user_details_nationality;
        }


        if ($request->has('user_details_satate')) {

            $user->u_details_state = $request->user_details_satate;
        }


        if ($request->has('user_details_name')) {

            $user->u_details_name_emplo = $request->user_details_name;
        }

        $user->save();

        return response()->json(['message' => 'updated successfully', 'status' => 200]);
    }


    public function UserDetail($id)
    {
        $user = UserDetail::find($id);

        return new UserDetailResource($user);
    }
}
