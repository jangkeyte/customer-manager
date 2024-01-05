@if( $right == '' || auth()->user()->can( $right ) )
    <li class="sub-menu-item "><a href="{{ $url ?? '#' }}"><span class="menu-label">{{ $label ?? '' }}</span></a></li>
@endif