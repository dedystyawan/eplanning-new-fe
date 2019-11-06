<?php
function encrypt_decrypt($action, $string)
{
  $output = false;
  $encrypt_method = "AES-256-CBC";
  $secret_key = 'This is my secret key';
  $secret_iv = 'This is my secret iv';
  // hash
  $key = hash('sha256', $secret_key);

  // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
  $iv = substr(hash('sha256', $secret_iv), 0, 16);
  if ($action == 'encrypt') {
    $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
    $output = base64_encode($output);
  } else if ($action == 'decrypt') {
    $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
  }
  return $output;
}

function parse_stat($status)
{
  if ($status == 1) {
    $parse =  "Belum Dilaksanakan";
  } elseif ($status == 2) {
    $parse =  "Dalam Proses";
  } elseif ($status == 3 || $status == 4 || $status == 5) {
    $parse =  "selesai";
  }
  return $parse;
}

function parse_stat_selesai($status)
{
  if ($status == 1) {
    $parse = "";
  } elseif ($status == 2) {
    $parse = "";
  } elseif ($status == 3) {
    $parse = "Selesai Lebih Cepat";
  } elseif ($status == 4) {
    $parse = "Selesai Tepat Waktu";
  } elseif ($status == 5) {
    $parse = "Selesai Terlambat";
  }
  return $parse;
}



function parse_bulan($dt)
{
  if ($dt == 1) {
    $parse = "Januari";
  } elseif ($dt == 2) {
    $parse = "Februari";
  } elseif ($dt == 3) {
    $parse = "Maret";
  } elseif ($dt == 4) {
    $parse = "April";
  } elseif ($dt == 5) {
    $parse = "Mei";
  } elseif ($dt == 6) {
    $parse = "Juni";
  } elseif ($dt == 7) {
    $parse = "Juli";
  } elseif ($dt == 8) {
    $parse = "Agustus";
  } elseif ($dt == 9) {
    $parse = "September";
  } elseif ($dt == 10) {
    $parse = "Oktober";
  } elseif ($dt == 11) {
    $parse = "November";
  } elseif ($dt == 12) {
    $parse = "Desember";
  } else {
    $parse = "-";
  }
  return $parse;
}

function parse_bulan_short($dt)
{
  if ($dt == 1) {
    $parse = "Jan";
  } elseif ($dt == 2) {
    $parse = "Feb";
  } elseif ($dt == 3) {
    $parse = "Mar";
  } elseif ($dt == 4) {
    $parse = "Apr";
  } elseif ($dt == 5) {
    $parse = "Mei";
  } elseif ($dt == 6) {
    $parse = "Jun";
  } elseif ($dt == 7) {
    $parse = "Jul";
  } elseif ($dt == 8) {
    $parse = "Ags";
  } elseif ($dt == 9) {
    $parse = "Sep";
  } elseif ($dt == 10) {
    $parse = "Okt";
  } elseif ($dt == 11) {
    $parse = "Nov";
  } elseif ($dt == 12) {
    $parse = "Des";
  } else {
    $parse = "-";
  }
  return $parse;
}
