@if($user->roles->count() > 0)
    @foreach($user->roles as $role)
        <span class="badge bg-{!! $role->code !!}">{!! $role->name !!}</span>
    @endforeach
@else
<span class="badge bg-light text-dark">None</span>
@endif