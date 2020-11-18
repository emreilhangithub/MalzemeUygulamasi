
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<script src="<?php echo base_url("assets/js/third_pary/bootstrap-switch.min.js"); ?>" >
	
</script>



<!-- <script>


$(document).ready(function() {

	function uyari()
	{
		alert("Butona Tıklandı");	
	}

	

})	


</script> -->







<script>	

$(document).ready(function() {


	

	$(".removeBtn").click(function() {
		// klası .removeBtn olan elemente tıklanıldıgında  fonksiyonu calıstır 
		//alert(); dersek butona bastıgımızda ekrana yazı uyarı verıyor 
		var dataURL = $(this).attr("dataURL");  //tıklanan elementelerden dataURLi al
		//alert(dataURL); bize burda yolunu gosterir 
		var remove = confirm("Silmek istiyor musunuz ? ") ;
		//alert(remove); burda eger evete basarsan true hayıra basarsan false der :D  

		if (remove == true) {

			window.location.href = dataURL;



			// sonra bunları sildik ve yerine yukardaki kodu yazdık
			// $.post(dataURL,{},function(response){ //varsa response yoksa fonksiyon gonder bize  
			// 	//alert(response); eger geri donecekse datadan ekrana bastıracaz 
			// 	 if (response) {
			// 	 	//alert("girdi");
			// 	 	//$(this).parent().parent().remove(); burda 3 satır üste gider
			// 	 	//alert("girdikten sonraki işlem ");
			// 	 	window.location.reload();//windowsda sayfayı yeniler
			// 	 }


			// })
		}


		})
})


</script>