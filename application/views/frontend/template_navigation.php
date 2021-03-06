<div class="main-menu d-none d-md-block">
    <nav>
        <ul id="navigation">
            <li><a href="<?= base_url() ?>">Beranda</a></li>
            <li><a href="<?= base_url('blog') ?>">Berita</a>
                <!-- <ul class="submenu">
                    <li class=""><a href="<?= base_url('blog') ?>">Berita</a></li>
                    <li class=""><a href="#">Agenda</a></li>
                    <li class=""><a href="#">Artikel</a></li>
                </ul> -->
            </li>

            <li><a href="#">Profil</a>
                <ul class="submenu">
                    <li><a href="<?= base_url() ?>struktur_organisasi">Struktur Organisasi</a></li>
                    <li><a href="<?= base_url() ?>sejarah_dinas">Sejarah Dinas</a></li>
                    <li><a href="<?= base_url() ?>visi_misi">Visi & Misi</a></li>
                    <li><a href="#">Tupoksi</a>
                        <ul class="submenu2">
                            <li><a href="<?= base_url('tupoksi/index/' . $id = 1) ?>">Diskominfo</a></li>
                            <li><a href="<?= base_url('tupoksi/index/' . $id = 2) ?>">Kepala Dinas</a></li>
                            <li><a href="<?= base_url('tupoksi/index/' . $id = 3) ?>">Sekretariat</a></li>
                            <li><a href="<?= base_url('tupoksi/index/' . $id = 4) ?>">Bidang Aspirasi Dan Layanan Informasi Publik </a></li>
                            <li><a href="<?= base_url('tupoksi/index/' . $id = 5) ?>">Bidang Layanan Media Komunikasi Publik</a>
                            </li>
                            <li><a href="<?= base_url('tupoksi/index/' . $id = 6) ?>">Bidang Pengembangan Smart City Dan Statistik</a></li>
                            <li><a href="<?= base_url('tupoksi/index/' . $id = 7) ?>">Bidang Infrastruktur Teknologi Informasi Komunikasi</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="<?= base_url() ?>personil_diskominfo">Personil Diskominfo</a></li>
                    <li><a href="<?= base_url() ?>penghargaan">Penghargaan</a></li>
                </ul>
            </li>
            <li><a href="#">Informasi Publik</a>
                <ul class="submenu">
                    <li><a href="https://ppid.jemberkab.go.id/" target="_blank">Profil PPID Kominfo</a></li>
                    <li><a href="https://ppid.jemberkab.go.id/informasi-berkala" target="_blank">Informasi Berkala</a></li>
                    <li><a href="https://ppid.jemberkab.go.id/informasi-setiap-saat" target="_blank">Informasi Setiap Saat</a></li>
                    <li><a href="https://ppid.jemberkab.go.id/informasi-dikecualikan" target="_blank">Informasi Dikecualikan</a></li>
                    <li><a href="https://ppid.jemberkab.go.id/permohonan-informasi" target="_blank">Permohonan Informasi</a></li>
                </ul>
            </li>
            <li><a href="#">Regulasi</a>
                <ul class="submenu">
                    <li><a href="<?= base_url('regulasi?slug=undang-undang') ?>">Undang-undang</a></li>
                    <li><a href="<?= base_url('regulasi?slug=peraturan-presiden') ?>">Peraturan Presiden</a></li>
                    <li><a href="<?= base_url('regulasi?slug=peraturan-menteri') ?>">Peraturan Menteri</a></li>
                    <li><a href="<?= base_url('regulasi?slug=peraturan-gubernur') ?>">Peraturan Gubernur</a></li>
                    <li><a href="<?= base_url('regulasi?slug=peraturan-daerah') ?>">Peraturan Daerah</a></li>
                    <li><a href="<?= base_url('regulasi?slug=peraturan-bupati') ?>">Peraturan Bupati</a></li>
                    <li><a href="<?= base_url('regulasi?slug=se-presiden') ?>">SE Presiden</a></li>
                    <li><a href="<?= base_url('regulasi?slug=se-gubernur') ?>">SE Gubernur</a></li>
                    <li><a href="<?= base_url('regulasi?slug=se-bupati') ?>">SE Bupati</a></li>
                    <li><a href="<?= base_url('regulasi?slug=sk-bupati') ?>">SK Bupati</a></li>
                </ul>
            </li>
            <li><a href="#">Informasi</a>
                <ul class="submenu">
                    <li><a href="<?= base_url('artikel') ?>">Artikel</a></li>
                    <li><a href="<?= base_url('pengumuman') ?>">Pengumuman</a></li>
                    <li><a href="<?= base_url('infografis') ?>">Infografis</a></li>
                    <li><a href="<?= base_url('agenda') ?>">Agenda</a></li>
                </ul>
            </li>
            <li><a href="<?= base_url('layanan') ?>">Layanan</a></li>
            <li><a href="#">Dokumen Media</a>
                <ul class="submenu">
                    <li><a href="<?= base_url('galery') ?>">Album Foto</a></li>
                    <li><a href="<?= base_url('video') ?>">Album Video</a></li>
                    <li><a href="<?= base_url('majalah') ?>">Album Majalah/Publikasi</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</div>