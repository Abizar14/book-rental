<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Rental Book</title>
    <link rel="stylesheet" href={{ asset("assets/css/bootstrap.css") }}>
    
    <link rel="shortcut icon" href={{ asset("images/book.png") }} type="image/x-icon">
    <link rel="stylesheet" href={{ asset("assets/css/app.css") }}>
</head>

<body>
    <div id="auth">
        
<div class="container">
    <div class="row">
        <div class="col-md-5 col-sm-12 mx-auto">
            <div class="card pt-4">
                <div class="card-body">
                    <div class="text-center mb-5">
                        <img src={{ asset('images/book.png') }} height="100px" width="100" class='mb-4'>
                        <h3>Login</h3>
                        <p>Please sign in to continue to Rent Book.</p>
                    </div>
                @if (session('status'))
                    <div class="alert alert-danger alertErr">
                        {{ session('message') }}
                    </div>
                    <script>
                        // Setelah 3 detik, sembunyikan pesan alert
                        setTimeout(function(){
                            var alertElement = document.querySelector('.alertErr');
                            alertElement.style.display = 'none';
                        }, 3000); // 3000 milidetik (3 detik)
                    </script>
                @endif

                @if (session('statusReg'))
                    <div class="alert alert-success alertReg">
                        {{ session('message') }}
                    </div>
                <script>
                    // Setelah 3 detik, sembunyikan pesan alert
                    setTimeout(function(){
                        document.querySelector('.alertReg').style.display = 'none';
                    }, 3000); // 3000 milidetik (3 detik)
                </script>
                @endif

                    <form action={{ url('login') }} method="POST">
                      @csrf
                        <div class="form-group position-relative has-icon-left">
                            <label for="username">Username</label>
                            <div class="position-relative">
                                <input type="text" name="username" class="form-control" id="username">
                                <div class="form-control-icon">
                                    <i data-feather="user"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left">
                            <label for="password">Password</label>
                            <div class="position-relative">
                                <input type="password" name="password" class="form-control" id="password">
                                <div class="form-control-icon">
                                    <i data-feather="user"></i>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="form-group position-relative has-icon-left">
                            <label for="nim">NIM</label>
                            <div class="position-relative">
                                <input type="text" name="nim" class="form-control" id="nim">
                                <div class="form-control-icon">
                                    <i data-feather="user"></i>
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="form-group position-relative has-icon-left">
                            <div class="clearfix">
                                <label for="password">Password</label>
                                <a href="auth-forgot-password.html" class='float-end'>
                                    <small>Forgot password?</small>
                                </a>
                            </div>
                            <div class="position-relative">
                                <input type="password" name="password" class="form-control" id="password">
                                <div class="form-control-icon">
                                    <i data-feather="lock"></i>
                                </div>
                            </div>
                        </div> --}}

                        <div class='form-check clearfix my-4'>
                            <div class="checkbox float-start">
                                <input type="checkbox" id="checkbox1" class='form-check-input' >
                                <label for="checkbox1">Remember me</label>
                            </div>
                            <div class="float-end">
                                <a href={{ route('register') }}>Don't have an account?</a>
                            </div>
                        </div>
                        <div class="clearfix">
                            <button type="submit" class="btn btn-primary float-end">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    </div>
    <script src={{ asset("assets/js/feather-icons/feather.min.js") }}></script>
    <script src={{ asset("assets/js/app.js") }}></script>
    
    <script src={{ asset("assets/js/main.js") }}></script>
</body>

</html>
