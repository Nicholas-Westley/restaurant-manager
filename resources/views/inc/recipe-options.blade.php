<div class="float-right">
    {!!Form::open([
    'action' => ['RecipesController@destroy', $restaurant['id'], $recipe['id']],
    'onsubmit' => 'return confirm("Are you sure")',
    'method' => 'POST',
    'style' => 'display: inline-block;']) !!}
    {{ Form::hidden('_method', 'DELETE') }}
    {{ Form::bsSubmit('Delete', ['class'=>'btn btn-danger btn-sm']) }}
    {{ Form::close() }}
</div>
