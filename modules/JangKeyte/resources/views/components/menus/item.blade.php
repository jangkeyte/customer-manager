@if( $right == '' || auth()->user()->can( $right ) )
    <li title="{{ $label ?? '' }}" class="menu-item {{ $active ?? '' }}" onclick="this.classList.toggle('active')">
        <a href="{{ $url ?? '#' }}"><i class="{{ $icon ?? '' }}"></i> <span class="menu-label">{{ $label ?? '' }}</span></a>
        @if ($slot->isNotEmpty())
        <ul class="sub-menubar">
            {{ $slot }}
        </ul>
        @endif
    </li>
@endif