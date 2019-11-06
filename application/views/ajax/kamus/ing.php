<table class="table table-bordered table-responsive table-hover">
    <thead>
        <tr>
            <td class="text-center">Skor</td>
            <td>PERILAKU KUNCI</td>
            <td>
                <strong>INTEGRITAS</strong><br />
                Kemampuan individu untuk bertindak sesuai dengan nilai-nilai, norma dan aturan yang berlaku secara sadar dan konsisten walaupun dalam situasi/kondisi yang menekan.
            </td>
        </tr>
    </thead>
    <tbody><?php
        if($_GET['jenjang'] <= 2){ ?>
            <tr>
                <td class="text-center">1</td>
                <td>
                    Konsisten
                </td>
                <td>
                    Bertingkah laku secara konsisten, apa yang diucapkan sesuai dengan apa yang dikerjakan
                </td>
            </tr>
            <tr>
                <td class="text-center">2</td>
                <td>
                    Asertif (berani, jujur dan spontan menyampaikan ide dan gagasan)
                </td>
                <td>
                    Berani mengungkapkan ketidaksesuaian yang terjadi dalam pekerjaan.
                    Mampu mengakui kesalahan-kesalahan pribadi
                </td>
            </tr>
            <tr>
                <td class="text-center">3</td>
                <td>
                    Menjaga kerahasiaan
                </td>
                <td>
                    Mengerti informasi yang sifatnya rahasia pribadi atau rahasia bank.
                    Memastikan bahwa informasi-informasi rahasia hanya boleh diketahui oleh orang-orang yang berhak 
                </td>
            </tr>
            <tr>
                <td class="text-center">4</td>
                <td>
                    Berperilaku sesuai dengan nilai
                </td>
                <td>
                    Tidak membocorkan data, informasi, proses rahasia kepada pihak manapun.
                    Menyampaikan ide dan gagasan secara positif walaupun dalam kondisi menekan.
                </td>
            </tr>
            <tr>
                <td class="text-center">5</td>
                <td>
                    Memelihara perilaku kerja
                </td>
                <td>
                    Memelihara dan memonitor perilaku kerja yang sesuai dengan-nilai, norma dan aturan organisasi.
                </td>
            </tr><?php
        }elseif($_GET['jenjang'] == 3 OR $_GET['jenjang'] == 4){ ?>
            <tr>
                <td class="text-center">1</td>
                <td>
                    Bertingkah laku konsisten
                </td>
                <td>
                    Bertindak dan bertingkah laku secara konsisten, apa yang diucapkan sesuai dengan apa yang dikerjakan. 
                    Mampu mengakui kesalahan-kesalahan pribadi
                </td>
            </tr>
            <tr>
                <td class="text-center">2</td>
                <td>
                    Menjaga kerahasiaan
                </td>
                <td>
                    Mengerti informasi yang sifatnya rahasia pribadi atau rahasia bank.
                    Memastikan bahwa informasi-informasi rahasia hanya boleh diketahui oleh orang-orang yang berhak.
                </td>
            </tr>
            <tr>
                <td class="text-center">3</td>
                <td>
                    Memelihara perilaku kerja
                </td>
                <td>
                    Tidak membocorkan data, informasi, proses rahasia kepada pihak manapun.
                    Memelihara dan memonitor perilaku kerja yang sesuai dengan-nilai, norma dan aturan organisasi 
                </td>
            </tr>
            <tr>
                <td class="text-center">4</td>
                <td>
                    Berperilaku objektif dalam lingkungan
                </td>
                <td>
                    Menyampaikan ide dan gagasan secara positif walaupun dalam kondisi menekan.
                    Tidak berkompromi jika berhubungan dengan kode etik profesi dan bisnis
                </td>
            </tr>
            <tr>
                <td class="text-center">5</td>
                <td>
                    Menjadi contoh di lingkungan 
                </td>
                <td>
                    Meningkatkan nilai-nilai, norma dan aturan organisasi.
                    Adil bagi mitra kerja dan seluruh pegawai di bank dalam lingkungan sekitarnya
                </td>
            </tr><?php
        }elseif($_GET['jenjang'] == 5 OR $_GET['jenjang'] == 6){ ?>
            <tr>
                <td class="text-center">1</td>
                <td>
                    Menjaga kerahasiaan
                </td>
                <td>
                    Memastikan bahwa informasi-informasi rahasia hanya boleh diketahui oleh orang-orang yang berhak.
                    Tidak membocorkan data, informasi, proses rahasia kepada pihak manapun.
                </td>
            </tr>
            <tr>
                <td class="text-center">2</td>
                <td>
                    Memelihara perilaku kerja
                </td>
                <td>
                    Memelihara dan memonitor perilaku kerja yang sesuai dengan-nilai, norma dan aturan organisasi.
                    Menyampaikan ide dan gagasan secara positif walaupun dalam kondisi menekan
                </td>
            </tr>
            <tr>
                <td class="text-center">3</td>
                <td>
                    Berperilaku objektif dalam lingkungan
                </td>
                <td>
                    Tidak berkompromi jika berhubungan dengan kode etik profesi dan bisnis.
                    Meningkatkan nilai-nilai, norma dan aturan organisasi. 
                </td>
            </tr>
            <tr>
                <td class="text-center">4</td>
                <td>
                    Menjadi contoh di lingkungan 
                </td>
                <td>
                    Menjadi contoh dalam pola pikir, perilaku dan pola hidup.
                    Adil bagi mitra kerja dan seluruh pegawai di bank dalam lingkungan sekitarnya
                </td>
            </tr>
            <tr>
                <td class="text-center">5</td>
                <td>
                    Memasyarakatkan integritas
                </td>
                <td>
                    Mengembangkan lingkungan kerja kearah perbaikan nilai-nilai, norma dan aturan organisasi
                </td>
            </tr><?php
        }else{ ?>
            <tr>
                <td class="text-center">1</td>
                <td>
                    Menjaga kerahasiaan
                </td>
                <td>
                    Memastikan bahwa informasi-informasi rahasia hanya boleh diketahui oleh orang-orang yang berhak.
                    Menyampaikan ide dan gagasan secara positif walaupun dalam kondisi menekan 
                </td>
            </tr>
            <tr>
                <td class="text-center">2</td>
                <td>
                    Berperilaku objektif dalam lingkungan
                </td>
                <td>
                    Memelihara dan memonitor perilaku kerja yang sesuai dengan-nilai, norma dan aturan organisasi.
                    Tidak berkompromi jika berhubungan dengan kode etik profesi dan bisnis
                </td>
            </tr>
            <tr>
                <td class="text-center">3</td>
                <td>
                    Menjadi contoh di lingkungan 
                </td>
                <td>
                    Meningkatkan nilai-nilai, norma dan aturan organisasi.
                    Menjadi contoh dalam pola pikir, perilaku dan pola hidup 
                </td>
            </tr>
            <tr>
                <td class="text-center">4</td>
                <td>
                    Mengarahkan standar moral
                </td>
                <td>
                    Adil bagi mitra kerja dan seluruh pegawai di bank dalam lingkungan sekitarnya.
                    Mampu mengarahkan dan mengontrol standar moral lingkungan kerja bank
                </td>
            </tr>
            <tr>
                <td class="text-center">5</td>
                <td>
                    Membangun lingkungan yang positif 
                </td>
                <td>
                    Mengembangkan lingkungan kerja kearah perbaikan nilai-nilai, norma dan aturan organisasi
                </td>
            </tr><?php            
        } ?>
    </tbody>
</table>