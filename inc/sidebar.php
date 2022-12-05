<?php 

?>
  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
	<?php 
	 if($permiso == 1 ){
	 ?>
      <li class="nav-item ">
        <a class="nav-link <?= ($activePage == 'panel') ? 'active':'collapsed'; ?>" href="panel">
          <i class="bi bi-house"></i>
          <span>Inicio</span>
        </a>
      </li><!-- End Dashboard Nav -->
	<?php
		}else{
		?>
		<li class="nav-item ">
			<a class="nav-link <?= ($activePage == 'inicio') ? 'active':'collapsed'; ?>" href="inicio">
			  <i class="bi bi-house"></i>
			  <span>Inicio</span>
			</a>
		  </li><!-- End Dashboard Nav -->
		
	<?php
	 	}
	?>
	<?php 
	 if($permiso == 1 ){
	 ?>
	  <li class="nav-item ">
        <a class="nav-link <?= ($activePage == 'tasks') ? 'active':'collapsed'; ?>" href="tasks">
          <i class="bi bi-list-task"></i>
          <span>Panel de soporte</span>
        </a>
      </li><!-- End Contact Page Nav -->
	  <li class="nav-item ">
        <a class="nav-link <?= ($activePage == 'noticias') ? 'active':'collapsed'; ?>" href="noticias">
          <i class="bi bi-newspaper"></i>
          <span>Noticias</span>
        </a>
      </li><!-- End Contact Page Nav -->
	<?php
		}
	?>

      <li class="nav-item ">
        <a class="nav-link <?= ($activePage == 'perfil') ? 'active':'collapsed'; ?>" href="perfil">
          <i class="bi bi-person"></i>
          <span>Perfil</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item ">
        <a class="nav-link <?= ($activePage == 'tarjeta') ? 'active':'collapsed'; ?>" href="tarjeta">
          <i class="bi bi-file-person"></i>
          <span>Mi tarjeta digital</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item ">
        <a class="nav-link <?= ($activePage == 'faq') ? 'active':'collapsed'; ?>" href="preguntas">
          <i class="bi bi-question-circle"></i>
          <span>Preguntas frecuentes</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

      <li class="nav-item ">
        <a class="nav-link <?= ($activePage == 'soporte') ? 'active':'collapsed'; ?>" href="soporte">
          <i class="bi bi-headset"></i>
          <span>Soporte</span>
        </a>
      </li><!-- End Contact Page Nav -->

     

     

    </ul>

  </aside><!-- End Sidebar-->