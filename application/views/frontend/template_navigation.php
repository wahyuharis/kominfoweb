<div class="main-menu d-none d-md-block">
    <nav>
        <ul id="navigation">
            <li><a href="<?= base_url() ?>">Beranda</a></li>
            <li><a href="#">Berita</a>
                <ul class="submenu">
                    <li class=""><a href="<?= base_url('blog') ?>">Berita</a></li>
                    <li class=""><a href="#">Agenda</a></li>
                    <li class=""><a href="#">Artikel</a></li>
                </ul>
            </li>

            <li><a href="#">Profil</a>
                <ul class="submenu">
                    <li class="<?php if (strtolower($this->uri->segment(2)) == 'struktur_organisasi') echo 'active' ?>"><a href="<?= base_url() ?>struktur_organisasi">Struktur Organisasi</a></li>
                    <li class="<?php if (strtolower($this->uri->segment(2)) == 'sejarah_dinas') echo 'active' ?>"><a href="<?= base_url() ?>sejarah_dinas">Sejarah Dinas</a></li>
                    <li class="<?php if (strtolower($this->uri->segment(2)) == 'visi_misi') echo 'active' ?>"><a href="<?= base_url() ?>visi_misi">Visi & Misi</a></li>
                    <li class="<?php if (strtolower($this->uri->segment(2)) == 'tupoksi') echo 'active' ?>"><a href="<?= base_url() ?>tupoksi">Tupoksi</a>
                        <ul class="submenu2">
                            <li><a href="#">Diskominfo</a></li>
                            <li><a href="#">Kepala Dinas</a></li>
                            <li><a href="#">Sekretariat</a></li>
                            <li><a href="#">Bidang Komunikasi & Pos</a></li>
                            <li><a href="#">Bidang Teknologi Informatika</a>
                            </li>
                            <li><a href="#">Bidang Statistik</a></li>
                            <li><a href="#">Bidang Informasi & Publikasi</a>
                            </li>
                        </ul>
                    </li>
                    <li class="<?php if (strtolower($this->uri->segment(2)) == 'personil_diskominfo') echo 'active' ?>"><a href="<?= base_url() ?>personil_diskominfo">Personil Diskominfo</a></li>
                    <li class="<?php if (strtolower($this->uri->segment(2)) == 'penghargaan') echo 'active' ?>"><a href="<?= base_url() ?>penghargaan">Penghargaan</a></li>
                </ul>
            </li>
            <li><a href="#">Informasi Publik</a>
                <ul class="submenu">
                    <li><a href="#">Profil PPID Kominfo</a></li>
                    <li><a href="#">Informasi Berkala</a></li>
                    <li><a href="#">Informasi Setiap Saat</a></li>
                    <li><a href="#">Informasi Serta Merta</a></li>
                    <li><a href="#">Permohonan Informasi</a></li>
                </ul>
            </li>
            <li><a href="#">Regulasi</a>
                <ul class="submenu">
                    <li><a href="#">Undang-undang</a></li>
                    <li><a href="#">Perpres</a></li>
                    <li><a href="#">Permen</a></li>
                    <li><a href="#">Pergub</a></li>
                    <li><a href="#">Perbup</a></li>
                    <li><a href="#">SE Presiden</a></li>
                    <li><a href="#">SE Gubernur</a></li>
                    <li><a href="#">SE Bupati</a></li>
                </ul>
            </li>
            <li><a href="#">Pengumuman</a></li>
            <li><a href="#">Layanan</a></li>
            <li><a href="#">Dokumen Media</a>
                <ul class="submenu">
                    <li><a href="#">Album Galeri</a></li>
                    <li><a href="#">Album Video</a></li>
                    <li><a href="#">Album Majalah/Publikasi</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</div>