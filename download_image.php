<?php
ambil_foto();
function ambil_foto()
{
    $image_list_json = file_get_contents('https://diskominfo.jemberkab.go.id/code/storage/app/feed/list.php');
    $image_list = json_decode($image_list_json, true);
    $image_list_files = $image_list['files'];

    $limit = count($image_list_files);
    $i = 0;
    echo "######################################\n";
    echo "MENGUNDUH FOTO\n";
    while ($i < $limit) {
        $row = $image_list_files[$i];
        $foto = $image_list_files[$i]['file'];
        // Remote image URL
        $url = 'https://diskominfo.jemberkab.go.id/code/storage/app/feed/' . $foto;

        // Image path
        $img = './assets/uploads/files/' . $foto;

        // Save image 
        $hasil = file_put_contents($img, file_get_contents($url));
        echo "\n";
        echo $hasil . "-" . $foto;
        $i++;
    }
    echo "\nselesai\n";
    echo "######################################\n";
}
