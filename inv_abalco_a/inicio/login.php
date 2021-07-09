<?php
include("../includes/db.php");
include("../includes/header.php");

if (isset($_POST['ingresar'])) {
    $id = $_POST['id_usuario'];
    $contra = $_POST['contra'];

    $query = "SELECT id_usuario, nombre_usuario, apellido_usuario, email_usuario, contra_usuario, fk_id_rol FROM usuario WHERE id_usuario = '$id'";
    $resultado = mysqli_query($conexion, $query);
    $num_fila = mysqli_num_rows($resultado);


    if ($num_fila > 0) {
        $fila = mysqli_fetch_array($resultado);
        $contra_db = $fila['contra_usuario'];
        $contra_encrypt = sha1($contra);

        if ($contra_db == $contra_encrypt){
            $_SESSION['id'] = $fila['id_usuario'];
            $_SESSION['nombre'] = $fila['nombre_usuario'];
            $_SESSION['apellido'] = $fila['apellido_usuario'];
            $_SESSION['rol'] = $fila['fk_id_rol'];

            header("Location: index.php");
        } else {
            header("Location: error.php");
        }
    }
}

?>

<div class="container jumbotron">
    <div class="row bg-secondary">
        <div class="col-lg-5 d-none d-lg-block"></div>
        <div class="col-lg-7">
            <div class="p-5">
                <div class="text-center">
                    <h3 class="h3 text-gray-900 mb-4 text-light">INICIO DE SESIÓN</h3>
                </div>
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                    <div class="form-group row">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" name="id_usuario" id="doc_usuario" placeholder="Documento Identidad">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-user" name="contra" id="pass" placeholder="Contraseña">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-info btn-user btn-block" id="ingresar" name="ingresar" value="Ingresar">
                    </div>
                    <hr class="bg-light">

                </form>

            </div>
        </div>
    </div>
</div>

<?php
include("../includes/footer.php");
?>