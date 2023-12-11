<x-app-layout>
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Đặt câu hỏi với ChatGPT</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('chatgpt.ask') }}">
                            @csrf

                            <div class="form-group">
                                <input type="text" class="form-control text-center" name="prompt" placeholder="Nhập nội dung câu hỏi...">
                            </div>

                            <button type="submit" class="btn btn-secondary">Gửi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
</x-app-layout>
