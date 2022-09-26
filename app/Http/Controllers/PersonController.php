<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonController extends Controller
{
    public function create(){
        return view('person.create');
    }
    public function store(Request $req){
        $name = $req->name;
        $email = $req->email;
        $city = $req->city;
        $dob = $req->dob;
        $salary = $req->salary;
        // insert into persons table
        DB::table('persons')->insert([
            'name' => $name,
            'email' => $email,
            'city' => $city,
            'birth_date' => $dob,
            'salary' => $salary
        ]);

        return redirect('persons');
    }

    public function all(){
        $data = DB::table('persons')->get(); // returns an array
        return view('person.all', ['persons'=>$data]);
    }

    public function edit($id){
        $results = DB::table('persons')->where('id', '=', $id)->first();
        // SELECT * from persons where id= 2
        return view('person.edit', ['person'=>$results]);
    }

    public function update(Request $req, $id){
        $name = $req->name;
        $email = $req->email;
        $city = $req->city;
        $dob = $req->dob;
        $salary = $req->salary;
        // insert into persons table
        DB::table('persons')->where('id', '=', $id)->update([
            'name' => $name,
            'email' => $email,
            'city' => $city,
            'birth_date' => $dob,
            'salary' => $salary
        ]);

        return redirect('persons');
    }

    public function delete($id){
        $deleted = DB::table('persons')->where('id', '=', $id)->delete();
        return redirect('persons');
    }
}
