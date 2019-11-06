<table class="table table-bordered table-responsive table-hover">
    <thead>
        <tr>
            <td class="text-center">Skor</td>
            <td>PERILAKU KUNCI</td>
            <td>
                <strong>MENGELOLA KINERJA</strong><br />
                Membuat ukuran dan target kinerja, mengkaji kemajuan, mengevaluasi kinerja berdasarkan target yang ditetapkan, serta membantu orang lain dalam mencapai tujuan kerja
            </td>
        </tr>
    </thead>
    <tbody><?php
        if($_GET['jenjang'] <= 2){
            //empty
        }elseif($_GET['jenjang'] == 3 OR $_GET['jenjang'] == 4){ ?>
            <tr>
                <td class="text-center">1</td>
                <td>
                    Menentukan target kerja
                </td>
                <td>
                    Mencari kejelasan atas target kinerja diri sendiri dan bawahan
                </td>
            </tr>
            <tr>
                <td class="text-center">2</td>
                <td>
                    Manajemen capaian target kinerja
                </td>
                <td>
                    Mengidentifikasi hubungan antara target kerjanya dengan target unit kerjanya.
                    Mengelola pelaksanaan pencapaian target kinerja.
                </td>
            </tr>
            <tr>
                <td class="text-center">3</td>
                <td>
                    Mereview pencapaian target kerja
                </td>
                <td>
                    Membantu orang lain dan bawahan dalam mengidentifikasi target individu, dan hubungannya dengan target di unit kerja.
                    Menganalisa hasil kinerja dengan membandingkan pencapaian actual dengan target diri sendiri dan bawahan
                </td>
            </tr>
            <tr>
                <td class="text-center">4</td>
                <td>
                    Mengembangankan kinerja tim/anggota
                </td>
                <td>
                    Mengidentifikasi area-area pengembangan berdasarkan analisa hasil kinerja tesebut.
                    Membantu tim memahami konsep-konsep pengelolaan kinerja yang efektif, memfokuskan pencapaian tujuan kerja yang obyektif, mengidentifikasi target individu dan target tim
                </td>
            </tr>
            <tr>
                <td class="text-center">5</td>
                <td>
                    Mengevaluasi hasil kinerja
                </td>
                <td>
                    Membantu tim mencapai tujuan kerja, mengatasi masalah dalam pekerjaan dan dalam pengembangan karir mereka; menyediakan kesempatan yang cukup bagi tim untuk belajar.
                    Memantau dan mengevaluasi hasil kinerja tim dan membicarakan rencana pengembangan tim
                </td>
            </tr><?php
        }elseif($_GET['jenjang'] == 5 OR $_GET['jenjang'] == 6){ ?>
            <tr>
                <td class="text-center">1</td>
                <td>
                    Mengidentifikasi target kerja
                </td>
                <td>
                    Membantu orang lain dan bawahan dalam mengidentifikasi target individu, dan hubungannya dengan target di unit kerja
                </td>
            </tr>
            <tr>
                <td class="text-center">2</td>
                <td>
                    Meriview pencapaian target kerja
                </td>
                <td>
                    Menganalisa hasil kinerja dengan membandingkan pencapaian actual dengan target diri sendiri dan bawahan.
                    Mengidentifikasi area-area pengembangan berdasarkan analisa hasil kinerja tesebut 
                </td>
            </tr>
            <tr>
                <td class="text-center">3</td>
                <td>
                    Mengembangankan kinerja tim/anggota
                </td>
                <td>
                    Membantu tim memahami konsep-konsep pengelolaan kinerja yang efektif, memfokuskan pencapaian tujuan kerja yang obyektif, mengidentifikasi target individu dan target tim.
                    Membantu tim mencapai tujuan kerja, mengatasi masalah dalam pekerjaan dan dalam pengembangan karir mereka; menyediakan kesempatan yang cukup bagi tim untuk belajar
                </td>
            </tr>
            <tr>
                <td class="text-center">4</td>
                <td>
                    Mengevaluasi hasil kinerja
                </td>
                <td>
                    Memantau dan mengevaluasi hasil kinerja tim dan membicarakan rencana pengembangan tim.
                    Menetapkan ukuran dan target kinerja berbagai tim dengan membandingkannya pada standar industri dan benchmark ke best practice 
                </td>
            </tr>
            <tr>
                <td class="text-center">5</td>
                <td>
                    Mengarahkan pencapaian target kinerja
                </td>
                <td>
                    Melakukan upaya-upaya untuk meningkatkan efektivitas pengelolaan kinerja tim; memimpin berbagai tim dalam menjalankan upaya-upaya tersebut.
                    Memantau dan mengevaluasi hasil kinerja serta mengatasi masalah-masalah yang terkait
                </td>
            </tr><?php
        }else{ ?>
            <tr>
                <td class="text-center">1</td>
                <td>
                    Mengontrol pencapaian tujuan kerja
                </td>
                <td>
                    Membantu tim memahami konsep-konsep pengelolaan kinerja yang efektif, memfokuskan pencapaian tujuan kerja yang obyektif, mengidentifikasi target individu dan target tim
                </td>
            </tr>
            <tr>
                <td class="text-center">2</td>
                <td>
                    Mengembangankan kinerja tim/anggota
                </td>
                <td>
                    Membantu tim mencapai tujuan kerja, mengatasi masalah dalam pekerjaan dan dalam pengembangan karir mereka; menyediakan kesempatan yang cukup bagi tim untuk belajar.
                    Memantau dan mengevaluasi hasil kinerja tim dan membicarakan rencana pengembangan tim
                </td>
            </tr>
            <tr>
                <td class="text-center">3</td>
                <td>
                    Mengarahkan pencapaian target kinerja
                </td>
                <td>
                    Menetapkan ukuran dan target kinerja berbagai tim dengan membandingkannya pada standar industri dan benchmark ke best practice.
                    Melakukan upaya-upaya untuk meningkatkan efektivitas pengelolaan kinerja tim; memimpin berbagai tim dalam menjalankan upaya-upaya tersebut
                </td>
            </tr>
            <tr>
                <td class="text-center">4</td>
                <td>
                    Menentukan kriteria sukses kinerja
                </td>
                <td>
                    Memantau dan mengevaluasi hasil kinerja serta mengatasi masalah-masalah yang terkait.
                    Menentukan arah strategi, ukuran, dan target bisnis organisasi berdasarkan trend industri dan benchmarking
                </td>
            </tr>
            <tr>
                <td class="text-center">5</td>
                <td>
                    Membangun sinergi kinerja organisasi dengan trend industri
                </td>
                <td>
                    Mendorong upaya-upaya perbaikan/ peningkatan kinerja organisasi sejalan dengan strategi bisnis.
                    Membangun budaya organisasi yang berorientasi pada kinerja
                </td>
            </tr><?php
        } ?>
    </tbody>
</table>