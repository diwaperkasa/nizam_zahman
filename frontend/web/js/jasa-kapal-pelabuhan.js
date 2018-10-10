$('#hitung_button').click(function() {
	var tambat_1 = $( "#tambat_1" ).val();
	var tambat_2 = $( "#tambat_2" ).val();
	var tambat_10 = $( "#tambat_10" ).val();
	var tender_1 = $( "#tender_1" ).val();
	var tender_2 = $( "#tender_2" ).val();
	var tender_10 = $( "#tender_10" ).val();
	var kebersihan = $( "#kebersihan" ).val();
	var hutang_tambat = $( "#hutang_tambat" ).val();
	var hutang_tender = $( "#hutang_tender" ).val();
	var hutang_kebersihan = $( "#hutang_kebersihan" ).val();
	var panjang_kapal = $( "#panjang_kapal" ).val();
	
	var harga_tambat = Math.ceil(panjang_kapal * ((tambat_1 * get_tarif('tambat_1')) + (tambat_2 * get_tarif('tambat_2')) + (tambat_10 * get_tarif('tambat_10')) + (hutang_tambat * get_tarif('tambat_10'))));
	var harga_tender = Math.ceil(panjang_kapal * ((tender_1 * get_tarif('tender_1')) + (tender_2 * get_tarif('tender_2')) + (tender_10 * get_tarif('tender_10')) + (hutang_tender * get_tarif('tender_10'))));
	var harga_kebersihan = Math.ceil(panjang_kapal * ((kebersihan * get_tarif('kebersihan_perikanan')) + (hutang_kebersihan * get_tarif('kebersihan_perikanan'))));
	
	var sub_total_a = harga_tambat + harga_tender;
	var sub_total_b = harga_kebersihan;
	var total_harga = sub_total_a + sub_total_b;
	
	$("#harga_tambat").text(harga_tambat);
	$("#harga_tender").text(harga_tender);
	$("#harga_kebersihan").text(harga_kebersihan);
	$("#sub_total_a").text(sub_total_a);
	$("#sub_total_b").text(sub_total_b);
	$("#harga_total").text(total_harga);

	$("#panjang_kapal_edit_text").val(panjang_kapal);
	console.log(panjang_kapal);
	$("#panjang_kapal_edit_text").text(panjang_kapal);
	$('#panjang_kapal_edit').attr('value', panjang_kapal);
});

function parseISOString(s) {
  var b = s.split(/[\s:-]+/)
  //return b;
  return new Date(Date.UTC(b[0], b[1], b[2]));
}

function dateDiff() {
  //Get 1 day in milliseconds
  var date1 = $( "#tanggal_masuk" ).text();
  var date2 = $( "#formkapal-tanggal_keluar" ).val();

  var one_day=1000*60*60*24;
  // Convert both dates to milliseconds
  var date1_ms = parseISOString(date1).getTime();
  var date2_ms = parseISOString(date2).getTime();
  // Calculate the difference in milliseconds
  var difference_ms = date2_ms - date1_ms;    
  // Convert back to days and return
  var day_diff = Math.round(difference_ms/one_day) + 1; 
  
  $("#lama_tambat").text(day_diff);
  document.getElementById("kebersihan").value = day_diff;
}

dateDiff();