$(function () {
  $('#empleados').DataTable({
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
          return '<button id="' + data.id + ',' + data.nombre + ',' + data.dni + ',' + data.depto + '" class="editar btn btn-sm btn-primary border-solid border-2 border-indigo-600 bg-blue-50" title="Editar Empleado"><i class="fa-solid fa-pen-to-square"></i></button>' + ' ' +
            '<a href="' + route('admin.empleados.destroy', data) + '" class="eliminar btn btn-sm btn-danger border-solid border-2 bg-red-600" title="Eliminar Empleado"><i class="fa-solid fa-trash-can"></i></a>'
        }
      }
    ]
  });

  // funcion para editar los datos de empleado 
  $('#empleados tbody').on('click', '.editar', function () {
    var datos = $(this).attr('id').split(',');

    $.ajax({
      url: route('admin.deptos'),
      type: 'get'
    }).done(function (deptos) {
      // @param: funcion para agregar las opciones al select por medio de un arreglo 
      deptos.forEach(function (element) {
        const select = document.querySelector("#depto");
        var option = document.createElement("option");
        if (element.nombre == datos[3]) {
          option.setAttribute('selected');
        }
        option.value = element.id;
        option.text = element.nombre;
        select.add(option);
      });

      console.log(datos);
    });



    /* Sweet alert para mostrar información  */
    Swal.fire({
      position: 'center',
      icon: 'info',
      title: 'Información legal de instalación',
      html: `<div class="container">
      <div class="row">
      <div class="col">
      <form action="${route('admin.empleados.update', datos)+ '?_method=PUT'}">
      <div class="form-group row py-1">
      <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">ID Empleado</label>
      <div class="col-sm-8">
      <input type="text" readonly class="form-control form-control-sm" id="id" value="${datos[0]}">
      </div>
      </div>
      <div class="form-group row py-1">
      <label for="colFormLabel" class="col-sm-4 col-form-label-sm">DNI</label>
      <div class="col-sm-8">
      <input type="text" class="form-control col-form-label-sm" id="dni" value="${datos[2]}">
      </div>
      </div>
      <div class="form-group row py-1">
      <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label-sm">Nombre</label>
      <div class="col-sm-8">
      <textarea class="form-control" id="nombre" rows="2">${datos[1]}</textarea>
      </div>
      </div>
      <div class="form-group row py-1">
      <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Departamento</label>
      <div class="col-sm-8">
      <select name="depto" id="depto" class="form-control">
      </select>
      </div>
      </div>
      <div class="form-group row pt-3 flex justify-center">
      <div class="col-md-8">
      <input type="submit" class="text-black text-lg bg-indigo-500 p-2 border-2 border-collapse rounded w-1\/2" value="Editar" />
      </div>
      </div>
      </form></div></div></div>`,
      showConfirmButton: false,
      timer: 10000,
      showCancelButton: true,
      timerProgressBar: true
    });

    // (async () => {

    //   const { value: formValues } = await Swal.fire({
    //     width: 600,
    //     title: 'Editar Empleado',
    //     html: `<div class="py-1 px-0">
    //     <input id="swal-input1" class="swal2-input form-control w-75" value="${datos[2]}">
    //     <label >DNI</label>
    //     <input id="swal-input2" class="swal2-input form-control w-75" value="${datos[1]}">
    //     <label>Nombre</label>
    //     <select id="swal-select1" class="swal2-input form-select w-75">
    //     </select>
    //     <label>Departamento</label>
    //     </div>`,
    //     focusConfirm: false,
    //     preConfirm: () => {
    //       return [
    //         document.getElementById('swal-input1').value,
    //         document.getElementById('swal-input2').value,
    //         document.getElementById('swal-select1').value
    //       ]
    //     }
    //   })


    //   if (formValues) {
    //     // Swal.fire(JSON.stringify(formValues))
    //     console.log(typeof formValues);
    //     //  await fetch( route('admin.empleados.update', datos[0]), {
    //     //     method: 'PUT', // or 'PUT'
    //     //     body: formValues, // data can be `string` or {object}!
    //     //     headers:{
    //     //       'Content-Type': 'application/json'
    //     //     }
    //     //   })
    //     //   .then(responde => responde.json())
    //     //   .then(data => {
    //     //     console.log(data);
    //     //   })

    //     $.ajax({
    //       url: route('admin.empleados.update', datos[0])+ '?_method=PUT',
    //       method: 'put',
    //       data: {formValues, _token: '{{csrf_token()}}'}
    //     }).done(function(resp){
    //       console.log(resp);
    //     });

    //     // const requestOptions = {
    //     //   method: 'post',
    //     //   headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
    //     //   body: JSON.stringify(formValues),
    //     // };
    //     // fetch(route('admin.empleados.update', datos[0]) + '?_method=PUT', requestOptions)
    //     //   .then((response) => response.body)
    //     //   .then(data => console.log(data));
    //   }

    // })()

  });

})