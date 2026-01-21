<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Auth | Trader SME </title>

     <!-- Fav Icon -->
     <link rel="icon" type="image/png" href="{{asset('back-end/assets/icon/fav-icon.png')}}" >

    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
    />

    <!-- Bootstrap JavaScript Bundle -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- CSS Link -->
    <link rel="stylesheet" href="{{asset('back-end/assets/css/style.css')}}" />
  </head>
  <body>
      <div>
        @yield('content')
    </div>

    <!-- Bootstrap JavaScript Bundle -->
     <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>

    <!-- JS Link -->
    <script src="{{asset('back-end/assets/js/app.js')}}"></script>
  </body>
</html>
