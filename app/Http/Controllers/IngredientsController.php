<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Ingredient;
use Log;

class IngredientsController extends Controller {

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($restaurant_id, $recipe_id) {
        return view('create-ingredient',
            ['restaurant_id' => $restaurant_id, 'recipe_id' => $recipe_id]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $restaurant_id, $recipe_id) {
        $this->validate($request, [
            'ingredient' => 'required'
        ]);

        $ingredient = new Ingredient();
        $ingredient->name = $request->input('ingredient');
        $ingredient->optional = $request->input('optional') === 'optional';
        $ingredient->recipe_id = $recipe_id;
        $ingredient->selected_by_default
            = $request->input('selected_by_default') === 'selected_by_default';
        if(!$ingredient->optional) {
            $ingredient->selected_by_default = true;
        }
        $ingredient->save();
        return redirect("restaurants/{$restaurant_id}");
    }

    public function edit($restaurant_id, $recipe_id, $ingredient_id) {
        $ingredient = Ingredient::whereId($ingredient_id)->first();
        $with = [
            'restaurant_id'=>$restaurant_id,
            'recipe_id'=>$recipe_id,
            'ingredient' => $ingredient
        ];
        return view('edit-ingredient', $with);
    }

    public function update(Request $request, $restaurant_id, $recipe_id, $ingredient_id) {
        $ingredient = Ingredient::whereId($ingredient_id)->first();
        if($ingredient) {
            $ingredient->name = $request->input('ingredient');
            $ingredient->optional = $request->input('optional') === 'optional';
            $ingredient->recipe_id = $recipe_id;
            $ingredient->selected_by_default
                = $request->input('selected_by_default') === 'selected_by_default';
            if (!$ingredient->optional) {
                $ingredient->selected_by_default = true;
            }
            $ingredient->save();
            return redirect("restaurants/{$restaurant_id}");
        }
        return 'fail';
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($restaurant_id, $recipe_id, $ingredient_id){
        $ingredient = Ingredient::whereId($ingredient_id);
        if($ingredient) {
            $ingredient->delete();
        }
        return redirect("restaurants/{$restaurant_id}");
    }
}
