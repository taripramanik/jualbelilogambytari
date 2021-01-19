<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		
		
		<title>Pengepulan Logam</title>
		
		
		<!--=====================================================
			CSS Stylesheets
		=====================================================-->
		<link rel='stylesheet' type='text/css' href='{{asset("")}}bootstrap/css/bootstrap.min.css' >
		<link rel='stylesheet' type='text/css' href='{{asset("")}}css/linea.css' >
		<link rel='stylesheet' type='text/css' href='{{asset("")}}css/ionicons.min.css' >
		<link rel='stylesheet' type='text/css' href='{{asset("")}}css/owl.carousel.css' >
		<link rel='stylesheet' type='text/css' href='{{asset("")}}css/magnific-popup.css' >
		<link rel='stylesheet' type='text/css' href='{{asset("")}}css/style.css?{{ time() }}' >
		
	</head>
	<body>	
		
		
		<!--=====================================================
			Preloader
		=====================================================-->
		<div id='preloader' >
			<div class='loader' ></div>
			<div class='left' ></div>
			<div class='right' ></div>
		</div>
		
		
		<div class='main-content' >
			
			<!--=====================================================
				Page Borders
			=====================================================-->
			<div class='page-border border-left' ></div>
			<div class='page-border border-right' ></div>
			<div class='page-border border-top' ></div>
			<div class='page-border border-bottom' ></div>
			
			
			
			<!--=====================================================
				Menu Button
			=====================================================-->
			<a href='#' class='menu-btn' >
				<span class='lines' >
					<span class='l1' ></span>
					<span class='l2' ></span>
					<span class='l3' ></span>
				</span>
			</a>
			
			
			<!--=====================================================
				Menu
			=====================================================-->
			<div class='menu' >
				<div class='inner' >
					<ul class='menu-items' >
						
						<li>
							<a href='#' class='section-toggle' data-section='intro' >
								Halaman Utama
							</a>
						</li>
						
						<li>
							<a href='#about' class='section-toggle' data-section='about' >
								Tentang<br>
								Website
							</a>
						</li>
						
						<li>
							<a href='#login' class='section-toggle' data-section='login' >
								Informasi Data<br />Logam
							</a>
						</li>
						
						@if($user)
						<li>
							<a href='#akun' class='section-toggle' data-section='akun' >
								Akun Saya
							</a>
						</li>
						@endif
						
						<li>
							<a href='#portfolio' class='section-toggle' data-section='portfolio' >
								Galeri
							</a>
						</li>
						
						
						<li>
							<a href='#contact' class='section-toggle' data-section='contact' >
								Kontak
							</a>
						</li>
						
						
					</ul>
				</div>
			</div>
			
			<div class='animation-block' ></div>
			
			
			<!--=====================================================
				Sections
			=====================================================-->
			<div class='sections' >
				
				<!--=====================================================
					Main Section
				=====================================================-->
				<section id='intro' class='section section-main active' >
					
					<div class='container-fluid' >
						
						<div class='v-align' >
							<div class='inner' >
								<div class='intro-text' >
									
									<h1>JUAL-BELI LOGAM</h1>

									<p>
										HASILKAN UANG DARI LOGAM BEKAS
									</p>
									
										<p style="font-family:'Times New Roman', Times, serif; color:white;"> Silahkan lakukan <a href='#daftar' class='registrasi section-toggle' data-section='daftar' >registrasi</a></u> untuk bergabung di jual-beli logam</p>
								
								</div>
							</div>
							
						</div>
						
					</div>
				
				</section>
				
				
				<!--=====================================================
					Akun Section
				=====================================================-->
				@if($user)
				<section id='akun' class='section border-d' >
					
					<div class='section-block' >
						<div class='container-fluid' >
							
							<div class='section-header' >
								<h2>
									Informasi Akun
								</h2>
							</div>
							
							<div class='row' style="margin-top: 50px;" >							
								<div class='col-md-6 pt-100' >
									<h4>Detail Akun</h4>
									<table class="table">
										<tr>
											<td>Nama </td>
											<td>{{ Auth::user()->name }}</td>
										</tr>
										<tr>
											<td>Email </td>
											<td>{{ Auth::user()->email }}</td>
										</tr>
										<tr>
											<td>No Telephone </td>
											<td>{{ Auth::user()->no_telephone }}</td>
										</tr>
										<tr>
											<td>Alamat </td>
											<td>{{ Auth::user()->alamat }}</td>
										</tr>
									</table>
								</div>
								<div class="col-md-6">
									<h4>Saldo</h4>
									<table class="table">
										<tr>
											<td>Jumlah saldo saat ini</td>
											<td>: {{ rupiah(getSaldo()) }}</td>
										</tr>
										@php $ppp = !punyaPengajuanPencairan(); @endphp
										@if($ppp)
										<tr class="input-cairkan-td" style="display: none;">
											<td>Jumlah yang ingin dicairkan<br>(Minimal 30.000)</td>
											<td>
												<input name="pencairan" class="input-cairkan" placeholder="Contoh: 10000" />
											</td>
										</tr>
										@endif
										<tr>
											<td style="width: 50%;"></td>
											<td style="width: 50%;">
												@if($ppp)
												<a href="#akun" class="btn-custom section-toggle btn-cairkan">
													Cairkan
												</a>
												@endif
											<p style="display:{{ $ppp ? 'none' : 'block' }}">Pencairan saldo telah diajukan, silahkan ambil saldo di pengepul.</p>
											</td>
										</tr>
									</table>
								</div>
							</div>
							
						</div>
					</div>
					
				</section>
				@endif
				
				<!--=====================================================
					About Section
				=====================================================-->
				<section id='about' class='section about-section border-d' >
					
					<div class='section-block about-block' >
						<div class='container-fluid' >
							
							<div class='section-header' >
								<h2>
									Bagaimana<strong class='color' >Cara kerja dari website ini?</strong>
								</h2>
							</div>
							
							<div class='row' >							
								<div class='col-md-8' >
								
									<div class='about-text' >
										<p>
										
										</p>

										<p>
										
										</p>

										<p>
										
										</p>

									</div>
									
								</div>
								
							</div>
							
						</div>
					</div>
					
				</section>
				
				<!--=====================================================
					Transaction Section
				=====================================================-->
				<section id='login' class='section resume-section border-d' >
					
					<div class='section-block timeline-block' >
						
						<div class='container-fluid' >
							
							<div class='section-header' >
								
								<h2>Informasi<strong class='color' >Hasil Pengumpulan Logam</strong></h2>
								@if($user) <h3 style="font-family: sans-serif;"> {{ $user->name }} </h3> @endif
							</div>
							@if(!$user)
							<div class='intro-btns' >
								<a href='#daftar' class='btn-custom section-toggle' data-section='daftar' >
									DAFTAR
								</a>
								
								<a href='#masuk' class='btn-custom section-toggle' data-section='masuk' >
									MASUK
								</a>
							</div>
							@else
							<table class="table blue">
							<thead>
								<tr>
									<td> No </td>
									<td> Tanggal </td>
									<td> Berat </td>
									<td> Harga Total </td>
								</tr>
							</thead>
							<tbody>
								@php 
									$jumlah_sampah = 0; 
								@endphp
								@foreach ($data as $index => $item)
								@php 
									$jumlah_sampah += $item->berat;
									$tanggal = new Carbon($item->created_at);
								@endphp
								<tr>
									<td>{{ ++$index }}</td>
									<td>{{ $tanggal->format('d F Y') }}</td>
									<td>{{ $item->berat }} kg</td>
									<td>{{ rupiah($item->harga_total) }}</td>
								</tr>
								@endforeach
							</tbody>
							</table>
							<a href='{{ route("logout") }}' class='btn-custom section-toggle' >
								KELUAR
							</a>
							@endif
							
						</div>
						
					</div>
					
				</section>
				
				<!--=====================================================
					Daftar Section
				=====================================================-->
				<section id='daftar' class='section resume-section border-d' >
					
					<div class='section-block timeline-block' >
						
						<div class='container-fluid' >
							
							<div class='section-header' >
								
								<h2>Daftar</h2>
								
							</div>
							<div class='row'>
								<div class='col-md-10'>
									<form id='contact-form' data-toggle='validator' method='post' action='{{ route("createUser") }}' >
											{{ csrf_field() }}
											<div id='contact-form-result' ></div>
										
											<div class='row' >
												
												<div class='col-md-12' >
													<div class='form-group' >
														
														<input autocomplete="off" type='text' class='form-control' placeholder='Name' name='name' required>
														<div class='help-block with-errors' ></div>
														
													</div>												
												</div>
												
												<div class='col-md-12' >
													<div class='form-group' >
														
														<input autocomplete="off" type='email' class='form-control' placeholder='Email' name='email' required>
														<div class='help-block with-errors' ></div>
													
													</div>
												</div>
												
												<div class='col-md-12' >
													<div class='form-group' >
														
														<input autocomplete="off" type='text' class='form-control' placeholder='No.Telepon' name='no_telephone' required>
														<div class='help-block with-errors' ></div>
													
													</div>
												</div>
												
												<div class='col-md-12' >
													<div class='form-group' >
														<input autocomplete="off" type='text' class='form-control' placeholder='Alamat' name='alamat' required>
														<div class='help-block with-errors' ></div>
													
													</div>
												</div>
											</div>
											
											<div class='form-group' >
												
												<input type='password' class='form-control' placeholder='Password' name='password' required>
												<div class='help-block with-errors' ></div>
											
											</div>
											
											<div class='form-group text-center' >
												<button type='submit' class='btn-custom btn-color' >
													Daftar
												</button>
											</div>
											
										</form>
								</div>
							</div>
						</div>
					</div>
				</section>
				
				<!--=====================================================
					Masuk Section
				=====================================================-->
				<section id='masuk' class='section resume-section border-d' >
					
					<div class='section-block timeline-block' >
						
						<div class='container-fluid' >
							
							<div class='section-header' >
								
								<h2>Masuk</h2>
								
							</div>
							<div class='row'>
								<div class='col-md-10'>
									<form id='login-form' data-toggle='validator' method='post' action='{{ route("loginUser") }}' >
										{{ csrf_field() }}
											<div id='contact-form-result' ></div>
										
											<div class='row' >
												
												<div class='col-md-6' >
													<div class='form-group' >
														
														<input type='text' class='form-control' placeholder='Username' name='email' required>
														<div class='help-block with-errors' ></div>
														
													</div>												
												</div>
												
												<div class='col-md-6' >
													<div class='form-group' >
														
														<input type='password' class='form-control' placeholder='password' name='password' required>
														<div class='help-block with-errors' ></div>
													
													</div>
												</div>
												
											</div>																				
											<div class='form-group text-center' >
												<button type='submit' class='btn-custom btn-color' >
													Masuk
												</button>
											</div>
											
										</form>
								</div>
							</div>
						</div>
					</div>
				</section>
				
				<!--=====================================================
					Gallery Section
				=====================================================-->
				<section id='portfolio' class='section portfolio-section border-d' >
					
					<div class='section-block portfolio-block' >
						
						<div class='container-fluid' >
							
							
							<div class='section-header' >
								<h2>Media<strong class='color' >Pengepulan Logam</strong></h2>
							</div>
							
							<ul class='portfolio-filters' >
								<li>
									<a href='#' class='active' data-group='all' >
										Photos
									</a>
								</li>
							</ul>
							
							<ul class='portfolio-items' >
								
								<li data-groups='["web","tech"]' >
									<div class='inner' >
										<img src='img/portfolio/1.jpg' alt>
										
										<div class='overlay' >
											
											<a href='#popup-1' class='view-project' >
												View Photo
											</a>
											
											<!--project popup-->
											<div id='popup-1' class='popup-box zoom-anim-dialog mfp-hide' >
												<figure>
													
													<!--project popup image-->
													<img src='img/portfolio/1.jpg' alt>
												
												</figure>
												<div class='content' >
													
													<!--project popup title-->
													<h4>Photos Title</h4>
													
													<!--project popup description-->
													<p>
														Masukin Deskripsi ya Tar nanti
													</p>
													
												</div>
												
											</div>
											
										</div>
										
									</div>
								</li>
								
								<li data-groups='["tech","photography"]' >
									<div class='inner' >
										<img src='img/portfolio/2.jpg' alt>
										
										<div class='overlay' >
											
											<a href='#popup-2' class='view-project' >
												View Photo
											</a>
											
											<!--project popup-->
											<div id='popup-2' class='popup-box zoom-anim-dialog mfp-hide' >
												<figure>
													
													<!--project popup image-->
													<img src='img/portfolio/2.jpg' alt>
												
												</figure>
												<div class='content' >
													
													<!--project popup title-->
													<h4>Photos Title</h4>
													
													<!--project popup description-->
													<p>
														Masukin Deskripsi ya Tar nanti
													</p>
													
												</div>
												
											</div>
											
										</div>
										
									</div>
								</li>
								
								<li data-groups='["web","photography"]' >
									<div class='inner' >
										<img src='img/portfolio/3.jpg' alt>
										
										<div class='overlay' >
											
											<a href='#popup-3' class='view-project' >
												View Photo
											</a>
											
											<!--project popup-->
											<div id='popup-3' class='popup-box zoom-anim-dialog mfp-hide' >
												<figure>
													
													<!--project popup image-->
													<img src='img/portfolio/3.jpg' alt>
												
												</figure>
												<div class='content' >
													
													<!--project popup title-->
													<h4>Photos Title</h4>
													
													<!--project popup description-->
													<p>
														Masukin Deskripsi ya Tar nanti
													</p>
													
												</div>
												
											</div>
											
										</div>
										
									</div>
								</li>
								
								
								<li data-groups='["web"]' >
									<div class='inner' >
										<img src='img/portfolio/4.jpg' alt>
										
										<div class='overlay' >
											
											<a href='#popup-4' class='view-project' >
												View Photo
											</a>
											
											<!--project popup-->
											<div id='popup-4' class='popup-box zoom-anim-dialog mfp-hide' >
												<figure>
													
													<!--project popup image-->
													<img src='img/portfolio/4.jpg' alt>
												
												</figure>
												<div class='content' >
													
													<!--project popup title-->
													<h4>Photo Title</h4>
													
													<!--project popup description-->
													<p>
														Masukin Deskripsi ya Tar nanti
													</p>
													
												</div>
												
											</div>
											
										</div>
										
									</div>
								</li>
								
								<li data-groups='["tech"]' >
									<div class='inner' >
										<img src='img/portfolio/5.jpg' alt>
										
										<div class='overlay' >
											
											<a href='#popup-5' class='view-project' >
												View Photo
											</a>
											
											<!--project popup-->
											<div id='popup-5' class='popup-box zoom-anim-dialog mfp-hide' >
												<figure>
													
													<!--project popup image-->
													<img src='img/portfolio/5.jpg' alt>
												
												</figure>
												<div class='content' >
													
													<!--project popup title-->
													<h4>Photo Title</h4>
													
													<!--project popup description-->
													<p>
														Masukin Deskripsi ya Tar nanti
													</p>
													
												</div>
												
											</div>
											
										</div>
										
									</div>
								</li>
								
								<li data-groups='["photography"]' >
									<div class='inner' >
										<img src='img/portfolio/6.jpg' alt>
										
										<div class='overlay' >
											
											<a href='#popup-6' class='view-project' >
												View Photo
											</a>
											
											<!--project popup-->
											<div id='popup-6' class='popup-box zoom-anim-dialog mfp-hide' >
												<figure>
													
													<!--project popup image-->
													<img src='img/portfolio/6.jpg' alt>
												
												</figure>
												<div class='content' >
													
													<!--project popup title-->
													<h4>Photos Title</h4>
													
													<!--project popup description-->
													<p>
														Masukin Deskripsi ya Tar nanti
													</p>
													
												</div>
												
											</div>
											
										</div>
										
									</div>
								</li>
								
							</ul>
							
						</div>
					
					</div>
					
				</section>
				
				
				<!--=====================================================
					Contact Section
				=====================================================-->
				<section id='contact' class='section contact-section border-d' >
					
					<div class='section-block contact-block' >
						
						<div class='container-fluid' >
							
							<div class='section-header color' >
								<h2>Hubungi<strong>Kami</strong></h2>
							</div>
							
							
							
								
								<div class='col-md-6' >
									
									<div class='contact-info-icons' >
										
										<div class='contact-info' >
											
											<i class='ion-ios-location-outline' ></i>
											
											<p>
												Jl. Cibaduyut Raya No.27<br>
												Kota Bandung, Jawa Barat, Indonesia.
											</p>
											
										</div>
										
										
										<div class='contact-info' >
											
											<i class='ion-ios-telephone-outline' ></i>
											
											<p>
												0878-4742-9777<br>
											</p>
											
										</div>
										

										
									</div>
									
									
									
								</div>
								
								
							</div>
							
							
							
						</div>
					
					</div>
					
				</section>
				
			</div>
			
		</div>

		{{ csrf_field() }}
		
		
		<!--=====================================================
			JavaScript Files
		=====================================================-->
		<script src='{{ asset("") }}js/jquery.min.js' ></script>
		<script src='{{ asset("") }}js/jquery.shuffle.min.js' ></script>
		<script src='{{ asset("") }}js/owl.carousel.min.js' ></script>
		<script src='{{ asset("") }}js/jquery.magnific-popup.min.js' ></script>
		<script src='{{ asset("") }}js/validator.min.js' ></script>
		<script src='{{ asset("") }}js/script.js' ></script>
		<script src='{{ asset("") }}js/sweetalert.min.js' ></script>
		
		<script>
		@if($error) {!! "alert('" . $error . "')" !!}
		@endif
		$(function() {
			var token = $('input[name="_token"]').val();
			
			let hash = window.location.hash
			if(hash == "#daftar" || hash == "#masuk") {
				$('.page-border').addClass('cyan-border')
				$('.lines span').addClass('cyan-color')
			}

			$('input[name="pencairan"]').on('keypress', function(e) {
				if (e.which < 48 || e.which > 57) e.preventDefault()
			});

			$('.btn-cairkan').on('click', function(e) {
				var inputCairkanTd = $('.input-cairkan-td');
				var inputCairkan = $('input[name="pencairan"]');
				if(inputCairkanTd.css('display') === 'none') {
					return inputCairkanTd.show(300);
				}
				if(Number(inputCairkan.val()) < 30000) return alert('Pencairan minimal 30.000')
				var _btnCairkan = $(this);
				e.preventDefault();
				swal({
					title: 'Cairkan saldo',
					text: 'Saldo akan anda terima di pengepul.',
					icon: 'info',
					buttons: ['Batal', 'Cairkan']
				}).then((value) => {
					if(value) {
						$.ajax({
							url: window.location.origin + '/cairkan',
							method: 'POST',
							dataType: 'json',
							data: {
								'_token': token,
								'jumlah': inputCairkan.val()
							}
						}).done(function(data) {
							if (data.success) {
								_btnCairkan.hide(300);
								var parent = _btnCairkan.parent();
								parent.find('p').show(300)
								inputCairkanTd.hide(300);
							} else {
								swal('Informasi', data.message, 'error');
							}
						});
					}
				})
			});
		})
		$( window ).on( 'hashchange', function( e ) {
			let hash = window.location.hash
			if(hash == "#daftar" || hash == "#masuk") {
				$('.page-border').addClass('cyan-border')
				$('.lines span').addClass('cyan-color')
			} else {
				$('.page-border').removeClass('cyan-border')
				$('.lines span').removeClass('cyan-color')
			}
		} );
		</script>
	</body>
</html>
