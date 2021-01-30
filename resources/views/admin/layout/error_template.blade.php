@if ($errors->any())
    <div class="remove-margin-left">
        <ul>
            @foreach ($errors->all() as $error)

                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <li>
                        <div class="application-alert-danger">{{ $error }}
                            <div>
                    </li>
                </div>

            @endforeach
        </ul>
    </div>
@endif

@if (session()->has('success_report'))

    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i> Success!</h5>
        {{ session()->get('success_report') }}
    </div>
    <br />
@endif


@if (session()->has('failure_report'))

    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-info"></i> Alert!</h5>
        {{ session()->get('failure_report') }}
    </div>

    {{-- <div class="application-alert-danger">
        <a class="close" data-dismiss="alert" href="#">×</a>
        <h4 class="alert-heading">Error!</h4>
        {{ session()->get('failure_report') }}
    </div> --}}
    <br />
@endif
