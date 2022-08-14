$(function () {
  var table = $('#empleados').DataTable({
    responsive: true,
    autoWidth: false,
    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
    "language": {
      "decimal": "",
      "emptyTable": "No hay datos para mostrar en la tabla",
      "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
      "infoEmpty": "Mostrando 0 a 0 de 0 entries",
      "infoFiltered": "(filtrado de _MAX_ registros totales)",
      "infoPostFix": "",
      "thousands": ",",
      "lengthMenu": "Mostrar _MENU_ registros por pagina",
      "loadingRecords": "Cargando...",
      "processing": "Procesando...",
      "search": "Buscar:",
      "zeroRecords": "Ningun registro encontrado",
      "paginate": {
        "first": "Primero",
        "last": "Ultimo",
        "next": "Siguiente",
        "previous": "Ultimo"
      }
    },
    // "serverSide": true,
    // "ajax": "datatable/empleados",
    ajax: route('admin.datatable.empleados'),
    "columns": [
      { "data": 'id', class: 'text-center' },
      { "data": 'nombre' },
      { "data": 'dni' },
      { "data": 'depto' },
      {
        'data': null,
        'render': function (data, type, row, meta) {
          var dataString = JSON.stringify(data);
          //  console.log(dataString);
          // Error: 1. los parametros cuando se incrustan en el retrun se pasa como [object object] y no
          //           como un objeto json como se ve en la consola.
          //        2.  Al convertir el objeto a string mediante la funcion JSON.stringify() nos permite
          //           pasar los datos(el objeto) y poder visualizarlo en el HTML como atributo.
          //        3. Descubrimiento: la funcion JSON.stringify encierra el string con comillas dobles ("")
          //        4. Solucion: encerrar los datos con comillas simples 
          //        5. Observacion: como podemos ver en aqui abajo cuando pasamos cada parte del objeto
          //           por separado o por cada atributo si funciona bien
          return `<a href="#" data-datos='${dataString}' data-bs-toggle="modal" data-bs-target="#mEditarEmpleado" class="editar btn btn-sm btn-primary border-solid border-2 border-indigo-600 bg-blue-50 pl-1" title="Editar Empleado"><i class="fa-solid fa-pen-to-square"></i></a>
                 <button type="button" id="deleteEmpModal" data-id="${data.id}" data-nombre="${data.nombre}" class="delete btn btn-sm btn-danger border-solid border-2 bg-red-600" title="Eliminar Empleado" data-bs-toggle="modal" data-bs-target="#mEliminarEmpleado"><i class="fa-solid fa-trash-can"></i></button>`;
        }
      }
    ]
  }); // fin datatable
  
  // funcion para ucultar el mensaje alert sobre el dataTable
  setTimeout(function () {
    $("#msj").fadeOut(1000);
  }, 7000);

  // funcion para administrar el submit del formulario y hacer la peticion por medio de ajax
  // Crear Empleados
  $('#formCrearEmpleados').submit(function (event) {
    event.preventDefault();
    
    var action = $(this).attr('action');
    var dataform = $(this).serializeArray();

    $.ajax({
      url: action,
      method: dataform[1].value,
      data: dataform,
    }).done(function (resp) {

      if (resp == 1) {
        table.ajax.reload();
        $('#mCrearEmpleado').modal('hide').removeClass('fade');

        //toasd
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar: true,
          didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
          }
        })

        Toast.fire({
          icon: 'success',
          title: 'Empleado creado con éxito'
        })

      }

    });
  });

  // funcion para administrar el submit del formulario y hacer la peticion por medio de ajax
  // Editar Empleados
  $('#formEditarEmpleados').submit(function (event) {
    event.preventDefault();
    
    var action = $(this).attr('action');
    var dataform = $(this).serializeArray();

    $.ajax({
      url: action,
      method: dataform[1].value,
      data: dataform,
    }).done(function (resp) {
      console.log(resp);

      if (resp == 1) {
        table.ajax.reload();
        $('#mEditarEmpleado').modal('hide').removeClass('fade');

        // toasd
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar: true,
          didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
          }
        });

        Toast.fire({
          icon: 'success',
          title: 'Empleado creado exitosamente'
        });
      } // fin if
    }); // fin ajax-done
  }); // fin funcion form-submit editar empleado

}); //fin function

// funcion para eliminar empleado manipular el modal y los campos o elementos dentro de este
// modal-formulario Eliminar empleado
$('#mEliminarEmpleado').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var dataStringID = button.data('id');
  var dataStringNombre = button.data('nombre');

  // obtenemos el data-action del formulario y lequitamos el id con la funcion slice()
  action = $('#formEliminarEmpleados').attr('data-action').slice(0, -1);
  // le agregamos el nuevo ID al action
  action += dataStringID;
  // le sustituimos el atributo action por el nuevo que se creo
  $('#formEliminarEmpleados').attr('action', action);

  var modal = $(this);
  modal.find('.modal-title').text('Eliminar empleado: ' + dataStringID);
  modal.find('.modal-body input[id="nombre"]').val(dataStringNombre);

});

// funcion para obtener los datos desde el boton y ponerlos 
// en los inputs del modal-formulario Editar empleado
$('#mEditarEmpleado').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget);
  var datos = button.data('datos');

  // obtenemos el data-action del formulario y lequitamos el id con la funcion slice()
  action = $('#formEditarEmpleados').attr('data-action').slice(0, -1);
  // le agregamos el nuevo ID al action
  action += datos.id;
  // le sustituimos el atributo action por el nuevo que se creo
  $('#formEditarEmpleados').attr('action', action);

  var modalEdit = $(this);
  modalEdit.find('.modal-body input[id="id"]').val(datos.id);
  modalEdit.find('.modal-body input[id="nombre"]').val(datos.nombre);
  modalEdit.find('.modal-body input[id="dni"]').val(datos.dni);
  // modalEdit.find('.modal-body select[id="mdepto"] option[text="'+datos.depto+'"]').attr("selected", "selected");
  var medit = modalEdit.find('.modal-body select[id="depto"] option[value="' + datos.id_depto + '"]').attr("selected", "selected");
});

