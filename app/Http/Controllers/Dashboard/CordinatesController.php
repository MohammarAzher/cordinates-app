<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Cordinate;
use Illuminate\Http\Request;

class CordinatesController extends Controller
{
    public function index(){
        $data = Cordinate::paginate(10);
        return view('dashboard.cordinates.index',['data'=>$data]);
    }
}
