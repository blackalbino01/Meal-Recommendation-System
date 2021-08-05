<?php

namespace App\Http\Controllers;

use App\Models\Allergy;
use Illuminate\Http\Request;

class AllergyController extends Controller
{

    protected $data = [];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allergies = Allergy::all();

        foreach ($allergies as $allergy) {
            
            $this->data[] = [
                'id' => $allergy->id,
                'allergy_type' => $allergy->allergy_type
            ];
        }

        return response()->json([
            'data' => $this->data
            ],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Allergy  $allergy
     * @return \Illuminate\Http\Response
     */
    public function show(Allergy $allergy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Allergy  $allergy
     * @return \Illuminate\Http\Response
     */
    public function edit(Allergy $allergy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Allergy  $allergy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Allergy $allergy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Allergy  $allergy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Allergy $allergy)
    {
        //
    }
}
