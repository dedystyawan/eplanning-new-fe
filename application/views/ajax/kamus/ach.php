<table class="table table-bordered table-responsive table-hover" style="border: 1px;" border="1">
    <thead>
        <tr>
            <td class="text-center">Skor</td>
            <td>PERILAKU KUNCI</td>
            <td>
                <strong>HASRAT BERPRESTASI</strong><br />
                Derajat kepedulian seseorang terhadap pekerjaannya sehingga ia terdorong berusaha untuk bekerja dengan lebih baik atau di atas standar.
            </td>
        </tr>
    </thead>
    <tbody><?php
        if($_GET['jenjang'] <= 2){ ?>
            <tr>
                <td class="text-center">1</td>
                <td>
                    Bekerja sesuai dengan standar
                </td>
                <td>
                    Mengerjakan pekerjaan sesuai dengan standar perusahaan
                </td>
            </tr>
            <tr>
                <td class="text-center">2</td>
                <td>
                    Berusaha mencapai standar
                </td>
                <td>
                    Mendorong diri untuk mencapai standar/target yang sudah ditentukan 
                </td>
            </tr>
            <tr>
                <td class="text-center">3</td>
                <td>
                    Menetapkan tujuan
                </td>
                <td>
                    Mencapai standar kerja seperti orang lain.
                    Mampu menetapkan ukuran standar kerja pribadi yang menantang.
                </td>
            </tr>
            <tr>
                <td class="text-center">4</td>
                <td>
                    Mencapai standar pribadi
                </td>
                <td>
                    Menunjukan hasil kerja yang melebihi standar perusahaan. 
                    Menentukan keputusan tingkat kepentingan kerja berdasarkan prioritas.
                </td>
            </tr>
            <tr>
                <td class="text-center">5</td>
                <td>
                    Menganalisa proses dan  hasil pencapaian
                </td>
                <td>
                    Menganalisis segala tindakan dan keputusannya berdasarkan pertimbangan biaya–manfaat (Cost Benefit Analysis)
                </td>
            </tr><?php
        }elseif($_GET['jenjang'] == 3 OR $_GET['jenjang'] == 4){ ?>
            <tr>
                <td class="text-center">1</td>
                <td>
                    Bekerja sesuai dengan standar
                </td>
                <td>
                    Mengerjakan pekerjaan sesuai dengan standar perusahaan
                </td>
            </tr>
            <tr>
                <td class="text-center">2</td>
                <td>
                    Berusaha mencapai standar
                </td>
                <td>
                    Mendorong diri untuk mencapai standar/target yang sudah ditentukan.
                    Mencapai standar kerja seperti orang lain.
                </td>
            </tr>
            <tr>
                <td class="text-center">3</td>
                <td>
                    Mencapai standar pribadi
                </td>
                <td>
                    Mampu menetapkan ukuran standar kerja pribadi yang menantang. 
                    Menunjukan hasil kerja yang melebihi standar perusahaan
                </td>
            </tr>
            <tr>
                <td class="text-center">4</td>
                <td>
                    Menganalisa proses dan  hasil pencapaian
                </td>
                <td>
                    Menentukan keputusan tingkat kepentingan kerja berdasarkan prioritas.
                    Menganalisis segala tindakan dan keputusannya berdasarkan pertimbangan biaya–manfaat (Cost Benefit Analysis)
                </td>
            </tr>
            <tr>
                <td class="text-center">5</td>
                <td>
                    Mengevalusasi hasil kinerja
                </td>
                <td>
                    Mengevaluasi segala bentuk pencapaian standar kerja pribadi.
                    Memperbaiki metode/cara dalam mencapai standar kerja
                </td>
            </tr><?php
        }elseif($_GET['jenjang'] == 5 OR $_GET['jenjang'] == 6){ ?>
            <tr>
                <td class="text-center">1</td>
                <td>
                    Mencapai standar pribadi
                </td>
                <td>
                    Mampu menetapkan ukuran standar kerja pribadi yang menantang.
                    Menunjukan hasil kerja yang melebihi standar perusahaan
                </td>
            </tr>
            <tr>
                <td class="text-center">2</td>
                <td>
                    Menganalisa proses dan  hasil pencapaian
                </td>
                <td>
                    Menentukan keputusan tingkat kepentingan kerja berdasarkan prioritas.
                    Menganalisis segala tindakan dan keputusannya berdasarkan pertimbangan biaya–manfaat (Cost Benefit Analysis)
                </td>
            </tr>
            <tr>
                <td class="text-center">3</td>
                <td>
                    Mengevalusasi hasil capaian
                </td>
                <td>
                    Mengevaluasi segala bentuk pencapaian standar kerja pribadi.
                    Memperbaiki metode/cara dalam mencapai standar kerja 
                </td>
            </tr>
            <tr>
                <td class="text-center">4</td>
                <td>
                    Memanfaatkan sumber daya yang tersedia
                </td>
                <td>
                    Mengambil resiko bisnis dengan pertimbangan yang objektif.
                    Memanfaatkan sumber daya (dalam ketidakpastian) untuk meningkatkan performansi
                </td>
            </tr>
            <tr>
                <td class="text-center">5</td>
                <td>
                    Membuat metode kerja baru
                </td>
                <td>
                    Membuat cara baru yang efisien untuk melebihi hasil yang diharapkan.
                    Mengembangkan metode kerja baru yang efektif untuk mencapai hasil yang diharapkan 
                </td>
            </tr><?php
        }else{ ?>
            <tr>
                <td class="text-center">1</td>
                <td>
                    Melebihi standar perusahaan
                </td>
                <td>
                    Menunjukan hasil kerja yang melebihi standar perusahaan.
                    Menentukan keputusan tingkat kepentingan kerja berdasarkan prioritas
                </td>
            </tr>
            <tr>
                <td class="text-center">2</td>
                <td>
                    Mengevalusasi hasil capaian
                </td>
                <td>
                    Menganalisis segala tindakan dan keputusannya berdasarkan pertimbangan biaya–manfaat (Cost Benefit Analysis).
                    Mengevaluasi segala bentuk pencapaian standar kerja pribadi
                </td>
            </tr>
            <tr>
                <td class="text-center">3</td>
                <td>
                    Memanfaatkan sumber daya yang tersedia
                </td>
                <td>
                    Memperbaiki metode/cara dalam mencapai standar kerja. 
                    Mengambil resiko bisnis dengan pertimbangan yang objektif.
                    Memanfaatkan sumber daya (dalam ketidakpastian) untuk meningkatkan performansi.
                </td>
            </tr>
            <tr>
                <td class="text-center">4</td>
                <td>
                    Mengembangkan metode baru
                </td>
                <td>
                    Membuat cara baru yang efisien untuk melebihi hasil yang diharapkan.
                    Mengembangkan metode kerja baru yang efektif untuk mencapai hasil yang diharapkan.
                </td>
            </tr>
            <tr>
                <td class="text-center">5</td>
                <td>
                    Mengarahkan kegiatan pekerjaan
                </td>
                <td>
                    Mengarahkan kegiatan pekerjaan demi tercapaianya efektifitas kerja.
                    Mengontrol arah kegiatan pekerjaan untuk meminimalkan resiko bisnis.
                </td>
            </tr><?php
        } ?>
    </tbody>
</table>