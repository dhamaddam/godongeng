
<body>
<?php
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'placeholder' => 'Username or Email',
	'value' => set_value('login'),
	'class'	=> 'form-control form-control-light input-lg',
);
if ($login_by_username AND $login_by_email) {
	$login_label = 'Email or login';
} else if ($login_by_username) {
	$login_label = 'Login';
} else {
	$login_label = 'Email';
}
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'placeholder' => 'Password',
	'class'	=> 'form-control form-control-light input-lg',
);
$remember = array(
	'name'	=> 'remember',
	'id'	=> 'remember',
	'value'	=> 1,
	'checked'	=> set_value('remember'),
	// 'placeholder' => 'Password',
	'class'	=> 'form-control form-control-light input-sm',
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
);


$error_message = '';
if( form_error($login['name']) !=''){
$error_message = "<small class=\"error\">".str_replace("Login field", "Email field", form_error($login['name']) )."</small>";
}

if(isset($errors[$login['name']])){
$error_message .= "<small class=\"error\">".str_replace("Login", "Email", $errors[$login['name']] )."</small>";
}

if( form_error($password['name']) !='' ){
$error_message .= "<small class=\"error\">".form_error($password['name'])."</small>";
}

if(isset($errors[$password['name']])){
$error_message .= "<small class=\"error\">".$errors[$password['name']]."</small>";
}

$captcha_content = '';
if ($show_captcha) {
	if ($use_recaptcha) {
		$captcha_content = '
		<div id="account-signup-divider" class="shared-divider">
			<div class="shared-divider-label">
				<span>Confirmation Code</span>
			</div>
		</div>

		<div id="recaptcha_image"></div>
		<a href="javascript:Recaptcha.reload()">Get another CAPTCHA</a>
		<div class="recaptcha_only_if_image"><a href="javascript:Recaptcha.switch_type(\'audio\')">Get an audio CAPTCHA</a></div>
		<div class="recaptcha_only_if_audio"><a href="javascript:Recaptcha.switch_type(\'image\')">Get an image CAPTCHA</a></div>

		<div class="recaptcha_only_if_image">Enter the words above</div>
		<div class="recaptcha_only_if_audio">Enter the numbers you hear</div>
		<input type="text" id="recaptcha_response_field" name="recaptcha_response_field" />

		<div id="account-signup-divider" class="shared-divider"></div>
		';

		$captcha_content .= $recaptcha_html;
	} else {
		$captcha_content = '
		<div id="account-signup-divider" class="shared-divider">
			<div class="shared-divider-label">
				<span>Confirmation Code</span>
			</div>
		</div>

		<p>Enter the code exactly as it appears:</p>
		'.$captcha_html.'
		<p>'.form_label('Confirmation Code', $captcha['id']).'</p>
		<p>'.form_input($captcha).'</p>

		<div id="account-signup-divider" class="shared-divider"></div>
		';
	}
}

if( form_error('recaptcha_response_field') !=''){
$error_message = "<small class=\"error\">".form_error('recaptcha_response_field')."</small>";
}

if( form_error($captcha['name']) !=''){
$error_message = "<small class=\"error\">".form_error($captcha['name'])."</small>";
}
?>
<section class="ct-section">
        <div class="container">
          <div class="ct-section-header ct-section-header-decoration-center ct-u-margin-bottom-40">

            <br>  <br>
            <!-- <h2 class="h1">Login</h2> -->
          </div>
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <div role="alert" style="display: none;" class="successMessage alert alert-success alert-dismissible">
                <button type="button" data-dismiss="alert" aria-label="Close" class="close"><span aria-hidden="true">�</span></button><strong>Success!</strong>Thanks! We will contact you shortly.
              </div>
              <div role="alert" style="display: none;" class="errorMessage alert alert-danger alert-dismissible">
                <button type="button" data-dismiss="alert" aria-label="Close" class="close"><span aria-hidden="true">�</span></button><strong>
					<?php echo $error_message; ?>
                </strong>Sorry! Something goes wrong.
              </div>
            <!-- 	<?php echo form_open($this->uri->uri_string().'/'.$this->uri->uri_string(), array('class'=>'nicely')); ?>
            	<div class="row">
                    <div class="form-group">
                     <?php echo form_label($login_label, $login['id']); ?>
					  <?php echo form_input($login); ?>
                    </div>

                    <div class="form-group">
                      <?php echo form_label('Password', $password['id']); ?>
					  <?php echo form_password($password); ?>
                    </div>

                    <div class="form-group">
						<?php echo $captcha_content; ?>
                    </div>

                    <div class="form-group">
                      <?php echo form_label('Remember me on this computer', $password['id']); ?>
                       <?php echo form_checkbox($remember); ?>

                    </div>
                    <div class="form-group">
                		<button type="submit" class="btn btn-motive btn-lg" >Login</button>
                	</div> -->

                	<div class="form-group">
	                	<div id="account-signup-divider" class="shared-divider">
											<div class="shared-divider-label">
												<span>Login with</span>
											</div>
										</div>
									<div id="connect-with-buttons">
										<!-- <a href="<?php echo base_url("/auth_oa2/session/facebook"); ?>" class="connect-with-button account-sprites account-sprites-facebook" title="Facebook Connect"></a>
										<a href="<?php echo base_url("/auth_oa2/session/google"); ?>" class="connect-with-button marginleft13 account-sprites account-sprites-google" title="Google"></a>
										<a href="<?php echo base_url("/auth_oa2/session/facebook"); ?>" class="connect-with-button marginleft13 account-sprites account-sprites-facebook" title="Facebook Connect"></a> -->
										<a href="<?php echo base_url("/auth_oa2/session/google"); ?>" class="connect-with-button marginleft13 account-sprites account-sprites-google" title="Google"></a>
										<!-- <a href="<?php echo base_url("/auth_oa2/session/facebook"); ?>" class="connect-with-button marginleft13 account-sprites account-sprites-facebook" title="Facebook Connect"></a> -->
									</div>
									<br><br>
									<div class="ct-article-description">
									<p>
										Go-Dongeng adalah sebuah tim yang bekerja dalam bidang pengembangan teknologi
									berbasis digital dan fokus pada bacaan anak.
									Tim Go-Dongeng mulai terlibat dalam dunia sastra anak sejak tahun 2017.
									Tim ini menghasilkan karya berupa kumpulan cerita dongeng untuk anak-anak
									yang dapat diakses melalui tautan go-dongeng.com.
									<br><br>
									Di dalam lamannya ini, dapat ditemukan slogan dari tim Go-Dongeng,
									 yaitu: “Memberi pesan mendidik tanpa hardik”.
									 Go-Dongeng memiliki tujuan yang juga sejalan
									 dengan slogan mereka itu: mendidik anak-anak
									 tanpa perkataan keras atau membentak.
									 <br><br>
									 Selain laman internet, Go-Dongeng juga mengembangkan sebuah
									  aplikasi berisi kumpulan dongeng yang diberi nama “Ngedongeng”.
										Aplikasi ini dikembangkan untuk gawai dan dapat diunduh
										melalui Google Play Store.
										<br><br>
									Tim Go-Dongeng tergerak untuk membentuk laman dan aplikasi
									dongeng untuk anak-anak karena munculnya sinetron
									yang berisi pesan yang jauh dari nilai moral.
									Tim yang terdiri atas empat sampai lima orang ini
									menilai bahwa keberadaan media pendidikan tertulis
									yang menghibur serta menampilkan karakteristik yang
									baik sangat diperlukan. Laman dan aplikasi dongeng
									yang mereka kembangkan juga bertujuan untuk memberi
									pesan mendidik tanpa hardik.
									<br><br>
									“Mendidik tanpa hardik”
									sekaligus menjadi slogan tim Go-Dongeng.
									Menurut tim tersebut, pendidikan secara tidak langsung
									memiliki nilai yang utama dan sering diingat.
									Pesan moral yang disampaikan melalui pendidikan akan
									langsung terbayang oleh pembaca.
									Tanpa adanya pengajaran, pesan moral dapat disampaikan kepada pembaca.
									<br><br>
									Laman dan aplikasi yang dikembangkan oleh tim Go-Dongeng ini ditujukan
									untuk anak-anak berusia 8 sampai 10 tahun.
									Tim sendiri menyarankan bahwa layanan mereka
									diakses oleh anak-anak yang usianya berada di rentang tersebut Konten
									 yang mereka sediakan bergenre narasi-fiksi, sebab semua konten yang
									 mereka sediakan berupa dongeng dan cerita anak.
									 <br><br>
									 Tim Go-Dongeng menyebutkan bahwa dengan mengembangkan laman
									 dan aplikasi untuk anak, mereka dapat memberikan ilmu yang
									 berguna dan bermanfaat bagi anak-anak. Selain itu, dalam
									 pengelolaan laman “Go-Dongeng” dan aplikasi “Ngedongeng”,
									 tim juga mengalami berbagai tantangan. Mereka menyebutkan,
									 bahwa tim kadang tidak mempunyai ide untuk diubah menjadi konten,
									  atau sebaliknya, ide yang dimiliki sulit diubah menjadi konten.
										Selain ide, terdapat pula kendala waktu.
										<br><br>
										Di zaman teknologi dan digital ini, tim Go-Dongeng harus bersaing
										dengan begitu banyak laman dan aplikasi yang memiliki tujuan dan kegunaan serupa.
										Tim Go-Dongeng juga melakukan upaya untuk memastikan agar laman dan aplikasi
										mereka tidak kalah menarik dibandingkan dengan produk lainnya.
										Upaya yang mereka lakukan adalah menyajikan kalimat yang kreatif
										serta menyajikan masalah kekinian yang disertai dengan pesan moral sepadan.
										<br><br>
										Tim Go-Dongeng juga mempunyai harapan yang hendak dicapai.
										Sebagai pengembang konten digital, ada pula harapan atau target
										yang ingin dicapai oleh tim. Mereka berharap agar laman mereka
										dapat mencapai 100 pembaca setiap hari dan 3000-4000 pembaca setiap bulan,
										serta mengalami peningkatan jumlah pembaca sebesar 5% setiap tahun.
										Sebagai pemerhati anak dan penulis atau penyedia konten untuk anak,
										tim Go-Dongeng juga mempunyai harapan terkait dunia bacaan anak digital di Indonesia.
										 Mereka berharap agar bacaan digital yang berkembang tidak hanya berperan sebagai media penghibur.
										  Bacaan digital juga dapat berperan sebagai media pengajaran untuk anak-anak agar mereka menyukai
										kegiatan membaca dongeng dan memahami nilai moral yang diajarkan di sekolah dasar.
										<br><br>
										Sebagai pengembang aplikasi digital yang baru dan masih berkembang,
										tim Go-Dongeng berpotensi menghasilkan bacaan yang berkualitas untuk anak-anak.
										Ditambah lagi, tim Go-Dongeng menghasilkan semua karyanya sendiri dengan penuh
										pertimbangan agar berkualitas untuk anak. Penerbit bacaan anak seperti inilah yang
										memberikan harapan bagi dunia sastra anak dan perlu diperhatikan,
										didukung penuh oleh pemerintah dan para orang tua. </p>
										<br>
										Pengantar oleh Adela Ayu, Galuh Kania, Rafli Syahrizal (Universitas Indonesia | Fakultas Ilmu Pengetahuan Budaya | Program Studi Indonesia)
									</div>
								</div>

            </div>
          </div>
        </div>
         </div>
      </section>
