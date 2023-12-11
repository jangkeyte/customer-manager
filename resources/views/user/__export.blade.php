@if(!$trees->isEmpty())
<div class="col-md-12">
    <table class="table table-responsive table-striped table-bordered table-hover">
        <thead class="table-primary text-center align-middle">
            <tr>
                <th class="text-center">STT</th>
                <th class="text-center">Hình ảnh</th>
                <th class="text-center">Họ cây</th>
                <th class="text-center">Loại cây</th>
                <th class="text-center">Đơn vị tính</th>
                <th class="text-center">Độ tuổi</th>
                <th class="text-center">Giá trị</th>
                <th class="text-center">Tình trạng</th>
                <th class="text-center">Ngày trồng</th>
                <th class="text-center">Ngày chăm gần nhất</th>
                <th class="text-center">Kích thước tán</th>
                <th class="text-center">Chiều cao</th>
                <th class="text-center">Chu vi</th>
                <th>#</th>
            </tr>
        </thead>
        <tbody>
            @foreach($trees as $tree)
            <tr class="table--{{ $tree->_status->code }}">
                <td class="text-center">{{ $loop->index + 1 }}</td>
                <td style="width:5%">
                    {!! asset('/assets/images/trees/' . $tree->image) !!}
                </td>
                <td>
                    {!! $tree->_family->name !!}
                </td>
                <td>
                    {!! $tree->_type->name !!}
                </td>
                <td class="text-center">
                    {!! $tree->_unit->name !!}
                </td>
                <td class="text-center">
                    {!! $tree->age !!}
                </td>
                <td>
                    {!! $tree->value !!}
                </td>
                <td>
                    {!! $tree->_status->name !!}
                </td>
                <td class="text-center">
                    {!! date('d/m/Y h:i:s', strtotime($tree->birthday)) !!}
                </td>
                <td class="text-center">
                    {!! date('d/m/Y h:i:s', strtotime(optional($tree->_log->last())->care_date)) !!}
                </td>
                <td class="text-center">
                    {!! $tree->size !!}
                </td>
                <td class="text-center">
                    {!! $tree->height !!}
                </td>
                <td class="text-center">
                    {!! $tree->perimeter !!}
                </td>
                <td>
                    {!! $tree->uid !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@else
    @include('JangKeyte::partials.error404')
@endif