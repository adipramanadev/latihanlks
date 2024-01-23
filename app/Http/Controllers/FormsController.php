<?php

namespace App\Http\Controllers;

use App\Models\Forms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FormsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //get data form
        $forms = Forms::all();
        return response()->json([
            "message" =>"Get all forms success",
            "forms"=>$forms
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //



    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //ini untuk validasi form
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'limit_one_response' => 'required',
        ]);
        //untuk menampilkan pesan error
        if ($validation->fails()) {
            return response()->json([
                "message" => "Create form failed",
                "errors" => $validation->errors()
            ], 422);

        }

        //deklarasi variabel
        $input = Forms::create($request->all());

        //simpan data ke database
        if ($input) {
            return response()->json([
                "message" => "Create form success",
                "forms" => $input
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Forms $forms)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Forms $forms)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Forms $forms)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Forms $forms)
    {
        //
    }
}
