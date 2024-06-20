<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Digian </title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('/') }}admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('/') }}admin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">
     <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9 py-5">
        <div class="card o-hidden border-0 shadow-lg my-5 py-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5  d-lg-block">
                        <img src="{{ asset('/') }}admin/img/register.png"  alt="" style="max-height: 450px;
                        width: 100%;">
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                        
                                <!-- Name -->
                                <div class="form-group">
                                    <input type="name" name="name" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Name">
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Email Address">
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Password">
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>
                                <div class="form-group">
                                    <input  type="password"
                                    name="password_confirmation" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Confrom password">
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>
                               
                                <div class="flex items-center justify-end mt-4">
                                    <button type="submit" class="btn btn-primary btn-user btn-block">Create account</button>
                                    
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                                        {{ __('Already registered?') }}
                                    </a>
                        
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
     </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('/') }}admin/vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('/') }}admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('/') }}admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('/') }}admin/js/sb-admin-2.min.js"></script>

</body>

</html>