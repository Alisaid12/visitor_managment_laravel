<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;


class SubUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('users.sub_user');
    }

public function fetch_all(Request $request)
{
    if($request->ajax()) {
        // Fetch all data from the visiteurs table
        $data = User::whereIn('type',['Responsable','Acceuil']);

        return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    return
                    '<a href="/sub_user/edit/'.$row->id.'" class="btn btn-primary btn-sm">
                    Edit
                </a>
                    &nbsp;
                    <button type="button" class="btn btn-danger btn-sm delete" data-id="'.$row->id.'">
                        Supprimer
                    </button>';
                })
                ->rawColumns(['action'])
                ->make(true);
    }
}

    function add(){
        return view('users.add_sub_user');
    }
    function add_validation(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'departement'=>'required',
            'service'=>'required',
            'type' => 'required|in:Responsable,Acceuil',

        ]);

        $data = $request->all();

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'departement' => $data['departement'],
            'service' => $data['service'],
            'type' => $data['type'],
        ]);

        return redirect('sub_user')->with('success', 'New User Added');
    }

    public function edit($id)
    {
        $data = User::findOrFail($id);

        return view('users.edit_sub_user', compact('data'));
    }
    function edit_validation(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email ',
            'type' => 'required|in:responsable,acceuil',
            'departement'=>'required',
            'service'=>'required',

        ]);

        $data = $request->all();

        if(!empty($data['password'])){
            $form_data = array(
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'departement' => $data['departement'],
                'service' => $data['service'],
                'type' => $data['type']
            );
        }
        else{
            $form_data = array(
                'name' => $data['name'],
                'email' => $data['email'],
                'departement' => $data['departement'],
                'service' => $data['service'],
                'type' => $data['type']

            );
        }
        User::whereId($data['hidden_id'])->update($form_data);
        return redirect('sub_user')->with('success', 'User Data Updated');
    }
    function delete($id){
        User::destroy($id);
        return redirect('sub_user')->with('success', 'User Data Romoved');
    }



}
