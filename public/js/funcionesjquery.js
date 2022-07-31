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
          // console.log(Object.keys(data));
          // var parameters = meta.settings.oInit.columnDefs[meta.col].parameters;
          // var parameters = row;
          // var rowdata = row;
          // console.log(parameters);
          // return '<a href="' + route('admin.empleados.edit', data) + '" class="editar btn btn-sm btn-primary border-solid border-2 border-indigo-600 bg-blue-50 pl-1" title="Editar Empleado"><i class="fa-solid fa-pen-to-square"></i></a>' + ' ' +
          //   '<button type="button" data-id="'+JSON.stringify(data)+'" class="delete btn btn-sm btn-danger border-solid border-2 bg-red-600" title="Eliminar Empleado"><i class="fa-solid fa-trash-can"></i></button>';
          return `<a href="' + route('admin.empleados.edit', data) + '" class="editar btn btn-sm btn-primary border-solid border-2 border-indigo-600 bg-blue-50 pl-1" title="Editar Empleado"><i class="fa-solid fa-pen-to-square"></i></a> 
                 <button type="button" id='${JSON.stringify(data)}' class="delete btn btn-sm btn-danger border-solid border-2 bg-red-600" title="Eliminar Empleado"><i class="fa-solid fa-trash-can"></i></button>`;
        }
      }
    ]
  });

  // funcion para obtener la data de la fila seleccionada y luego agregar el atributo 'action'
  // al formulario 
  table.on('click', '.editar', function () {
    $tr = $(this).closest('tr');
    if ($($tr).hasClass('child')) {
      $tr = $tr.prev('.parent');
    }

    var data = table.row($tr).data();
    console.log(data.id);
    $('#formEmpleados').attr('action', route('admin.empleados.update', data));
  });

  // funcion para editar en el modal 
  selEmpleado = function (id, nombre, dni, depto) {
    let opt = document.getElementById('mdepto');
    // console.log(opt.textContent);
    // console.log(opt.options[1].textContent);

    // forEach para iterar las opciones del select "mdepto" y agregarle el 'selected' 
    Array.from(opt).forEach(element => {
      if (element.textContent == depto) {
        element.setAttribute("selected", "selected");
      }

    });
    $('#mid').val(id);
    $('#mnombre').val(nombre);
    $('#mdni').val(dni);
    $('#mdepto').on('load');// recarga el elemento select despues que se ha iterado para agragar el atributo selected

  };

  // funcion para agregar el submit al formulario por que el boton esta fuera de este
  // const crearEmp = $("#btnCrearEmpleados").on('click', function () {
  //   $("#formCrearEmpleados").submit(function (event) {
  //     // event.preventDefault();
  //     // $('#mEditarEmpleado').modal('hide');
  //     console.log('sutmited');
  //   });
  // });

  // $('.eliminar').on('click',function() {
  //    let datos = this.data();

  //    console.log(datos);
  // });

  $('#empleados tbody').on('click', '.delete', function () {
    var dat = $(this).attr('id');
    var datjson = JSON.parse(dat);
    var token = $("meta[name='csrf-token']").attr("content");
    console.log(datjson);

    Swal.fire({
      title: 'Estas seguro de borrar?',
      text: "El empelado " + datjson.nombre + " se borrara de forma permanente",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, borrarlo!'
    }).then((result) => {
      if (result.isConfirmed) {
        // $.ajaxSetup({
        //   headers: {
        //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //   }
        // });

        $.ajax(
          {
            url: route('admin.empleados.destroy', datjson),
            type: 'delete',
            data: {
              "id": datjson.id,
              "_token": token,
            },
            success: function (resp) {
              console.log("it Works: " + JSON.stringify(resp));
              table.ajax.reload();
              Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
              )
            }
          });
        // Swal.fire(
        //   'Deleted!',
        //   'Your file has been deleted.',
        //   'success'
        // )

      }
    })

    // $.ajax({
    //   url: route('admin.deptos'),
    //   type: 'get'
    // }).done(function (deptos) {
    //   // @param: funcion para agregar las opciones al select por medio de un arreglo 
    //   deptos.forEach(function (element) {
    //     const select = document.querySelector("#depto");
    //     var option = document.createElement("option");
    //     if (element.nombre == datos[3]) {
    //       option.setAttribute('selected');
    //     }
    //     option.value = element.id;
    //     option.text = element.nombre;
    //     select.add(option);
    //   });

    //   console.log(datos);
    // });

  });
});

