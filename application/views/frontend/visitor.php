<script>
    $(document).ready(function() {
        var uniq_id = '<?= uniqid() ?>';

        var user_id = window.localStorage.getItem('user_id');
        console.log(user_id);
        if ((user_id == null) || user_id == undefined || user_id == '' || user_id == false) {
            user_id = uniq_id;
            window.localStorage.setItem('user_id', user_id);

            $.get("<?= base_url('Log_visitor/index/') ?>" + user_id, function(data) {});

            <?php
            if (strtolower($ci->uri->segment(1)) == 'blog' && strtolower($ci->uri->segment(2)) == 'detail') {
            ?>
                $.get("<?= base_url('Log_visitor/count/'.$ci->uri->segment(3)) ?>" , function(data) {});
            <?php
            }
            ?>
        }

    });
</script>