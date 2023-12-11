@isset($permissions)
    @foreach($permissions as $permission)
        @if($user->hasPermissionTo($permission))
            <span class="badge bg-{!! isset($permission->code) ? $permission->code : 'light text-dark' !!}">{!! $permission->name !!}</span>
        @endif
    @endforeach
@endisset