@if(!$data->isEmpty())
<div class="col-12">
    <div class="mgt-5">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên người dùng</th>
                    <th>Địa chỉ email</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $object)
                <tr>
                    <td class="text-center">{{ $loop->index + 1 }}</td>
                    <td>
                        @include('Authetication::auth.elements.action', ['id' => $object->id, 'name' => $object->name]) 
                    </td>
                    <td style="width:85%">
                        {!! $object->name !!}
                    </td>
                    <td class="text-center">
                        <a class="dropdown-item" href="{!! route($target . '.remove', $object->id) !!}"><i class='bx bx-message-square-x text-danger'></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@else
    @include('JangKeyte::partials.error404')
@endif

@section('modals')
    @include('TreeManager::common.elements.modal')
@stop