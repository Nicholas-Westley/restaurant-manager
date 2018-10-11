{!!Form::open([
    'action' => [
        'IngredientsController@destroy',
        $restaurant->id,
        $recipe->id,
        $ingredient->id
    ],
    'method' => 'POST',
    'style' => 'display: inline-block;']) !!}
{{ Form::hidden('_method', 'DELETE') }}
{{ Form::bsSubmit('x', ['class'=>'btn-naked']) }}
{{ Form::close() }}
