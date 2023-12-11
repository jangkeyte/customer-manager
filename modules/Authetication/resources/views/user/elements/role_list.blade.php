@if($user->roles->count() > 0)
    @foreach($user->roles as $role)
        <span class="badge bg-{!! $role->code !!}">{!! $role->description !!}</span>
    @endforeach
@else
<span class="badge bg-light text-dark">Chưa phân quyền</span>
@endif