<?php
$CI = &get_instance();
?>

<div class="row">
    <div class="col-md-6">
    </div>

    <div class="col-md-6">
        <div class="btn-group pull-right">
        </div>
    </div>

</div>
<div class="col-sm-12" style="margin-bottom: 20px"></div>
<div class="row">
    <div class="col-md-12">
        <table id="table-1" style="width: 100%" class="table table-striped table-hover">
            <thead class="">
                <tr>
                    <?php foreach ($table_header as $head) { ?>
                        <th><?= ucwords($head) ?></th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>




<script>
    $(document).ready(function() {
        var table = $('#table-1').DataTable({
            'ajax': {
                'url': '<?= base_url($url_controller)  . 'datatables' ?>',
                "complete": function(data, type) {

                },
            },
            dom: "<'row'<'col-sm-2'l><'col-sm-4'B><'col-sm-6'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            buttons: [
                'copy', 'csv', 'excel', 'pdf'
            ],
            "scrollX": true,
            "pagingType": "full",
            "order": [
                [1, "desc"]
            ],
            "serverSide": true,
            "processing": true,
            "columnDefs": [{
                "targets": 0,
                "visible": false,
                "orderable": false,
                "searchable": false
            }, {
                "targets": 1,
                "orderable": false,
                "width": "25",
                "visible": false,
                "searchable": false
            }, ],
            "preDrawCallback": function() {
                // $('#table-1 tbody').css('opacity', 0);
            },
            "drawCallback": function() {
                // $('#table-1 tbody').animate({
                //     opacity: '1'
                // });
            }
        });

        $('#refresh_table').click(function() {
            table.ajax.reload(null, false);
        });


    });
</script>