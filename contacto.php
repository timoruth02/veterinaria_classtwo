
<?php include_once 'templates/_header.php';?>

<main class="contenedor">
        <h2>Contacto</h2> 
        <form method="post">
        <div class="control">
            <label for="suario">Usuario:</label>
            <input type="text" name="usuario" id="usuario">
        </div>
        <div class="control">
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </div>
        <input type="submit" value="Iniciar sesión">
    </form>
</main>

<?php include_once 'templates/footer.php'?>
