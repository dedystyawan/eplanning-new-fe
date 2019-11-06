<table class="table table-bordered table-responsive table-hover">
    <thead>
        <tr>
            <td class="text-center">Skor</td>
            <td>PERILAKU KUNCI</td>
            <td>
                <strong>KEMAMPUAN BISNIS</strong><br />
                Penguasaan pengetahuan industri, prinsip dan proses bisnis perbankan, dalam rangka mengikuti perkembangan produk/ layanan terkini, dan trend yang berhubungan dengan peluang pasar dan kompetisi, meningkatkan bisnis dan memperluas pangsa pasar saat ini dan di masa akan datang, serta memaksimalkan keuntungan.
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
                    Memahami konsep dasar perbankan
                </td>
                <td>
                    Mampu menjelaskan konsep dan istilah dasar dalam industri perbankan, terutama yang terkait dengan pekerjaanya
                </td>
            </tr>
            <tr>
                <td class="text-center">2</td>
                <td>
                    Mengetahui kekuatan perusahaan
                </td>
                <td>
                    Memahami pengetahuan dasar yang mempengaruhi keberhasilan pencapaian target unit kerjanya (produk, layanan, organisasi).
                    Memahami keunggulan kompetitif organisasi saat ini dan mengoptimalkannya untuk mencapai sasaran kerjanya
                </td>
            </tr>
            <tr>
                <td class="text-center">3</td>
                <td>
                    Mengidentifikasi kompetisi pasar
                </td>
                <td>
                    Memahami trend dan aktivitas industri dengan menggunakan sumber informasi eksternal dan internal, mengidentifikasi kompetisi dan pangsa pasar perusahaan; berprakarsa membagi pengetahuan bisnis dan industri kepada rekan kerja.
                    Memahami sasaran timnya dan bagaimana pekerjaannya dapat memberikan nilai tambah dalam mendukung pencapaian sasaran tim
                </td>
            </tr>
            <tr>
                <td class="text-center">4</td>
                <td>
                    Efisiensi aktivitas kerja
                </td>
                <td>
                    Mengidentifikasi pos-pos pendapatan dan/atau pengeluaran/ biaya yang terkait dengan aktivitas kerjannya, serta menjaga kondisi keuangan yang sehat dan tetap mempertahankan kualitas pelayanan.
                    Menganalisa trend industri, isu dan tantangan, serta menentukan dampaknya terhadap perusahaan dan timnya
                </td>
            </tr>
            <tr>
                <td class="text-center">5</td>
                <td>
                    Mengaplikasikan pengetahuan industri
                </td>
                <td>
                    Mengarahkan tim dalam mendukung pencapaian sasaran unit serta meningkatkan nilai tambah dari timnya.
                    Membimbing tim mengaplikasikan pengetahuan industri perbankan secara komprehensif untuk dapat mencapai tujuan kerja tim; mendorong tim untuk mengembangkan bisnis yang dimiliki untuk menjadi lebih besar
                </td>
            </tr><?php
        }elseif($_GET['jenjang'] == 5 OR $_GET['jenjang'] == 6){ ?>
            <tr>
                <td class="text-center">1</td>
                <td>
                    Mengidentifikasi kompetisi pasar
                </td>
                <td>
                    Memahami trend dan aktivitas industri dengan menggunakan sumber informasi eksternal dan internal, mengidentifikasi kompetisi dan pangsa pasar perusahaan; berprakarsa membagi pengetahuan bisnis dan industri kepada rekan kerja
                </td>
            </tr>
            <tr>
                <td class="text-center">2</td>
                <td>
                    Efisiensi aktivitas kerja
                </td>
                <td>
                    Memahami sasaran timnya dan bagaimana pekerjaannya dapat memberikan nilai tambah dalam mendukung pencapaian sasaran tim.
                    Mengidentifikasi pos-pos pendapatan dan/atau pengeluaran/ biaya yang terkait dengan aktivitas kerjannya, serta menjaga kondisi keuangan yang sehat dan tetap mempertahankan kualitas pelayanan 
                </td>
            </tr>
            <tr>
                <td class="text-center">3</td>
                <td>
                    Menganalisa trend bisnis 
                </td>
                <td>
                    Menganalisa trend industri, isu dan tantangan, serta menentukan dampaknya terhadap perusahaan dan timnya.
                    Mengarahkan tim dalam mendukung pencapaian sasaran unit serta meningkatkan nilai tambah dari timnya
                </td>
            </tr>
            <tr>
                <td class="text-center">4</td>
                <td>
                    Mengaplikasikan pengetahuan industri
                </td>
                <td>
                    Membimbing tim mengaplikasikan pengetahuan industri perbankan secara komprehensif untuk dapat mencapai tujuan kerja tim; mendorong tim untuk mengembangkan bisnis yang dimiliki untuk menjadi lebih besar.
                    Mengarahkan berbagai tim dengan memastikan peningkatan motivasi kerja dan produktivitas 
                </td>
            </tr>
            <tr>
                <td class="text-center">5</td>
                <td>
                    Memprediksi trend bisnis industri
                </td>
                <td>
                    Melakukan prakiraan/ forecasting trend industri, isu, dan tantangan yang berdampak kepada perusahaan di masa yang akan datang; mengelola secara efektif asset, modal dan budget perusahaan agar memberikan tingkat return yang optimal, dalam berbagai program kerja yang dijalankan.
                    Memberikan masukan dalam pembuatan rencana dan strategi bisnis perusahaan dan peluang potensial untuk produk dan layanan perusahaan yang selaras dengan visi dan misi
                </td>
            </tr><?php
        }else{ ?>
            <tr>
                <td class="text-center">1</td>
                <td>
                    Memahami pengetahuan dasar perbankan
                </td>
                <td>
                    Menganalisa trend industri, isu dan tantangan, serta menentukan dampaknya terhadap perusahaan dan timnya
                </td>
            </tr>
            <tr>
                <td class="text-center">2</td>
                <td>
                    Memahami trend industri
                </td>
                <td>
                    Mengarahkan tim dalam mendukung pencapaian sasaran unit serta meningkatkan nilai tambah dari timnya.
                    Membimbing tim mengaplikasikan pengetahuan industri perbankan secara komprehensif untuk dapat mencapai tujuan kerja tim; mendorong tim untuk mengembangkan bisnis yang dimiliki untuk menjadi lebih besar
                </td>
            </tr>
            <tr>
                <td class="text-center">3</td>
                <td>
                    Mengaplikasikan pengetahuan industri
                </td>
                <td>
                    Mengarahkan berbagai tim dengan memastikan peningkatan motivasi kerja dan produktivitas.
                    Melakukan prakiraan/ forecasting trend industri, isu, dan tantangan yang berdampak kepada perusahaan di masa yang akan datang; mengelola secara efektif asset, modal dan budget perusahaan agar memberikan tingkat return yang optimal, dalam berbagai program kerja yang dijalankan
                </td>
            </tr>
            <tr>
                <td class="text-center">4</td>
                <td>
                    Memprediksi trend bisnis industri
                </td>
                <td>
                    Memberikan masukan dalam pembuatan rencana dan strategi bisnis perusahaan dan peluang potensial untuk produk dan layanan perusahaan yang selaras dengan visi dan misi.
                    Membuat visi yang inspiratif sebagai titik tolak semua aktivitas yang akan dilakukan oleh organisasi
                </td>
            </tr>
            <tr>
                <td class="text-center">5</td>
                <td>
                    Mengarahkan bisnis startegi perusahaan
                </td>
                <td>
                    Mengarahkan organisasi untuk mengantisipasi isu dan tantangan di masa depan, yang akan berpengaruh terhadap lingkungan bisnis dari organisasi.
                    Mengembangkan ide-ide baru yang akan menciptakan keunggulan kompetitif bagi perusahaan (trendsetter) dan membuka peluang bisnis baru, serta membuat model konseptual untuk aplikasi bisnis, berdasarkan pemahaman atas trend industri di masa yang akan datang
                </td>
            </tr><?php
        } ?>
    </tbody>
</table>