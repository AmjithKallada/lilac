<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::query();
            if ($request->search_key) {
                $data = $data->where(function ($query) use ($request) {
                    $query->where('name', 'LIKE', '%' . $request->search_key . '%')
                          ->orWhereHas('designation', function ($q) use ($request) {
                              $q->where('name', 'LIKE', '%' . $request->search_key . '%');
                          })
                          ->orWhereHas('department', function ($q) use ($request) {
                              $q->where('name', 'LIKE', '%' . $request->search_key . '%');
                          });
                });
            }

            $data = $data->get();

            // dd($data);
            $array = $data->map(function($q){
                if ($q != '') {
                    return [
                        'name' => $q->name,
                        'designation' => $q->designation[0]->name,
                        'department' => $q->department[0]->name,
                    ];
                }
            });

            return response()->json(['data' => $array,'status' => true],200);
        }
        return view('index');
    }
}
