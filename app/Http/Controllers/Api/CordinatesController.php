<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use App\Models\Cordinate;


class CordinatesController extends Controller
{

    public function store(request $request){

        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'lat' => 'required',
            'lng' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->messages()
            ], Response::HTTP_OK);
        }
        else{
            $data = new Cordinate();
            $data->user_id = $request->user_id;
            $data->lat = $request->lat;
            $data->lng = $request->lng;
            $data->address = $request->address;
            $data->phone = $request->phone;
            $data->save();
        }
        return response()->json([
            'success' => true,
            'message' => 'Data Submitted Successfully',
        ], Response::HTTP_OK);
    }

}
