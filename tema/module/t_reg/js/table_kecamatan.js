  var treg = $('#t_reg').DataTable({
        //  "sPaginationType": "bootstrap",
        //  "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        //  "bStateSave": true,
        //  "deferRender": true,
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "bProcessing": true,
        /*  dom: '<"#tombol"Brtip>',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],*/
        "oTableTools": {},
        "bProcessing": true,
        "oLanguage": {
            "sProcessing": "<img src='tema/assets/images/reload.gif' style='width:50px;'>"
        },
        "ajax": "module/ajax/reg_admin.php",
        "order": [[ 4, "desc" ]],
        "aoColumnDefs": [{
            "bSearchable": true,
            "bVisible": false,
            "aTargets": [0,1,2,3]
        }, {
            "bSearchable": false,
            "bVisible": false,
            "aTargets": [4]
        },],
        "columns": [{
            "data": "6"
        },{
            "data": "7"
        },{
            "data": "8"
        }, {
            "data": "9"
        }, {
            "data": "10"
        }, {
            "data": "0"
        }, {
            "data": "1"
        }, {
            "data": "2"
        }, {
            "data": "3"
        }, {
                "data": "4"
        }, {
            "data": "5"
        }, {
            "data": "0",
            "render": function($d, $row) {
            return '<div class="btn-group " role="group" style="width:120px !important;"><a id="update" href="'+$d+'" class="btn btn-warning btn-xs"><i class="entypo-pencil"></i></a><a id="hapus" href="'+$d+'" class="btn btn-danger btn-xs"><i class="entypo-cancel"></i></a><a id="aksi" href="'+$d+'" class="btn btn-success btn-xs"><i class="entypo-check"></i></a></div><br /><br /><div class="btn-group " role="group" style="width:120px !important;"><a id="print" href="'+$d+'" class="btn btn-info btn-xs"><i class="entypo-print"></i></a><a id="kasir" href="'+$d+'" class="btn btn-success btn-xs"><i class="entypo-basket"></i></a></div>';
            }
        }]

    });