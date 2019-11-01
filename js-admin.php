<script type="text/javascript">
	
	(function () {
		document.getElementById('prosesnya').style.display = "none";
	})();
	
	function pilihJenisnya() {
		if (document.getElementById("jenis").value == "0") {
			document.getElementById("isi").disabled = false;
			document.getElementById('isinya').style.display = "block";
		} else if (document.getElementById("jenis").value == "1") {
			document.getElementById("isi").disabled = true;
			document.getElementById('isinya').style.display = "none";
			document.getElementById("isi").value = "kosong";
		} else if (document.getElementById("jenis").value == "2") {
			document.getElementById("isi").disabled = true;
			document.getElementById('isinya').style.display = "none";
			document.getElementById("isi").value = "kosong";
		}
	};
	
	function tampilkanGenerate() {
		if (document.getElementById("nomor_tujuan").value != "") {
			document.getElementById('prosesnya').style.display = "block";
		}
	}
	
	function generateCodenya() {
		document.getElementById("hasilGenerate").value = "[wa_coc_pe_jung nomor_tujuan=\"" + document.getElementById("nomor_tujuan").value + "\" jenis=\"" + document.getElementById("jenis").value + "\" isi=\"" + document.getElementById("isi").value + "\"]";
	};
</script>