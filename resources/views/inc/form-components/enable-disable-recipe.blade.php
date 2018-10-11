{!! Form::open([
    'action' => [
        'RecipesController@update',
        $restaurant->id,
        $recipe->id
    ],'method' => 'POST',
    'style' => 'display: inline-block;'
    ]) !!}
    {{ Form::hidden('enabled', !$recipe['enabled']) }}
    {{ Form::hidden('_method', 'PUT') }}
    {{ Form::bsSubmit($recipe['enabled'] ? 'disable' : 'enable' ,
        [
        'class'=>'btn btn-sm btn-' . ($recipe['enabled'] ? 'warning' : 'success') ])}}
{!! Form::close() !!}
