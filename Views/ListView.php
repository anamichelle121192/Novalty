<!DOCTYPE html>
<html>
  <head>
  <meta charset="UTF-8">
    <title>Grupo Novalty</title>
    <link rel="icon" type="image/png" href="Media/icon-removebg-preview.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script></script>
    <link rel="stylesheet" href="CSS/style.css">
    <script src="JS/scripts.js"></script>
    <!-- <meta name="description" content="Descripción de la página">
    <meta name="keywords" content="palabras clave, para, SEO">
    <link rel="stylesheet" href="estilos.css">
    <script src="script.js"></script> -->
  </head>
  <body class="container mt-1">
    <nav class="navbar" style="background-color: #00aa6078;">
    <div class="container-fluid">
       
        <div class="col-12">
            <div class="row">
                 <div class="col-lg-6 col-md-6 col-sm-12">
                 <a class="navbar-brand novalty-fontsize-title-nav" href="#">
                    <i class="bi bi-person-lines-fill"></i>
                        Lista de Trabajadores
                 </a>
                </div>
                <div class="loader">
                     <div class="spinner"></div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 row">
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <label class="novalty-fontsize-label pull-left"><b>Forma de Pago:</b></label>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="selectFormaPagoFilter" >
                        <option selected value="0">Todos</option>
                        <?php
                            $i=0;
                            foreach ($listaFormaPago as $item) {
                                 echo "<option value='".$item['id_for_pag']."'>".$item['for_pag_opc']."</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#miModal">Crear <i class="bi bi-person-plus-fill"></i></button>
                </div>
                </div>
                </div>

            </div>
            </div>
       
    </div>
    </nav>
    <!-- <hr> -->
    <div class="container-body mt-3">
    <table class="table table-sm table-responsive table-striped table-bordered" id="Listado">
        <thead>
            <tr class="table-success novalty-fontsize-head-table ">
                <th class="novalty-text-align-center">Nº</th>
                <th class="novalty-text-align-center">DNI/Cédula</th>
                <th class="novalty-text-align-center">Apellidos/Nombres</th>
                <th class="novalty-text-align-center">Cargo</th>
                <th class="novalty-text-align-center">Forma de Pago</th>
                <th class="novalty-text-align-center">Operaciones</th>
              
            </tr>
        </thead>
        <tbody class="novalty-fontsize-body-table">
            <?php
                $i=0;
                foreach ($lista as $item) {
                    echo "<tr>";
                     echo "<td class='novalty-text-align-center'>".($i+=1)."</td>";
                     echo "<td class='novalty-text-align-center'>".$item['tra_dni']."</td>";
                     echo "<td class='novalty-text-align-center'>".$item['tra_ape']." ".$item['tra_nom']."</td>";
                     echo "<td class='novalty-text-align-center'>".$item['id_car_tra']."</td>";
                     echo "<td class='novalty-text-align-center'>".$item['id_for_pag']."</td>";
                     echo "<td class='novalty-text-align-center'><i class='bi bi-search text-success'></i><i class='bi bi-pencil-square text-primary'></i></td>";
                    echo "</tr>";
                }
            ?>
          
        </tbody>
    </table>
    </div>


<!-- Modal -->
<div class="modal fade" id="miModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header novalty-header-modal" >
        <label class="modal-title novalty-fontsize-title" id="exampleModalLabel">Registro de Trabajador <i class="bi bi-person-plus-fill"></i></label></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <form class="row g-3 needs-validation" novalidate id="miFormulario">
      <div class="modal-body">
        <div class="mb-3 row">
        <div id="liveAlertPlaceholder"></div>
            <div class="col-lg-3 col-md-3 col-sm-12">
                <label class="novalty-fontsize-label"><b>Nacionalidad:</b></label>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-12">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" onchange="mostrarLabel()" value="1" checked="true" type="radio" name="documentoCheck"  value="option1">
                    <label class="form-check-label novalty-fontsize-label" for="inlineRadio1">Peruano</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" onchange="mostrarLabel()" value="0" type="radio" name="documentoCheck"  value="option2">
                    <label class="form-check-label novalty-fontsize-label" for="inlineRadio2">Extranjero</label>
                </div>
            </div> 
        </div> 
        
        <div class="mb-3 row">
            <div class="col-lg-3 col-md-3 col-sm-12">
                <label class="novalty-fontsize-label"><b><span id="nombreLabel">DNI</span>:</b></label>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-12">
                <input type="text" class="form-control form-control-sm" id="documento" name="documento" onkeydown="validateNumber(event)" value=""/>
            </div>
        </div>
        <div class="mb-3 row">


            <div class="col-lg-3 col-md-3 col-sm-12">
                <label class="novalty-fontsize-label"><b>Nombres:</b></label>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-12">
                <input type="text" class="form-control form-control-sm" id="nombre" name="nombre" required value=""/>
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-lg-3 col-md-3 col-sm-12">
                <label class="novalty-fontsize-label"><b>Apellidos:</b></label>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-12">
                <input type="text" class="form-control form-control-sm" id="apellido" name="apellido" required value=""/>
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-lg-3 col-md-3 col-sm-12">
                <label class="novalty-fontsize-label"><b>Cargo:</b></label>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-12">
                <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="selectCargo" name="selectCargo" required>
                    <option selected value="">Seleccionar</option>
                    <?php
                        $i=0;
                        foreach ($listaCargoTrabajador as $item) {
                             echo "<option value='".$item['id_car_tra']."'>".$item['car_tra_opc']."</option>";
                        }
                    ?>
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-lg-3 col-md-3 col-sm-12">
                <label class="novalty-fontsize-label"><b>Forma Pago:</b></label>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-12">
                <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="selectFormaPago" name="selectFormaPago" onchange="formaPagoChange()" required >
                    <option selected value="">Seleccionar</option>
                    <?php
                        $i=0;
                        foreach ($listaFormaPago as $item) {
                             echo "<option value='".$item['id_for_pag']."'>".$item['for_pag_opc']."</option>";
                        }
                    ?>
                </select>
            </div>
        </div>
        <div id='formaPagoHiddenShow'>
            <div class="mb-3 row">
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <label class="novalty-fontsize-label"><b>Banco:</b></label>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-12">
                    <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="selectBanco" name="selectBanco" required >
                        <option selected value="">Seleccionar</option>
                        <?php
                            $i=0;
                            foreach ($listaBanco as $item) {
                                 echo "<option value='".$item['id_ban']."'>".utf8_decode($item['ban_opc'])."</option>";
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <label class="novalty-fontsize-label"><b>Nº Cuenta:</b></label>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-12">
                    <input type="text" class="form-control form-control-sm" id="nro_cuenta" name="nro_cuenta" required value="" onkeydown="validateNumber(event)"/>
                </div>
            </div>
        </div>

     </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Cerrar <i class="bi bi-x-lg"></i></button>
        <button type="submit" class="btn btn-success btn-sm" >Guardar <i class="bi bi-send-fill"></i></button>
      </div>
     </form>
    </div>
  </div>
</div>

    <!-- <h1>Encabezado de la página</h1>
    <p>Este es un párrafo de ejemplo.</p>
    <img src="imagen.jpg" alt="Descripción de la imagen">
    <form>
  
    </form> -->
  </body>
  <script>
    $(document).ready(function () {
    $('#Listado').DataTable({
        searchable: [1, 2, 3],
    });
});

    $('#selectFormaPagoFilter').on('change', function() {

      var formaPago = document.getElementById("selectFormaPagoFilter").value;
      $.ajax({
        url: "Model/obtener_lista_trabajadores.php",
        type: "POST",
        data: { formaPago: formaPago },
        success: function(data) {
          $("#Listado tbody").html(data);
        }
      });

    });

    function mostrarLabel(){
       var documento = $('input[name="documentoCheck"]:checked').val();
       if(documento==1){
        $("#nombreLabel").text('DNI')
       }else{
        $("#nombreLabel").text('Cédula')
       }
    }


   function formaPagoChange(){
    if($('#selectFormaPago option:selected').val()== 1){
        $("#formaPagoHiddenShow").hide()
        var banco = document.getElementById("selectBanco");
        // Remover la propiedad requerida
        banco.required = false;
        var nro_cuenta = document.getElementById("nro_cuenta");
        
        // Remover la propiedad requerida
        nro_cuenta.required = false;
    }else{
        $("#formaPagoHiddenShow").show();
    }
    

}

   function guardar(){
    
        
   }
const alertPlaceholder = document.getElementById('liveAlertPlaceholder')
const appendAlert = (message, type) => {
  const wrapper = document.createElement('div')
  wrapper.innerHTML = [
    `<div class="alert alert-${type} alert-dismissible" role="alert">`,
    `   <div>${message}</div>`,
    '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
    '</div>'
  ].join('')

  alertPlaceholder.append(wrapper)
}

$(document).ready(function() {
  $('#miFormulario').submit(function(event) {
    // Evitar que se recargue la página
    event.preventDefault();
    const forms = document.querySelectorAll('.needs-validation')

// Loop over them and prevent submission
Array.from(forms).forEach(form => {
//   form.addEventListener('submit', event => {
    if (!form.checkValidity()) {
      event.preventDefault()
      event.stopPropagation()
       appendAlert('Revisar los campos marcados en rojo por favor!', 'danger')
    }else{
      

        var datos = $(this).serialize();

// Realizar la petición AJAX
$.ajax({
  type: 'POST',
  url: 'Model/guardar_datos_procedimiento.php', // Archivo PHP que guarda los datos en la base de datos
  data: datos,
  success: function(response) {
    // La petición AJAX fue exitosa, hacer algo con la respuesta
    console.log(response);
    appendAlert('Guardado!', 'success')
    var modal = document.getElementById("miModal");
    modal.style.display = "none";
    location.reload();
   

  },
  error: function() {
    // La petición AJAX falló
    console.log('Error al guardar los datos');
  }
}); 
       
       
    }

    form.classList.add('was-validated')
//   }, false)
})
    // Obtener los datos del formulario
  
  });
});


function validateNumber($event){
  // Obtiene el código de la tecla presionada
  const codigoTecla = $event.keyCode || $event.which;

  // Detecta si el código de la tecla no corresponde a un número
  if (codigoTecla < 48 || codigoTecla > 57) {
    // Cancela la acción predeterminada de la tecla (es decir, no se escribe en el input)
    $event.preventDefault();
  }

}

$(document).ajaxStart(function() {
  $(".loader").show();
});

$(document).ajaxStop(function() {
  $(".loader").hide();
});


  </script>
</html> 
