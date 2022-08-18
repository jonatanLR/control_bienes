$(function () {
  var table = $('#deptos').DataTable({
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
    // "ajax": "datatable/deptos",
    ajax: route('admin.datatable.deptos'),
    "columns": [
      {
        "data": 'id',
        "width": "20%",
        class: 'text-center'
      },
      {
        "data": 'nombre',
        "width": "20%",
        class: 'text-center'
      },
      {
        'data': null,
        "width": "20%",
        class: 'text-center',
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
          return `<a href="#" data-datos='${dataString}' data-bs-toggle="modal" data-bs-target="#mEditarDepto" class="editar btn btn-sm btn-primary border-solid border-2 border-indigo-600 bg-blue-50 pl-1" title="Editar Departamentos"><i class="fa-solid fa-pen-to-square"></i></a>
                     <button type="button" id="deleteDeptoModal" data-id="${data.id}" data-nombre="${data.nombre}" class="delete btn btn-sm btn-danger border-solid border-2 bg-red-600" title="Eliminar Departamento" data-bs-toggle="modal" data-bs-target="#mEliminarDepto"><i class="fa-solid fa-trash-can"></i></button>`;
        }
      }
    ]
  }); // fin datatable

  // funcion para ucultar el mensaje alert sobre el dataTable
  setTimeout(function () {
    $("#msj").fadeOut(1000);
  }, 6000);

  // funcion para administrar el submit del formulario y hacer la peticion por medio de ajax
  // Crear Departamentos
  $('#formCrearDeptos').submit(function (event) {
    event.preventDefault();
    // $('#nombre').val('');
    console.log($(this));

    var action = $(this).attr('action');
    var dataform = $(this).serializeArray();// crea un array con objetos del formulario
    $.ajax({
      url: action,
      method: dataform[1].value,
      data: dataform,
    }).done(function (resp) {
      if (resp == 1) {
        table.ajax.reload();
        $('#mCrearDepto').modal('hide').removeClass('fade');
        $('#formCrearDeptos')[0].reset();
        // $('#nombre').val('');

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
          title: 'Departamento creado con éxito'
        })

      }

    });
  });

  // funcion para administrar el submit del formulario y hacer la peticion por medio de ajax
  // Editar Departamentos
  $('#formEditarDeptos').submit(function (event) {
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
        $('#mEditarDepto').modal('hide').removeClass('fade');

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
          title: 'Departamento creado exitosamente'
        });
      } // fin if
    }); // fin ajax-done
  }); // fin funcion form-submit editar depto

}); // fin function

// funcion para eliminar depto manipular el modal y los campos o elementos dentro de este
// modal-formulario Eliminar depto
$('#mEliminarDepto').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var dataStringID = button.data('id');
  var dataStringNombre = button.data('nombre');

  // obtenemos el data-action del formulario y lequitamos el id con la funcion slice()
  action = $('#formEliminarDeptos').attr('data-action').slice(0, -1);
  // le agregamos el nuevo ID al action
  action += dataStringID;
  // le sustituimos el atributo action por el nuevo que se creo
  $('#formEliminarDeptos').attr('action', action);

  var modal = $(this);
  modal.find('.modal-title').text('Eliminar departamento: ' + dataStringID);
  modal.find('.modal-body input[id="nombre"]').val(dataStringNombre);

});

// funcion para obtener los datos desde el boton y ponerlos 
// en los inputs del modal-formulario Editar departamento
$('#mEditarDepto').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget);
  var datos = button.data('datos');

  // obtenemos el data-action del formulario y lequitamos el id con la funcion slice()
  action = $('#formEditarDeptos').attr('data-action').slice(0, -1);
  // le agregamos el nuevo ID al action
  action += datos.id;
  // le sustituimos el atributo action por el nuevo que se creo
  $('#formEditarDeptos').attr('action', action);

  var modalEdit = $(this);
  modalEdit.find('.modal-body input[id="id"]').val(datos.id);
  modalEdit.find('.modal-body input[id="nombre"]').val(datos.nombre);
});