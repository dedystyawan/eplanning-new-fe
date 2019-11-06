<?php

class Admin_model extends CI_Model{



  function kondisi_status_master($nilai){
    if ($nilai == 1) {
      $status = 'aktif';
    }else{
      ($status = 'tidak aktif');
    }
    return $status;
  }

//punya mas candra

function bentuk_json1($data,$id,$methode){
  /*Methode
    Insert
    Update
  */

    $data_kirim= array();
    $data_kirim['rkfUser']= $_SESSION['user']->userid;
    $data_kirim['rkfUserFrom']= $_SESSION['pegawai']->unit_kerja_id;
    $data_kirim['rkfTahun']= date("Y")+1;
    //Tanya Mas Dedi
    $data_kirim['rkfJenisId']= "1";
    //Bentuk visi
    $data_kirim['selectedVisi']=array();
    if(!empty($data['rkf_visi'])){
      foreach ($data['rkf_visi'] as $dt) {
         $pecah_visi= explode('|',$dt);
         $data_kirim['selectedVisi'][]= array("label"=>$pecah_visi[1], "value"=> $pecah_visi[0]);
      }
    }else{
      $data_kirim['selectedVisi']= "";
    }

    //Bentuk misi
    if(!empty($data['rkf_misi'])){
      foreach ($data['rkf_misi'] as $dt) {
         $pecah_misi= explode('|',$dt);
         $data_kirim['selectedMisi'][]= array('label'=>$pecah_misi[1], 'value'=> $pecah_misi[0]);
      }
    }else{
      $data_kirim['selectedMisi']= "";
    }

    //Core Plan
    if(!empty($data['rkf_coreplan'])){
      foreach ($data['rkf_coreplan'] as $dt) {
         $pecah_coreplan= explode('|',$dt);
         $data_kirim['selectedCorePlan'][]= array('label'=>$pecah_coreplan[1],'value'=>$pecah_coreplan[0]);
      }
    }else{
      $data_kirim['selectedCorePlan']= "";
    }

    //KUD
    if(!empty($data['rkf_kud'])){
      foreach ($data['rkf_kud'] as $dt) {
         $data_kirim['kudArr'][]= array('kud'=>$dt);
      }
    }else{
      $data_kirim['kudArr']= "";
    }

    //Proker
    $data_kirim['proker']       = $data['rkf_proker'];
    $data_kirim['stsProker']    = $data['rkf_status_proker'];
    $data_kirim['skalaProker']  = $data['rkf_skala_proker'];
    $data_kirim['katProker']    = $data['rkf_kat_proker'];
    $data_kirim['bsc']          = $data['rkf_bsc'];
    //TL Audit
    if(!empty($data['tlaudit'])){
      foreach ($data['tlaudit'] as $key =>$dt) {
        if($key <> 0){
          $data_kirim['tindakLanjutAudit'][]    = array('tlAudit'=>$dt,'tahunAudit'=>$data['tahunaudit'][$key]);
       }
      }
    }else{
      $data_kirim['tindakLanjutAudit']= "";
    }

    //Konsultan
    $data_kirim['konsultan']          = $data['rkf_konsultan'];

    //Tujuan Program Kerja
    if(!empty($data['rkf_tujuan_proker'])){
      foreach ($data['rkf_tujuan_proker'] as $key =>$dt) {
        if($key <> 0){
         $data_kirim['tujuanProkerArr'][]    = $dt;
       }
      }
    }else{
      $data_kirim['tujuanProkerArr']= "";
    }

    //Indikator Program Kerja
    if(!empty($data['rkf_indikator'])){
      foreach ($data['rkf_indikator'] as $key =>$dt) {
        if($key <> 0){
         $data_kirim['indikatorKeberhasilanArr'][]    = $dt;
       }
      }
    }else{
      $data_kirim['indikatorKeberhasilanArr']= "";
    }

    //Target Finansial
    if(!empty($data['target_finansial'])){
      foreach ($data['target_finansial'] as $key =>$dt) {
        if($key <> 0){
         $data_kirim['targetFinansial'][]               = array('satuan'=>$data['satuan'][$key],'uraian'=>$dt,'targetKuantitatif'=>$data['target_kuantitatif'][$key]);
       }
      }
    }else{
      $data_kirim['targetFinansial']= "";
    }

    //Jadwal
    if(!empty($data['rkf_jadwal'])){
      foreach ($data['rkf_jadwal'] as $dt) {
         $data_kirim['selectedBulan'][]= $dt;
       }
    }else{
      $data_kirim['selectedBulan']= "";
    }

    //Pos Biaya
    if(!empty($data['pos_biaya'])){
      foreach ($data['pos_biaya'] as $key =>$dt) {
        if($key <> 0){
         $data_kirim['anggaran'][]       = array('coa'=>$data['coa'][$key],'bulan'=>$data['bulan'][$key],'nominal'=>$data['nominal'][$key],'posBiaya'=>$dt);
       }
      }
    }else{
      $data_kirim['anggaran']= "";
    }

    //Unit Pelaksana
    if(!empty($data['subdivisi'])){
      foreach ($data['subdivisi'] as $key =>$dt) {
        if($key <> 0){
         $data_kirim['unitPelaksana'][]        = array('unitKerja'=>$dt,'pegawaiUnitKerja'=>$data['pic'][$key]);
       }
      }
    }else{
      $data_kirim['unitPelaksana']= "";
    }

    //Fungsi Lain
    if(!empty($data['divisi'])){
      foreach ($data['divisi'] as $key =>$dt) {
        if($key <> 0){
         $data_kirim['fungsiLain'][]     = array('notes'=>$data['notes'][$key],'unitKerja'=>$dt);
       }
      }
    }else{
      $data_kirim['fungsiLain']= "";
    }


    //ID
    if($methode == 'Update'){
         $data_kirim['rkfId']     = $id;
    }

    return $data_kirim;
  }

// punya mas candra end

function bentuk_json($data,$id,$methode){
  /*Methode
    Insert
    Update
  */

    $data_kirim= array();
    $data_kirim['rkfUser']= $_SESSION['user']->userid;
    $data_kirim['rkfUserFrom']= $_SESSION['pegawai']->unit_kerja_id;
    $data_kirim['rkfTahun']= date("Y")+1;
    //Tanya Mas Dedi
    $data_kirim['rkfJenisId']= "1";
    //Bentuk visi
    $data_kirim['selectedVisi']=array();
    if(!empty($data['rkf_visi'])){
      foreach ($data['rkf_visi'] as $dt) {
         $pecah_visi= explode('|',$dt);
         $data_kirim['selectedVisi'][]= array("label"=>$pecah_visi[1], "value"=> $pecah_visi[0]);
      }
    }else{
      $data_kirim['selectedVisi']= "";
    }

    //Bentuk misi
    if(!empty($data['rkf_misi'])){
      foreach ($data['rkf_misi'] as $dt) {
         $pecah_misi= explode('|',$dt);
         $data_kirim['selectedMisi'][]= array('label'=>$pecah_misi[1], 'value'=> $pecah_misi[0]);
      }
    }else{
      $data_kirim['selectedMisi']= "";
    }

    //Core Plan
    if(!empty($data['rkf_coreplan'])){
      foreach ($data['rkf_coreplan'] as $dt) {
         $pecah_coreplan= explode('|',$dt);
         $data_kirim['selectedCorePlan'][]= array('label'=>$pecah_coreplan[1],'value'=>$pecah_coreplan[0]);
      }
    }else{
      $data_kirim['selectedCorePlan']= "";
    }


    //KUD
    if(!empty($data['rkf_kud'])){
      foreach ($data['rkf_kud'] as $dt) {
         $data_kirim['kudArr'][]= array('kud'=>$dt);
      }
    }else{
      $data_kirim['kudArr']= "";
    }

    //Proker
    if (!empty($data['rkf_proker'])) {
        $data_kirim['proker']       = $data['rkf_proker'];
    }else {
      $data_kirim['proker'] = "";
    }

    if (!empty($data['rkf_status_proker'])) {
    $data_kirim['stsProker']    = $data['rkf_status_proker'];
    }else {
      $data_kirim['stsProker'] = "";
    }

    if (!empty($data['rkf_skala_proker'])) {
        $data_kirim['skalaProker']  = $data['rkf_skala_proker'];
    }else {
      $data_kirim['skalaProker'] = "";
    }

    if (!empty($data['rkf_kat_proker'])) {
        $data_kirim['katProker']    = $data['rkf_kat_proker'];
    }else {
      $data_kirim['katProker'] = "";
    }

    if (!empty($data['rkf_bsc'])) {
        $data_kirim['bsc']          = $data['rkf_bsc'];
    }else {
      $data_kirim['bsc'] = "";
    }

    //Konsultan
    $data_kirim['konsultan']  = $data['rkf_konsultan'];

//terakhir edit
    //TL Audit
    $data_kirim['tindakLanjutAudit']= array();
    if(!empty($data['tlaudit'])){
      foreach ($data['tlaudit'] as $key =>$dt) {
        if(!empty($dt) AND !empty($data['tahunaudit'][$key])){
          $data_kirim['tindakLanjutAudit'][]    = array('tlAudit'=>$dt,'tahunAudit'=>$data['tahunaudit'][$key]);
       }
      }
    }



    //Tujuan Program Kerja
    $data_kirim['tujuanProkerArr']= array();
    if(!empty($data['rkf_tujuan_proker'])){
      foreach ($data['rkf_tujuan_proker'] as $key =>$dt) {
        if(!empty($dt)){
         $data_kirim['tujuanProkerArr'][]    = $dt;
       }
      }
    }

    //Indikator Program Kerja
     $data_kirim['indikatorKeberhasilanArr']= array();
    if(!empty($data['rkf_indikator'])){
      foreach ($data['rkf_indikator'] as $key =>$dt) {
        if(!empty($dt)){
         $data_kirim['indikatorKeberhasilanArr'][]    = $dt;
       }
      }
    }

    //Target Finansial
    $data_kirim['targetFinansial']= array();
    if(!empty($data['target_finansial'])){
      foreach ($data['target_finansial'] as $key =>$dt) {
        if(!empty($dt) AND !empty($data['satuan'][$key]) AND !empty($data['target_kuantitatif'][$key])){
         $data_kirim['targetFinansial'][]               = array('satuan'=>$data['satuan'][$key],'uraian'=>$dt,'targetKuantitatif'=>$data['target_kuantitatif'][$key]);
       }
      }
    }

    //Jadwal
    $data_kirim['selectedBulan']= array();
    if(!empty($data['rkf_jadwal'])){
      foreach ($data['rkf_jadwal'] as $dt) {
         $data_kirim['selectedBulan'][]= $dt;
       }
    }

    //Pos Biaya
    $data_kirim['anggaran']= array();
    if(!empty($data['pos_biaya'])){
      foreach ($data['pos_biaya'] as $key =>$dt) {
      if(!empty($dt) AND !empty($data['bulan'][$key]) AND !empty($data['nominal'][$key])){
         $data_kirim['anggaran'][]       = array('coa'=>$data['coa'][$key],'bulan'=>$data['bulan'][$key],'nominal'=>$data['nominal'][$key],'posBiaya'=>$dt);
       }
      }
    }

    //Unit Pelaksana
    $data_kirim['unitPelaksana']= array();
    if(!empty($data['subdivisi'])){
      foreach ($data['subdivisi'] as $key =>$dt) {
        if(!empty($dt) AND !empty($data['pic'][$key])){
         $data_kirim['unitPelaksana'][]        = array('unitKerja'=>$dt,'pegawaiUnitKerja'=>$data['pic'][$key]);
       }
      }
    }

    //Fungsi Lain
    $data_kirim['fungsiLain']= array();
    if(!empty($data['divisi'])){
      foreach ($data['divisi'] as $key =>$dt) {
        if(!empty($dt)){
         $data_kirim['fungsiLain'][]     = array('notes'=>$data['notes'][$key],'unitKerja'=>$dt);
       }
      }
    }

    //ID
    if($methode == 'Update'){
         $data_kirim['rkfId']     = $id;
    }

    return $data_kirim;
  }

  function bentuk_array($id){
    $rkfjson        =  json_decode(file_get_contents(IP_API."/rkf/rkfdetail/?rkfId=".$id, false));
    $rkf            = $rkfjson[0];

   $data['rkf_sts']           = $rkf->rkf_sts;
   $data['rkf_id']            = $rkf->rkf_id;
   $data['rkf_user']          = $rkf->rkf_user;
   $data['rkf_user_from']     = $rkf->rkf_user_from;
   $data['rkf_tahun']         = $rkf->rkf_tahun;
   $data['rkf_jenis_id']      = $rkf->rkf_jenis_id;
   $data['rkf_proker']        = $rkf->rkf_proker;
   $data['rkf_status_proker'] = $rkf->rkf_status_proker;
   $data['rkf_skala_proker']  = $rkf->rkf_skala_proker;
   $data['rkf_kat_proker']    = $rkf->rkf_kat_proker;
   $data['rkf_bsc']           = $rkf->rkf_bsc;
   $data['rkf_konsultan']     = $rkf->rkf_konsultan;
   $data['rkf_tujuan_proker'] = $rkf->rkf_tujuan_proker;
   $data['rkf_indikator']     = $rkf->rkf_indikator;
   $data['rkf_jadwal']        = $rkf->rkf_jadwal;
   $data['rkf_note_otor']     = $rkf->rkf_note_otor;

   //TL AUDIT
   $data['rkf_tlaudit']       = array();
   if(!empty($rkf->rkf_tlaudit)){
     foreach ($rkf->rkf_tlaudit as $value) {
        $data['rkf_tlaudit'][] = array("tlAudit"=>$value->tlAudit,'tahunAudit'=>$value->tahunAudit);
     }
   }
   //Unit Pelaksana
   $data['rkf_unit_pelaksana']       = array();
   if(!empty($rkf->rkf_unit_pelaksana)){
     foreach ($rkf->rkf_unit_pelaksana as $value) {
        $data['rkf_unit_pelaksana'][] = array("unitKerja"=>$value->unitKerja,'pegawaiUnitKerja'=>$value->pegawaiUnitKerja);
     }
    }
   //Visi
   $data['rkf_visi']       = array();
   if(!empty($rkf->rkf_visi)){
     foreach ($rkf->rkf_visi as $value) {
        $data['rkf_visi'][] = array("label"=>$value->label,'value'=>$value->value);
     }
   }
   //Misi
   $data['rkf_misi']       = array();
   if(!empty($rkf->rkf_misi)){
     foreach ($rkf->rkf_misi as $value) {
       $data['rkf_misi'][] = array("label"=>$value->label,'value'=>$value->value);
    }
  }
   //CorePlan
   $data['rkf_coreplan']       = array();
   if(!empty($rkf->rkf_coreplan)){
     foreach ($rkf->rkf_coreplan as $value) {
       $data['rkf_coreplan'][] = array("label"=>$value->label,'value'=>$value->value);
     }
   }
   //KUD
   $data['rkf_kud']       = array();
   if(!empty($rkf->rkf_kud)){
     foreach ($rkf->rkf_kud as $value) {
        $data['rkf_kud'][] = array("kud"=>$value->kud);
     }
   }
   //Target Finansial
   $data['rkf_targetfin']       = array();
   if(!empty($rkf->rkf_targetfin)){
     foreach ($rkf->rkf_targetfin as $value) {
        $data['rkf_targetfin'][] = array("satuan"=>$value->satuan,'uraian'=>$value->uraian,'targetKuantitatif'=>$value->targetKuantitatif);
     }
   }
   //Anggaran
   $data['rkf_anggaran']       = array();
   if(!empty($rkf->rkf_anggaran)){
     foreach ($rkf->rkf_anggaran as $value) {
        $data['rkf_anggaran'][] = array("coa"=>$value->coa,'bulan'=>$value->bulan,'nominal'=>$value->nominal,'pos_biaya'=>$value->posBiaya);
     }
   }
   //Fungsi Lain
   $data['rkf_fungsilain']       = array();
   if(!empty($rkf->rkf_fungsilain)){
     foreach ($rkf->rkf_fungsilain as $value) {
        $data['rkf_fungsilain'][] = array("notes"=>$value->notes,'unitKerja'=>$value->unitKerja);
     }
   }

   return $data;
  }


/*
Supervisor
*/
function bentuk_json_otor($data,$id){
    $data['rkfId']            = $id;
    $data['rkfOtorUser']      = $_SESSION['pegawai']->pegawai_id;
    $data['rkfNewStatus']     = $data['submit'];
    $data['rkfCatatanReview'] = $data['rkfCatatanReview'];
    return json_encode($data);
}

}
