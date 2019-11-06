<!DOCTYPE html>

<?php
$data           = $datas[0];
$unit_kerja_id  = $_SESSION['pegawai']->unit_kerja_id;
$alljson        = file_get_contents(IP_API."/master/all", false);
$all            = json_decode($alljson);
$subdivjson     = file_get_contents("http://10.66.10.40/api_v2/pegawai/prc_get_unit_kerja/$unit_kerja_id?api_key=prc", false);
$subdiv         = json_decode($subdivjson);
$pegsubdivjson  = file_get_contents("http://10.66.10.40/api_v2/pegawai/prc_get_pegawai_per_subdiv/B001DMR201?api_key=prc", false);
$pegsubdiv      = json_decode($pegsubdivjson);

?>



<!-- <?php
echo "<pre>";
echo "========================================================</br>";
print_r($datas);
echo "========================================================</br>";
//print_r($datas2);
echo "========================================================</br>";
echo "</pre>";


?> -->



<!--  jangan dihapus-->
<!-- tindak lanjut audit -->
<!-- <?php $dtAudit = array() ?>
<?php foreach ($all->allTLAudit as $key=> $dt) {
  if (array_search($dt->tindak_lanjut_id, array_column($data->rkf_tlaudit, 'tlAudit')) !== false) {
   $dtAudit['tlnama'][] = array($dt->tindak_lanjut_nama);
 }
} ?>

<?php foreach ($data->rkf_tlaudit as $dt){
  $dtAudit['tahun'][] = array($dt->tahunAudit);
} ?> --> 

<!-- anggaran -->
<!-- <?php $dtAnggaran = array() ?>
<?php foreach ($all->allPosBiaya as $key=> $dt) {
  if (array_search($dt->posbiaya_id, array_column($data->rkf_anggaran, 'posBiaya')) !== false) {
   $dtAnggaran['posBiaya'][] = array($dt->posbiaya_nama);
 }
} ?>

<?php foreach ($data->rkf_anggaran as $key => $dt){
 $dtAnggaran['coa'][] = array($dt->coa);
 $dtAnggaran['bulan'][] = array($data->rkf_anggaran[$key]->bulan);
 $dtAnggaran['nominal'][] = array($data->rkf_anggaran[$key]->nominal);
} ?> -->


<!-- fungsilain -->
<!-- <?php $dtFungsiLain = array() ?>
<?php foreach ($all->divisi as $key=> $dt) {
  if (array_search($dt->unit_kerja_id, array_column($data->rkf_fungsilain, 'unitKerja')) !== false) {
   $dtFungsiLain['unit_kerja_nama'][] = array($dt->unit_kerja_nama);
 }
} ?>

<?php foreach ($data->rkf_fungsilain as $key => $dt){
 $dtFungsiLain['notes'][] = array($dt->notes);
} ?> -->


<!-- Unit pelaksana -->
<!-- <?php $dtUnitPelaksana = array() ?>
<?php foreach ($subdiv->result[0] as $key=> $dt) {
 if (array_search($dt->id, array_column($data->rkf_unit_pelaksana, 'unitKerja')) !== false) {
  $dtUnitPelaksana['unit_kerja'][] = array($dt->nama);
}
} ?>
<?php foreach ($pegsubdiv->result[0] as $key=> $dt) {
  if (array_search($dt->pegawai_id, array_column($data->rkf_unit_pelaksana, 'pegawaiUnitKerja')) !== false) {
   $dtUnitPelaksana['pegawai'][] = array($dt->nama);
 }else {
   $dtUnitPelaksana['pegawai'][]= "-";
 }
} ?> -->



<!-- <?php print_r($dtAudit);echo "<br>"; ?> -->
<!-- <?php print_r($dtAnggaran);echo "<br>"; ?> -->
<!-- <?php print_r($dtFungsiLain);echo "<br>"; ?> -->
<!-- <?php print_r($dtUnitPelaksana);echo "<br>"; ?> -->
<!--  jangan dihapus end-->


<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title></title>
  <style type="text/css">
 table {
  border-collapse:collapse;
  table-layout:fixed;width: 100%;
}
table td {
  word-wrap:break-word;
}
</style>
</head>
<body>
 <b>RENCANA KERJA FUNGSIONAL TAHUN 2019</b><br />
 6.1. DIVISI PERENCANAAN DAN PENGEMBANGAN BISNIS<br />

 <?php   $bulan = array("Jan","Feb","Mar","Apr","Mei","Jun","Jul","Ags","Sep","Okt","Nov","Des"); ?>

 <table border="1" cellpadding="8">
 
    <tr>
      <th style="text-align: center;" rowspan="2" width="30">No.</th>
      <th style="text-align: center;" rowspan="2" width="150">PROGRAM KERJA</th>
      <th style="text-align: center;" colspan="2" width="320">UKURAN KEBERHASILAN</th>
      <th style="text-align: center;" width="480" colspan="12">JADWAL(BULAN)</th>
      <th style="text-align: center;" rowspan="2" width="90">FUNGSI LAIN TERKAIT</th>
      <th style="text-align: center;" rowspan="2" width="90">PIC</th>
      <th style="text-align: center;" rowspan="2" width="40">KET</th>
    </tr>
    <tr>
      <th style="text-align: center;" width="60">INDIKATOR</th>
      <th style="text-align: center;" width="90">TARGET PENCAPAIAN&nbsp;</th>
      <?php foreach($bulan as $bulan_nama){?>

      <th style="text-align: center;"><?=$bulan_nama; ?></th>

      <?php } ?>
    </tr>
      <?php
              $no = 0;
              foreach ($datas as $row){
              $alljson2    = file_get_contents(IP_API."/rkf/rkfdetail/?rkfId=".$row->rkf_id, false);
               $data2       = json_decode($alljson2);
    /* echo "<pre>";
     print_r($data2);
     echo "</pre>";*/
                  $no++;  ?>
   

     <tr>
      <td style="text-align: center;" width="30"><?= $no?></td>
      <td style="text-align: left;" width="150"><?=$row->rkf_proker?></td>
      <td style="text-align: left;" width="60">
         <?php
         foreach ($data2 as $rkf_indikator) {
         $no_indi = 0;
         foreach ($rkf_indikator->rkf_indikator as $rkf_indikator_value) {
                $no_indi++;
               echo $no_indi.". "; echo $rkf_indikator_value."<br>";   
            }
        }
        ?>
      </td>
      <td style="text-align: left;" width="90"></td>
      <?php
      $bulan_data = explode(", ",$row->rkf_jadwal);

      foreach ($bulan as $bulan_nama) {
        $cari = in_array($bulan_nama,$bulan_data);
        if($cari){
          ?>
          <td style="text-align: center;">x;</td>
          <?php 
        }else{?>
        <td style="text-align: center;"> - </td>
        <?php
      }
    } ?>
    <td style="text-align: left;" width="90"></td>
    <td style="text-align: left;" width="90"></td>
    <td style="text-align: left;" width="40"></td>

  </tr>
  <?php } ?>


</table>

</body>
</html>


