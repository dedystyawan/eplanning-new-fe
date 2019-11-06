
      var kud = 200;
      var proker = 100;
      var statusproker = 100;
      var skalaproker =  100;
      var kategoriproker =  100;
      var perspektif =  100;
      var kerjasamadgnkonsultan =  60;
      var audit =  200;
      var tujuanproker =   200;
      var indikatorkeberhasilan =  100;
      var targetfinansial = 500  ;
      var jadwal =  80;
      var anggaran =  400;
      var unitpelaksana =  300;
      var supportfungsilain =  300;
      var tablewidth = 2840;

      function myOption(idCheckbox){
        if (idCheckbox == "checkbox-kud") {   //kud
          if(document.getElementById('checkbox-kud').checked){
                document.getElementById('th-kud').style.display="";
                tablewidth = tablewidth + kud;
                console.log(tablewidth);
                document.getElementById('tbl-report').style.width=tablewidth+'px';

                var kelas = document.getElementsByClassName('td-kud');
                for (var i = 0; i < kelas.length; i++) {
                  document.getElementsByClassName('td-kud')[i].style.display="";
                }
              }else {
                document.getElementById('checkbox-all').checked= false;
                document.getElementById('th-kud').style.display="none";
                tablewidth = tablewidth - kud;
                console.log(tablewidth);
                document.getElementById('tbl-report').style.width=tablewidth+'px';

                var kelas = document.getElementsByClassName('td-kud');
                for (var i = 0; i < kelas.length; i++) {
                  document.getElementsByClassName('td-kud')[i].style.display="none";
                }
              }


        }else if (idCheckbox == "checkbox-proker") {
            if(document.getElementById('checkbox-proker').checked){
              document.getElementById('th-proker').style.display="";
              tablewidth = tablewidth + proker;
              console.log(tablewidth);
              document.getElementById('tbl-report').style.width=tablewidth+'px';

              var kelas = document.getElementsByClassName('td-proker');
              for (var i = 0; i < kelas.length; i++) {
                document.getElementsByClassName('td-proker')[i].style.display="";
              }
            } else {
              document.getElementById('checkbox-all').checked= false;
              document.getElementById('th-proker').style.display="none";
              tablewidth = tablewidth - proker;
              console.log(tablewidth)
              document.getElementById('tbl-report').style.width=tablewidth+'px';

              var kelas = document.getElementsByClassName('td-proker');
              for (var i = 0; i < kelas.length; i++) {
                document.getElementsByClassName('td-proker')[i].style.display="none";
              }
            }


        }else if (idCheckbox == "checkbox-status-proker"){
          if (document.getElementById('checkbox-status-proker').checked){
              document.getElementById('th-status-proker').style.display="";
              tablewidth = tablewidth + statusproker;
              console.log(tablewidth);
              document.getElementById('tbl-report').style.width=tablewidth+'px';

              var kelas = document.getElementsByClassName('td-status-proker');
              for (var i = 0; i < kelas.length; i++) {
                document.getElementsByClassName('td-status-proker')[i].style.display="";
              }
          } else {
              document.getElementById('checkbox-all').checked= false;
              document.getElementById('th-status-proker').style.display="none";
              tablewidth = tablewidth - statusproker;
              console.log(tablewidth);
              document.getElementById('tbl-report').style.width=tablewidth+'px';

              var kelas = document.getElementsByClassName('td-status-proker');
              for (var i = 0; i < kelas.length; i++) {
                document.getElementsByClassName('td-status-proker')[i].style.display="none";
              }
          }


        }else if (idCheckbox == "checkbox-skala-proker"){
          if (document.getElementById('checkbox-skala-proker').checked){
              document.getElementById('th-skala-proker').style.display="";
              tablewidth = tablewidth + skalaproker;
              console.log(tablewidth);
              document.getElementById('tbl-report').style.width=tablewidth+'px';

              var kelas = document.getElementsByClassName('td-skala-proker');
              for (var i = 0; i < kelas.length; i++) {
                document.getElementsByClassName('td-skala-proker')[i].style.display="";
              }
          } else {
              document.getElementById('checkbox-all').checked= false;
              document.getElementById('th-skala-proker').style.display="none";
              tablewidth = tablewidth - skalaproker;
              console.log(tablewidth);
              document.getElementById('tbl-report').style.width=tablewidth+'px';

              var kelas = document.getElementsByClassName('td-skala-proker');
              for (var i = 0; i < kelas.length; i++) {
                document.getElementsByClassName('td-skala-proker')[i].style.display="none";
              }
          }


        }else if (idCheckbox == "checkbox-kategori-proker"){
          if (document.getElementById('checkbox-kategori-proker').checked){
              document.getElementById('th-kategori-proker').style.display="";
              tablewidth = tablewidth + kategoriproker;
              console.log(tablewidth);
              document.getElementById('tbl-report').style.width=tablewidth+'px';

              var kelas = document.getElementsByClassName('td-kategori-proker');
              for (var i = 0; i < kelas.length; i++) {
                document.getElementsByClassName('td-kategori-proker')[i].style.display="";
              }
          } else {
              document.getElementById('checkbox-all').checked= false;
              document.getElementById('th-kategori-proker').style.display="none";
              tablewidth = tablewidth - kategoriproker;
              console.log(tablewidth);
              document.getElementById('tbl-report').style.width=tablewidth+'px';

              var kelas = document.getElementsByClassName('td-kategori-proker');
              for (var i = 0; i < kelas.length; i++) {
                document.getElementsByClassName('td-kategori-proker')[i].style.display="none";
              }
          }


        }else if (idCheckbox == "checkbox-perspektif"){
          if (document.getElementById('checkbox-perspektif').checked){
              document.getElementById('th-perspektif').style.display="";
              tablewidth = tablewidth + perspektif;
              console.log(tablewidth);
              document.getElementById('tbl-report').style.width=tablewidth+'px';

              var kelas = document.getElementsByClassName('td-perspektif');
              for (var i = 0; i < kelas.length; i++) {
                document.getElementsByClassName('td-perspektif')[i].style.display="";
              }
          } else {
              document.getElementById('checkbox-all').checked= false;
              document.getElementById('th-perspektif').style.display="none";
              tablewidth = tablewidth - perspektif;
              console.log(tablewidth);
              document.getElementById('tbl-report').style.width=tablewidth+'px';

              var kelas = document.getElementsByClassName('td-perspektif');
              for (var i = 0; i < kelas.length; i++) {
                document.getElementsByClassName('td-perspektif')[i].style.display="none";
              }
          }


        }else if (idCheckbox == "checkbox-kerjasama-dgn-konsultan"){
          if (document.getElementById('checkbox-kerjasama-dgn-konsultan').checked){
              document.getElementById('th-kerjasama-dgn-konsultan').style.display="";
              tablewidth = tablewidth + kerjasamadgnkonsultan;
              console.log(tablewidth);
              document.getElementById('tbl-report').style.width=tablewidth+'px';

              var kelas = document.getElementsByClassName('td-kerjasama-dgn-konsultan');
              for (var i = 0; i < kelas.length; i++) {
                document.getElementsByClassName('td-kerjasama-dgn-konsultan')[i].style.display="";
              }
          } else {
              document.getElementById('checkbox-all').checked= false;
              document.getElementById('th-kerjasama-dgn-konsultan').style.display="none";
              tablewidth = tablewidth - kerjasamadgnkonsultan;
              console.log(tablewidth);
              document.getElementById('tbl-report').style.width=tablewidth+'px';

              var kelas = document.getElementsByClassName('td-kerjasama-dgn-konsultan');
              for (var i = 0; i < kelas.length; i++) {
                document.getElementsByClassName('td-kerjasama-dgn-konsultan')[i].style.display="none";
              }
          }


        }else if (idCheckbox == "checkbox-audit"){
          if (document.getElementById('checkbox-audit').checked){
              document.getElementById('th-audit').style.display="";
              tablewidth = tablewidth + audit;
              console.log(tablewidth);
              document.getElementById('tbl-report').style.width=tablewidth+'px';

              var kelas = document.getElementsByClassName('td-audit');
              for (var i = 0; i < kelas.length; i++) {
                document.getElementsByClassName('td-audit')[i].style.display="";
              }
          } else {
              document.getElementById('checkbox-all').checked= false;
              document.getElementById('th-audit').style.display="none";
              tablewidth = tablewidth - audit;
              console.log(tablewidth);
              document.getElementById('tbl-report').style.width=tablewidth+'px';

              var kelas = document.getElementsByClassName('td-audit');
              for (var i = 0; i < kelas.length; i++) {
                document.getElementsByClassName('td-audit')[i].style.display="none";
              }
          }


        }else if (idCheckbox == "checkbox-tujuan-proker"){
          if (document.getElementById('checkbox-tujuan-proker').checked){
              document.getElementById('th-tujuan-proker').style.display="";
              tablewidth = tablewidth + tujuanproker;
              console.log(tablewidth);
              document.getElementById('tbl-report').style.width=tablewidth+'px';

              var kelas = document.getElementsByClassName('td-tujuan-proker');
              for (var i = 0; i < kelas.length; i++) {
                document.getElementsByClassName('td-tujuan-proker')[i].style.display="";
              }
          } else {
              document.getElementById('checkbox-all').checked= false;
              document.getElementById('th-tujuan-proker').style.display="none";
              tablewidth = tablewidth - tujuanproker;
              console.log(tablewidth);
              document.getElementById('tbl-report').style.width=tablewidth+'px';

              var kelas = document.getElementsByClassName('td-tujuan-proker');
              for (var i = 0; i < kelas.length; i++) {
                document.getElementsByClassName('td-tujuan-proker')[i].style.display="none";
              }
          }


        }else if (idCheckbox == "checkbox-indikator-keberhasilan"){
          if (document.getElementById('checkbox-indikator-keberhasilan').checked){
              document.getElementById('th-indikator-keberhasilan').style.display="";
              tablewidth = tablewidth + indikatorkeberhasilan;
              console.log(tablewidth);
              document.getElementById('tbl-report').style.width=tablewidth+'px';

              var kelas = document.getElementsByClassName('td-indikator-keberhasilan');
              for (var i = 0; i < kelas.length; i++) {
                document.getElementsByClassName('td-indikator-keberhasilan')[i].style.display="";
              }
          } else {
              document.getElementById('checkbox-all').checked= false;
              document.getElementById('th-indikator-keberhasilan').style.display="none";
              tablewidth = tablewidth - indikatorkeberhasilan;
              console.log(tablewidth);
              document.getElementById('tbl-report').style.width=tablewidth+'px';

              var kelas = document.getElementsByClassName('td-indikator-keberhasilan');
              for (var i = 0; i < kelas.length; i++) {
                document.getElementsByClassName('td-indikator-keberhasilan')[i].style.display="none";
              }
          }


        }else if (idCheckbox == "checkbox-target-finansial"){
          if (document.getElementById('checkbox-target-finansial').checked){
              document.getElementById('th-target-finansial').style.display="";
              tablewidth = tablewidth + targetfinansial;
              console.log(tablewidth);
              document.getElementById('tbl-report').style.width=tablewidth+'px';

              var kelas = document.getElementsByClassName('td-target-finansial');
              for (var i = 0; i < kelas.length; i++) {
                document.getElementsByClassName('td-target-finansial')[i].style.display="";
              }
          } else {
              document.getElementById('checkbox-all').checked= false;
              document.getElementById('th-target-finansial').style.display="none";
              tablewidth = tablewidth - targetfinansial;
              console.log(tablewidth);
              document.getElementById('tbl-report').style.width=tablewidth+'px';

              var kelas = document.getElementsByClassName('td-target-finansial');
              for (var i = 0; i < kelas.length; i++) {
                document.getElementsByClassName('td-target-finansial')[i].style.display="none";
              }
          }


        }else if (idCheckbox == "checkbox-jadwal"){
          if (document.getElementById('checkbox-jadwal').checked){
              document.getElementById('th-jadwal').style.display="";
              tablewidth = tablewidth + jadwal;
              console.log(tablewidth);
              document.getElementById('tbl-report').style.width=tablewidth+'px';

              var kelas = document.getElementsByClassName('td-jadwal');
              for (var i = 0; i < kelas.length; i++) {
                document.getElementsByClassName('td-jadwal')[i].style.display="";
              }
          } else {
              document.getElementById('checkbox-all').checked= false;
              document.getElementById('th-jadwal').style.display="none";
              tablewidth = tablewidth - jadwal;
              console.log(tablewidth);
              document.getElementById('tbl-report').style.width=tablewidth+'px';

              var kelas = document.getElementsByClassName('td-jadwal');
              for (var i = 0; i < kelas.length; i++) {
                document.getElementsByClassName('td-jadwal')[i].style.display="none";
              }
          }


        }else if (idCheckbox == "checkbox-anggaran"){
          if (document.getElementById('checkbox-anggaran').checked){
              document.getElementById('th-anggaran').style.display="";
              tablewidth = tablewidth + anggaran;
              console.log(tablewidth);
              document.getElementById('tbl-report').style.width=tablewidth+'px';

              var kelas = document.getElementsByClassName('td-anggaran');
              for (var i = 0; i < kelas.length; i++) {
                document.getElementsByClassName('td-anggaran')[i].style.display="";
              }
          } else {
              document.getElementById('checkbox-all').checked= false;
              document.getElementById('th-anggaran').style.display="none";
              tablewidth = tablewidth - anggaran;
              console.log(tablewidth);
              document.getElementById('tbl-report').style.width=tablewidth+'px';

              var kelas = document.getElementsByClassName('td-anggaran');
              for (var i = 0; i < kelas.length; i++) {
                document.getElementsByClassName('td-anggaran')[i].style.display="none";
              }
          }

        }else if (idCheckbox == "checkbox-unit-pelaksana"){
          if (document.getElementById('checkbox-unit-pelaksana').checked){
              document.getElementById('th-unit-pelaksana').style.display="";
              tablewidth = tablewidth + unitpelaksana;
              console.log(tablewidth);
              document.getElementById('tbl-report').style.width=tablewidth+'px';

              var kelas = document.getElementsByClassName('td-unit-pelaksana');
              for (var i = 0; i < kelas.length; i++) {
                document.getElementsByClassName('td-unit-pelaksana')[i].style.display="";
              }
          } else {
              document.getElementById('checkbox-all').checked= false;
              document.getElementById('th-unit-pelaksana').style.display="none";
              tablewidth = tablewidth - unitpelaksana;
              console.log(tablewidth);
              document.getElementById('tbl-report').style.width=tablewidth+'px';

              var kelas = document.getElementsByClassName('td-unit-pelaksana');
              for (var i = 0; i < kelas.length; i++) {
                document.getElementsByClassName('td-unit-pelaksana')[i].style.display="none";
              }
          }


        }else if (idCheckbox == "checkbox-support-fungsi-lain"){
          if (document.getElementById('checkbox-support-fungsi-lain').checked){
              document.getElementById('th-support-fungsi-lain').style.display="";
              tablewidth = tablewidth + supportfungsilain;
              console.log(tablewidth);
              document.getElementById('tbl-report').style.width=tablewidth+'px';

              var kelas = document.getElementsByClassName('td-support-fungsi-lain');
              for (var i = 0; i < kelas.length; i++) {
                document.getElementsByClassName('td-support-fungsi-lain')[i].style.display="";
              }
          } else {
              document.getElementById('checkbox-all').checked= false;
              document.getElementById('th-support-fungsi-lain').style.display="none";
              tablewidth = tablewidth - supportfungsilain;
              console.log(tablewidth);
              document.getElementById('tbl-report').style.width=tablewidth+'px';

              var kelas = document.getElementsByClassName('td-support-fungsi-lain');
              for (var i = 0; i < kelas.length; i++) {
                document.getElementsByClassName('td-support-fungsi-lain')[i].style.display="none";
              }
          }


        }else if (idCheckbox == "checkbox-all") {
          if (document.getElementById('checkbox-all').checked) {
              document.getElementById('checkbox-kud').checked = true;
              document.getElementById('checkbox-proker').checked = true;
              document.getElementById('checkbox-status-proker').checked = true;
              document.getElementById('checkbox-skala-proker').checked = true;
              document.getElementById('checkbox-kategori-proker').checked = true;
              document.getElementById('checkbox-perspektif').checked = true;
              document.getElementById('checkbox-kerjasama-dgn-konsultan').checked = true;
              document.getElementById('checkbox-audit').checked = true;
              document.getElementById('checkbox-tujuan-proker').checked = true;
              document.getElementById('checkbox-indikator-keberhasilan').checked = true;
              document.getElementById('checkbox-target-finansial').checked = true;
              document.getElementById('checkbox-jadwal').checked = true;
              document.getElementById('checkbox-anggaran').checked = true;
              document.getElementById('checkbox-unit-pelaksana').checked = true;
              document.getElementById('checkbox-support-fungsi-lain').checked = true;


              document.getElementById('th-kud').style.display="";
              document.getElementById('th-proker').style.display="";
              document.getElementById('th-status-proker').style.display="";
              document.getElementById('th-skala-proker').style.display="";
              document.getElementById('th-kategori-proker').style.display="";
              document.getElementById('th-perspektif').style.display="";
              document.getElementById('th-kerjasama-dgn-konsultan').style.display="";
              document.getElementById('th-audit').style.display="";
              document.getElementById('th-tujuan-proker').style.display="";
              document.getElementById('th-indikator-keberhasilan').style.display="";
              document.getElementById('th-target-finansial').style.display="";
              document.getElementById('th-jadwal').style.display="";
              document.getElementById('th-jadwal').style.display="";
              document.getElementById('th-anggaran').style.display="";
              document.getElementById('th-unit-pelaksana').style.display="";
              document.getElementById('th-support-fungsi-lain').style.display="";
              tablewidth = 2840;
              console.log(tablewidth);
              document.getElementById('tbl-report').style.width=tablewidth+'px';

              //menampilkan display // Td

              //menghilangkan display // Td
              var kelas = document.getElementsByClassName('td-kud');
              for (var i = 0; i < kelas.length; i++) {
                document.getElementsByClassName('td-kud')[i].style.display="";
              }

              var kelas = document.getElementsByClassName('td-proker');
              for (var i = 0; i < kelas.length; i++) {
                document.getElementsByClassName('td-proker')[i].style.display="";
              }

              var kelas = document.getElementsByClassName('td-status-proker');
              for (var i = 0; i < kelas.length; i++) {
                document.getElementsByClassName('td-status-proker')[i].style.display="";
              }

              var kelas = document.getElementsByClassName('td-skala-proker');
              for (var i = 0; i < kelas.length; i++) {
                document.getElementsByClassName('td-skala-proker')[i].style.display="";
              }

              var kelas = document.getElementsByClassName('td-kategori-proker');
              for (var i = 0; i < kelas.length; i++) {
                document.getElementsByClassName('td-kategori-proker')[i].style.display="";
              }

              var kelas = document.getElementsByClassName('td-perspektif');
              for (var i = 0; i < kelas.length; i++) {
                document.getElementsByClassName('td-perspektif')[i].style.display="";
              }

              var kelas = document.getElementsByClassName('td-kerjasama-dgn-konsultan');
              for (var i = 0; i < kelas.length; i++) {
                document.getElementsByClassName('td-kerjasama-dgn-konsultan')[i].style.display="";
              }

              var kelas = document.getElementsByClassName('td-audit');
              for (var i = 0; i < kelas.length; i++) {
                document.getElementsByClassName('td-audit')[i].style.display="";
              }

              var kelas = document.getElementsByClassName('td-tujuan-proker');
              for (var i = 0; i < kelas.length; i++) {
                document.getElementsByClassName('td-tujuan-proker')[i].style.display="";
              }

              var kelas = document.getElementsByClassName('td-indikator-keberhasilan');
              for (var i = 0; i < kelas.length; i++) {
                document.getElementsByClassName('td-indikator-keberhasilan')[i].style.display="";
              }

              var kelas = document.getElementsByClassName('td-target-finansial');
              for (var i = 0; i < kelas.length; i++) {
                document.getElementsByClassName('td-target-finansial')[i].style.display="";
              }

              var kelas = document.getElementsByClassName('td-jadwal');
              for (var i = 0; i < kelas.length; i++) {
                document.getElementsByClassName('td-jadwal')[i].style.display="";
              }

              var kelas = document.getElementsByClassName('td-anggaran');
              for (var i = 0; i < kelas.length; i++) {
                document.getElementsByClassName('td-anggaran')[i].style.display="";
              }

              var kelas = document.getElementsByClassName('td-unit-pelaksana');
              for (var i = 0; i < kelas.length; i++) {
                document.getElementsByClassName('td-unit-pelaksana')[i].style.display="";
              }

              var kelas = document.getElementsByClassName('td-support-fungsi-lain');
              for (var i = 0; i < kelas.length; i++) {
                document.getElementsByClassName('td-support-fungsi-lain')[i].style.display="";
              }
          }else {
            document.getElementById('checkbox-kud').checked = false;
            document.getElementById('checkbox-proker').checked = false;
            document.getElementById('checkbox-status-proker').checked = false;
            document.getElementById('checkbox-skala-proker').checked = false;
            document.getElementById('checkbox-kategori-proker').checked = false;
            document.getElementById('checkbox-perspektif').checked = false;
            document.getElementById('checkbox-kerjasama-dgn-konsultan').checked = false;
            document.getElementById('checkbox-audit').checked = false;
            document.getElementById('checkbox-tujuan-proker').checked = false;
            document.getElementById('checkbox-indikator-keberhasilan').checked = false;
            document.getElementById('checkbox-target-finansial').checked = false;
            document.getElementById('checkbox-jadwal').checked = false;
            document.getElementById('checkbox-anggaran').checked = false;
            document.getElementById('checkbox-unit-pelaksana').checked = false;
            document.getElementById('checkbox-support-fungsi-lain').checked = false;


            document.getElementById('th-kud').style.display="none";
            document.getElementById('th-proker').style.display="none";
            document.getElementById('th-status-proker').style.display="none";
            document.getElementById('th-skala-proker').style.display="none";
            document.getElementById('th-kategori-proker').style.display="none";
            document.getElementById('th-perspektif').style.display="none";
            document.getElementById('th-kerjasama-dgn-konsultan').style.display="none";
            document.getElementById('th-audit').style.display="none";
            document.getElementById('th-tujuan-proker').style.display="none";
            document.getElementById('th-indikator-keberhasilan').style.display="none";
            document.getElementById('th-target-finansial').style.display="none";
            document.getElementById('th-jadwal').style.display="none";
            document.getElementById('th-jadwal').style.display="none";
            document.getElementById('th-anggaran').style.display="none";
            document.getElementById('th-unit-pelaksana').style.display="none";
            document.getElementById('th-support-fungsi-lain').style.display="none";

            //menghilangkan display // Td
            var kelas = document.getElementsByClassName('td-kud');
            for (var i = 0; i < kelas.length; i++) {
              document.getElementsByClassName('td-kud')[i].style.display="none";
            }

            var kelas = document.getElementsByClassName('td-proker');
            for (var i = 0; i < kelas.length; i++) {
              document.getElementsByClassName('td-proker')[i].style.display="none";
            }

            var kelas = document.getElementsByClassName('td-status-proker');
            for (var i = 0; i < kelas.length; i++) {
              document.getElementsByClassName('td-status-proker')[i].style.display="none";
            }

            var kelas = document.getElementsByClassName('td-skala-proker');
            for (var i = 0; i < kelas.length; i++) {
              document.getElementsByClassName('td-skala-proker')[i].style.display="none";
            }

            var kelas = document.getElementsByClassName('td-kategori-proker');
            for (var i = 0; i < kelas.length; i++) {
              document.getElementsByClassName('td-kategori-proker')[i].style.display="none";
            }

            var kelas = document.getElementsByClassName('td-perspektif');
            for (var i = 0; i < kelas.length; i++) {
              document.getElementsByClassName('td-perspektif')[i].style.display="none";
            }

            var kelas = document.getElementsByClassName('td-kerjasama-dgn-konsultan');
            for (var i = 0; i < kelas.length; i++) {
              document.getElementsByClassName('td-kerjasama-dgn-konsultan')[i].style.display="none";
            }

            var kelas = document.getElementsByClassName('td-audit');
            for (var i = 0; i < kelas.length; i++) {
              document.getElementsByClassName('td-audit')[i].style.display="none";
            }

            var kelas = document.getElementsByClassName('td-tujuan-proker');
            for (var i = 0; i < kelas.length; i++) {
              document.getElementsByClassName('td-tujuan-proker')[i].style.display="none";
            }

            var kelas = document.getElementsByClassName('td-indikator-keberhasilan');
            for (var i = 0; i < kelas.length; i++) {
              document.getElementsByClassName('td-indikator-keberhasilan')[i].style.display="none";
            }

            var kelas = document.getElementsByClassName('td-target-finansial');
            for (var i = 0; i < kelas.length; i++) {
              document.getElementsByClassName('td-target-finansial')[i].style.display="none";
            }

            var kelas = document.getElementsByClassName('td-jadwal');
            for (var i = 0; i < kelas.length; i++) {
              document.getElementsByClassName('td-jadwal')[i].style.display="none";
            }

            var kelas = document.getElementsByClassName('td-anggaran');
            for (var i = 0; i < kelas.length; i++) {
              document.getElementsByClassName('td-anggaran')[i].style.display="none";
            }

            var kelas = document.getElementsByClassName('td-unit-pelaksana');
            for (var i = 0; i < kelas.length; i++) {
              document.getElementsByClassName('td-unit-pelaksana')[i].style.display="none";
            }

            var kelas = document.getElementsByClassName('td-support-fungsi-lain');
            for (var i = 0; i < kelas.length; i++) {
              document.getElementsByClassName('td-support-fungsi-lain')[i].style.display="none";
            }

          }
        }
      }
