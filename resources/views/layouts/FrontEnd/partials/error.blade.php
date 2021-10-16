<div class="alert alert-danger alert-dismissible fade show   m-alert m-alert--square m-alert--air" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    </button>
    <strong>Something went wrong!</strong><br>
    <ul>
        @foreach ($errors->all() as $error)
            <li>
                {{$error}} <br>
            </li>
        @endforeach
    </ul>
</div>
