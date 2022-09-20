<section class="footerDetails mt-3" id="contact">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4 pl-3">
				<h3 class="arrangeSite">Arrange Site Visit</h3>
        <form  class="cardFormRegisterDet d-block mx-auto" method="post" action="<?=base_url('pview/sendEnquiry')?>">
          <div class="form-group">
            <input type="text" name="name" placeholder="Name" required="">
          </div>
          <div class="form-group">
            <input type="text" id="mobile1" class="phone-field" name="mobile" placeholder="10 Digits Mobile Number" required="" pattern="[1-9]{1}[0-9]{9}">
          </div>
          <div class="radioLeft">
            <p>Whatsapp Number</p><br>
            <input name="whatsapp_option" id="whatsapp_option" class="whatsapp_option1" value="same_as_above" type="radio" required="" checked=""><label>&nbsp;Same as Above&nbsp;&nbsp;&nbsp;</label>  
            <input name="whatsapp_option" id="whatsapp_option" class="whatsapp_option1" value="different_number" type="radio"><label>&nbsp;Different Number</label> <br>
          </div>
          <div class="form-group" id="whatsapp_mobile_div1" class="whatsapp_mobile_div1" style="display: none" >
            <input type="text" id="whatsapp_mobile1" class="phone-field whatsapp_mobile" name="whatsapp_mobile" placeholder="10 Digits Whatsapp Number" >
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
          <button type="submit" class="btn registerDetails mx-auto d-block">Get Lowest Price Deal</button>
        </form>
      </div>
      <div class="col-md-4">
        <h3 class="nearestLocationDet">CONNECTIVITY</h3>
        <ul class="footerIconLocation">
      <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i>Oakridge School</li>
          <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i>Motherhood Hospital</li>
          <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i>RGA Tech Park</li>
          <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i>AZIM Premzi University</li>
          <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i>Swastik Hospital</li>
          <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i>Total Mall</li>
       </ul>
     </div>
     <div class="col-md-4">
      <h4>Contact Us</h4>
      <ul class="footerIconLocation">
				<!-- 	<div class="mailDetails">
						<i class="fa fa-envelope-o" aria-hidden="true"></i>
						<p><a href="mailto: sales@company.com">&nbsp;info@workolix.com</a></p>
					</div> -->
					<div class="phoneIconDet">
						<i class="fa fa-phone" aria-hidden="true"></i>
						<p>Phone:&nbsp;+91 6360690190</p>
					</div>
					<div class="addressDetails">
						<i class="fa fa-map-marker" aria-hidden="true"></i>
						<p>At Varthur Hobli, Gunjur Village, Sarjapur Road, Bangalore</p>
          </div>
        </ul>
      </div>
    </div>
  </div>
</section>
<section class="contactFooter">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">
        <p class="pl-4"><a target="_blank" href="#">Copyrights 2022. Presitage Groups.</a></p>
      </div>
      <div class="col-md-6">
        <p class="text-center pl-4"><a target="_blank" href="#">Authorized Channel Partner-Supriya R-PRM/KA/RERA/1250/302/AG/171211/001106</a></p>
      </div>
      <div class="col-md-3">
        <p class="pl-4"><a target="_blank" href="<?=base_url('privacy')?>">Privacy Policy</a><span><a target="_blank" href="<?=base_url('disclaimer')?>"> - Disclaimer</a></span></p>
      </div>
    </div>
  </div>
</section>
<a href="tel:+91 6360690190 " class="phoneDetails" target="_blank"><i class="fa fa-phone" aria-hidden="true"></i></a>
<!--<a href="https://api.whatsapp.com/send?phone=+916360690190&text=Hi%20I%20am%20interested%20in%20Godrej %20Ananda%20Project%20,pls%20call%20back%20and%20share%20the%20project%20details." class="float" target="_blank">-->
  <!--<i class="fa fa-whatsapp my-float"></i>-->
<!--</a>-->
<a class="float" target="_blank" data-toggle="modal" data-target="#whatsappModal"><i class="fa fa-whatsapp my-float"></i></a>

<a id="button"></a>

<div class="modal fade" id="whatsappModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal body -->
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <img class="logotext" src="<?=base_url('images/logo.png')?>">
        <form method="post" action="<?=base_url('pview/sendWhatsapp')?>" enctype="multipart/form-data">
         <div class="form-group">
          <input type="text" class="form-control" name="name" placeholder="Name" required="">
        </div>
        <div class="form-group">
          <input type="text" id="mobile4" class="form-control" name="mobile" placeholder="10 Digits Mobile Number" required="" pattern="[1-9]{1}[0-9]{9}">
        </div>

        <div class="radioLeft">
          <p>Whatsapp<span>Number</span></p><br>
          <input name="whatsapp_option" id="whatsapp_option" class="whatsapp_option4" value="same_as_above" type="radio" required="" checked=""><label>&nbsp;Same as Above&nbsp;&nbsp;&nbsp;</label>  
          <input name="whatsapp_option" id="whatsapp_option" class="whatsapp_option4" value="different_number" type="radio"><label>&nbsp;Different Number</label> <br>
        </div>
        <div class="form-group" id="whatsapp_mobile_div4" class="whatsapp_mobile_div4" style="display: none" >
          <input type="text" id="whatsapp_mobile4" class="form-control whatsapp_mobile" name="whatsapp_mobile" placeholder="10 Digits Whatsapp Number" >
        </div>

        <div class="form-group">
          <input type="hidden" value="frm_Whatsapp" name="current_city" placeholder="Enter Your City" class="form-control" required="">
        </div>
        <div class="form-group">
          <input type="hidden" value="frm_Whatsapp" class="form-control" name="email" placeholder="Email" required="">
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
        <button type="submit" class="btn btnModel">Fill and Continue</button>
      </form>
    </div>

  </div>
</div>
</div>


<div class="modal fade" id="uploadModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal body -->
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <img class="mx-auto d-block" src="<?=base_url('images/logo.png')?>">
        <form method="post" action="<?=base_url('pview/brouchureGetQUoteInsert')?>" enctype="multipart/form-data">
         <div class="form-group">
          <input type="text" class="form-control" name="name" placeholder="Name" required="">
        </div>
        <div class="form-group">
          <input type="text" id="mobile2" class="form-control" name="mobile" placeholder="10 Digits Mobile Number" required="" pattern="[1-9]{1}[0-9]{9}">
        </div>

        <div class="radioLeft">
          <p class="m-0">Whatsapp<span>&nbsp;Number</span></p><br>
          <input name="whatsapp_option" id="whatsapp_option" class="whatsapp_option2" value="same_as_above" type="radio" required="" checked=""><label>&nbsp;Same as Above&nbsp;&nbsp;&nbsp;</label>  
          <input name="whatsapp_option" id="whatsapp_option" class="whatsapp_option2" value="different_number" type="radio"><label>&nbsp;Different Number</label> <br>
        </div>
        <div class="form-group" id="whatsapp_mobile_div2" class="whatsapp_mobile_div2" style="display: none" >
          <input type="text" id="whatsapp_mobile2" class="form-control whatsapp_mobile" name="whatsapp_mobile" placeholder="10 Digits Whatsapp Number" >
        </div>

        <div class="form-group">
          <input type="text" name="current_city" placeholder="Enter Your City" class="form-control" required="">
        </div>
        <div class="form-group">
          <input type="email" class="form-control" name="email" placeholder="Email" required="">
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
        <button type="submit" class="btn btnModel">Register</button>
      </form>
    </div>

  </div>
</div>
</div>
<div class="modal fade" id="uploadBrouchure">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal body -->
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <img class="mx-auto d-block" src="<?=base_url('images/logo.png')?>">
        <form method="post" action="<?=base_url('pview/brouchureDownloadInsert')?>" enctype="multipart/form-data">
          <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Name" required="">
          </div>
          <div class="form-group">
            <input type="text" id="mobile3" class="form-control" name="mobile" placeholder="10 Digits Mobile Number" required="" pattern="[1-9]{1}[0-9]{9}">
          </div>
          <div class="radioLeft">
            <b>Whatsapp Number</b><br>
            <input name="whatsapp_option" id="whatsapp_option" class="whatsapp_option3" value="same_as_above" type="radio" required="" checked=""><label>&nbsp;Same as Above&nbsp;&nbsp;&nbsp;</label>  
            <input name="whatsapp_option" id="whatsapp_option" class="whatsapp_option3" value="different_number" type="radio"><label>&nbsp;Different Number</label> <br>
          </div>
          <div class="form-group" id="whatsapp_mobile_div3" class="whatsapp_mobile_div3" style="display: none" >
            <input type="text" id="whatsapp_mobile3" class="form-control whatsapp_mobile" name="whatsapp_mobile" placeholder="10 Digits Whatsapp Number" >
          </div>

          <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Email" required="">
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
          <button type="submit" class="btn btnModel">Register</button>
        </form>
      </div>

    </div>
  </div>
</div>

<div class="modal fade" id="videoModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal body -->
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <img class="mx-auto d-block" src="<?=base_url('images/logo.png')?>">
        <form method="post" action="<?=base_url('video_play')?>" >
         <div class="form-group">
          <input type="text" class="form-control" name="name" placeholder="Name" required="">
        </div>
        <div class="form-group">
          <input type="text" id="mobile2" class="form-control" name="mobile" placeholder="10 Digits Mobile Number" required="" pattern="[1-9]{1}[0-9]{9}">
        </div>

        <div class="radioLeft">
          <p class="m-0">Whatsapp<span>&nbsp;Number</span></p><br>
          <input name="whatsapp_option" id="whatsapp_option" class="whatsapp_option2" value="same_as_above" type="radio" required="" checked=""><label>&nbsp;Same as Above&nbsp;&nbsp;&nbsp;</label>  
          <input name="whatsapp_option" id="whatsapp_option" class="whatsapp_option2" value="different_number" type="radio"><label>&nbsp;Different Number</label> <br>
        </div>
        <div class="form-group" id="whatsapp_mobile_div2" class="whatsapp_mobile_div2" style="display: none" >
          <input type="text" id="whatsapp_mobile2" class="form-control whatsapp_mobile" name="whatsapp_mobile" placeholder="10 Digits Whatsapp Number" >
        </div>

        <div class="form-group">
          <input type="text" name="current_city" placeholder="Enter Your City" class="form-control" required="">
        </div>
        <div class="form-group">
          <input type="email" class="form-control" name="email" placeholder="Email" required="">
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
        <button type="submit" class="btn btnModel">Register</button>
      </form>
    </div>

  </div>
</div>

<script src="<?=base_url('assets/js/jquery-3.5.1.slim.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/bootstrap.min.js')?>"></script>


<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
<script src="<?=base_url('assets/js/jquery.ccpicker.js');?>" type="text/javascript"></script>

<script>
  $( document ).ready(function() {
    $("#mobile").CcPicker();
    $("#mobile").CcPicker("setCountryByCode","in");
    $("#whatsapp_mobile").CcPicker();
    $("#whatsapp_mobile").CcPicker("setCountryByCode","in");
    $("#mobile1").CcPicker();
    $("#mobile1").CcPicker("setCountryByCode","in");
    $("#whatsapp_mobile1").CcPicker();
    $("#whatsapp_mobile1").CcPicker("setCountryByCode","in");
    $("#mobile2").CcPicker();
    $("#mobile2").CcPicker("setCountryByCode","in");
    $("#whatsapp_mobile2").CcPicker();
    $("#whatsapp_mobile2").CcPicker("setCountryByCode","in");
    $("#mobile3").CcPicker();
    $("#mobile3").CcPicker("setCountryByCode","in");
    $("#whatsapp_mobile3").CcPicker();
    $("#whatsapp_mobile3").CcPicker("setCountryByCode","in");
    $("#mobile4").CcPicker();
    $("#mobile4").CcPicker("setCountryByCode","in");
    $("#whatsapp_mobile4").CcPicker();
    $("#whatsapp_mobile4").CcPicker("setCountryByCode","in");
  });
</script>

<script type="text/javascript">
  $(document).ready(function(){

    $(".mobile").bind('keyup mouseup', function () {
      $(".whatsapp_mobile").val($(this).val());
    });

    $(".whatsapp_option").change(function(){
      var data = $(this).val();
      if(data == "same_as_above"){
        $("#whatsapp_mobile").val($("#mobile").val());
      }
      if(data == "different_number"){
        $("#whatsapp_mobile").val("");
        $("#whatsapp_mobile_div").show();  
      } else {
        $("#whatsapp_mobile_div").hide();  
      }
    });

    $(".whatsapp_option1").change(function(){
      var data = $(this).val();
      if(data == "same_as_above"){
        $("#whatsapp_mobile1").val($("#mobile1").val());
      }
      if(data == "different_number"){
        $("#whatsapp_mobile1").val("");
        $("#whatsapp_mobile_div1").show();  
      } else {
        $("#whatsapp_mobile_div1").hide();  
      }
    });

    $(".whatsapp_option2").change(function(){
      var data = $(this).val();
      if(data == "same_as_above"){
        $("#whatsapp_mobile2").val($("#mobile2").val());
      }
      if(data == "different_number"){
        $("#whatsapp_mobile2").val("");
        $("#whatsapp_mobile_div2").show();  
      } else {
        $("#whatsapp_mobile_div2").hide();  
      }
    });

    $(".whatsapp_option3").change(function(){
      var data = $(this).val();
      if(data == "same_as_above"){
        $("#whatsapp_mobile3").val($("#mobile3").val());
      }
      if(data == "different_number"){
        $("#whatsapp_mobile3").val("");
        $("#whatsapp_mobile_div3").show();  
      } else {
        $("#whatsapp_mobile_div3").hide();  
      }
    });

    $(".whatsapp_option4").change(function(){
      var data = $(this).val();
      if(data == "same_as_above"){
        $("#whatsapp_mobile4").val($("#mobile4").val());
      }
      if(data == "different_number"){
        $("#whatsapp_mobile4").val("");
        $("#whatsapp_mobile_div4").show();  
      } else {
        $("#whatsapp_mobile_div4").hide();  
      }
    });

  });
</script>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
  var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
  (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/60044909c31c9117cb6f79ee/1es8bqkaf';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
  })();
</script>
<!--End of Tawk.to Script-->

<script type="text/javascript">
  // jQuery(".youtubevideo_1").hide();
  jQuery(".youtubevideo_2").hide();


  jQuery('.youtubeimg_1').click(function(e){
    e.preventDefault();
    jQuery('.youtubeimg_1').hide();
    jQuery(".youtubevideo_1").show();
    jQuery('.youtubevideo_1').attr('src', "https://www.youtube.com/embed/4JBUcSeHtMg?autoplay=1");

  });
  jQuery('.youtubeimg_2').click(function(e){
    e.preventDefault();
    jQuery('.youtubeimg_2').hide();
    jQuery(".youtubevideo_2").show();
    jQuery('.youtubevideo_2').attr('src', "https://www.youtube.com/embed/4JBUcSeHtMg?autoplay=1");
  });
  
</script>




<script>
  function getQueryVariable(variable)
  {
    var query = window.location.search.substring(1);
    var vars = query.split("&");
    for (var i=0;i<vars.length;i++) {
      var pair = vars[i].split("=");
      if(pair[0] == variable){return pair[1];}
    }
    return(false);
  }    
  jQuery(document).ready(function() {
    jQuery('form').find('input.utm_source').each(function() {
      var a = getQueryVariable('utm_source');
      if(a){
        jQuery(this).val(a);
      }
    });
    jQuery('form').find('input.utm_medium').each(function() {
      var a = getQueryVariable('utm_medium');
      if(a){
        jQuery(this).val(a);
      }
    });
    jQuery('form').find('input.utm_campaign').each(function() {
      var a = getQueryVariable('utm_campaign');
      if(a){
        jQuery(this).val(a);
      }
    });
    jQuery('form').find('input.utm_term').each(function() {
      var a = getQueryVariable('utm_term');
      if(a){
        jQuery(this).val(a);
      }
    });
    jQuery('form').find('input.utm_content').each(function() {
      var a = getQueryVariable('utm_content');
      if(a){
        jQuery(this).val(a);
      }
    });
    jQuery('form').find('input.utm_site').each(function() {
     var a = getQueryVariable('utm_site');
     if(a){
      jQuery(this).val(a);
    } 
  });
    jQuery('form').find('input.utm_url').each(function() {
     var a = getQueryVariable('utm_url');
     if(a){
      jQuery(this).val(a);
    } 
  });

    jQuery('form').find('input.utm_title').each(function() {
     var a = getQueryVariable('utm_title');
     if(a){
      jQuery(this).val(a);
    } 
  });

    jQuery('form').find('input.utm_timestamp').each(function() {
     var a = getQueryVariable('utm_timestamp');
     if(a){
      jQuery(this).val(a);
    } 
  });

    jQuery('form').find('input.utm_itemID').each(function() {
     var a = getQueryVariable('utm_itemID');
     if(a){
      jQuery(this).val(a);
    } 
  });

  });

  function createCookie(name,value,days) {    
    var expires = "";
    if (days) {
      var date = new Date();
      date.setTime(date.getTime()+(days*24*60*60*1000));
      var expires = "; expires="+date.toGMTString();
    }
    document.cookie = name+"="+value+expires+"; path=/";
  }

  function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
      var c = ca[i];
      while (c.charAt(0)==' ') c = c.substring(1,c.length);
      if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
  }
  function eraseCookie(name) {
    createCookie(name,"",-1);
  }
  var c_name = "_aaa_utmz";
  if(getQueryVariable("utm_source") != "") {
    createCookie("_aaa_utmz", getQueryVariable("utm_source") + "|" + getQueryVariable("utm_medium")+ "|" + getQueryVariable("utm_term")+ "|" + getQueryVariable("utm_campaign")+ "|" + getQueryVariable("utm_content")+ "|" + getQueryVariable("utm_site")+ "|" + getQueryVariable("utm_url")+ "|" + getQueryVariable("utm_title")+ "|" + getQueryVariable("utm_timestamp")+ "|" + getQueryVariable("utm_itmeID"), 60);
  }
  else if (readCookie(c_name)){
    c_start=readCookie(c_name);
    var _pipe = c_start.split("|");
    jQuery("input[name=utm_source], .utm_source").val(_pipe[0]);
    jQuery("input[name=utm_medium], .utm_medium").val(_pipe[1]);
    jQuery("input[name=utm_term], .utm_term").val(_pipe[2]);
    jQuery("input[name=utm_campaign], .utm_campaign").val(_pipe[3]);
    jQuery("input[name=utm_content], .utm_content").val(_pipe[4]);

    jQuery("input[name=utm_site], .utm_site").val(_pipe[5]);
    jQuery("input[name=utm_url], .utm_url").val(_pipe[6]);
    jQuery("input[name=utm_title], .utm_title").val(_pipe[7]);
    jQuery("input[name=utm_timestamp], .utm_timestamp").val(_pipe[8]);
    jQuery("input[name=utm_itemID], .utm_itemID").val(_pipe[9]);

  }
</script>
<script type="text/javascript">
  const sections = [...document.querySelectorAll("section")];

  let options = {
    rootMargin: "0px",
    threshold: 0.25
  };

  const callback = (entries, observer) => {
    entries.forEach(entry => {
      const { target } = entry;
      console.log(entry, target)

      if (entry.intersectionRatio >= 0.25) {
        target.classList.add("is-visible");
      } else {
        target.classList.remove("is-visible");
      }
    });
  };

  const observer = new IntersectionObserver(callback, options);

  sections.forEach((section, index) => {
    observer.observe(section);
  });

  window.onload(removeClass());
</script>


</body>
</html>