<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;
use Log;

class RecipesController extends Controller {

    public function show(Request $request, $restaurant_id, $recipe_id) {
        $recipe = Recipe::whereId($recipe_id)->first();
        return view('recipe')->with('recipe', $recipe);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($restaurant_id) {
        return view('create-recipe')->with('restaurant_id', $restaurant_id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $restaurant_id) {
        $this->validate($request, [
            'recipe_name' => 'required'
        ]);
        $recipe = new Recipe();
        $recipe->name = $request->input('recipe_name');
        $recipe->description = $request->input('recipe_description');
        $recipe->restaurant_id = $restaurant_id;
        $recipe->enabled = false;

        if ($request->hasFile('image')) {
            $file = $request->file('recipe_image');
            $filenameWithExt = $file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $now = time();
            $filenameToStore = "{$filename}_{$now}.{$extension}";
            $path = $file->storeAs('public/images', $filenameToStore);
            $recipe->image = $path;
        }
        $recipe->save();
        return redirect("restaurants/{$restaurant_id}/recipes/{$recipe['id']}");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $restaurant_id, $recipe_id) {
        $recipe = Recipe::whereId($recipe_id)->first();
        if($recipe) {
            $recipe->enabled = $request->input('enabled');
            $recipe->save();
        }
        return redirect("restaurants/{$restaurant_id}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($restaurant_id, $recipe_id) {
        $recipe = Recipe::whereId($recipe_id);
        if($recipe) {
            $recipe->delete();
        }
        return redirect("restaurants/{$restaurant_id}");
    }
}
