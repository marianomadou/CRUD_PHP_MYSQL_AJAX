<!DOCTYPE html>
<html>

<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>
    <style>
        #loading-img {
            display: none;
        }

        .response_msg {
            font-size: 18px;
            display: none;
            align-content: center;
            margin-top: 20px;

        }

        .center-block {
            display: table !important;
            margin-left: auto;
            margin-right: auto;
        }
    </style>


</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">CRUD PHP</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="create.php">Crear usuario <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="listar_usuarios.php">Listar Usuarios</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row center-block">

            <div class="col-md-12 center-block">
                <h2 class="text-primary mb-5 mt-5">Formulario de contacto con PHP, Ajax y Mysql</h2>
                <form name="contact-form center-block" action="" method="post" id="contact-form">
                    <div class="form-group">
                        <input type="text" class="form-control col-md-9 center-block" name="un_nombre" placeholder="Nombre" required>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control col-md-9 center-block" name="un_email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control col-md-9 center-block" name="un_telefono" placeholder="Telefono" required>
                    </div>
                    <div class="form-group">
                        <textarea name="un_comentario" class="form-control col-md-9 center-block" rows="3" cols="28" rows="5" placeholder="Comentarios"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success center-block mt-5 btn-lg btn-block col-md-9" name="submit" value="Submit" id="submit_form">Enviar</button>
                    <img src="img/loading.gif" id="loading-img">
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $("#contact-form").on("submit", function(e) {
                e.preventDefault();
                if ($("#contact-form [name='un_nombre']").val() === '') {
                    $("#contact-form [name='un_nombre']").css("border", "1px solid red");
                } else if ($("#contact-form [name='un_email']").val() === '') {
                    $("#contact-form [name='un_email']").css("border", "1px solid red");
                } else {
                    $("#loading-img").css("display", "block");
                    var sendData = $(this).serialize();
                    $.ajax({
                        type: "POST",
                        url: "get_response.php",
                        data: sendData,
                        success: function(data) {
                            $("#loading-img").css("display", "none");
                            $('#modalResponse').modal('show');
                            $(".response_msg").text(data);
                            $(".response_msg").slideDown().fadeOut(8000);
                            setTimeout(function() {
                                $('#modalResponse').modal('hide');
                            }, 4000);
                            $("#contact-form").find("input[type=text], input[type=email], textarea").val("");
                            setTimeout(function() {
                                location.href = "http://localhost/formularioPHPMysql/listar_usuarios.php"
                            }, 4000);
                        }

                    });
                }
            });

            $("#contact-form input").blur(function() {
                var checkValue = $(this).val();
                if (checkValue != '') {
                    $(this).css("border", "1px solid #eeeeee");
                }
            });
        });
    </script>
</body>

<!-- Modal -->
<div class="modal fade" id="modalResponse" tabindex="-1" role="dialog" aria-labelledby="modalResponseLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="response_msg text-center mb-5"> </div> <img src="img/checked.gif" class="rounded mx-auto d-block mt-1 mb-3" alt="checked" style="width:100px;height:100px;">
            </div>
        </div>
    </div>
</div>
<!-- Modal -->

</html>