<?php

class Report_model extends CI_Model{

//============================= START MASTER =============================//
     function master_jabatan(){
        $data = json_decode(file_get_contents(IP_API.'/master/all/', false));
        if(!empty($data->allJabatan)){
             foreach ($data->allJabatan as $value) {
                  $data_kirim[$value->jabatan_id] = $value->jabatan_nama;
             }
             return $data_kirim;
        }
     }

     function master_visi(){
       $data = json_decode(file_get_contents(IP_API.'/master/all/', false));
       if(!empty($data->allVisi)){
            foreach ($data->allVisi as $value) {
                 $data_kirim[$value->visi_id] = $value->visi_nama;
            }
            return $data_kirim;
       }
     }

     function master_misi(){
          $data = json_decode(file_get_contents(IP_API.'/master/all/', false));
          if(!empty($data->allMisi)){
               foreach ($data->allMisi as $value) {
                    $data_kirim[$value->misi_id] = $value->misi_nama;
               }
               return $data_kirim;
          }
     }

     function master_core_plan(){
          $data = json_decode(file_get_contents(IP_API.'/master/all/', false));
          if(!empty($data->allCorePlan)){
              foreach ($data->allCorePlan as $value) {
                   $data_kirim[$value->cp_id] = $value->cp_kode."*".$value->cp_nama;
              }
              return $data_kirim;
          }
     }

     function master_kud(){
          $data = json_decode(file_get_contents(IP_API.'/master/all/', false));
          if(!empty($data->allKUD)){
               foreach ($data->allKUD as $value) {
                    $data_kirim[$value->kud_id] = $value->kud_nama;
               }
               return $data_kirim;
          }
     }

     function master_status_proker(){
          $data = json_decode(file_get_contents(IP_API.'/master/all/', false));
          if(!empty($data->allStsProker)){
               foreach ($data->allStsProker as $value) {
                    $data_kirim[$value->sts_proker_id] = $value->sts_proker_nama;
               }
               return $data_kirim;
          }
     }

     function master_kategori_proker(){
          $data = json_decode(file_get_contents(IP_API.'/master/all/', false));
          if(!empty($data->allKatProker)){
               foreach ($data->allKatProker as $value) {
                    $data_kirim[$value->kat_proker_id] = $value->kat_proker_nama;
               }
               return $data_kirim;
          }
     }

     function master_skala_proker(){
          $data = json_decode(file_get_contents(IP_API.'/master/all/', false));
          if(!empty($data->allSkalaProker)){
               foreach ($data->allSkalaProker as $value) {
                    $data_kirim[$value->skala_proker_id] = $value->skala_proker_nama;
               }
               return $data_kirim;
          }
     }

     function master_bsc(){
          $data = json_decode(file_get_contents(IP_API.'/master/all/', false));
          if(!empty($data->allBSC)){
               foreach ($data->allBSC as $value) {
                    $data_kirim[$value->bsc_id] = $value->bsc_nama;
               }
               return $data_kirim;
          }
     }

     function master_tindak_lanjut_audit(){
          $data = json_decode(file_get_contents(IP_API.'/master/all/', false));
          if(!empty($data->allTLAudit)){
               foreach ($data->allTLAudit as $value) {
                    $data_kirim[$value->tindak_lanjut_id] = $value->tindak_lanjut_nama;
               }
               return $data_kirim;
          }
     }

     function master_satuan(){
          $data = json_decode(file_get_contents(IP_API.'/master/all/', false));
          if(!empty($data->allSatuan)){
               foreach ($data->allSatuan as $value) {
                    $data_kirim[$value->satuan_id] = $value->satuan_nama;
               }
               return $data_kirim;
          }
     }

     function master_pos_biaya(){
          $data = json_decode(file_get_contents(IP_API.'/master/all/', false));
          if(!empty($data->allPosBiaya)){
               foreach ($data->allPosBiaya as $value) {
                    $data_kirim[$value->posbiaya_id] = $value->posbiaya_nama;
               }
               return $data_kirim;
          }
     }

     function master_divisi(){
          $data = json_decode(file_get_contents(IP_API.'/master/all/', false));
          if(!empty($data->divisi)){
               foreach ($data->divisi as $value) {
                    $data_kirim[$value->unit_kerja_id] = $value->unit_kerja_nama;
               }
               return $data_kirim;
          }
     }

     function master_all(){
          $data = json_decode(file_get_contents(IP_API.'/master/all/', false));
          $data_kirim= array();

          if(!empty($data->allJabatan)){
              foreach ($data->allJabatan as $value) {
                   $data_kirim['jabatan'][$value->jabatan_id] = $value->jabatan_nama;
              }
         }

          if(!empty($data->allVisi)){
               foreach ($data->allVisi as $value) {
                    $data_kirim['visi'][$value->visi_id] = $value->visi_nama;
               }
          }

          if(!empty($data->allMisi)){
               foreach ($data->allMisi as $value) {
                    $data_kirim['misi'][$value->misi_id] = $value->misi_nama;
               }
          }

          if(!empty($data->allCorePlan)){
              foreach ($data->allCorePlan as $value) {
                   $data_kirim['core_plan'][$value->cp_id] = $value->cp_kode."*".$value->cp_nama;
              }
              return $data_kirim;
          }

          if(!empty($data->allKUD)){
               foreach ($data->allKUD as $value) {
                    $data_kirim['kud'][$value->kud_id] = $value->kud_nama;
               }
          }

          if(!empty($data->allStsProker)){
               foreach ($data->allStsProker as $value) {
                    $data_kirim['status_proker'][$value->sts_proker_id] = $value->sts_proker_nama;
               }
          }

          if(!empty($data->allKatProker)){
               foreach ($data->allKatProker as $value) {
                    $data_kirim['kategori_proker'][$value->kat_proker_id] = $value->kat_proker_nama;
               }
          }

          if(!empty($data->allSkalaProker)){
               foreach ($data->allSkalaProker as $value) {
                    $data_kirim['skala_proker'][$value->skala_proker_id] = $value->skala_proker_nama;
               }
          }

          if(!empty($data->allBSC)){
               foreach ($data->allBSC as $value) {
                    $data_kirim['bsc'][$value->bsc_id] = $value->bsc_nama;
               }
          }

          if(!empty($data->allTLAudit)){
               foreach ($data->allTLAudit as $value) {
                    $data_kirim['tindak_lanjut_audit'][$value->tindak_lanjut_id] = $value->tindak_lanjut_nama;
               }
          }

          if(!empty($data->allSatuan)){
               foreach ($data->allSatuan as $value) {
                    $data_kirim['satuan'][$value->satuan_id] = $value->satuan_nama;
               }
          }

          if(!empty($data->allPosBiaya)){
               foreach ($data->allPosBiaya as $value) {
                    $data_kirim['pos_biaya'][$value->posbiaya_id] = $value->posbiaya_nama;
               }
          }

          if(!empty($data->divisi)){
               foreach ($data->divisi as $value) {
                    $data_kirim['divisi'][$value->unit_kerja_id] = $value->unit_kerja_nama;
               }
          }

          return $data_kirim;
     }
//============================= END MASTER =============================//
//============================= START REPORT =============================//
     function bentuk_report_proker($id_divisi,$jenisrkf,$tahunrkf){
        $data = json_decode(file_get_contents(IP_API.'/rkf/report/'.$id_divisi.'/'.$tahunrkf.'/'.$jenisrkf, false));
        if(!empty($data)){
            foreach($data as $dt){
                $kirim[$dt->rkf_bsc]['nama'] = $dt->perspektif;
                if(!empty($dt->rkf_kud)){
                     $count= count($dt->rkf_kud);
                     $x=1;
                     foreach ($dt->rkf_kud as $dx) {
                          if($count == 1){
                               $kud= $dx->kud;
                          }else{
                               if($x==1){
                                    $kud= $dx->kud;
                               }else{
                                    $kud= $kud."-".$dx->kud;
                               }
                          }
                         $x++;
                     }
                }else{
                     $kud= "-";
                }
                $kirim[$dt->rkf_bsc]['result'][$kud]['result'][] = $dt;
            }
           return $data;
        }else{
             return "heheh tidak ada";
        }
     }
//============================= END REPORT =============================//
//============================= START GRAFIK =============================//

//sementara grafik bar gak dipakai, kalo masih tidak dipakai silahkan hapus

     // function bentuk_data_grafik_bar(){
     //     $periode       = json_decode(file_get_contents(IP_API."/master/perioderkf/".date("Y"),false));
     //     $data          = json_decode(file_get_contents(IP_API."/rkf/sumperdiv/".date("Y")."/".$periode->periode_jenis,false));
     //      //$data          = json_decode(file_get_contents(IP_API."/rkf/sumperdiv/".date("Y")."/1",false));
     //     //Bentuk Data
     //     if(!empty($data)){
     //          foreach ($data as $dt) {
     //               $data_jadi[$dt->rkf_user_from][$dt->case]     = $dt->count;
     //               $data_jadi[$dt->rkf_user_from]['unit_kerja']  = $dt->unit_kerja_nama;
     //          }
     //
     //          //Bentuk Grafik
     //          $label          = array();
     //          $label_panjang  = array();
     //          $approve        = array();
     //          $review         = array();
     //          $draft          = array();
     //          foreach ($data_jadi as $key => $dt_grafik) {
     //               array_push($label,$key);
     //               array_push($label_panjang,$dt_grafik["unit_kerja"]);
     //               if(!empty($dt_grafik["APPROVED"])){
     //                    array_push($approve,$dt_grafik["APPROVED"]);
     //               }else{
     //                    array_push($approve,0);
     //               }
     //
     //               if(!empty($dt_grafik["REVIEW"])){
     //                    array_push($review,$dt_grafik["REVIEW"]);
     //               }else{
     //                    array_push($review,0);
     //               }
     //
     //               if(!empty($dt_grafik["DRAFT"])){
     //                    array_push($draft,$dt_grafik["DRAFT"]);
     //               }else{
     //                    array_push($draft,0);
     //               }
     //          }
     //
     //          $data_kirim['label']           = json_encode($label);
     //          $data_kirim['label_panjang']   = json_encode($label_panjang);
     //          $data_kirim['approve']         = json_encode($approve);
     //          $data_kirim['review']          = json_encode($review);
     //          $data_kirim['draft']           = json_encode($draft);
     //
     //          return $data_kirim;
     //     }
     // }


     function bentuk_data_grafik_pie(){
             $periode       = json_decode(file_get_contents(IP_API."/master/perioderkf/".date("Y"),false));
             if ($_SESSION['user']->userrole == 1) {
                  $data          = json_decode(file_get_contents(IP_API."/rkf/sumall/".date("Y")."/".$periode->periode_jenis,false));
             }else{
                 $data          = json_decode(file_get_contents(IP_API."/rkf/sumdetail/".$_SESSION['pegawai']->unit_kerja_id."/".date("Y")."/".$periode->periode_jenis,false));
                 // $data          = json_decode(file_get_contents(IP_API."/rkf/sumdetail/".$_SESSION['pegawai']->unit_kerja_id."/".date("Y")."/1",false));
             }
              foreach ($data as $value) {
                   $dataChart[$value->status]=$value->jumlah;
              }

             if(!isset($dataChart["APPROVED"])){
                   $dataChart["APPROVED"]=0;
             }
             if(!isset($dataChart["DRAFT"])){
                  $dataChart["DRAFT"]=0;
             }
             if(!isset($dataChart["REVIEW"])){
                  $dataChart["REVIEW"]=0;
             }
             return $dataChart;
          }
     }

    
//============================= END GRAFIK =============================//
