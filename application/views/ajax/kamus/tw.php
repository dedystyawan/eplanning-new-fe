<table class="table table-bordered table-responsive table-hover">
    <thead>
        <tr>
            <td class="text-center">Skor</td>
            <td>PERILAKU KUNCI</td>
            <td>
                <strong>KERJASAMA (TEAMWORK)</strong><br />
                Dorongan dan kemampuan untuk bekerja sama dengan orang lain dalam tim atau di luar tim, menjadi bagian dari suatu kelompok dalam melaksanakan suatu tugas yang sama maupun berbeda untuk kemajuan tim.
            </td>
        </tr>
    </thead>
    <tbody><?php
        if($_GET['jenjang'] <= 2){ ?>
            <tr>
                <td class="text-center">1</td>
                <td>
                    Kooperatif sebagai tim
                </td>
                <td>
                    Berpartisipasi sebagai anggota tim
                </td>
            </tr>
            <tr>
                <td class="text-center">2</td>
                <td>
                    Mendukung keputusan tim
                </td>
                <td>
                    Mendukung keputusan tim
                </td>
            </tr>
            <tr>
                <td class="text-center">3</td>
                <td>
                    Membantu tugas orang lain
                </td>
                <td>
                    Membantu menyelesaikan tugas orang lain untuk tercapaianya tujuan utama tim.
                    Berbagi informasi yang relevan dengan kemajuan tim
                </td>
            </tr>
            <tr>
                <td class="text-center">4</td>
                <td>
                    Menghargai pendapat
                </td>
                <td>
                    Bersedia belajar dari orang lain (bawahan dan rekan).
                    Menghargai perbedaan pendapat
                </td>
            </tr>
            <tr>
                <td class="text-center">5</td>
                <td>
                    Menyelesaikan konflik
                </td>
                <td>
                    Mampu menyelesaikan konflik anggota secara postif
                </td>
            </tr><?php
        }elseif($_GET['jenjang'] == 3 OR $_GET['jenjang'] == 4){ ?>
            <tr>
                <td class="text-center">1</td>
                <td>
                    Mendukung keputusan
                </td>
                <td>
                    Mendukung keputusan tim
                </td>
            </tr>
            <tr>
                <td class="text-center">2</td>
                <td>
                    Membantu tugas orang lain
                </td>
                <td>
                    Membantu menyelesaikan tugas orang lain untuk tercapaianya tujuan utama tim. 
                    Berbagi informasi yang relevan dengan kemajuan tim
                </td>
            </tr>
            <tr>
                <td class="text-center">3</td>
                <td>
                    Menghargai pendapat
                </td>
                <td>
                    Bersedia belajar dari orang lain (bawahan dan rekan).
                    Menghargai perbedaan pendapat
                </td>
            </tr>
            <tr>
                <td class="text-center">4</td>
                <td>
                    Menyelesaikan konflik
                </td>
                <td>
                    Mampu menyelesaikan konflik anggota secara postif.
                    Mampu membangkitkan semangat anggota
                </td>
            </tr>
            <tr>
                <td class="text-center">5</td>
                <td>
                    Mendorong anggota
                </td>
                <td>
                    Mendorong anggota untuk berperan aktif demi kemajuan tim
                </td>
            </tr><?php
        }elseif($_GET['jenjang'] == 5 OR $_GET['jenjang'] == 6){ ?>
            <tr>
                <td class="text-center">1</td>
                <td>
                    Kooperatif sebagai tim
                </td>
                <td>
                    Berbagi informasi yang relevan dengan kemajuan tim.
                    Bersedia belajar dari orang lain (bawahan dan rekan).
                </td>
            </tr>
            <tr>
                <td class="text-center">2</td>
                <td>
                    Membagi informasi
                </td>
                <td>
                    Menghargai perbedaan pendapat.
                    Mampu menyelesaikan konflik anggota secara postif
                </td>
            </tr>
            <tr>
                <td class="text-center">3</td>
                <td>
                    Mensupport anggota tim
                </td>
                <td>
                    Mampu membangkitkan semangat anggota.
                    Mendorong anggota untuk berperan aktif demi kemajuan tim.
                </td>
            </tr>
            <tr>
                <td class="text-center">4</td>
                <td>
                    Meningkatkan kesempatan belajar
                </td>
                <td>
                    Mensinergikan ide/gagasan/pendapat dari anggota untuk mencapai tujuan kerja dengan optimal 
                </td>
            </tr>
            <tr>
                <td class="text-center">5</td>
                <td>
                    Membangun tim
                </td>
                <td>
                    Menciptakan suasana bersahabat, moral yang baik dan kerja sama (menciptakan identitas kelompok) dalam menjaga kelangsungan hidup kelompok.
                </td>
            </tr><?php
        }else{ ?>
            <tr>
                <td class="text-center">1</td>
                <td>
                    Kooperatif sebagai tim
                </td>
                <td>
                    Berbagi informasi yang relevan dengan kemajuan tim.
                    Bersedia belajar dari orang lain (bawahan dan rekan). 
                </td>
            </tr>
            <tr>
                <td class="text-center">2</td>
                <td>
                    Membagi informasi
                </td>
                <td>
                    Menghargai perbedaan pendapat.
                    Mampu menyelesaikan konflik anggota secara postif. 
                </td>
            </tr>
            <tr>
                <td class="text-center">3</td>
                <td>
                    Mensupport anggota tim
                </td>
                <td>
                    Mampu membangkitkan semangat anggota.
                    Mendorong anggota untuk berperan aktif demi kemajuan tim
                </td>
            </tr>
            <tr>
                <td class="text-center">4</td>
                <td>
                    Meminta input dari tim 
                </td>
                <td>
                    Mensinergikan ide/gagasan/pendapat dari anggota untuk mencapai tujuan kerja dengan optimal.
                    Memberi penghargaan pada orang yang berperformansi baik. 
                </td>
            </tr>
            <tr>
                <td class="text-center">5</td>
                <td>
                    Membangun tim
                </td>
                <td>
                    Menciptakan suasana bersahabat, moral yang baik dan kerja sama (menciptakan identitas kelompok) dalam menjaga kelangsungan hidup kelompok.
                </td>
            </tr><?php
        } ?>
    </tbody>
</table>