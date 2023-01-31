<!DOCTYPE html>
<html lang="en" style="height: 100%">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title') - CRUD Login</title>

    <!-- Fonte do Google -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

    <!-- CSS Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.1/tailwind.min.css">

    <!-- Toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

    <!-- CSS da aplicação -->

    <!-- <link rel="stylesheet" href="/css/styles.css"> -->

</head>

<body class="bg-gray-100 text-gray-800" style="height: 100%">


    <nav class="flex py-5 bg-indigo-500 text-white">
        <div class="w-1/2 px-12 mr-auto">
            <p class="text-2xl font-bold">CRUD - Login</p>
        </div>

        <ul class="w-1/2 px-16 ml-auto flex justify-end pt-1">
            @if (auth()->check())
                <li class="mx-8">
                    <p class="text-xl"> <b>{{ auth()->user()->name }}</b></p>
                </li>
                <li>
                    <a href="{{ route('login.destroy') }}"
                        class="font-bold
          py-3 px-4 rounded-md bg-red-500 hover:bg-red-600">Logout</a>
                </li>
            @else
                <li class="mx-6">
                    <a href="{{ route('login.index') }}"
                        class="font-semibold 
          hover:bg-indigo-700 py-3 px-4 rounded-md">Login</a>
                </li>
                <li>
                    <a href="{{ route('register.index') }}"
                        class="font-semibold
          border-2 border-white py-2 px-4 rounded-md hover:bg-white 
          hover:text-indigo-700">Register</a>
                </li>
            @endif
        </ul>

    </nav>

    <div id="content" style="height: 100%">
        @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script type="text/javascript">
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-bottom-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }


        var alertSuccess = "{{ Session::get('success') }}"
        var alertError = "{{ Session::get('error') }}"
        var alertInfo = "{{ Session::get('info') }}"
        var alertWarning = "{{ Session::get('warning') }}"

        // console.log(alertSuccess);
        if(alertSuccess) {
            toastr.success(alertSuccess);
        }
        
        if(alertError) {
            toastr.error(alertError);
        }

        if(alertInfo) {
            toastr.info(alertInfo);
        }

        if(alertWarning) {
            toastr.warning(alertWarning);
        }

        // var alertMessage = "{{ Session::get('success') }}" 
        // if (alertMessage != '')
        //     switch (alertMessage) {

        //         case: "{{ Session::get('success') }}":
        //             toastr.success(alertMessage)
        //             break;
        //         case: "{{ Session::get('error') }}":
        //             toastr.error(alertMessage)
        //             break;
        //         case: "{{ Session::get('info') }}":
        //             toastr.info(alertMessage)
        //             break;
        //         default: "{{ Session::get('warning') }}":
        //             toastr.warning(alertMessage)
        //             break;
        //     }



        // alertMessageError = "{{ Session::get('error') }}"
        // if (alertMessageSuccess = "{{ Session::get('success') }}") {
        //     toastr.success(alertMessageSuccess);
        // } else {
        //     toastr.error(alertMessageError)
        // }

        // var alertMessage = "{{ Session::get('message') }}"
        // console.log(alertMessage);

        // if (alertMessage != '') {
        //     toastr.warning(alertMessage)
        // }

        // alertMessage = "{{ Session::get('success') }}";

        // success = "{{ Session::get('success') }}";
        // error = "{{ Session::get('error') }}";
        // info = "{{ Session::get('info') }}";
        // warning = "{{ Session::get('warning') }}";

        // switch (alertMessage) {
        //     case success:
        //         toastr.success(success);
        //         break;
        //     case error:
        //         toastr.error(error);
        //         break;
        //     case info:
        //         toastr.info(info);
        //         break;
        //     case warning:
        //         toastr.warning(warning);
        //         break;
        // }
    </script>

</body>

</html>
