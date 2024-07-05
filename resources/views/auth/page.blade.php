<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
	<!--plugins-->
	<link href="{{asset('/')}}assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="{{asset('/')}}assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="{{asset('/')}}assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="{{asset('/')}}assets/css/pace.min.css" rel="stylesheet" />
	<script src="{{asset('/')}}assets/js/pace.min.js"></script>
    
	<!-- Bootstrap CSS -->
	<link href="{{asset('/')}}assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="{{asset('/')}}assets/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="{{asset('/')}}assets/css/app.css" rel="stylesheet">
	<link href="{{asset('/')}}assets/css/icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
	<title>{{$page->name}}</title>
</head>

<body class="bg-login">
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header text-center">
                            <h3>{{$page->name}}</h3>
                        </div>
                        <div class="card-body">
                            {!!$page->description!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
</body>

</html>