<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

    <!--  <link href="https://unpkg.com/@fortawesome/fontawesome-free@5.12.1/css/all.min.css" rel="stylesheet">
    <link href="https://unpkg.com/bootstrap-table@1.18.2/dist/bootstrap-table.min.css" rel="stylesheet">
    <script src="https://unpkg.com/tableexport.jquery.plugin/tableExport.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.18.2/dist/bootstrap-table.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.18.2/dist/bootstrap-table-locale-all.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.18.2/dist/extensions/export/bootstrap-table-export.min.js"></script> -->
    <style>
        #loading-img {
            display: none;
        }

        .center-block {
            display: table !important;
            margin-left: auto;
            margin-right: auto;
        }

        .highlight {
            background-color: orange;
            cursor: pointer;
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
        <a class="nav-link" href="#">Listar Usuarios</a>
      </li>
    </ul>
  </div>
</nav>
    <div class="container-fluid">
        <div class="row center-block col-md-12">

            <div class="col-md-12 center-block">
                <h2 class="text-primary mb-5 mt-5">Listar usuarios</h2>
                <div id="records"></div>
            </div>

        </div>
    </div>

    <script>
        $(document).ready(function() {
            $.ajax({
                method: "GET",
                url: "get_users_response.php",
            }).done(function(data) {
                var string = '<table id="usuarios" class="table table-hover b-t"> <thead><tr><th>ID</th><th style="width:10%;">Nombre</th><th style="width:15%;">Email</th><th>Telefono</th><th>Comentario</th><th colspan="3" style="width:15%;" class="text-center">Acciones</th></tr></thead> <tbody>';
                $.each(data, function(key, value) {
                    string +=
                        "<tr id="+value['id']+"> <td class='tpButton'>" + value['id'] +
                        "</td><td>" + value['nombre'] +
                        "<td>" + value['email'] +
                        "</td><td>" + value['telefono'] +
                        '<td>' + value['comentarios'] + "</td>" + 
                        '<td> <a href="view.php?id=' + value['id'] +' " class="btn btn-success" >Ver</a> </td>'+
                        '<td> <a href="edit.php?id=' + value['id'] +' " class="btn btn-info" >Editar</a> </td>'+
                        "</tr>";
                });
                string += '</tbody> </table>';
                $("#records").html(string);
            });


        });
    </script>
</body>



<style>
    .select,
    #locale {
        width: 100%;
    }

    .like {
        margin-right: 10px;
    }
</style>

<script>
    $(function() {
        $('#records').on('click', '.tpButton', function() {
            var id = $(this).closest('tr').attr('id');
        });
    });
</script>


</html>