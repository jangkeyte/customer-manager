@isset($orders)
    @foreach($orders as $order)
        @foreach($order as $date)
            <a href="khachhang/buyDate/{{ $date }}">{{ date('d/m/Y', strtotime($date)) }} </a>
        @endforeach
    @endforeach
@endisset

@isset($date)
   {{-- $date --}}
@endisset