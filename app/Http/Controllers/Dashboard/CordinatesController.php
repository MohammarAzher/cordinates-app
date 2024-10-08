<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Cordinate;
use Illuminate\Http\Request;
use DataTables;

class CordinatesController extends Controller
{
    public function index(){
        $data = Cordinate::paginate(10);
        return view('dashboard.cordinates.index',['data'=>$data]);
    }

    public function get_cordinates(){

        $query = Cordinate::query();

        return DataTables::of($query)
        ->addColumn('username', function (Cordinate $data) {
            return $data->user ? $data->user->name : 'N/A'; // Directly access the user
        })
        ->filterColumn('username', function($query, $keyword) {
            $query->whereHas('user', function($q) use ($keyword) { // Use 'user' instead of 'username'
                $q->where('name', 'like', "%{$keyword}%");
            });
        })
        ->make(true);
    }
}
