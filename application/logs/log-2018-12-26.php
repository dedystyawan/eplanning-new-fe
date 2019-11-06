<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-12-26 07:46:01 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 07:46:01 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 07:46:01 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 07:46:01 --> 404 Page Not Found: Faviconico/index
ERROR - 2018-12-26 07:46:06 --> Severity: Notice --> Undefined index: unit_kerja_id /var/www/magang.bankjateng.co.id/application/controllers/Main.php 87
ERROR - 2018-12-26 07:52:34 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 07:52:34 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 07:52:34 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 07:53:09 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 07:53:09 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 07:53:09 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 07:53:16 --> Severity: Notice --> Undefined index: unit_kerja_id /var/www/magang.bankjateng.co.id/application/controllers/Main.php 87
ERROR - 2018-12-26 07:55:49 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 07:55:49 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 07:55:52 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 07:55:52 --> 404 Page Not Found: Faviconico/index
ERROR - 2018-12-26 08:00:56 --> Severity: Warning --> unlink(./assets/qrcode-image/71.png): Permission denied /var/www/magang.bankjateng.co.id/application/views/module/peserta/aktivasi.php 4
ERROR - 2018-12-26 08:00:56 --> Severity: Warning --> imagepng(./assets/qrcode-image/71.png): failed to open stream: Permission denied /var/www/magang.bankjateng.co.id/libraries/qrcode/qrimage.php 43
ERROR - 2018-12-26 08:01:08 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 08:01:08 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 08:01:08 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 08:01:39 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 08:01:39 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 08:01:39 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 08:01:54 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 08:01:54 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 08:01:54 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 08:02:08 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 08:02:08 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 08:02:08 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 08:08:23 --> Severity: Compile Error --> Cannot redeclare Hak::payroll_export() /var/www/magang.bankjateng.co.id/application/controllers/Hak.php 56
ERROR - 2018-12-26 08:22:35 --> Query error: Unknown column 'a.unit_kerja_id' in 'where clause' - Invalid query: SELECT
(SELECT unit FROM unit_kerja WHERE kode_unit=a.`unit_kerja_id` LIMIT 1) AS unit_kerja,
SUM(pend_pokok) AS pend_pokok,
SUM(pend_tunj) AS pend_tunj,
SUM(uang_makan) AS uang_makan,
SUM(pend_tunj_bpjs_ktn) AS pend_tunj_bpjs_ktn,
SUM(pend_tunj_bpjs_kes) AS pend_tunj_bpjs_kes,
SUM(pajak) AS pajak,
SUM(take_home_pay) AS take_home_pay
FROM payroll where tahun='2018' and bulan ='12' and nomor_register in (select nomor_register from view_peserta_magang where DATE_FORMAT(tgl_masuk,'%d')='03') GROUP BY unit_kerja_id order by unit_kerja_id asc;
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:22:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 50
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 51
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 52
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 53
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 54
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 56
ERROR - 2018-12-26 08:24:49 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 57
ERROR - 2018-12-26 08:38:14 --> Severity: Notice --> Undefined property: stdClass::$kode_rak /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:38:14 --> Severity: Notice --> Undefined property: stdClass::$kode_rak /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:38:14 --> Severity: Notice --> Undefined property: stdClass::$kode_rak /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:38:14 --> Severity: Notice --> Undefined property: stdClass::$kode_rak /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:38:14 --> Severity: Notice --> Undefined property: stdClass::$kode_rak /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:38:14 --> Severity: Notice --> Undefined property: stdClass::$kode_rak /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:38:14 --> Severity: Notice --> Undefined property: stdClass::$kode_rak /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:38:14 --> Severity: Notice --> Undefined property: stdClass::$kode_rak /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:38:14 --> Severity: Notice --> Undefined property: stdClass::$kode_rak /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:38:14 --> Severity: Notice --> Undefined property: stdClass::$kode_rak /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:38:14 --> Severity: Notice --> Undefined property: stdClass::$kode_rak /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:38:14 --> Severity: Notice --> Undefined property: stdClass::$kode_rak /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:38:14 --> Severity: Notice --> Undefined property: stdClass::$kode_rak /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:38:14 --> Severity: Notice --> Undefined property: stdClass::$kode_rak /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:38:14 --> Severity: Notice --> Undefined property: stdClass::$kode_rak /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:38:14 --> Severity: Notice --> Undefined property: stdClass::$kode_rak /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:38:14 --> Severity: Notice --> Undefined property: stdClass::$kode_rak /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:38:14 --> Severity: Notice --> Undefined property: stdClass::$kode_rak /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:38:14 --> Severity: Notice --> Undefined property: stdClass::$kode_rak /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:38:14 --> Severity: Notice --> Undefined property: stdClass::$kode_rak /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:38:14 --> Severity: Notice --> Undefined property: stdClass::$kode_rak /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:38:14 --> Severity: Notice --> Undefined property: stdClass::$kode_rak /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:38:14 --> Severity: Notice --> Undefined property: stdClass::$kode_rak /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:38:14 --> Severity: Notice --> Undefined property: stdClass::$kode_rak /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:38:14 --> Severity: Notice --> Undefined property: stdClass::$kode_rak /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:38:14 --> Severity: Notice --> Undefined property: stdClass::$kode_rak /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:38:14 --> Severity: Notice --> Undefined property: stdClass::$kode_rak /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:38:14 --> Severity: Notice --> Undefined property: stdClass::$kode_rak /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:38:14 --> Severity: Notice --> Undefined property: stdClass::$kode_rak /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:38:14 --> Severity: Notice --> Undefined property: stdClass::$kode_rak /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:38:14 --> Severity: Notice --> Undefined property: stdClass::$kode_rak /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:38:14 --> Severity: Notice --> Undefined property: stdClass::$kode_rak /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:38:14 --> Severity: Notice --> Undefined property: stdClass::$kode_rak /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:38:14 --> Severity: Notice --> Undefined property: stdClass::$kode_rak /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:38:14 --> Severity: Notice --> Undefined property: stdClass::$kode_rak /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:38:14 --> Severity: Notice --> Undefined property: stdClass::$kode_rak /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:38:14 --> Severity: Notice --> Undefined property: stdClass::$kode_rak /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:38:14 --> Severity: Notice --> Undefined property: stdClass::$kode_rak /var/www/magang.bankjateng.co.id/application/views/module/output/payroll_percabang.php 55
ERROR - 2018-12-26 08:43:16 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 08:43:16 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 08:43:27 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 08:43:28 --> 404 Page Not Found: Faviconico/index
ERROR - 2018-12-26 08:47:56 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 08:47:56 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 08:48:16 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 08:52:36 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 08:52:36 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 08:52:36 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 08:53:39 --> Severity: Notice --> Undefined variable: title /var/www/magang.bankjateng.co.id/application/views/module/rating/nilai.php 6
ERROR - 2018-12-26 08:53:39 --> Severity: Notice --> Undefined variable: sum_all /var/www/magang.bankjateng.co.id/application/views/module/rating/nilai.php 189
ERROR - 2018-12-26 08:53:40 --> 404 Page Not Found: Pembimbing/changepassword
ERROR - 2018-12-26 08:53:42 --> Severity: Notice --> Undefined variable: title /var/www/magang.bankjateng.co.id/application/views/module/rating/nilai.php 6
ERROR - 2018-12-26 08:53:42 --> Severity: Notice --> Undefined variable: sum_all /var/www/magang.bankjateng.co.id/application/views/module/rating/nilai.php 189
ERROR - 2018-12-26 08:57:29 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 08:57:29 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 08:57:29 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 08:57:36 --> Severity: Notice --> Undefined index: unit_kerja_id /var/www/magang.bankjateng.co.id/application/controllers/Main.php 87
ERROR - 2018-12-26 08:58:03 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 08:58:03 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 08:58:04 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 09:00:23 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/hak/nota.php 67
ERROR - 2018-12-26 09:00:23 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/hak/nota.php 67
ERROR - 2018-12-26 09:00:23 --> Severity: Notice --> Trying to get property of non-object /var/www/magang.bankjateng.co.id/application/views/module/hak/nota.php 67
ERROR - 2018-12-26 09:44:59 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 09:44:59 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 09:44:59 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 09:49:17 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 09:49:17 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 09:49:17 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 09:49:23 --> Severity: Notice --> Undefined index: unit_kerja_id /var/www/magang.bankjateng.co.id/application/controllers/Main.php 87
ERROR - 2018-12-26 09:53:28 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 09:53:28 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 09:53:43 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 09:53:44 --> 404 Page Not Found: Faviconico/index
ERROR - 2018-12-26 10:11:00 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 10:11:00 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 10:11:01 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 10:11:07 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 10:11:07 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 10:11:07 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 10:11:21 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 10:11:21 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 10:11:21 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 10:16:23 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 10:16:23 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 10:16:23 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 10:42:53 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 10:42:53 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 10:43:09 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 11:50:49 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 11:50:50 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 11:50:52 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 11:50:57 --> 404 Page Not Found: Faviconico/index
ERROR - 2018-12-26 12:56:33 --> 404 Page Not Found: Assets/file
ERROR - 2018-12-26 12:56:36 --> 404 Page Not Found: Assets/file
ERROR - 2018-12-26 13:08:11 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 13:08:11 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 13:08:12 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 13:08:12 --> 404 Page Not Found: Faviconico/index
ERROR - 2018-12-26 13:10:09 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 13:10:09 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 13:10:09 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 13:15:26 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 13:15:26 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 13:15:26 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 14:10:02 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 14:10:02 --> 404 Page Not Found: Assets/grocery-crud
ERROR - 2018-12-26 14:17:22 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 14:17:22 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 14:17:22 --> 404 Page Not Found: Faviconico/index
ERROR - 2018-12-26 14:20:02 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 14:20:02 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 14:20:15 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 14:24:47 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 14:24:47 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 14:24:47 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 14:24:47 --> 404 Page Not Found: Faviconico/index
ERROR - 2018-12-26 14:26:22 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 14:26:22 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 14:26:22 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 14:26:22 --> 404 Page Not Found: Faviconico/index
ERROR - 2018-12-26 14:26:27 --> Severity: Notice --> Undefined index: unit_kerja_id /var/www/magang.bankjateng.co.id/application/controllers/Main.php 87
ERROR - 2018-12-26 14:31:21 --> 404 Page Not Found: Assets/grocery-crud
ERROR - 2018-12-26 14:31:21 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 14:32:46 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 14:32:46 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 14:32:46 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 14:32:47 --> 404 Page Not Found: Faviconico/index
ERROR - 2018-12-26 14:32:56 --> Severity: Notice --> Undefined index: unit_kerja_id /var/www/magang.bankjateng.co.id/application/controllers/Main.php 87
ERROR - 2018-12-26 14:32:58 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 14:33:03 --> 404 Page Not Found: Assets/grocery-crud
ERROR - 2018-12-26 14:33:03 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 14:34:17 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 14:34:17 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 14:34:17 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 14:34:23 --> 404 Page Not Found: Faviconico/index
ERROR - 2018-12-26 14:35:02 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 14:35:02 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 14:35:02 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 14:35:02 --> 404 Page Not Found: Faviconico/index
ERROR - 2018-12-26 14:35:07 --> Severity: Notice --> Undefined index: unit_kerja_id /var/www/magang.bankjateng.co.id/application/controllers/Main.php 87
ERROR - 2018-12-26 14:36:53 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 14:36:53 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 14:36:53 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 14:36:53 --> 404 Page Not Found: Faviconico/index
ERROR - 2018-12-26 14:36:58 --> Severity: Notice --> Undefined index: unit_kerja_id /var/www/magang.bankjateng.co.id/application/controllers/Main.php 87
ERROR - 2018-12-26 14:45:11 --> Query error: Table 'sim_magang.view_uang_makan' doesn't exist - Invalid query: SELECT *
FROM `view_uang_makan`
WHERE `nomor_register` = '50'
AND `bulan` = '12'
AND `tahun` = '2018'
ERROR - 2018-12-26 14:45:11 --> Query error: Table 'sim_magang.view_uang_makan' doesn't exist - Invalid query: SELECT *
FROM `view_uang_makan`
WHERE `nomor_register` = '82'
AND `bulan` = '12'
AND `tahun` = '2018'
ERROR - 2018-12-26 14:45:11 --> Query error: Table 'sim_magang.view_uang_makan' doesn't exist - Invalid query: SELECT *
FROM `view_uang_makan`
WHERE `nomor_register` = '4'
AND `bulan` = '12'
AND `tahun` = '2018'
ERROR - 2018-12-26 15:06:48 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 15:06:48 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 15:06:57 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 15:07:13 --> 404 Page Not Found: Faviconico/index
ERROR - 2018-12-26 15:07:13 --> 404 Page Not Found: Faviconico/index
ERROR - 2018-12-26 15:33:10 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 15:33:10 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 15:33:10 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 15:33:12 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 15:33:12 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 15:33:12 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 15:33:22 --> Severity: Notice --> Undefined index: unit_kerja_id /var/www/magang.bankjateng.co.id/application/controllers/Main.php 87
ERROR - 2018-12-26 15:39:46 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 15:39:47 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 15:39:47 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 15:42:14 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 15:42:14 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 15:42:15 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 15:57:54 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 15:57:54 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 15:57:56 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 15:58:02 --> 404 Page Not Found: Faviconico/index
ERROR - 2018-12-26 16:01:51 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 16:01:51 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 16:01:52 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 16:01:52 --> 404 Page Not Found: Faviconico/index
ERROR - 2018-12-26 16:02:23 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 16:02:23 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 16:02:24 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 16:03:14 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 16:03:14 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 16:03:14 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 16:07:50 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 16:07:50 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 16:07:50 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 17:15:25 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 17:15:25 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 17:15:37 --> 404 Page Not Found: Faviconico/index
ERROR - 2018-12-26 17:20:25 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 17:20:25 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 17:20:25 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 17:20:26 --> 404 Page Not Found: Faviconico/index
ERROR - 2018-12-26 17:28:00 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 17:28:00 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 17:28:02 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 17:28:07 --> 404 Page Not Found: Faviconico/index
ERROR - 2018-12-26 17:31:38 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 17:31:38 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 17:31:40 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 17:31:40 --> 404 Page Not Found: Faviconico/index
ERROR - 2018-12-26 17:31:40 --> 404 Page Not Found: Faviconico/index
ERROR - 2018-12-26 17:43:45 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 17:43:45 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 17:43:57 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 17:44:51 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 17:44:51 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 17:44:56 --> 404 Page Not Found: Faviconico/index
ERROR - 2018-12-26 17:44:56 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 17:45:03 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 17:45:03 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 17:45:04 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 17:45:26 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 17:45:26 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 17:45:26 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 17:45:36 --> 404 Page Not Found: Faviconico/index
ERROR - 2018-12-26 17:45:45 --> 404 Page Not Found: Assets/file
ERROR - 2018-12-26 17:45:45 --> 404 Page Not Found: Assets/file
ERROR - 2018-12-26 17:45:48 --> 404 Page Not Found: Assets/file
ERROR - 2018-12-26 17:45:49 --> 404 Page Not Found: Assets/file
ERROR - 2018-12-26 17:46:07 --> 404 Page Not Found: Assets/file
ERROR - 2018-12-26 17:46:07 --> 404 Page Not Found: Assets/file
ERROR - 2018-12-26 17:46:16 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 17:46:16 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 17:46:16 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 17:47:06 --> 404 Page Not Found: Faviconico/index
ERROR - 2018-12-26 17:48:32 --> 404 Page Not Found: Assets/file
ERROR - 2018-12-26 17:48:32 --> 404 Page Not Found: Assets/file
ERROR - 2018-12-26 17:50:23 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 17:50:23 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 17:50:25 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 17:50:29 --> 404 Page Not Found: Faviconico/index
ERROR - 2018-12-26 17:50:44 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 17:50:55 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 17:50:56 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 17:51:02 --> 404 Page Not Found: Faviconico/index
ERROR - 2018-12-26 17:51:02 --> 404 Page Not Found: Faviconico/index
ERROR - 2018-12-26 17:51:54 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 17:51:54 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 17:51:54 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 17:52:20 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 17:52:20 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 17:52:22 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 17:52:25 --> 404 Page Not Found: Faviconico/index
ERROR - 2018-12-26 17:52:29 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 17:52:29 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 17:52:29 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 17:52:48 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 17:52:48 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 17:52:50 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 17:53:26 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 17:53:26 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 17:53:26 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 17:54:51 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 17:54:51 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 17:54:51 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 17:55:42 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 17:55:42 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 17:55:44 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 17:55:47 --> 404 Page Not Found: Faviconico/index
ERROR - 2018-12-26 17:55:58 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 17:55:58 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 17:55:58 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 17:56:20 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 17:56:20 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 17:56:20 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 17:57:50 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 17:57:50 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 17:57:50 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 17:59:55 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 17:59:55 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 17:59:56 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:00:47 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:00:47 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:00:47 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:00:47 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:00:48 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:00:50 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:00:56 --> 404 Page Not Found: Faviconico/index
ERROR - 2018-12-26 18:00:56 --> 404 Page Not Found: Faviconico/index
ERROR - 2018-12-26 18:01:14 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:01:14 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:01:14 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:01:16 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:01:16 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:01:16 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:01:18 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:01:18 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:01:18 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:01:31 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:01:31 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:01:31 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:01:37 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:01:37 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:01:37 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:01:51 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:01:51 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:01:51 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:01:52 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:01:52 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:01:52 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:02:11 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:02:11 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:02:11 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:03:16 --> Severity: Warning --> unlink(./assets/qrcode-image/4.png): Permission denied /var/www/magang.bankjateng.co.id/application/views/module/peserta/aktivasi.php 4
ERROR - 2018-12-26 18:03:16 --> Severity: Warning --> imagepng(./assets/qrcode-image/4.png): failed to open stream: Permission denied /var/www/magang.bankjateng.co.id/libraries/qrcode/qrimage.php 43
ERROR - 2018-12-26 18:04:00 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:04:00 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:04:00 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:04:01 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:04:01 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:04:01 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:06:38 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:06:38 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:06:50 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:09:19 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:09:19 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:09:19 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:10:46 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:10:46 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:10:52 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:10:52 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:10:52 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:11:13 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:11:13 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:11:13 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:11:47 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:11:47 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:11:47 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:12:00 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:12:00 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:12:00 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:12:55 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:12:55 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:13:02 --> 404 Page Not Found: Faviconico/index
ERROR - 2018-12-26 18:13:02 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:13:07 --> Severity: Warning --> unlink(./assets/qrcode-image/51.png): Permission denied /var/www/magang.bankjateng.co.id/application/views/module/peserta/aktivasi.php 4
ERROR - 2018-12-26 18:13:07 --> Severity: Warning --> imagepng(./assets/qrcode-image/51.png): failed to open stream: Permission denied /var/www/magang.bankjateng.co.id/libraries/qrcode/qrimage.php 43
ERROR - 2018-12-26 18:13:29 --> Severity: Warning --> unlink(./assets/qrcode-image/51.png): Permission denied /var/www/magang.bankjateng.co.id/application/views/module/peserta/aktivasi.php 4
ERROR - 2018-12-26 18:13:29 --> Severity: Warning --> imagepng(./assets/qrcode-image/51.png): failed to open stream: Permission denied /var/www/magang.bankjateng.co.id/libraries/qrcode/qrimage.php 43
ERROR - 2018-12-26 18:13:40 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:13:40 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:13:41 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:15:20 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:15:20 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:15:43 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:15:43 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:16:35 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:16:35 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:16:35 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:16:57 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:16:57 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:16:57 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:19:56 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:19:56 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:19:57 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:19:59 --> 404 Page Not Found: Faviconico/index
ERROR - 2018-12-26 18:20:45 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:20:45 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:21:06 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:21:06 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:21:21 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:21:21 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:21:39 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:21:40 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:21:56 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:21:56 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:22:17 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:22:17 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:22:17 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:24:18 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:24:18 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:24:18 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:24:36 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:24:36 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:24:56 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:24:56 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:26:13 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:26:13 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:26:33 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:26:33 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:26:58 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:26:58 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:26:58 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:27:16 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:27:16 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:28:01 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:28:01 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:28:01 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:29:34 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:29:34 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:29:34 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:29:34 --> 404 Page Not Found: Faviconico/index
ERROR - 2018-12-26 18:30:05 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:36:38 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:36:38 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:36:41 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:39:45 --> 404 Page Not Found: Assets/file
ERROR - 2018-12-26 18:39:46 --> 404 Page Not Found: Assets/file
ERROR - 2018-12-26 18:45:24 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:45:24 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:45:24 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 18:45:24 --> 404 Page Not Found: Faviconico/index
ERROR - 2018-12-26 18:45:55 --> 404 Page Not Found: Assets/file
ERROR - 2018-12-26 18:45:55 --> 404 Page Not Found: Assets/file
ERROR - 2018-12-26 19:00:20 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:00:20 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:00:20 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:00:41 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:00:41 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:00:43 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:01:03 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:01:03 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:01:11 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:01:54 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:01:54 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:02:12 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:02:12 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:02:43 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:02:43 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:04:26 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:04:26 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:05:33 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:05:33 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:13:36 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:13:36 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:13:37 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:14:48 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:14:48 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:14:49 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:15:39 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:15:39 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:15:39 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:16:50 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:16:50 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:16:50 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:17:44 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:17:45 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:17:45 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:18:46 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:18:46 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:18:47 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:20:16 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:20:16 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:20:20 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:23:42 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:23:42 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:23:42 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:27:20 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:27:20 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:27:21 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:27:23 --> 404 Page Not Found: Faviconico/index
ERROR - 2018-12-26 19:27:23 --> 404 Page Not Found: Faviconico/index
ERROR - 2018-12-26 19:27:44 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:27:44 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:27:44 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:33:16 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:33:16 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:33:16 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:33:16 --> 404 Page Not Found: Faviconico/index
ERROR - 2018-12-26 19:33:16 --> 404 Page Not Found: Faviconico/index
ERROR - 2018-12-26 19:33:31 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:33:31 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:33:31 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:42:42 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:42:42 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:42:49 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:42:56 --> 404 Page Not Found: Faviconico/index
ERROR - 2018-12-26 19:42:56 --> 404 Page Not Found: Faviconico/index
ERROR - 2018-12-26 19:43:03 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:43:03 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:43:04 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:50:01 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:50:01 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:50:04 --> 404 Page Not Found: Faviconico/index
ERROR - 2018-12-26 19:50:04 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:51:04 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:51:04 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:51:04 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:51:59 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:51:59 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:51:59 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:53:19 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:53:19 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 19:53:19 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 20:10:25 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 20:10:25 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 20:10:25 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 20:15:19 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 20:15:19 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 20:15:19 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 20:23:29 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 20:23:29 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 20:23:30 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 20:23:35 --> 404 Page Not Found: Faviconico/index
ERROR - 2018-12-26 20:31:15 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 20:31:15 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 20:33:33 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 20:33:33 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 20:33:33 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 20:37:44 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 20:37:44 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 20:37:45 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 20:37:48 --> 404 Page Not Found: Faviconico/index
ERROR - 2018-12-26 20:37:48 --> 404 Page Not Found: Faviconico/index
ERROR - 2018-12-26 20:40:45 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 20:40:47 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 20:42:48 --> 404 Page Not Found: Faviconico/index
ERROR - 2018-12-26 20:42:48 --> 404 Page Not Found: Faviconico/index
ERROR - 2018-12-26 20:48:21 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 20:48:21 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 20:48:21 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 20:49:53 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 20:49:53 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 20:49:53 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 20:50:51 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 20:50:51 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 20:50:51 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 21:09:58 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 21:09:58 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 21:09:58 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 21:15:58 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 21:15:58 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 21:15:58 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 22:00:02 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 22:00:02 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 22:00:05 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 22:00:11 --> 404 Page Not Found: Faviconico/index
ERROR - 2018-12-26 22:19:02 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 22:19:02 --> 404 Page Not Found: Assets/vendor
ERROR - 2018-12-26 22:19:02 --> 404 Page Not Found: Assets/vendor
