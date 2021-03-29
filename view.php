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
    <?php
    require_once("get_view_response.php");
    ?>
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
        <div class="row center-block" style="width: 60%;">

            <div class="col-md-12 center-block">
                <h2 class="text-primary mb-5 mt-5">Ver usuario</h2>
                <form name="view-form center-block" action="" method="post" id="view-form">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">

                    <div class="form-group row mb-2">
                        <label for="un_nombre" class="col-sm-2 col-form-label">Nombre</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="<?php echo $nombre_recuperado; ?>" id="un_nombre" name="un_nombre" placeholder="Nombre" readonly>
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label for="un_email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" value="<?php echo $email_recuperado; ?>" id="un_email" name="un_email" placeholder="Email" readonly>
                        </div>
                    </div>


                    <div class="form-group row mb-2">
                        <label for="un_telefono" class="col-sm-2 col-form-label">Telefono</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="<?php echo $telefono_recuperado; ?>" id="un_telefono" name="un_telefono" placeholder="Telefono" readonly>
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label for="un_comentario" class="col-sm-2 col-form-label">Comentario</label>
                        <div class="col-sm-10">
                            <textarea id="un_comentario" name="un_comentario" class="form-control" rows="3" cols="28" rows="5" placeholder="Comentarios" readonly><?php if ($comentario_recuperado) echo $comentario_recuperado; ?></textarea>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center">
                        <a href="listar_usuarios.php" class="btn btn-secondary center-block mt-5 col-md-3 offset-1">Listar usuarios</a>
                        <a href="edit.php?id=<?php echo $id ?>" class="btn btn-success center-block mt-5 col-md-3 offset-1">Editar</a>
                        <button id="delete" class="btn btn-danger center-block mt-5 col-md-3 offset-1" type="submit" name="delete">Eliminar</button>
                    </div>
                    <img src="img/loading.gif" id="loading-img">
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $("#view-form").on("submit", function(e) {
                if (confirm("Está seguro que quiere eliminar el usuario?")) {
                    e.preventDefault();
                    $("#loading-img").css("display", "block");
                    var sendData = $(this).serialize();
                    $.ajax({
                        type: "POST",
                        url: "delete_user_response.php",
                        data: sendData,
                        success: function(data) {
                            $("#loading-img").css("display", "none");
                            $('#modalResponse').modal('show');
                            $(".response_msg").text(data);
                            $(".response_msg").slideDown().fadeOut(8000);
                            setTimeout(function() {
                                $('#modalResponse').modal('hide');
                            }, 4000);
                            $("#view-form").find("input[type=text], input[type=email], textarea").val("");
                            setTimeout(function() {
                                location.href = "http://localhost/formularioPHPMysql/listar_usuarios.php"
                            }, 4000);
                        }
                    });
                }
            });

            $("#view-form input").blur(function() {
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