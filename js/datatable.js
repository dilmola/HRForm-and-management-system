$(document).ready(function() {
    $('#forms-tbl').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );

$(document).ready(function() {
    $('#forms-tbl-2').DataTable( {
    } );
} );   


$(document).ready(function() {
    $('#forms-tbl-3').DataTable( { 
        "lengthChange": false,
        pageLength: 3,
        bFilter: false, 
        bInfo: false
    } );
} );