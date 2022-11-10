<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Lichi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body class="antialiased">
    <div class="wrapper">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
        $(document).ready(function (){
            $('#form').submit(function (e){
                let data = {};
                $(e.target).find ('input, textearea, select').each(function() {
                    data[this.name] = $(this).val();
                });
                data._token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: "/ajax-request",
                    type:"POST",
                    data:data,
                    success:function(response){
                        console.log(response);
                        if (response.type == 'error') {
                            $('#status .alert').addClass('alert-danger');
                            $('#status .alert').removeClass('alert-success');
                            $('#status .alert').html(response.message)
                        }
                        if (response.type == 'success') {
                            $('#status .alert').removeClass('alert-danger');
                            $('#status .alert').addClass('alert-success');
                            $('#status .alert').html(response.message)
                            $('#form')[0].reset();
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
                return false;
            })
        })
    </script>
</body>
</html>
