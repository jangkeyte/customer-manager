<div class="row">
    <div class="col-md-12">
        <h1 class="d-flex flex-wrap justify-content-start py-3 mb-4 border-bottom">
            Quản lý người dùng
        </h1>
        <div>
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        </div>
    </div>
</div>
@include('Authetication::user.partials.search_form')
<hr>
<div class="row">    
    @include('Authetication::user.partials.list_content') 
</div>