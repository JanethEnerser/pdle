<?php
error_reporting(0);
require_once('seguridad/sesion.php');
require_once('seguridad/data.php');

$activePage = basename($_SERVER['PHP_SELF'], ".php");
$title = "FAQs";

$DataConsulta = SQL_InfoCliente($nocliente);
$datarow = sqlsrv_query($conSQL,$DataConsulta);
$DataSQL=sqlsrv_fetch_array($datarow);

include_once('inc/header.php');
include_once('inc/sidebar.php');

?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Preguntas frecuentes</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
          <li class="breadcrumb-item active">Preguntas Frecuentes</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section faq">
      <div class="row">	  
	  <?php if($DataSQL['EstatusCliente'] == NULL){
				 echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<H5>No encontramos información asociada a este número de cliente: <strong>'.$nocliente.'</strong> </h5><h6>Favor de comunicarse con soporte. </h6> 
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					  </div>';} ?>
		  
        <div class="col-lg-6">

          <div class="card basic">
            <div class="card-body">
              <h5 class="card-title"></h5>

              <div>
                <h6>1. ¿En dónde puedo utilizarla?</h6>
                <p>En todas las estaciones de Grupo Enerser.</p>
              </div>

              <div class="pt-2">
               <h6>2. ¿En dónde canjeo mis puntos?</h6>
                <p>En todas las estaciones de Grupo Enerser.</p>
              </div>

              <div class="pt-3">
               <h6>3. ¿Cómo puedo canjear mis puntos?</h6>
                <p>Presentando tu tarjeta  junto con tu identificación oficial, desde la comodidad del automóvil en su próxima visita.</p>
              </div>

              <div class="pt-2">
               <h6>4. ¿A partir de cuantos puntos, puedo canjear?</h6>
                <p>Dependiendo del premio que desees obtener, cada uno tiene su puntaje.</p>
              </div>

              <div class="pt-3">
               <h6>5. ¿Tiene algún costo?</h6>
                <p>Las tarjetas son gratis, y puede solicitar reposiciones cuantas necesite.</p>
              </div>

              <div class="pt-2">
               <h6>6. ¿Qué hago en caso de robo o extravío?</h6>
                <p>Reportarla inmediatamente en su estacion favorita y solicitar una reposición con entrega en tu estación mas cercana.</p>
              </div>

            </div>
          </div>


        </div>

        <div class="col-lg-6">

          <!-- F.A.Q Group 2 -->
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"></h5>

              <div class="accordion accordion-flush" id="faq-group-2">

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-target="#faqsTwo-1" type="button" data-bs-toggle="collapse">
                      7. ¿Cómo puedo saber cuantos puntos acumulo?
                    </button>
                  </h2>
                  <div id="faqsTwo-1" class="accordion-collapse collapse" data-bs-parent="#faq-group-2">
                    <div class="accordion-body">
                      En cada  visita usted puede visualizar en su ticket de consumo el puntaje obtenido y el premio alcanzado, solicítale tu ticket al vendedor.
                    </div>
                  </div>
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-target="#faqsTwo-2" type="button" data-bs-toggle="collapse">
                      8. ¿Tiene fecha de vencimiento?
                    </button>
                  </h2>
                  <div id="faqsTwo-2" class="accordion-collapse collapse" data-bs-parent="#faq-group-2">
                    <div class="accordion-body">
                      Si, si no utilizas la tarjeta de lealtad por un periodo de 3 meses, el sistema la inactiva automaticamente,  por un año o mas,  el sistema retirara la cantidad de puntos que tenias acumulado, para activarla te puedes comunicar al teléfono rojo al numero que viene al reverso de la tarjeta , puede reactivar la tarjeta pero no sus puntos o solicitar la reactivación en su estación mas cercana.

                    </div>
                  </div>
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-target="#faqsTwo-3" type="button" data-bs-toggle="collapse">
                      9. ¿Cómo puedo activar mi tarjeta Plan de lealtad? 
                    </button>
                  </h2>
                  <div id="faqsTwo-3" class="accordion-collapse collapse" data-bs-parent="#faq-group-2">
                    <div class="accordion-body">
                    En nuestra estaciones de Grupo Enerser. Al teléfono de atención a clientes (664) 633 31 00 con horario de Lunes a viernes 6:00 am a 11:00 pm  y sábado de 8:00 am a 2:00 pm.
                    </div>
                  </div>
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-target="#faqsTwo-4" type="button" data-bs-toggle="collapse">
                      10. ¿Cómo acumulo puntos en mi tarjeta Plan de lealtad?
                    </button>
                  </h2>
                  <div id="faqsTwo-4" class="accordion-collapse collapse" data-bs-parent="#faq-group-2">
                    <div class="accordion-body">
                      Preséntale la tarjeta a nuestros vendedores antes de que te carguen la gasolina para que acumules cada litro que cargas.
                    </div>
                  </div>
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-target="#faqsTwo-5" type="button" data-bs-toggle="collapse">
                      11. ¿Que pasa si no se me acumulan mis puntos?
                    </button>
                  </h2>
                  <div id="faqsTwo-5" class="accordion-collapse collapse" data-bs-parent="#faq-group-2">
                    <div class="accordion-body">
                      Los puntos se acumulan manualmente unicamente por falla en sistema, por olvido no, estos se acumulan en un periodo de 24 hrs despues de solicitarlo en estación, unicamente tickets en efectivo.

                    </div>
                  </div>
                </div>

              </div>

            </div>
          </div><!-- End F.A.Q Group 2 -->


        </div>

      </div>
    </section>

  </main><!-- End #main -->
<?php
include_once('inc/footer.php');

?>
