<div class="row">
    <div class="col-lg-4 col-xs-4">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3 class="count" id="berita">0</h3>

                <p>News Post</p>
            </div>
            <div class="icon">
                <i class="ion ion-ios-paper"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <!-- ./col -->
    <div class="col-lg-4 col-xs-4">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3 class="count" id="users">0</h3>

                <p>User Registrations</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-4 col-xs-4">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3 class="count" id="visitor">0</h3>

                <p>Unique Visitors</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>
<div class="row">
    <section class="col-lg-12 connectedSortable">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs pull-right">
                <li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
                <li class="pull-left header"><i class="fa fa-inbox"></i> Visitor</li>
            </ul>
            <div class="tab-content no-padding">
                <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
            </div>
        </div>
    </section>
</div>

<script src="<?= base_url() ?>/lte/bower_components/raphael/raphael.min.js"></script>
<script src="<?= base_url() ?>/lte/bower_components/morris.js/morris.min.js"></script>
<script>
    $(document).ready(function() {
        $.get("<?= base_url('admin/home/data') ?>", function(data) {
            console.log(data);

            $('#berita').html(data.berita);
            $('#users').html(data.user);
            $('#visitor').html(data.visitors);

            hitung();
            generate_chart(data.visitor_arr);
        });



        function generate_chart(data_arr) {
            var area = new Morris.Area({
                element: 'revenue-chart',
                resize: true,
                data: data_arr,
                xkey: 'y',
                ykeys: ['item1'],
                labels: ['Pengunjung'],
                lineColors: ['#a0d0e0'],
                hideHover: 'auto',
                // axes:false,
                xLabelFormat:function (x) { 
                    return x.toString(); 
                }
            });
        }

        function hitung() {
            $('.count').each(function() {
                $(this).prop('Counter', 0).animate({
                    Counter: $(this).text()
                }, {
                    duration: 4000,
                    easing: 'swing',
                    step: function(now) {
                        $(this).text(Math.ceil(now));
                    }
                });
            });
        }

    });
</script>