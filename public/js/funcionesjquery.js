$(function() {
    $('#empleados').DataTable({
        responsive: true,
        autoWidth: false,
        "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
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
        "ajax": "datatable/empleados",
        // ajax: "{{ route('admin.empleados.empleado') }}",
        "columns": [
            {"data": 'id'},
            {"data": 'nombre'},
            {"data": 'dni'},
            {"data": 'depto'}
        ]
    });
})