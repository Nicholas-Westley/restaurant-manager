<div class="float-right">
    <a
        class="btn btn-success btn-sm"
        href="/webapp/{{  $restaurant['id'] }}">
        Open Webapp
    </a>
    <a
        class="btn btn-secondary btn-sm"
        href="restaurants/{{ $restaurant['id'] }}/invitations/create">
        Invite Employee
    </a>
    @include('inc.dashboard.delete-restaurant')
</div>