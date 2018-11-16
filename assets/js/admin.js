$(document).ready(function() {
    var table = $('dataTable').DataTable({
        'processing': true,
        'serverSide': true,
        'ajax': '',
        'columnDefs':[{
            'targets':-1,
            'data': null,
            'defaultContent':"<button class='btn btn-success btn-xs tblEdit'>Edit / Delete</button>"
        }]
    });
    $('dataTable tbody').on('click', '.tblEdit', function (){
        var data = table.row( ( $this).parents('tr')).data();
        window.location.href = 'edit.php?id=+ data[4]';
    });
});