<table class="table table-bordered table-responsive table-hover">
    <thead>
        <tr>
            <td class="text-center">Skor</td>
            <td>PERILAKU KUNCI</td>
            <td>
                <strong>TEAM LEADERSHIP</strong><br />
                Dorongan dan kemampuan berperan sebagai pemimpin kelompok untuk mengarahkan dan mengembangkan  sesuai dengan tujuan perusahaan.
            </td>
        </tr>
    </thead>
    <tbody><?php
        if($_GET['jenjang'] <= 2){  ?>
            <tr>
                <td class="text-center">1</td>
                <td>
                    Mengusulkan pertemuan
                </td>
                <td>
                    Mengusulkan acara pertemuan
                </td>
            </tr>
            <tr>
                <td class="text-center">2</td>
                <td>
                    Menyampaikan tujuan acara
                </td>
                <td>
                    Menyampaikan tujuan dan agenda acara pertemuan
                </td>
            </tr>
            <tr>
                <td class="text-center">3</td>
                <td>
                    Monitoring informasi
                </td>
                <td>
                    Memastikan anggota kelompok menerima informasi yang relevan
                </td>
            </tr>
            <tr>
                <td class="text-center">4</td>
                <td>
                    Mengarahkan orang lain
                </td>
                <td>
                    Mengarahkan orang lain dalam lingkup kerjanya
                </td>
            </tr>
            <tr>
                <td class="text-center">5</td>
                <td>
                    Membagi porsi tugas tim
                </td>
                <td>
                    Membagi porsi tugas tim sesuai dengan kebutuhan disertai penetapan target kerja
                </td>
            </tr><?php
        }elseif($_GET['jenjang'] == 3 OR $_GET['jenjang'] == 4){ ?>
            <tr>
                <td class="text-center">1</td>
                <td>
                    Mengusulkan pertemuan.
                </td>
                <td>
                    Mengusulkan acara pertemuan dan membuat orang yang terlibat mengetahui apa yang terjadi meliputi tujuan, mengontrol pemakaian waktu dan membagi tugas. 
                </td>
            </tr>
            <tr>
                <td class="text-center">2</td>
                <td>
                    Menggunakan kekuasaan secara adil.
                </td>
                <td>
                    Membagi porsi tugas sesuai dengan kebutuhan disertai penetapan target kerja.
                    Menggunakan kekuasaan formal secara adil dan tidak memihak atau merugikan pihak lain.
                </td>
            </tr>
            <tr>
                <td class="text-center">3</td>
                <td>
                    Melakukan pengembangan
                </td>
                <td>
                    Memberikan feedback hasil pekerjaan.
                    Memberikan bimbingan secara personal.
                </td>
            </tr>
            <tr>
                <td class="text-center">4</td>
                <td>
                    Mendorong bawahan
                </td>
                <td>
                    Menggunakan strategi untuk meningkatkan moral dan produktivitas kelompok.
                    Memotivasi kepada bawahan dan rekan kerja untuk menunjukan kemampuan mereka  
                </td>
            </tr>
            <tr>
                <td class="text-center">5</td>
                <td>
                    Menjadi contoh sebagai pemimpin 
                </td>
                <td>
                    Memastikan bahwa orang lain mengikuti misi, tujuan, agenda, iklim, cara kerja dan afiliasi kelompok yang dikembangkan, dengan memberi contoh yang baik
                </td>
            </tr><?php
        }elseif($_GET['jenjang'] == 5 OR $_GET['jenjang'] == 6){ ?>
            <tr>
                <td class="text-center">1</td>
                <td>
                    Melakukan pengembangan
                </td>
                <td>
                    Memberikan feedback hasil pekerjaan.
                    Memberikan bimbingan secara personal 
                </td>
            </tr>
            <tr>
                <td class="text-center">2</td>
                <td>
                    Meningkatkan produktifitas kelompok
                </td>
                <td>
                    Menggunakan strategi untuk meningkatkan moral dan produktivitas kelompok
                </td>
            </tr>
            <tr>
                <td class="text-center">3</td>
                <td>
                    Mendorong bawahan
                </td>
                <td>
                    Memotivasi kepada bawahan dan rekan kerja untuk menunjukan kemampuan mereka.
                    Memastikan bahwa orang lain mengikuti misi, tujuan, agenda, iklim, cara kerja dan afiliasi kelompok yang dikembangkan, dengan memberi contoh yang baik
                </td>
            </tr>
            <tr>
                <td class="text-center">4</td>
                <td>
                    Membangun tim
                </td>
                <td>
                    Mendelegasikan tugas berdasarkan potensi dari unit kerjanya, untuk membangun tim yang solid
                </td>
            </tr>
            <tr>
                <td class="text-center">5</td>
                <td>
                    Memfasilitasi perubahan
                </td>
                <td>
                    Membangun fasilitas yang mendukung perubahan organisasi sesuai dengan visi dan misi
                </td>
            </tr><?php
        }else{ ?>
            <tr>
                <td class="text-center">1</td>
                <td>
                    Memimpin pertemuan
                </td>
                <td>
                    Memberikan feedback hasil pekerjaan dan memberikan bimbingan secara personal
                </td>
            </tr>
            <tr>
                <td class="text-center">2</td>
                <td>
                    Menggunakan kekuasaan secara adil
                </td>
                <td>
                    Menggunakan strategi untuk meningkatkan moral dan produktivitas kelompok.
                    Memotivasi kepada bawahan dan rekan kerja untuk menunjukan kemampuan mereka
                </td>
            </tr>
            <tr>
                <td class="text-center">3</td>
                <td>
                    Meningkatkan efektivitas kelompok
                </td>
                <td>
                    Memastikan bahwa orang lain mengikuti misi, tujuan, agenda, iklim, cara kerja dan afiliasi kelompok yang dikembangkan, dengan memberi contoh yang baik
                    Mendelegasikan tugas berdasarkan potensi dari unit kerjanya, untuk membangun tim yang solid
                </td>
            </tr>
            <tr>
                <td class="text-center">4</td>
                <td>
                    Menempatkan diri sebagai pemimpin
                </td>
                <td>
                    Membangun fasilitas yang mendukung perubahan organisasi sesuai dengan visi dan misi.
                    Mengembangkan metode kepemimpinan yang efektif dan efisien demi terlaksannya tujuan organisasi.
                </td>
            </tr>
            <tr>
                <td class="text-center">5</td>
                <td>
                    Mengkomunikasikan visi
                </td>
                <td>
                    Mempunyai kharisma untuk mengkomunikasikan visi yang membangkitkan rasa bangga, semangat dan komitmen terhadap misi kelompok.
                    Mampu menjelaskan/ menterjemahkan visi ke dalam operasional yang harus dicapai oleh kelompok.
                </td>
            </tr><?php
        } ?>
    </tbody>
</table>