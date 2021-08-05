<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use Illuminate\Http\Request;
use App\Models\Allergy;
use App\Models\SideItem;

class MealController extends Controller
{

    protected $side_items = [];
    protected $data = [];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meals = Meal::all();

        foreach ($meals as $meal) {

            if(is_array($meal->sideItems) || is_object($meal->sideItems)){

                foreach ($meal->sideItems as $sideitem) {

                    $this->side_items[] = $sideitem->side_item;

                }
            }

            $this->data[] = [
                'id' => $meal->id,
                'main_item' => $meal->main_item,
                'side_items' => $this->side_items,
                'created_at' => now()
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
     * Display the Recommended Meal based on Allergy.
     *
     * @param  $allergy_type
     * @return \Illuminate\Http\Response
     */
    public function fetchRecommendedMeal($allergy_id)
    {
        $allergy = Allergy::findOrFail($allergy_id);

        $meals = $allergy->meals;
        
        foreach ($meals as $meal) {

            if(is_array($meal->sideItems) || is_object($meal->sideItems)){

                foreach ($meal->sideItems as $sideitem) {
                    
                    $this->side_items[] = $sideitem->side_item;
                }
            }
            
            $this->data[] = [
                'id' => $meal->id,
                'allergy_id' => $meal->allergy_id,
                'allergy_type' => $allergy->allergy_type,
                'main_item' => $meal->main_item,
                'side_items' => $this->side_items,
                'created_at' => now()
            ];
        }

        return response()->json([
            'data' => $this->data
        ],200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function edit(Meal $meal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meal $meal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meal $meal)
    {
        //
    }
}
