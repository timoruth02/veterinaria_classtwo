<?php
    ini_set('display_errors', '1');
    /*require   El archivo es necesario para el funcionamiento (FATAL ERROR)
    include  El archivo no es determinante */
    require_once 'class/Servicio.php';
    // Servidor, Usuario, Password, Base Datos
    // Retorna: Valor Falso: En caso exista error en conexión | Mysqli: contiene información de la conexión
    $servicios = [];

    // mysqli soporta el estilo procedimental y orientado a objetos
    $db = new mysqli('localhost', 'iestpffaa', '123456', 'veterinaria');
    $query = "SELECT * FROM servicios";
    // Ejecuta una instrucción SQL y devuelve un resultado según el tipo de sentencia SQL
    $resultado = mysqli_query($db, $query);
    // Mientras exista datos, trae los datos en formato de objeto y lo asigna a la variable Servicio
    while($servicio = $resultado->fetch_object()){
        // Asigna la variable servicio al final del arreglo Servicios
        $servicios[] = $servicio;
    }

    /* UTILIZANDO SENTENCIAS PREPARADAS
        1. Objeto con informacion de la conexion (Ok)
        2. Sentencia SQL (Ok)
        3. Llamamos al metodo prepare() de la conexión y lo asignamos a un statement (Ok)
        4. Si existe algun parámetro llamamos a bind_param() del objeto statement (-)
        5. Ejecutamos a través del statement llamar al método execute() (Ok)
        6. Obtenemos los resultados de la ejecucion a través del método get_result()
    */

    $id = 2;

    $query = "SELECT * FROM servicios WHERE id = ?";
    $statement = $db->prepare($query);
    $statement->bind_param('i', $id);
    $statement->execute();
    $resultado = $statement->get_result();

    echo "Utilizando sentencias preparadas". PHP_EOL;

    // Uso de PDO (Php Data Object)
    // Soporte al estilo Orientado a Objetos

    $dbPDO = new PDO( );
    $query = "SELECT * FROM servicios";
    $statementPDO = $dbPDO->prepare($query);
    $statementPDO->execute();
    $resultado = $statementPDO->fetchAll(PDO::FETCH_OBJ);

    $id = 3;
    $query = "SELECT * FROM servicios WHERE id = :idServicio";
    $statementPDO = $dbPDO->prepare($query);
    $statementPDO->bindParam(":idServicio", $id);
    $statementPDO->execute();
    $resultado = $statementPDO->fetch(PDO::FETCH_OBJ);


    $services = Servicio::find($id);
    echo "<pre>";
    print_r($services);
    echo "</pre>";





   
?>
<?php  
 include_once 'templates/_header.php';
?>
<main class="contenedor">
    <section class="servicios">
        <h2>Nuestros Servicios</h2>
        <p>
            Porque su bienestar es nuestra prioridad, ofrecemos un trato cálido y profesional, asegurando que cada visita sea una experiencia segura y reconfortante. ¡Tu mejor amigo merece lo mejor!
        </p>
        <a href="crearservicio.php">Nuevo Servicio</a>
        <div class="servicios__contenido">
            <?php
                foreach($servicios as $servicio):
            ?>
                    <div class="servicio">
                        <div class="servicio__img">
                            <img src="<?php echo $servicio->imagen ?>" 
                                alt="<?php $servicio->nombre ?>">
                        </div>
                        <div class="servicio__info">
                            <h3><?php echo $servicio->nombre ?></h3>
                            <p>
                                <?php echo $servicio->descripcion ?>
                            </p>
                        </div>
                    </div><!--Fin de servicio-->                         
            <?php
                endforeach;
            ?>
        </div>
    </section>
</main>

    <?php include_once 'templates/footer.php'?>
