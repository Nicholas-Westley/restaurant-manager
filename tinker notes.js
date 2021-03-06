
$tables = DB::select('show tables');
$columns = \Schema::getColumnListing('orders');


$o = new Order([
     "accepted" => false,
     "ready" => false,
     "served" => false,
     "recipe_id" => false
]);

$s = new App\SettingValue([
    'user_id'=>1,
    'setting_id'=>1,
    'value'=>"Chef"
]);
$s->save();

$o = new SettingOption([
    "setting_id" => 1,
    "name" => "Chef"
]);





$r = new Recipe([
	name: "Breakfast Burrito",
  description: "Cheaper, Smaller, good for Breakfast",
  image: "bacon.jpg",
]);

$r = new Recipe();
$r->name = "Vegetarian Burrito"
$r->description = "Nearly as moral as the Vegan Burrito"
$r->image = "vegetarian.jpg";
$r->save();


$i = new Ingredient([
'name' => 'Vegan Mexican Curry',
'recipe_id' => '4',
'optional' => false,
'selected_by_default' => true
]);
$i->save();

$i = new Ingredient([
'name' => 'Rice',
'recipe_id' => '4',
'optional' => true,
'selected_by_default' => true
]);
$i->save();

$i = new Ingredient([
'name' => 'Cheese',
'recipe_id' => '4',
'optional' => true,
'selected_by_default' => false
]);
$i->save();

$i = new Ingredient([
'name' => 'Refried Beans',
'recipe_id' => '4',
'optional' => true,
'selected_by_default' => true
]);
$i->save();

$i = new Ingredient([
'name' => 'Sour Cream',
'recipe_id' => '4',
'optional' => true,
'selected_by_default' => false
]);
$i->save();

$i = new Ingredient([
'name' => 'Refried Beans',
'recipe_id' => '3',
'optional' => true,
'selected_by_default' => true
]);
$i->save();
