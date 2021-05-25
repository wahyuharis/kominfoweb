<div class="box">
    <div class="box-body">
        <?= $output ?>
    </div>
</div>

<script>
    $(document).ready(function(){
// alert('hello');

        $('input[name=title]').keyup(function(){
            judul=$(this).val();
            judul=slugify(judul);
            $('input[name=slug]').val(judul);
        });

    });
</script>