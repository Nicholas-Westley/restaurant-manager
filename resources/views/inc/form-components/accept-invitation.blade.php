{!!Form::open([
    'action' => ['InvitationsController@accept', $invitation['restaurant']['id'], $invitation->id],
    'method' => 'POST',
    'style' => 'display: inline-block;']) !!}
{{ Form::bsSubmit('Accept', ['class'=>'btn btn-success btn-sm']) }}
{{ Form::close() }}
