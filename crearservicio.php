<?php
    require_once 'class/Servicio.php';
    include_once 'templates/_header.php';
    $servicio = new Servicio();
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $servicio = new Servicio($_POST);
        $errores = $servicio->validar();
        if(count($errores) == 0){
            $servicio->guardar();
        }
    }
?>

<main class="contenedor">
    <h1>Nuevo servicio</h1>

    <?php 
        foreach ($errores as $error):
    ?>
        <div class="error">
            <p><?php echo $error; ?></p>
        </div>
    <?php
        endforeach;
    ?>
    <form class="formulario" method="post">
        <div class="control">
            <label for="nombre">Nombre:</label>
            <input 
                type="text" 
                name="nombre" 
                id="nombre" 
                autocomplete="off"
                placeholder="Ingrese el nombre"
                value="<?php echo $servicio->nombre ?>"
            >
        </div>
        <div class="control">
            <label for="descripcion">Descripcion:</label>
            <textarea 
                name="descripcion" 
                id="descripcion"
                placeholder="Ingrese la descripción"
                ><?php echo $servicio->descripcion ?></textarea>
        </div>
        <div class="control">
            <label for="imagen">Imagen:</label>
            <input type="file" name="imagen" id="imagen">
        </div>
        <input type="submit" value="Registrar">
    </form>
</main>

<?php include_once 'templates/footer.php'?>


