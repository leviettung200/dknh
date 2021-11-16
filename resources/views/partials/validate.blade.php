@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <h5 class="alert-heading">Lỗi</h5>
        @foreach ($errors->all() as $error)
            <p>
                {{ $error }}
            </p>
        @endforeach
    </div>
@endif
