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
      { "data": 'id' },
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
          return `<a href="" datos='${dataString}' data-bs-toggle="modal" data-bs-target="#mEditarEmpleado" class="editar btn btn-sm btn-primary border-solid border-2 border-indigo-600 bg-blue-50 pl-1" title="Editar Empleado"><i class="fa-solid fa-pen-to-square"></i></a>
                 <button type="button" id="deleteEmpModal" data-id="${data.id}" data-nombre="${data.nombre}" class="delete btn btn-sm btn-danger border-solid border-2 bg-red-600" title="Eliminar Empleado" data-bs-toggle="modal" data-bs-target="#mEliminarEmpleado"><i class="fa-solid fa-trash-can"></i></button>`;
        }
      }
    ]
  }); // fin datatable

  

}); //fin function

// funcion para eliminar empleado manipular el modal y los campos o elementos dentro de este
$('#mEliminarEmpleado').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var dataStringID = button.data('id');
  var dataStringNombre = button.data('nombre');

  action = $('#formEliminarEmpleados').attr('data-action').slice(0,-1);
  action+=dataStringID;

  $('#formEliminarEmpleados').attr('action',action);
  // $('#titulomodal').html(dataStringID);
  console.log(action);
 
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this);
  modal.find('.modal-title').text('Eliminar empleado: ' + dataStringID);
  modal.find('.modal-body input[id="nombre"]').val(dataStringNombre);

});


$('#mEditarEmpleado').on('show.bs.modal', function (event) {
   var button = $(event.relatedTarget);
   var datos = button.attr('datos');
   
   console.log(datos);
});

