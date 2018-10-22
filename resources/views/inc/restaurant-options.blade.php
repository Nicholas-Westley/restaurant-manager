<div class="float-right">
    <a
        class="btn btn-success btn-sm"
        href="/webapp/{{  $restaurant['id'] }}">
        Open Webapp
    </a>
    <a
        class="btn btn-warning btn-sm"
        href="/restaurants/{{ $restaurant['id'] }}">
        Manage
    </a>
    <a
        class="btn btn-secondary btn-sm"
        href="restaurants/{{ $restaurant['id'] }}/invitations/create">
        Invite Employee
    </a>
    @include('inc.form-components.delete-restaurant')
</div>
