<table class="table table-bordered table-responsive table-hover">
    <thead>
        <tr>
            <td class="text-center">Skor</td>
            <td>PERILAKU KUNCI</td>
            <td>
                <strong>FOKUS PADA PELANGGAN</strong><br />
                Kemampuan untuk melayani konsumen (eksternal/internal) dengan melebihi harapan dengan cara memahami, memenuhi, mempredikasi dan memelihara kebutuhan yang bersifat mendesak dan jangka panjang demi membangun hubungan dan kepuasan konsumen
            </td>
        </tr>
    </thead>
    <tbody><?php
        if($_GET['jenjang'] <= 2){ ?>
            <tr>
                <td class="text-center">1</td>
                <td>
                    Melaksanakan pelayanan
                </td>
                <td>
                    Mampu memahami dan memenuhi kebutuhan konsumen.
                    Mengkomunikasikan informasi dengan antusias, ramah dan menyenangkan
                </td>
            </tr>
            <tr>
                <td class="text-center">2</td>
                <td>
                    Menjalin hubungan pelayanan
                </td>
                <td>
                    Memberikan informasi actual mengenai produk yang relevan dengan konsumen.
                    Membuat proses interaksi dengan konsumen nyaman, aman dan bersahabat. 
                </td>
            </tr>
            <tr>
                <td class="text-center">3</td>
                <td>
                    Memelihara konsumen
                </td>
                <td>
                    Mencari infromasi mengenai permasalahan dan kebutuhan konsumen sebagai dasar untuk memenuhi kebutuhan konsumen.
                    Memelihara kebutuhan konsumen dengan berpedoman pada asas pelayanan 
                </td>
            </tr>
            <tr>
                <td class="text-center">4</td>
                <td>
                    Menindaklanjuti kebutuhan konsumen
                </td>
                <td>
                    Mengusulkan penyelesaian masalah sesuai dengan kebutuhan konsumen.
                    Menindaklanjuti dan memonitor secara relevan permasalahan konsumen jika berada pada periode kritis
                </td>
            </tr>
            <tr>
                <td class="text-center">5</td>
                <td>
                    Mengevaluasi pelaksanaan pelayanan
                </td>
                <td>
                    Meningkatkan hubungan yang intens dengan pelanggan untuk mengetahui informasi lebih mengenai pelanggan sehingga mendapatkan pelanggan baru (keluarga dan kolega)
                </td>
            </tr><?php
        }elseif($_GET['jenjang'] == 3 OR $_GET['jenjang'] == 4){ ?>
            <tr>
                <td class="text-center">1</td>
                <td>
                    Melaksanakan pelayanan
                </td>
                <td>
                    Mengkomunikasikan informasi dengan antusias, ramah dan menyenangkan
                </td>
            </tr>
            <tr>
                <td class="text-center">2</td>
                <td>
                    Menjalin hubungan pelayanan
                </td>
                <td>
                    Memberikan informasi actual mengenai produk yang relevan dengan konsumen.
                    Membuat proses interaksi dengan konsumen nyaman, aman dan bersahabat. 
                </td>
            </tr>
            <tr>
                <td class="text-center">3</td>
                <td>
                    Memelihara konsumen
                </td>
                <td>
                    Mencari infromasi mengenai permasalahan dan kebutuhan konsumen sebagai dasar untuk memenuhi kebutuhan konsumen.
                    Memelihara kebutuhan konsumen dengan berpedoman pada asas pelayanan 
                </td>
            </tr>
            <tr>
                <td class="text-center">4</td>
                <td>
                    Menindaklanjuti kebutuhan konsumen
                </td>
                <td>
                    Mengusulkan penyelesaian masalah sesuai dengan kebutuhan konsumen.
                    Menindaklanjuti dan memonitor secara relevan permasalahan konsumen jika berada pada periode kritis
                </td>
            </tr>
            <tr>
                <td class="text-center">5</td>
                <td>
                    Mengevaluasi pelaksanaan pelayanan
                </td>
                <td>
                    Meningkatkan hubungan yang intens dengan pelanggan untuk mengetahui informasi lebih mengenai pelanggan sehingga mendapatkan pelanggan baru (keluarga dan kolega).
                    Mengidentifikasi  dan menganalisa harapan dan kebutuhan pelanggan
                </td>
            </tr><?php
        }elseif($_GET['jenjang'] == 5 OR $_GET['jenjang'] == 6){ ?>
            <tr>
                <td class="text-center">1</td>
                <td>
                    Memelihara konsumen
                </td>
                <td>
                    Memelihara kebutuhan konsumen dengan berpedoman pada asas pelayanan
                </td>
            </tr>
            <tr>
                <td class="text-center">2</td>
                <td>
                    Penyelesaian masalah konsumen
                </td>
                <td>
                    Mengusulkan penyelesaian masalah sesuai dengan kebutuhan konsumen
                </td>
            </tr>
            <tr>
                <td class="text-center">3</td>
                <td>
                    Menindaklanjuti kebutuhan konsumen
                </td>
                <td>
                    Menindaklanjuti dan memonitor secara relevan permasalahan konsumen jika berada pada periode kritis 
                </td>
            </tr>
            <tr>
                <td class="text-center">4</td>
                <td>
                    Mengevaluasi pelaksanaan pelayanan
                </td>
                <td>
                    Meningkatkan hubungan yang intens dengan pelanggan untuk mengetahui informasi lebih mengenai pelanggan sehingga mendapatkan pelanggan baru (keluarga dan kolega).
                    Mengidentifikasi dan menganalisa harapan dan kebutuhan pelanggan
                </td>
            </tr>
            <tr>
                <td class="text-center">5</td>
                <td>
                    Memiliki perspektif jangka panjang dalam pelayanan
                </td>
                <td>
                    Merencanakan tindakan yang relevan untuk memenuhi dan meningkatkan kepuasan pelanggan.
                    Mengarahkan pelanggan untuk menggunakan jasa dan layanan secara berulang.
                </td>
            </tr><?php
        }else{ ?>
            <tr>
                <td class="text-center">1</td>
                <td>
                    Memelihara konsumen
                </td>
                <td>
                    Memelihara kebutuhan konsumen dengan berpedoman pada asas pelayanan
                </td>
            </tr>
            <tr>
                <td class="text-center">2</td>
                <td>
                    Penyelesaian masalah konsumen
                </td>
                <td>
                    Mengusulkan penyelesaian masalah sesuai dengan kebutuhan konsumen
                </td>
            </tr>
            <tr>
                <td class="text-center">3</td>
                <td>
                    Menindaklanjuti kebutuhan konsumen
                </td>
                <td>
                    Menindaklanjuti dan memonitor secara relevan permasalahan konsumen jika berada pada periode kritis.
                    Meningkatkan hubungan yang intens dengan pelanggan untuk mengetahui informasi lebih mengenai pelanggan sehingga mendapatkan pelanggan baru (keluarga dan kolega) 
                </td>
            </tr>
            <tr>
                <td class="text-center">4</td>
                <td>
                    Mengevaluasi pelaksanaan pelayanan
                </td>
                <td>
                    Mengidentifikasi  dan menganalisa harapan dan kebutuhan pelanggan.
                    Merencanakan tindakan yang relevan untuk memenuhi dan meningkatkan kepuasan pelanggan
                </td>
            </tr>
            <tr>
                <td class="text-center">5</td>
                <td>
                    Memiliki perspektif jangka panjang dalam pelayanan
                </td>
                <td>
                    Mengarahkan pelanggan untuk menggunakan jasa dan layanan secara berulang.
                    Membangun metode pelayanan yang baru untuk memenuhi kebutuhan jangka panjang pelanggan.
                </td>
            </tr><?php
        } ?>
    </tbody>
</table>