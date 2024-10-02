@if ($errors->any())
    <div id="session-message" class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(Session::has('message'))
    <p id="session-message" class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif

<script>
    setTimeout(function(){
        $('#session-message').fadeOut('slow');
    }, 4000);
</script>
