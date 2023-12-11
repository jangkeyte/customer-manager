<x-app-layout>
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">ChatGPT trả lời</div>

                    <div class="card-body">
                        <p>{{ $response }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
</x-app-layout>