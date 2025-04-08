<?php 
/*
require => El archivo es necesario para el funcionamiento (FATALA ERROR)
include => El archivo no es determinante
*/
require_once 'class/Servicio.php';

$titulos = array('Consulta','Vacunacion','Baño y peluqueria');
$imagenes= array('assets/img/consulta.jpg','assets/img/peluqueria.jpg','assets/img/vacunacion.jpg');


    $servicios = array(
        new Servicio("Consulta",
        'Cuidamos la salud de tu mascota con amor y atención profesional en cada diagnóstico',
       "assets/img/consulta.jpg"
    ),new Servicio(
       "Vacunacion",  'Protegemos a tu compañero con vacunas y desparasitación, brindándole bienestar y una vida saludable.',
      "assets/img/vacunacion.jpg"      
    ), new Servicio("Baño y peluqueria",'Embellecemos a tu mascota con cariño, asegurando higiene, frescura y un look adorable.',
       "assets/img/peluqueria.jpg"       
    )
);
?>

<?php  
 include_once 'templates/_header.php';
?>


    <main class="contenedor">
        <section class="servicios">
            <h2>Nuestros Servicios</h2>
            <p>
                Porque su bienestar es nuestra prioridad, ofrecemos un trato calido y
                profesional, asegurando que cada visita sea una experiencia segura y
                reconfortante. ¡Tu mejor amigo merece lo mejor!
            </p>
            <div class="servicios__contenido">
            <a href="crearservicio.php">Nuevo Servicio</a>

                <?php 
                    foreach($servicios as $servicio):
                ?>
                                            <div class="servicio">
                                <div class="servicio__img">
                                    <img src="<?php echo $servicio->imagen?>" 
                                         alt="<?php $servicio->nombre?>">
                                </div>
                            <div class="servicio__info">
                                <h3><?php echo $servicio->nombre?></h3>
                                <p>
                                <?php echo $servicio->descripcion?>
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
