<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>HRMIS</title>

    <link rel="stylesheet" href="{{ URL::asset('css/mdb.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/custom.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/cropper.min.css'); }}" >
    <script src="{{ URL::asset('js/jquery-3.3.1.min.js') }}"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lobster&display=swap">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link rel="icon" href="{{ URL::asset('system-images/logo.png') }}" type="image/gif">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>

    @yield('extra_css')
</head>
<body>
    <!--[ loader -->
    <div class="loader">
        <img src="{{ URL::asset('system-images/am-spinner-1.gif') }}" />
    </div>
    <!-- end loader ] -->

    @yield('content')

    @yield('extra_js')

    <!-- Toastr CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script src="{{ URL::asset('js/mdb.min.js') }}"></script>
    <script src="{{ URL::asset('js/custom.js') }}"></script>
    <script src='{{ URL::asset("js/cropper.min.js") }}'></script>
    <script src="{{ URL::asset('js/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('js/datatables/js/data-table.js') }}"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.table').dataTable({
                searching: true,
                info: false,
                "lengthChange": false,
                "ordering": false,
                "paginate": false,
            });

            $('#datatable-filter').keyup(function () {
                $('.table').dataTable().fnFilter($(this).val());
            });
        });
    </script>
</body>
</html>
