


<?php
     $periode       = json_decode(file_get_contents(IP_API."/master/perioderkf/".date("Y"),false));
?>

 <div class="row">
     <div class="col-lg-12">
         <div class="hpanel">
           <div class="btn-group">
               <button data-toggle="dropdown" class="btn btn-info dropdown-toggle">Perspektif <span class="caret"></span></button>
               <ul class="dropdown-menu">
                 <li><a href="#" class="perspektif" >All Perspektif</a></li>
                 <li><a href="#" class="perspektif">Perspektif Finansial</a></li>
                 <li><a href="#" class="perspektif">Perspektif Customer</a></li>
                 <li><a href="#" class="perspektif">Perspektif Internal Process</a></li>
                 <li><a href="#" class="perspektif">PERSPEKTIF LEARNING & GROWTH</a></li>
               </ul>
           </div>
          <div class="alert alert-info" style="text-align:center;">
            <h3><b>perspektif</b></h3>
            <h2 id="title-perspektif">All Perspektif</h2>
          </div>
             <div class="panel-body" id="data-report">
              <table id="example2" class="table  table-bordered table-hover">
             <thead>
             <tr>
                 <th style="text-align:center; vertical-align:middle;">KUD</th>
                 <th style="text-align:center; vertical-align:middle;">Program Kerja</th>
                 <th style="text-align:center; vertical-align:middle;">Indikator</th>
                 <th style="text-align:center; vertical-align:middle;">Target Pencapaian</th>
             </tr>
             </thead>
             <tbody id="isi-report">
             </tbody>
             </table>
             </div>

         </div>
     </div>

 </div>


 <script>
    var divisi = "<?php echo $divisiid; ?>";
    var tahun = "<?php echo $tahun; ?>";
    var jenis = "<?php echo $jenisrkfid; ?>";
    console.log(divisi);
    console.log(tahun);
    console.log(jenis);

    function tampilkanSemuaPerspektif(){
      $.getJSON("http://10.64.6.7:8008/rkf/report/"+divisi+"/"+tahun+"/"+jenis+"", function (data){
        //$('#isi-report').empty();
        $.each(data, function(i, data){
          $('#isi-report').append('<tr><td>'+data.kud_nama+'</td><td>'+data.rkf_proker+'<td>'+data.rkf_indikator+'</td><td>'+data.rkf_tujuan_proker+'</td></tr>');

        }); $('#example2').dataTable();
      });
    }
    tampilkanSemuaPerspektif();

     $('.perspektif').on('click', function(){
        let perspektif = $(this).html();
        $('#title-perspektif').html(perspektif.toUpperCase());

        if(perspektif == 'All Perspektif'){
          tampilkanSemuaPerspektif();
          return;
        }


     $.getJSON("http://10.64.6.7:8008/rkf/report/"+divisi+"/"+tahun+"/"+jenis+"", function (data){
        let dataReport = data;
        let content = ' ';

        $.each(dataReport, function(i, data){
            if (data.perspektif == perspektif.toUpperCase()){
              content = content + '<tr><td>'+data.kud_nama+'</td><td>'+data.rkf_proker+'<td>'+data.rkf_indikator+'</td><td>'+data.rkf_tujuan_proker+'</td></tr>';
            }
        });

        $('#isi-report').html(content);

        });
     });

 </script>



 <script>
   $(window).load(function(){
     swal("Welcome!", "Welcome to the site!", "success");
   });
 </script>
