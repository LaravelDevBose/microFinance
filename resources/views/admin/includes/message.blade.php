<div class="row">
    @if(Session::has('text_warning'))
    <div class="alert bg-warning alert-styled-left">
        <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
        <span class="text-semibold">Warning!</span> {{ Session::get('text_warning') }}.
    </div>
    @endif

    @if(Session::get('text_error'))
    <div class="alert bg-danger alert-styled-left">
        <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
        <span class="text-semibold">Oh snap!</span> {{ Session::get('text_error') }}.
    </div>
    @endif

    @if(Session::get('text_success'))
    <div class="alert bg-success alert-styled-left">
        <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
        <span class="text-semibold">Well done!</span> {{ Session::get('text_success') }}.
    </div>
    @endif
</div>


@if($errors->any())
    @foreach($errors->all() as $error)
        <div class="alert alert-warning alert-styled-left">
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
            <span class="text-semibold">Warning!</span> {!! $error !!}
        </div>
    @endforeach

@endif


@if(Session::has('success'))
<script type="text/javascript">
    swal({
        text: "{{ Session::get('success') }}",
        icon: "success",
        buttons: false,
        timer: 1500,
    });
</script>
@endif

@if(Session::has('warning'))
<script type="text/javascript">
    swal({
        text: "{{ Session::get('warning') }}",
        icon: "warning",
        buttons: false,
        timer: 1500,
    });
</script>
@endif

@if(Session::has('error'))
<script type="text/javascript">
    swal({
        text: "{{ Session::get('error') }}",
        icon: "error",
        buttons: false,
        timer: 1500,
    });
</script>
@endif