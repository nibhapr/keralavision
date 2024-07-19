<!-- Login 4 - Bootstrap Brain Component -->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{$setting->website}} | Login Page</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- CSS Global Compulsory -->
<!-- CSS Implementing Plugins -->
<link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/components/logins/login-4/assets/css/login-4.css">
{!! HTML::style('assets/global/plugins/froiden-helper/helper.css') !!}
</head>

<body>



<section class="p-3 p-md-4 p-xl-5">
  <div class="container">
  {!! Form::open(array('id'=>'login-form')) !!}
    <div class="card border-light-subtle shadow-sm">
      <div class="row g-0">
        <div class="col-12 col-md-6">
          <img class="img-fluid rounded-start w-100 h-100 object-fit-cover" loading="lazy" src="/front_assets/img/background.jpg" alt="BootstrapBrain Logo">
        </div>
        <div class="col-12 col-md-6">
          <div class="card-body p-3 p-md-4 p-xl-5">
            <div class="row">
              <div class="col-12">
                <div class="mb-5">
                  <h3>Log in</h3>
                </div>
              </div>
            </div>
            <div id="alert"></div>
          
              <div class="row gy-3 gy-md-4 overflow-hidden login-form-2">
                <div class="col-12">
                <input type="email" class="form-control" id="email" name="email"
                placeholder="{{ trans('core.email') }}" required>
                </div>
                <div class="col-12">
                <input type="password" class="form-control" id="password" name="password"
                placeholder="{{ trans('core.password') }}" required>
                </div>
                <div class="col-12">
                  <div class="form-check">
                  <input type="checkbox" name="remember"> Always stay signed in
                     
                    </label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="d-grid">
                    <button class="btn bsb-btn-xl btn-primary" type="submit" id="submitbutton"  onclick="login(); return false;">{{trans('core.btnLogin')}}</button>
                  </div>
                </div>
              </div>
              {!! Form::close() !!}
           
          
          </div>
        </div>
      </div>
    </div>
 
  </div>
</section>
{!! HTML::script("js/jquery-3.6.0.min.js") !!}
{!! HTML::script('front_assets/plugins/jquery/jquery-migrate.min.js') !!}
{!! HTML::script('front_assets/plugins/bootstrap/js/bootstrap.min.js') !!}

<!-- JS Implementing Plugins -->
{!! HTML::script('front_assets/plugins/back-to-top.js') !!}
{!! HTML::script('front_assets/plugins/backstretch/jquery.backstretch.min.js') !!}
{!! HTML::script('assets/global/plugins/froiden-helper/helper.js') !!}
<script>
    function login() {

        $.easyAjax({
            type: 'POST',
            url: "{{route('login')}}",
            data: $('#login-form').serialize(),
            container: "#login-form",
            messagePosition: 'inline',
            success: function (response) {
                if (response.status == "success") {
                    $('#login-form')[0].reset();
                }
            }
        });
        return false;
    }

</script>
</body>
</html>