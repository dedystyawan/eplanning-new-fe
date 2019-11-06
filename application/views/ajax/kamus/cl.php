<table class="table table-bordered table-responsive table-hover">
    <thead>
        <tr>
            <td class="text-center">Skor</td>
            <td>PERILAKU KUNCI</td>
            <td>
                <strong>BELAJAR BERKELANJUTAN</strong><br />
                Kemampuan melakukan pengembangan diri melalui pembelajaran berkelanjutan dengan cara mengidentifikasi kebutuhan pengembangan (ketrampilan, pengetahuan dan sikap) serta memanfaatkan proses hasil belajar dalam implementasi pekerjaan, untuk mengembangkan metode kerja yang  bertujuan meningkatkan kinerja perusahaan.
            </td>
        </tr>
    </thead>
    <tbody><?php
        if($_GET['jenjang'] <= 2){ ?>
            <tr>
                <td class="text-center">1</td>
                <td>
                    Mencari informasi pelaksanaan pekerjaan
                </td>
                <td>
                    Melaksanakan pekerjaan dengan berdasarkan infromasi yang tersedia.
                    Mengumpulkan informasi  dari lingkungan kerja untuk menunjang kelancaran pekerjaan
                </td>
            </tr>
            <tr>
                <td class="text-center">2</td>
                <td>
                    Aktif melaksanakan pengembangan diri
                </td>
                <td>
                    Membuat rencana pembelajaran dengan mengumpulkan informasi yang sesuai dengan pekerjaan.
                    Membuat menu pembelajaran yang bertahap dan secara aktif mengikuti pelatihan internal/eksternal<br />
                </td>
            </tr>
            <tr>
                <td class="text-center">3</td>
                <td>
                    Kooperatif melaksanakan pengembangan
                </td>
                <td>
                    Menggunakan hasil pengembangan dalam pekerjaan sehari-hari.
                    Mendukung cara-cara baru yang relevan dalam peningkatan kinerja organisasi 
                </td>
            </tr>
            <tr>
                <td class="text-center">4</td>
                <td>
                    Mengajukan pengembangan
                </td>
                <td>
                    Mengusulkan pelatihan/pendidikan berdasarkan analisa kebutuhan pengembangan  
                </td>
            </tr>
            <tr>
                <td class="text-center">5</td>
                <td>
                    Memonitor penggunaan hasil belajar
                </td>
                <td>
                    Memonitor hasil pembelajaran dalam penggunaan pekerjaan sehari-hari
                </td>
            </tr><?php
        }elseif($_GET['jenjang'] == 3 OR $_GET['jenjang'] == 4){ ?>
            <tr>
                <td class="text-center">1</td>
                <td>
                    Membuat rencana pembelajaran 
                </td>
                <td>
                    Mengumpulkan informasi  dari lingkungan kerja untuk menunjang kelancaran pekerjaan.
                    Membuat rencana pembelajaran dengan mengumpulkan informasi yang sesuai dengan pekerjaan
                </td>
            </tr>
            <tr>
                <td class="text-center">2</td>
                <td>
                    Memanfaatkan hasil pembelajaran/pengembangan
                </td>
                <td>
                    Membuat menu pembelajaran yang bertahap dan secara aktif mengikuti pelatihan internal/eksternal.
                    Menggunakan hasil pengembangan dalam pekerjaan sehari-hari
                </td>
            </tr>
            <tr>
                <td class="text-center">3</td>
                <td>
                    Melakukan analisa kebutuhan pelatihan
                </td>
                <td>
                    Mendukung cara-cara baru yang relevan dalam peningkatan kinerja organisasi.
                    Mengusulkan pelatihan/pendidikan berdasarkan analisa kebutuhan pengembangan
                </td>
            </tr>
            <tr>
                <td class="text-center">4</td>
                <td>
                    Menganalisa proses kerja
                </td>
                <td>
                    Memonitor hasil pembelajaran dalam penggunaan pekerjaan sehari-hari.
                    Menganalisa proses kerja individu/tim dan merencanakan pembelajaran guna perbaikan
                </td>
            </tr>
            <tr>
                <td class="text-center">5</td>
                <td>
                    Mengevaluasi metode kerja
                </td>
                <td>
                    Mengevaluasi proses belajar dan metode/cara kerja organisasi
                </td>
            </tr><?php
        }elseif($_GET['jenjang'] == 5 OR $_GET['jenjang'] == 6){ ?>
            <tr>
                <td class="text-center">1</td>
                <td>
                    Memanfaatkan hasil pembelajaran/pengembangan
                </td>
                <td>
                    Menggunakan hasil pengembangan dalam pekerjaan sehari-hari.
                    Mendukung cara-cara baru yang relevan dalam peningkatan kinerja organisasi
                </td>
            </tr>
            <tr>
                <td class="text-center">2</td>
                <td>
                    Melakukan analisa kebutuhan pelatihan
                </td>
                <td>
                    Mengusulkan pelatihan/pendidikan berdasarkan analisa kebutuhan pengembangan.
                    Memonitor hasil pembelajaran dalam penggunaan pekerjaan sehari-hari
                </td>
            </tr>
            <tr>
                <td class="text-center">3</td>
                <td>
                    Mengevaluasi metode kerja 
                </td>
                <td>
                    Menganalisa proses kerja individu/tim dan merencanakan pembelajaran guna perbaikan.
                    Mengevaluasi proses belajar dan metode/cara kerja organisasi
                </td>
            </tr>
            <tr>
                <td class="text-center">4</td>
                <td>
                    Meningkatkan kesempatan belajar
                </td>
                <td>
                    Meningkatkan kesempatan belajar di lingkungaan kerja yang berdampak pada peningkatan efisiensi pekerjaan.
                    Menetapkan kegiatan diskusi pada kelompok/unit kerja untuk meningkatkan efektifitas 
                </td>
            </tr>
            <tr>
                <td class="text-center">5</td>
                <td>
                    Membangun organisasi pembelajar
                </td>
                <td>
                    Membangun kegiatan pengembangan/ belajar mengajar secara formal dan informal.
                    Merencanakan dan mengembangkan metode-metode baru dalam belajar mengajar yang mudah diimplementasikan dalam pekerjaan
                </td>
            </tr><?php
        }else{ ?>
            <tr>
                <td class="text-center">1</td>
                <td>
                    Melakukan analisa kebutuhan pelatihan
                </td>
                <td>
                    Mendukung cara-cara baru yang relevan dalam peningkatan kinerja organisasi.
                    Mengusulkan pelatihan/pendidikan berdasarkan analisa kebutuhan pengembangan
                </td>
            </tr>
            <tr>
                <td class="text-center">2</td>
                <td>
                    Mengevaluasi metode kerja
                </td>
                <td>
                    Memonitor hasil pembelajaran dalam penggunaan pekerjaan sehari-hari.
                    Menganalisa proses kerja individu/tim dan merencanakan pembelajaran guna perbaikan
                </td>
            </tr>
            <tr>
                <td class="text-center">3</td>
                <td>
                    Kooperatif melaksanakan pengembangan
                </td>
                <td>
                    Mengevaluasi proses belajar dan metode/cara kerja organisasi.
                    Meningkatkan kesempatan belajar di lingkungaan kerja yang berdampak pada peningkatan efisiensi pekerjaan
                </td>
            </tr>
            <tr>
                <td class="text-center">4</td>
                <td>
                    Meningkatkan kesempatan belajar
                </td>
                <td>
                    Menetapkan kegiatan diskusi pada kelompok/unit kerja untuk meningkatkan efektifitas.
                    Membangun kegiatan pengembangan/ belajar mengajar secara formal dan informal 
                </td>
            </tr>
            <tr>
                <td class="text-center">5</td>
                <td>
                    Membangun organisasi pembelajar
                </td>
                <td>
                    Merencanakan dan mengembangkan metode-metode baru dalam belajar mengajar yang mudah diimplementasikan dalam pekerjaan.
                    Mengontrol kegiatan pembelajaran sesuai dengan visi dan misi organisasi
                </td>
            </tr><?php
        } ?>
    </tbody>
</table>