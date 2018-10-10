var tarif_backhoe;
$(document).ready(function(){
  $.ajax({ 
    url: "backhoe-loader/tarif",
        success: function(data){
           tarif = data;    
           tarif_backhoe = parseInt(tarif["crane"]["biaya"]);
           document.getElementById("biaya_tarif").innerHTML = tarif_backhoe.toLocaleString('de-DE', { style: 'currency', currency: 'IDR' });
           hitung_biaya();
      }
    });
});

function hitung_biaya() {
  var unit = document.getElementById("unit").value;
  var lama_peminjaman = document.getElementById("jam").value;
  var total_biaya = unit * lama_peminjaman * tarif_backhoe;
  document.getElementById("total_biaya").innerHTML = total_biaya.toLocaleString('de-DE', { style: 'currency', currency: 'IDR' });
}