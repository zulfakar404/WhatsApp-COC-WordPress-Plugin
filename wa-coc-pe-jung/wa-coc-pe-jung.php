<?php
    
    /*
    * Plugin Name: WhatsApp Contact-Order-Confirm
    * Description: WordPress WhatsApp Contact-Order-Confirm plugin adalah Plugin untuk membantu melakukan contact, order (barang, jasa, dll), hingga confirm pembayaran (Bukti transfer, dll).
    * Plugin URI:  https://laluzulfakar.com/
    * Author:      Pe Jung Labs
    * Author URI:  https://laluzulfakar.com/
    * Version:     1.0
    */
    
    if ( ! defined('PEJUNGLABS_WA_COC')) {
        define('PEJUNGLABS_WA_COC', plugin_dir_path(__FILE__));
    }
    
    if ( ! defined('PEJUNGLABS_WA_COC_URL')) {
        define('PEJUNGLABS_WA_COC_URL', plugin_dir_url(__FILE__));
    }
    
    function wa_coc_by_pe_jung($atts, $content = null)
    {
        extract(shortcode_atts(array(
            'jenis'        => '0',
            'nomor_tujuan' => '6283129994835',
            'isi'          => ''
        ), $atts));
        
        require_once PEJUNGLABS_WA_COC.'style.php';
        
        if ($jenis == "1") {
            ob_start();
            ?>
			<form action="<?php echo PEJUNGLABS_WA_COC;?>/contact.php" method="POST">
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
            <?php
            return ob_get_clean();
        }
		elseif ($jenis == "2") {
            ob_start();
            ?>
			<form action="<?php echo PEJUNGLABS_WA_COC; ?>/wa-coc-pe-jung/libs/konfirmasi-pembayaran.php" method="POST" enctype="multipart/form-data">
				<div class="batas">
					<label>Nama</label>
					<input type="text" class="wa-coc-pe-jung-input-text" placeholder="Nama Lengkap" name="nama" required>
				</div>

				<div class="batas">
					<label>No. Rekening</label>
					<input type="text" class="wa-coc-pe-jung-input-text" placeholder="Nomor Rekening" name="no_rek" required>
				</div>

				<div class="batas">
					<label>Bank</label>
					<select name="bank">
						<option value="BNI">BNI</option>
						<option value="BRI">BRI</option>
						<option value="BCA">BCA</option>
						<option value="Mandiri">Mandiri</option>
					</select>
				</div>

				<div class="batas">
					<label>Bukti Transfer</label>
					<input type="file" class="input" name="bukti_transfer"></p>
				</div>
				<button type="submit" name="proses" value="SEND">SEND</button>
			</form>
            <?php
            return ob_get_clean();
        }
		elseif ($jenis == "0") {
            ob_start();
            ?>
			<form action="<?php echo PEJUNGLABS_WA_COC;?>by-pe-jung-labs/custom.php" method="POST">
				<div class="batas">
					<label>Nama</label>
					<input type="text" class="wa-coc-pe-jung-input-text" placeholder="Nama Lengkap" name="nama" required>
				</div>

				<div class="batas sembunyi">
					<label>Pesan</label>
					<textarea placeholder="Pesan" name="pesan" required><?php if ($isi != "") {
                            echo $isi;
                        }
                        else {
                            echo "";
                        } ?></textarea>
				</div>
				<button type="submit" name="proses" value="SEND">SEND</button>
			</form>
            <?php
            return ob_get_clean();
        }
    }
    
    add_shortcode('wa_coc_pe_jung', 'wa_coc_by_pe_jung');
    
    // ADMIN MENU
    add_action('admin_menu', 'extra_post_info_menu');
    function extra_post_info_menu()
    {
        $page_title = 'WA COC';
        $menu_title = 'WhatsApp COC';
        $capability = 'manage_options';
        $menu_slug  = 'tutorial-wa_coc-pe_jung_labs';
        $function   = 'tutorial_pakai_wa_coc';
        $icon_url   = 'dashicons-format-chat';
        add_menu_page($page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position);
    }
    function tutorial_pakai_wa_coc()
    {
        require_once PEJUNGLABS_WA_COC.'style-admin.php';
        ?>
		<h1>Shortcode Generator - WA COC by Pe Jung Labs</h1>
	    <form>
		    <div class="batas">
			    <label>Nomor Tujuan</label>
			    <input id="nomor_tujuan" oninput="tampilkanGenerate();" type="text" class="wa-coc-pe-jung-input-text" placeholder="Nomor Tujuan" name="nomor_tujuan" required>
		    </div>

		    <div class="batas">
			    <label>Jenis</label>
			    <select name="jenis" id="jenis" oninput="pilihJenisnya();">
				    <option value="0">Custom Pesan</option>
				    <option value="1">Form Contact Us</option>
				    <option value="2">Form Konfirmasi Pembayaran</option>
			    </select>
		    </div>
		    
		    <div class="batas" id="isinya">
			    <label>Isi Pesan</label>
			    <textarea name="isi" id="isi"></textarea>
		    </div>
		    
		    <br>
		    
		    <div class="batas" id="prosesnya">
		        <center><a class="button-generate" href="#" onclick="generateCodenya()" name="proses" value="GENERATE">GENERATE</a></center>
			</div>

		    <br><br><textarea name="hasilGenerate" id="hasilGenerate"></textarea>
		</form>
		<?php
		require_once PEJUNGLABS_WA_COC.'js-admin.php';
    }