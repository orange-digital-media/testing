<?php include 'header.php'; ?>
<section class="rrSlideDetails">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-12">
				<div class="card cardFormRegisterDett">
					<div class="card-body">

						<h1 class="card-title">Prestige Lakeside Habitat</h1>
						<h2 class="card-title">At Varthur Hobli, Gunjur Village, Sarjapur Road, Bangalore</h1>
							<h3 class="card-title">By Prestige Group</h3>


							<h4 class="card-title">Total Development- 102 Acres</h4>
							<!-- <h4 class="card-title">Possession - Dec 2024</h4> -->
							<h4 class="card-title">Number of Units - 271 Luxury Villas</h4>
							<!-- <h4 class="card-title">Bedrooms - 3BHK, 4BHK</h4>  -->


							<button type="submit" class="btn btnBtwRegg">Limited Period Prices</button>

							<h3 class="card-title">Villas Starts From</h3>
							<h1 class="card-title">₹ 5.45* Crore onwards</h1>

							</form>


							<button type="button" class="btn btnBtwReg" data-toggle="modal" data-target="#uploadModal">Enquire Now</button>
							</form>
							<h6 class="rerNo">RERA No - PRM/KA/RERA/1251/446/PR/170915/000176</h6>

					</div>
				</div>
			</div>
			<div class="col-md-6 col-12">
				<div class="card cardFormRegisterDet1">
					<div class="card-body">
						<h1 class="card-title">BOOK A SITE VISIT</h1>
						<form method="post" action="<?= base_url('sendMail') ?>">
							<div class="form-group">
								<input type="text" name="name" placeholder="Name" required="">
							</div>
							<div class="form-group">
								<input type="text" id="mobile" class="phone-field mobile" name="mobile" placeholder="10 Digits Mobile Number" required="" pattern="[1-9]{1}[0-9]{9}">
							</div>
							<div class="radioLeft1">
								<p>Whatsapp Number</p><br>
								<input name="whatsapp_option" id="whatsapp_option" class="whatsapp_option" value="same_as_above" type="radio" required="" checked=""><label>&nbsp;Same as Above&nbsp;&nbsp;&nbsp;</label>
								<input name="whatsapp_option" id="whatsapp_option" class="whatsapp_option" value="different_number" type="radio"><label>&nbsp;Different Number</label> <br>
							</div>
							<div class="form-group" id="whatsapp_mobile_div" class="whatsapp_mobile_div" style="display: none">
								<input type="text" id="whatsapp_mobile" class="phone-field whatsapp_mobile" name="whatsapp_mobile" placeholder="10 Digits Whatsapp Number">
							</div>

							<div class="form-group">
								<input type="text" name="current_city" placeholder="Enter Your City" required="">
							</div>
							<div class="form-group">
								<input type="email" name="email" placeholder="Email" required="">
							</div>
							<div style="display:none;">
								<input type="text" value="" class="utm_source" name="utm_source" />
								<input type="text" value="" class="utm_medium" name="utm_medium" />
								<input type="text" value="" class="utm_term" name="utm_term" />
								<input type="text" value="" class="utm_campaign" name="utm_campaign" />
								<input type="text" value="" class="utm_content" name="utm_content" />

								<input type="text" value="" class="utm_site" name="utm_site" />
								<input type="text" value="" class="utm_url" name="utm_url" />
								<input type="text" value="" class="utm_title" name="utm_title" />
								<input type="text" value="" class="utm_timestamp" name="utm_timestamp" />
								<input type="text" value="" class="utm_itemID" name="utm_itemID" />
							</div>
							<button type="submit" class="btn btnBtwReg1">Enquire Now</button>
						</form>
						<h3 class="">Call Us 24/7 @ +91 6360690190</h3>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="royaloverview anchor mt-3" id="royaloverview">
	<div class="container">
		<h1>OVERVIEW</h1>
		<div class="row">
			<div class="col-md-6">
				<h1 class="rajGreenDescript">Prestige Lakeside Habitat - Villas</h1>
				<h6 class="text-center rajGreenDescript">RERA No : PRM/KA/RERA/1251/446/PR/170915/000176 <h6>
						<p class="royal">Prestige Lakeside Habitat is a sprawling luxury enclave by the Prestige Group overlooking the scenic Varthur Lake. Located on Whitefield-Sarjapur Road and spread over 102 acres, it consists of 271 luxury villas in 3 and 4 bedroom configurations set in their own private gardens. The entire township is designed around to offer you a veritable fairyland to call home. The air and will make living here a truly enthralling experience. One captivating facet of Prestige Lakeside Habitat is the humungous 80 acres of open landscape available to you. Talk about a breath of fresh air, this is indeed more than a lungful. You’ll be hard-pressed to put your finger on another development that provides you with an open space that this expansive. Everywhere you go you will be enveloped in an ethereal, magical atmosphere that is both enthralling and reassuring.</p>

						<div class="text-center">
							<button type="subit" class="btn btnRequest" data-toggle="modal" data-target="#uploadModal">Download Brochure</button>
						</div>
			</div>
			<div class="col-md-6">

				<img src="<?= base_url('images/overview.jpeg') ?>">
			</div>
		</div>
	</div>
</section>









<section class="Amenities  anchor mt-3" id="Amenities">
	<div class="container">
		<h1 class="text-center pt-3 mb-4">Amenities</h1>
		<div class="row justify-content-center pl-md-4">
			<div class="col-md-2 col-6 imgAmmmedites">
				<img src="<?= base_url('images/meditation-yoga.png') ?>">
				<h4>Aerobics/Yoga Room</h4>
			</div>
			<div class="col-md-2 col-6 imgAmmmedites">
				<img src="<?= base_url('images/play.png') ?>">
				<h4>Basketball Court</h4>
			</div>
			<div class="col-md-2 col-6 imgAmmmedites">
				<img src="<?= base_url('images/badminton.png') ?>">
				<h4>Badminton</h4>
			</div>
			<div class="col-md-2 col-6 imgAmmmedites">
				<img src="<?= base_url('images/children.png') ?>">
				<h4>Childrens Play Area</h4>
			</div>
			<div class="col-md-2 col-6 imgAmmmedites">
				<img src="<?= base_url('images/cricket.png') ?>">
				<h4>Cricket Pitch</h4>
			</div>
			<div class="col-md-2 col-6 imgAmmmedites">
				<img src="<?= base_url('images/golf.png') ?>">
				<h4>Golf Course</h4>
			</div>
			<div class="col-md-2 col-6 imgAmmmedites">
				<img src="<?= base_url('images/gym.png') ?>">
				<h4 class="gymDet">Gymnasium</h4>
			</div>
			<div class="col-md-2 col-6 imgAmmmedites">
				<img src="<?= base_url('images/indoor.png') ?>">
				<h4>Indoor Games</h4>
			</div>
			<div class="col-md-2 col-6 imgAmmmedites">
				<img src="<?= base_url('images/skating.png') ?>">
				<h4>Skating Rink</h4>
			</div>
			<div class="col-md-2 col-6 imgAmmmedites">
				<img src="<?= base_url('images/squash.png') ?>">
				<h4>Squash Court</h4>
			</div>
			<div class="col-md-2 col-6 imgAmmmedites">
				<img src="<?= base_url('images/swimming.png') ?>">
				<h4>Swimming Pool</h4>
			</div>
			<div class="col-md-2 col-6 imgAmmmedites">
				<img src="<?= base_url('images/table-tennis.png') ?>">
				<h4>Tennis Court</h4>
			</div>

		</div>
	</div>
	</div>
</section>


<section class="anchor" id="price">
	<div class="container">
		<h1 class="text-center pricehe pt-3 mb-4">Pricing</h1>
		<div class="row">




			<div class="col-md-6 m-auto">
				<div class="card cardBhkApartment mt-3">
					<div class="card-body">
						<h1> 3 BHK </h1>
					</div>
				</div>

				<div class="card cardUnitArea">
					<img class="card-img-top" src="<?= base_url('images/home.png') ?>">
					<div class="card-body">
						<p class="text-center"><i class="fa fa-check" aria-hidden="true"></i> Area: 3130 sq.ft.</p>
						<p class="text-center"><i class="fa fa-check" aria-hidden="true"></i> 5.45* Crore onwards</p>
						<div class="nowButtonDet">
							<button type="submit" class="btn priceDetButton" data-toggle="modal" data-target="#uploadModal">Price</button>
						</div>
					</div>
				</div>
			</div>


			<div class="col-md-6 m-auto">
				<div class="card cardBhkApartment mt-3">
					<div class="card-body">
						<h1>4 BHK </h1>
					</div>
				</div>

				<div class="card cardUnitArea">
					<img class="card-img-top" src="<?= base_url('images/home.png') ?>">
					<div class="card-body">
						<p class="text-center"><i class="fa fa-check" aria-hidden="true"></i> Area: 4003 sq.ft</p>
						<p class="text-center"><i class="fa fa-check" aria-hidden="true"></i> 5.45* Crore onwards</p>
						<div class="nowButtonDet">
							<button type="submit" class="btn priceDetButton" data-toggle="modal" data-target="#uploadModal">Price</button>
						</div>
					</div>
				</div>
			</div>



			<!-- <div class="col-md-3">
				<div class="card cardBhkApartment mt-3">
					<div class="card-body">
						<h1>4 BHK</h1>
					</div>
				</div>

				<div class="card cardUnitArea">
					<img class="card-img-top" src="<?= base_url('images/home.png') ?>">
					<div class="card-body">
						<p class="text-center"><i class="fa fa-check" aria-hidden="true"></i> Area: 2204 - 2290 sq.ft</p>
						<p class="text-center"><i class="fa fa-check" aria-hidden="true"></i>  1.34 - 1.39 Cr Onwards*</p>
						<div class="nowButtonDet">
							<button type="submit" class="btn priceDetButton" data-toggle="modal" data-target="#uploadModal">Price</button>
						</div>
					</div>
				</div>
			</div>
 -->


			<!-- <div class="col-md-4">
				<div class="card cardBhkApartment mt-3">
					<div class="card-body">
						<h1>15 x 18 M PLOT</h1>
					</div>
				</div>

				<div class="card cardUnitArea">
					<img class="card-img-top" src="<?= base_url('images/home.png') ?>">
					<div class="card-body">
						<p class="text-center"><i class="fa fa-check" aria-hidden="true"></i> Area: 2906 sq.ft</p>
						<p class="text-center"><i class="fa fa-check" aria-hidden="true"></i>  1.60 Cr Onwards*</p>
						<div class="nowButtonDet">
							<button type="submit" class="btn priceDetButton" data-toggle="modal" data-target="#uploadModal">Price</button>
						</div>
					</div>
				</div>
			</div> -->

			<!-- <div class="col-md-4">
				<div class="card cardBhkApartment mt-3">
					<div class="card-body">
						<h1>15 x 24 M PLOT</h1>
					</div>
				</div>

				<div class="card cardUnitArea">
					<img class="card-img-top" src="<?= base_url('images/home.png') ?>">
					<div class="card-body">
						<p class="text-center"><i class="fa fa-check" aria-hidden="true"></i> Area: 3875 sq.ft</p>
						<p class="text-center"><i class="fa fa-check" aria-hidden="true"></i>  2.13 Cr Onwards*</p>
						<div class="nowButtonDet">
							<button type="submit" class="btn priceDetButton" data-toggle="modal" data-target="#uploadModal">Price</button>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card cardBhkApartment mt-3">
					<div class="card-body">
						<h1>ODD SIZES PLOT</h1>
					</div>
				</div> -->
			<!-- 
				<div class="card cardUnitArea">
					<img class="card-img-top" src="<?= base_url('images/home.png') ?>">
					<div class="card-body">
						<p class="text-center"><i class="fa fa-check" aria-hidden="true"></i> 235 PLOTS</p>
						<p class="text-center"><i class="fa fa-check" aria-hidden="true"></i>Enquire Now</p>
						<div class="nowButtonDet">
							<button type="submit" class="btn priceDetButton" data-toggle="modal" data-target="#uploadModal">Price</button>
						</div>
					</div>
				</div>
			</div>

 -->

		</div>
</section>

<section class="specificationDet mt-4" id="Specification">
	<h1 class="text-center mb-4 text-white">Project Highlights</h1>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="card">
					<div class="card-body">
						<ul class="text-black">
							<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i>RCC Framed Structure.</li>
							<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i>Elegant Ground Floor Lobby Flooring and Cladding in Granite/Marble.
							</li>
							<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i>Suitable Size and Capacity Passenger Lifts in Every Block.</li>
							<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i>Vitrified Tiles in the Foyer, Living, Dining, Corridors, Family Area and All Bedrooms.</li>

						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card">
					<div class="card-body">
						<ul>
							<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i>Anti-skid Ceramic Tiles for Flooring.</li>
							<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i>Cement/Textured Paint on External Walls.</li>
							<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i>MS Designer Grill Enamel Painted for Ground Floor Apartments Only</li>
							<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i>Concealed Wiring with PVC Insulated Copper Wires and Modular Switches</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- 		<div class="col-md-4">
				<ul>
					<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i>Indoor Games Room</li>
					<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i>Dance & Zumba Studio</li>
				</ul>
			</div> -->
		</div>
		<div class="requestCallBack mt-4">
			<button type="subit" class="btn btnRequest" data-toggle="modal" data-target="#uploadModal">Download Brochure</button>
		</div>
	</div>
</section>





<section class="master_plan container" id="Master">
	<h1>Master Plan</h1>
	<div class="img_wrapper">
		<img class="card-img-top" src="<?= base_url('images/masterplan.jpeg') ?>">
	</div>
</section>

<h1 class="text-center pricehe pt-3 mb-3">Walkthrough Video</h1>
<div class="container">
	<div class="row">
		<div class="col-md-12 m-auto">
			<?php if ((isset($video_play)) and ((bool)$video_play) == true) { ?>
				<iframe width="100%" height="550px" class="youtubevideo_1" src="https://www.youtube.com/embed/YB1YHpLP3Go?autoplay=1&cc_load_policy=1  " frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

			<?php } else { ?>
				<img width="100%" height="100%" data-toggle="modal" data-target="#videoModal" src="<?= base_url('images/youtubeimg_1.jpg') ?>">

			<?php } ?>
		</div>
	</div>
</div>
</div>
</section>
<section class="mt-4 map_section">
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d124453.071511613!2d77.63274135805882!3d12.897528785510836!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae13bc4561d415%3A0x622bd394bf6af50e!2sPrestige%20Lakeside%20Habitat!5e0!3m2!1sen!2sin!4v1662209480441!5m2!1sen!2sin" width="100%" height="315" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>








<?php include 'footer.php'; ?>