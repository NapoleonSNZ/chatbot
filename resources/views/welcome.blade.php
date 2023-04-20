<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>ChatGPT en Laravel</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nova+Oval&display=swap" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
  </head>
  <style>
        *{
            margin: 0;
            padding: 0;
        }
        ::-webkit-scrollbar{
            width: 5px;
        }
        ::-webkit-scrollbar-track{
            background: #211b6d;
        }
        ::-webkit-scrollbar-thumb{
            background: #211b6d;
        }
        ff
    </style>
  <body style="background: #0d0914;">
    <div>
        <div class="container-fluid m-0 d-flex p-2 justify-content-center">
            <div style="width: 50px; height: 50px;">
                <img src="https://cdn.discordapp.com/attachments/1061685560835571772/1098491319090958407/65903b40-d049-4280-8a67-3e82d0aed151.jpg" width="100%" height="100%" style="border-radius: 50px;">
            </div>
            <div class="text-white font-weight-bold ml-2 mt-3" style="font-family: 'Nova Oval', cursive; font-size:20px">
                💻 Tech Buddy
            </div>
        </div>
        
        <div style="background: #211b6d; height: 2px;"></div>
        <div id="content-box" class="container-fluid p-2" style="height: calc(100vh - 130px); overflow-y: scroll;">
          
        <div>
          <p class="lead" style="color: #b7d1d6">
            ¿Necesitas ayuda con algún problema de tu computadora? ¡Pregúntame lo que sea y estaré encantado de ayudarte a resolverlo! 
               
          </p>
          <p class="lead" style="color: #b7d1d6">Ej. ¿Como puedo hacer mas rápida mi laptop?</p>
        </div>

        </div>
        <div class="container-fluid w-100 px-3 py-2 d-flex" style="background: #211b6d; height: 62px;">
            <div class="mr-2 pl-2" style="background:#1c2331; width: calc(100% - 45px);border-radius: 5px;">
                <input id="input" placeholder=" Escriba aquí su pregunta" class="text-white font-weight-bold" type="text" name="input" style="background: none; width: 100%; height: 100%; border: 0; outline: none;">  
            </div>
            <div id="button-submit" class="text-center" style="background: rgb(193, 81, 40); height: 100%; width: 50px; border-radius: 50px;">
                <i class="fa fa-paper-plane text-white" aria-hidden="true" style="line-height: 45px;"></i>
            </div>
        </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>

<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>

<script>
    $.ajaxSetup({
        headers:{
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    $('#button-submit').on('click', function(){
        $value = $('#input').val();
        $('#content-box').append(`
            <div class="mb-2">
                <div class="float-right px-3 py-2" style="width: 270px; background: #1c2331;border-radius: 10px; float: right; font-size: 85%; color:white">
                    `+ $value + `
                </div>
                <div style="clear: both;"></div>
            </div>`);
        

        $.ajax({
            type: 'post',
            url: '{{url('send')}}',
            data: {
                'input': $value
            },
            success: function(data){
                $('#content-box').append(`
            <div class="d-flex mb-2">
                <div class="mr-2" style="width: 45px; height: 45px;">
                    <img src="https://cdn.discordapp.com/attachments/1061685560835571772/1098491319090958407/65903b40-d049-4280-8a67-3e82d0aed151.jpg" width="100%" height="100%" style="border-radius: 50px;">
                    
                </div>
                <div class="text-white px-3 py-2" style="width: 270px;background: #13254b; border-radius: 10px; font-size: 85%;">
                    `+data+`
                    
                </div>
            </div>`)
                $value = $('#input').val('');
            }
        })
    })
    
</script>
  <!-- Footer -->
  <footer
          class="text-center text-lg-start text-white"
          style="background-color: #1c2331"
          >
    <!-- Section: Social media -->
    <section
             class="d-flex justify-content-between p-4"
             style="background-color: #0d0914"
             >
      <!-- Left -->
      <div class="me-5">
        <span>Conéctate con nosotros por nuestras redes sociales: </span>
      </div>
      <!-- Left -->

      <!-- Right -->
      <div>
        <a href="" class="text-white me-4">
          <i class="fa fa-facebook"></i>
        </a>
        <a href="" class="text-white me-4">
          <i class="fa fa-twitter"></i>
        </a>
        <a href="" class="text-white me-4">
          <i class="fa fa-google"></i>
        </a>
        <a href="" class="text-white me-4">
          <i class="fa fa-instagram"></i>
        </a>
        <a href="" class="text-white me-4">
          <i class="fa fa-linkedin"></i>
        </a>
        <a href="" class="text-white me-4">
          <i class="fa fa-github"></i>
        </a>
      </div>
      <!-- Right -->
    </section>
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section class="">
      <div class="container text-center text-md-start mt-5">
        <!-- Grid row -->
        <div class="row mt-3">
          <!-- Grid column -->
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <!-- Content -->
            <h6 class="text-uppercase fw-bold">Tech Buddy</h6>
            <hr
                class="mb-4 mt-0 d-inline-block mx-auto"
                style="width: 60px; background-color: #7c4dff; height: 2px"
                />
            <p>
              Nuestros expertos en tecnología están disponibles para ayudarte con cualquier problema técnico que puedas tener, desde problemas de software hasta problemas de hardware.
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold">Productos</h6>
            <hr
                class="mb-4 mt-0 d-inline-block mx-auto"
                style="width: 60px; background-color: #7c4dff; height: 2px"
                />
            <p>
              <a href="#!" class="text-white">Hardware</a>
            </p>
            <p>
              <a href="#!" class="text-white">Software</a>
            </p>
            <p>
              <a href="#!" class="text-white">Desarrollo</a>
            </p>
            <p>
              <a href="#!" class="text-white">Soporte</a>
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold">Enlaces útiles</h6>
            <hr
                class="mb-4 mt-0 d-inline-block mx-auto"
                style="width: 60px; background-color: #7c4dff; height: 2px"
                />
            <p>
              <a href="#!" class="text-white">Tu cuenta</a>
            </p>
            <p>
              <a href="#!" class="text-white">Regístrate</a>
            </p>
            <p>
              <a href="#!" class="text-white">Mas de Nosotros</a>
            </p>
            <p>
              <a href="#!" class="text-white">Ayuda</a>
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold">Contacto</h6>
            <hr
                class="mb-4 mt-0 d-inline-block mx-auto"
                style="width: 60px; background-color: #7c4dff; height: 2px"
                />
            <p><i class="fa fa-home mr-3"></i> San Salvador, El Salvador, C.A.</p>
            <p><i class="fa fa-envelope mr-3"></i> ayuda@techbuddy.com</p>
            <p><i class="fa fa-phone mr-3"></i> +503 75658988</p>
            <p><i class="fa fa-print mr-3"></i> +503 22287548</p>
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
      </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div
         class="text-center p-3"
         style="background-color: #0d0914"
         >
      © 2023 ♛
      <a class="text-white" href="https://www.nsco.com/"
         >NSCo</a
        >
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->

