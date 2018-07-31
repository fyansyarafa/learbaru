<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://www.google.com/recaptcha/api.js?render=reCAPTCHA_site_key"></script>
      <script>
      grecaptcha.ready(function() {
          grecaptcha.execute('reCAPTCHA_site_key', {action: 'homepage'}).then(function(token) {
             ...
          });
      });
    </script>
</head>

<body class="page-header-fixed">

    <div style="margin-top: 10%;"></div>

    <div class="container-fluid">
        @yield('content')
    </div>

    <div class="scroll-to-top"
         style="display: none;">
        <i class="fa fa-arrow-up"></i>
    </div>

    @include('partials.javascripts')

</body>
</html>
