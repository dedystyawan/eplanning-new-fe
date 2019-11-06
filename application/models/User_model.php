<?php

class User_model extends CI_Model
{


  function bentuk_json($data, $id, $methode)
  {
    /*Methode
    Insert
    Update
  */

    $data_kirim = array();
    // mau dari user id atau username nip
    // $data_kirim['rkfUser']= $_SESSION['user']->userid;

     //Proker
     if (!empty($data['rkf_proker'])) {
      $data_kirim['proker']       = $data['rkf_proker'];
    } else {
      $data_kirim['proker'] = "";
    }


    if (isset($_SESSION['pegawai']->pegawai_id)) {
      $data_kirim['rkfUser'] = $_SESSION['pegawai']->pegawai_id;
    } else {
      $data_kirim['rkfUser'] = "";
    }
    // asal divisi
    $data_kirim['rkfUserFrom'] = $_SESSION['pegawai']->unit_kerja_id;
    // tahun dimana rkf akan dilaksanakan
    $data_kirim['rkfTahun'] = date("Y") + 1;
    //jenis rkf rbb awal, penyesuaian, dll, jika 1 berarti rbb awal
    $data_kirim['rkfJenisId'] = "1";
    //Bentuk visi
    $data_kirim['selectedVisi'] = array();
    if (!empty($data['rkf_visi'])) {
      foreach ($data['rkf_visi'] as $dt) {
        $pecah_visi = explode('|', $dt);
        $data_kirim['selectedVisi'][] = array(
          "label" => $pecah_visi[1],
          "value" => $pecah_visi[0]
        );
      }
    } else {
      $data_kirim['selectedVisi'] = [""];
    }

    //Bentuk misi
    if (!empty($data['rkf_misi'])) {
      foreach ($data['rkf_misi'] as $dt) {
        $pecah_misi = explode('|', $dt);
        $data_kirim['selectedMisi'][] = array(
          'label' => $pecah_misi[1],
          'value' => $pecah_misi[0]
        );
      }
    } else {
      $data_kirim['selectedMisi'] = [""];
    }


 
    //Core Plan
    if (!empty($data['rkf_corplan_id'])) {
      foreach ($data['rkf_corplan_id'] as $dt) {
        $pecah_coreplan = explode('|', $dt);
        $data_kirim['selectedCorePlan'][] = $dt;
      }
    } else {
      $data_kirim['selectedCorePlan'] = [""];
    }
   //KUD
   if (!empty($data['rkf_kud'])) {
    foreach ($data['rkf_kud'] as $dt) {
      $data_kirim['kudArr'][] = array(
        'kud' => $dt
      );
    }
  } else {
    $data_kirim['kudArr'] = [""];
  }

  if(!empty($data['isuStrategis'])){
    foreach($data['isuStrategis'] as $dt){
        $data_kirim['isuStrategis'][] = $dt;
    }
  }else{
    $data_kirim['isuStrategis'] = [""];
  }



    //transformasi BPD
    if (!empty($data['rkf_transformasi_bpd'])) {
        $data_kirim['rkfTransformasiBPD'] = (int)$data['rkf_transformasi_bpd'];
    } else {
      $data_kirim['rkfTransformasiBPD'] = "";
    }

    //transformasi BPD
    if (!empty($data['rkf_rakb'])) {
        $data_kirim['rkfRAKB'] = (int)$data['rkf_rakb'];
    } else {
      $data_kirim['rkfRAKB'] = "";
    }



   

    // status proker, baru atau carry over
    if (!empty($data['rkf_status_proker'])) {
      $data_kirim['stsProker']    = $data['rkf_status_proker'];
    } else {
      $data_kirim['stsProker'] = "";
    }

    // skala proker, rutin, inisiatif atau mandatory
    if (!empty($data['rkf_skala_proker'])) {
      $data_kirim['skalaProker']  = $data['rkf_skala_proker'];
    } else {
      $data_kirim['skalaProker'] = "";
    }

    // kategori proker
    if (!empty($data['rkf_kat_proker'])) {
      $data_kirim['katProker']    = $data['rkf_kat_proker'];
    } else {
      $data_kirim['katProker'] = "";
    }


    // perspektif bsc
    if (!empty($data['rkf_bsc'])) {
      $data_kirim['bsc']          = $data['rkf_bsc'];
    } else {
      $data_kirim['bsc'] = "";
    }


    //kerjasama Konsultan, ya atau tidak, 0 atau 1
    $data_kirim['konsultan']  = $data['rkf_konsultan'];

    //Tindak Lanjut Audit
    $data_kirim['tindakLanjutAudit'] = array();
    if (!empty($data['tlaudit'])) {
      foreach ($data['tlaudit'] as $key => $dt) {
        if (!empty($dt) and !empty($data['tahunaudit'][$key])) {
          $data_kirim['tindakLanjutAudit'][]    = array(
            'tlAudit' => $dt,
            'tahunAudit' => $data['tahunaudit'][$key]
          );
        }
      }
    } else {
      $data_kirim['tindakLanjutAudit'] = "";
    }

    //Tujuan Program Kerja
    $data_kirim['tujuanProkerArr'] = array();
    if (!empty($data['rkf_tujuan_proker'])) {
      foreach ($data['rkf_tujuan_proker'] as $key => $dt) {
        if (!empty($dt)) {
          $data_kirim['tujuanProkerArr'][]    = $dt;
        }
      }
    } else {
      $data_kirim['tujuanProkerArr'] = "";
    }

    //indikator keberhasilan program kerja
    // $data_kirim['indikatorKeberhasilanArr'] = array();
    // if (!empty($data['rkf_indikator'])) {
    //   foreach ($data['rkf_indikator'] as $key => $dt) {
    //     if (!empty($dt)) {
    //       $data_kirim['indikatorKeberhasilanArr'][]    = $dt;
    //     }
    //   }
    // } else {
    //   $data_kirim['indikatorKeberhasilanArr'] = "";
    // }



    // indikator keberhasilan baru
    $data_kirim['indikatorKeberhasilanArr'] = array();
    if(!empty($data['rkf_indikator_output'])){
      foreach($data['rkf_indikator_output'] as $dt){
          $temp_output[] = $dt;
      }
    }else{
      $temp_output[] = "";
    }
    if(!empty($data['rkf_indikator_outcome'])){
      foreach($data['rkf_indikator_outcome'] as $dt){
        $temp_outcome[] = $dt;
      }
    }else{
      $temp_outcome[] = "";
    }
    if(!empty($data['rkf_indikator_impact'])){
      foreach($data['rkf_indikator_impact'] as $dt){
        $temp_impact[] = $dt;
      }
    }else{
      $temp_impact[] = "";
    }
    $data_kirim['indikatorKeberhasilanArr'] = array(
        "rkf_indikator_output" => $temp_output,
        "rkf_indikator_outcome" => $temp_outcome,
        "rkf_indikator_impact" => $temp_impact,
      );
    if(empty($data_kirim['indikatorKeberhasilanArr'])){
      $data_kirim['indikatorKeberhasilanArr'] ="";
    }
    


    



    //Target Finansial =>rkf_targetfin
    $data_kirim['targetFinansial'] = array();
    if (!empty($data['target_finansial'])) {
      foreach ($data['target_finansial'] as $key => $dt) {
        if (!empty($dt) and !empty($data['satuan'][$key]) and !empty($data['target_kuantitatif'][$key])) {
          $data_kirim['targetFinansial'][]               = array(
            'satuan' => $data['satuan'][$key],
            'uraian' => $dt,
            'targetKuantitatif' => $data['target_kuantitatif'][$key]
          );
        }
      }
    }else{
      $data_kirim['targetFinansial'] ="";
    }

    //Jadwal
    $data_kirim['selectedBulan'] = array();
    if (!empty($data['rkf_jadwal'])) {
      foreach ($data['rkf_jadwal'] as $dt) {
        $data_kirim['selectedBulan'][] = $dt;
      }
    } else {
      $data_kirim['selectedBulan'] = "";
    }

    $data_kirim['anggaran'] = array();
    if (!empty($data['rkf_coa_id'])) {
      foreach ($data['rkf_coa_id'] as $key => $dt) {
        if (!empty($dt)) {
          $data_kirim['anggaran'][]       = array(
            'coa' => $data['rkf_coa_id'][$key],
            'nominal' => array(
              '0' => $data['rkf_coa_bulan'][0][$key],
              '1' => $data['rkf_coa_bulan'][1][$key],
              '2' => $data['rkf_coa_bulan'][2][$key],
              '3' => $data['rkf_coa_bulan'][3][$key],
              '4' => $data['rkf_coa_bulan'][4][$key],
              '5' => $data['rkf_coa_bulan'][5][$key],
              '6' => $data['rkf_coa_bulan'][6][$key],
              '7' => $data['rkf_coa_bulan'][7][$key],
              '8' => $data['rkf_coa_bulan'][8][$key],
              '9' => $data['rkf_coa_bulan'][9][$key],
              '10' => $data['rkf_coa_bulan'][10][$key],
              '11' => $data['rkf_coa_bulan'][11][$key],
            )
          );
        }
      }
    } else {
      $data_kirim['anggaran'] = "";
    }



    //Unit Pelaksana
    $data_kirim['unitPelaksana'] = array();
    if (!empty($data['subdivisi'])) {
      foreach ($data['subdivisi'] as $key => $dt) {
        if (!empty($dt) and !empty($data['pic'][$key])) {
          $data_kirim['unitPelaksana'][]        = array('unitKerja' => $dt, 'pegawaiUnitKerja' => $data['pic'][$key]);
        }
      }
    } else {
      $data_kirim['unitPelaksana'] = "";
    }

    //support Fungsi Lain
    $data_kirim['fungsiLain'] = array();
    if (!empty($data['divisi'])) {
      foreach ($data['divisi'] as $key => $dt) {
        if (!empty($dt)) {
          $data_kirim['fungsiLain'][]     = array('notes' => $data['notes'][$key], 'unitKerja' => $dt);
        }
      }
    }else{
      $data_kirim['fungsiLain'] = "";
    }

    //ID
    if ($methode == 'Update') {
      $data_kirim['rkfId']     = $id;
    }

    return $data_kirim;
  }

  // ==========================================================================================
  function bentuk_array($id)
  {
    $rkfjson        =  json_decode(file_get_contents(IP_API . "/rkf/rkfdetail/?rkfId=" . $id, false));
    $rkf            = $rkfjson[0];

    // echo "<pre>";
    // print_r($rkf);
    // echo "</pre>";
    // die;
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
    $data['rkf_transformasi_bpd']     = $rkf->rkf_transformasi_bpd;
    $data['rkf_rakb']     = $rkf->rkf_rakb;
    $data['rkf_isu_strategis']     = $rkf->rkf_isu_strategis;


    //TL AUDIT
    $data['rkf_tlaudit']       = array();
    if (!empty($rkf->rkf_tlaudit)) {
      foreach ($rkf->rkf_tlaudit as $value) {
        $data['rkf_tlaudit'][] = array("tlAudit" => $value->tlAudit, 'tahunAudit' => $value->tahunAudit);
      }
    }
    //Unit Pelaksana
    $data['rkf_unit_pelaksana']       = array();
    if (!empty($rkf->rkf_unit_pelaksana)) {
      foreach ($rkf->rkf_unit_pelaksana as $value) {
        $data['rkf_unit_pelaksana'][] = array("unitKerja" => $value->unitKerja, 'pegawaiUnitKerja' => $value->pegawaiUnitKerja);
      }
    }
    //Visi
    $data['rkf_visi']       = array();
    if (!empty($rkf->rkf_visi)) {
      foreach ($rkf->rkf_visi as $value) {
        $data['rkf_visi'][] = array("label" => $value->label, 'value' => $value->value);
      }
    }
    //Misi
    $data['rkf_misi']       = array();
    if (!empty($rkf->rkf_misi)) {
      foreach ($rkf->rkf_misi as $value) {
        $data['rkf_misi'][] = array("label" => $value->label, 'value' => $value->value);
      }
    }
    //CorePlan
    $data['rkf_coreplan']       = array();
    if (!empty($rkf->rkf_coreplan)) {
      foreach ($rkf->rkf_coreplan as $value) {
        $data['rkf_coreplan'][] = array($value);
      }
    }
    //KUD
    $data['rkf_kud']       = array();
    if (!empty($rkf->rkf_kud)) {
      foreach ($rkf->rkf_kud as $value) {
        $data['rkf_kud'][] = array("kud" => $value->kud);
      }
    }
    //Target Finansial
    $data['rkf_targetfin']       = array();
    if (!empty($rkf->rkf_targetfin)) {
      foreach ($rkf->rkf_targetfin as $value) {
        $data['rkf_targetfin'][] = array("satuan" => $value->satuan, 'uraian' => $value->uraian, 'targetKuantitatif' => $value->targetKuantitatif);
      }
    }
    //Anggaran
    $data['rkf_anggaran']       = array();
    if (!empty($rkf->rkf_anggaran)) {
      foreach ($rkf->rkf_anggaran as $value) {
        $data['rkf_anggaran'][] = array(
          "coa" => $value->coa,
          'nominal' => $value->nominal,
        );
      }
    }
    //Fungsi Lain
    $data['rkf_fungsilain']       = array();
    if (!empty($rkf->rkf_fungsilain)) {
      foreach ($rkf->rkf_fungsilain as $value) {
        $data['rkf_fungsilain'][] = array("notes" => $value->notes, 'unitKerja' => $value->unitKerja);
      }
    }

    return $data;
  }



  /*
Supervisor
*/
  function bentuk_json_otor($data, $id)
  {
    $data['rkfId']            = $id;
    $data['rkfOtorUser']      = $_SESSION['pegawai']->pegawai_id;
    $data['rkfNewStatus']     = $data['submit'];
    $data['rkfCatatanReview'] = $data['rkfCatatanReview'];
    return json_encode($data);
  }
}
