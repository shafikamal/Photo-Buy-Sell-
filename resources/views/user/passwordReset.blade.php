<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Reset password!</h1>
                        </div>

                        @include('error.error')
                        <form class="user" method="post" action="">
                            {{ csrf_field() }}
                            <div class="form-group ">
                                <input type="hidden" value="{{$user_id}}" name="user_id">
                                <input type="password" class="form-control form-control-user" id="exampleFirstName" name="password"
                                       placeholder="Enter New password">
                            </div> <div class="form-group ">
                                <input type="password" class="form-control form-control-user" id="exampleFirstName" name="password_confirmation"
                                       placeholder="Confirm password">
                            </div>

                            <input class="btn btn-primary btn-user btn-block" type="submit" name="submit" value="Send Code">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</body>

</html>


