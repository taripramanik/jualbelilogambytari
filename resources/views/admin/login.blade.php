@include('admin.partial.v_head')
<body class="hold-transition login-page">
    <div class="login-box">
    <div class="login-logo">
        <b>Admin</b>JualBeliLogam
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Login Terlebih Dahulu</p>

        <form method='post' action='{{ route("admin.loginPost") }}' >
        {{ csrf_field() }}
        <div class="form-group has-feedback">
            <input type="email" class="form-control" placeholder="Email" name="email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" name="password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div>
            <!-- /.col -->
        </div>
        </form>
    </div>
    <!-- /.login-box-body -->
    </div>
@include('admin.partial.v_footer')