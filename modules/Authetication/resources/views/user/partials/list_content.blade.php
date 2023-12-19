@if(!$users->isEmpty())
<div class="col-12">
    <div class="mgt-5">
        <table class="table table-responsive table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Chức năng</th>
                    <th>Hình ảnh</th>
                    <th>Tên người dùng</th>
                    <th>Địa chỉ email</th>
                    <th>Uid</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td class="text-center">{{ $loop->index + 1 }}</td>
                    <td>
                        @include('Authetication::user.elements.action', array('user' => $user))
                    </td>
                    <td style="width:5%" class="text-center">
                        @if(file_exists(public_path('/storage//uploads/users/' . $user->image))) 
                        <img src="{!! asset('/storage/uploads/users/' . $user->image) !!}" class="w-100">
                        @else 
                        <svg xmlns="http://www.w3.org/2000/svg" height="auto" width="50%" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
                        @endif                    
                    </td>
                    <td>{!! $user->name !!} <br> @include('Authetication::user.elements.role_list')</td>
                    <td>{!! $user->email !!}</td>
                    <td>{!! $user->uid !!}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@else
    @include('JangKeyte::errors.404')
@endif