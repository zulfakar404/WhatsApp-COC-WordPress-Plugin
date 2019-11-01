<style>
	.batas {
		margin-bottom: 20px;
	}

	input[type=text], input[type=password] {
		width: 100%;
		height: 40px !important;
		margin: 0;
		padding: .7em;
		display: inline-block;
		border: 1px solid #ccc;
		box-sizing: border-box;
	}

	textarea {
		width: 100%;
		height: 120px;
		margin: 0;
		padding: .7em;
		display: inline-block;
		border: 1px solid #ccc;
		box-sizing: border-box;
		resize: vertical;
	}

	select {
		width: 100%;
		height: 40px !important;
		margin: 0;
		padding: .7em;
		display: inline-block;
		border: 1px solid #ccc;
		box-sizing: border-box;
	}

	button {
		background-color: #4CAF50;
		color: white;
		padding: 14px 20px;
		margin: 8px 0;
		border: none;
		cursor: pointer;
		width: 100%;
	}

	button:hover {
		opacity: 0.8;
	}
</style>

<form action="http://zulfakarhidayat/demo/elemenslide/by-pe-jung-labs/contact.php" method="POST">
	<div class="batas">
		<label>Nama</label>
		<input type="text" class="wa-coc-pe-jung-input-text" placeholder="Nama Lengkap" name="nama" required>
	</div>

	<div class="batas">
		<label>Pesan</label>
		<textarea placeholder="Pesan" name="pesan" required></textarea>
	</div>
	<button type="submit" name="proses" value="SEND">SEND</button>
</form>

<script src="../assets/js/main.js"></script>