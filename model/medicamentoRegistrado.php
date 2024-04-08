<?php
if (isset($_SESSION['usuario']) && $_SESSION['tipoUs'] == 2 || $_SESSION['tipoUs'] == 3) {
?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb p-3 bg-body-tertiary rounded-3">
    <li class="breadcrumb-item">
        <a class="link-body-emphasis fw-semibold text-decoration-none" href="./index.php?pagina=inicio">Inicio</a>
      </li>
      <?php
      if($_SESSION['tipoUs'] == 2){
        echo '<li class="breadcrumb-item">
            <a class="link-body-emphasis fw-semibold text-decoration-none" href="./index.php?pagina=perfilDoctor">Perfil</a>
        </li>';
      }else if($_SESSION['tipoUs'] == 3){
        echo '<li class="breadcrumb-item">
            <a class="link-body-emphasis fw-semibold text-decoration-none" href="./index.php?pagina=perfilAdmin">Perfil</a>
        </li>';
       } ?>
      
      <li class="breadcrumb-item active" aria-current="page">
        Medicamentos Registrado
      </li>
    </ol>
</nav>
<div class="container-fluid mb-4 mt-4">
    <div class="row">
        <div class="col-md-auto d-flex justify-content-center">   
        <?php
        if($_SESSION['tipoUs'] == 2){
            $u->PanelDoctorUsuarios();  
        }else if($_SESSION['tipoUs'] == 3){
            $u->PanelAdminUsuarios(); 
        }
        ?>
        </div>
        
        <div class="col">
            
            <div class="container-fluid d-flex flex-column align-items-center">
            <h2>Medicamentos Registrados</h2>
            </div>
            
            <div class="container d-flex flex-column align-items-center" id='paciente_buscado'>
            <?php
            echo "<button type='button' class='btn btn-outline-primary mb-2 mt-2' style='display:flex;width:150px;height:50px;align-items:center;justify-content:center;' 
            data-bs-toggle='modal' data-bs-target='#exampleModalAgregarMedicina' data-bs-whatever='@mdo'>Agregar Medicamento</button>
            
            <div class='modal fade' id='exampleModalAgregarMedicina' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                <div class='modal-dialog '>
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <h1 class='modal-title fs-5' id='exampleModalLabel'>Agregar Medicamento</h1>
                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                        </div>
                        <div class='modal-body d-flex align-item-center justify-content-center'>
                        
                
                            <form action='./controller/CtrlUsuario.php' method='post' enctype='multipart/form-data' onsubmit='return ValidacionRegistroMedicina();'> 
    
                                <div class='mb-3'>
                                    <label class='col-form-label' for='nombre_medicina'>Nombre del medicamento</label>
                                    <input type='text' class='form-control' id='nombre_medicina' name='nombre_medicina'>
                                </div>
    
                                <div class='mb-3'>
                                    <label  class='col-form-label' for='des_medicina'>Descripcion del Medicamento</label>
                                    <textarea class='form-control' id='des_medicina'  name='des_medicina'></textarea>
                                </div>
    
                                <input type='hidden' name='opc' value='10'>
    
                                <div class='modal-footer'>
                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cerrar Ventana</button>
                                <button type='submit' class='btn btn-primary'>Agregar</button>
                                
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
                
            </div>";
            ?>
            <div class="bd-example border-0 mb-2 mt-2 w-100">
                <div class="row ">
                <?php
                $u->VerMedicamentos();
                ?>
                </div>
            </div>
            </div>

        </div> 
    </div>
</div>


<?php
}else{
  echo'<script type="text/javascript">
        alert("Inicia Sesion");
        window.location.href="./index.php?pagina=IniciarSesion";
        </script>';
exit; 
}
?>

