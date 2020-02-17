<style>
#map { height:250px; }
</style>
<div class="container">
  <div class="row"> 
    
    <!-- Contact details -->
    <section class="contact-details">
      <div class="col-md-5">
        <h2 class="lined-heading  mt50"><span>Address</span></h2>
        <!-- Panel -->
        <div class="panel panel-default text-center">
          <div class="panel-heading">
            <div class="panel-title"><strong>PT. APA Tour Group</strong></div>
          </div>
          <div class="panel-body">
            <address>
            Jalan Tukad Yeh Aya no 135B, Lantai 2 <br>
Denpasar - BALI<br>
            <abbr title="Phone">P:</abbr> <a href="#">(+62) 361 123-45678</a><br>
            <abbr title="Email">E:</abbr> <a href="#">info@apatour.com</a><br>
            <abbr title="Website">W:</abbr> <a href="#">www.apatour.com</a><br>
            </address>
          </div>
        </div>
        <!-- GMap -->
		<div class="mt30">
          <div id="map">
            <iframe width="450" height="250" id="gmap_canvas" src="https://maps.google.com/maps?q=Jalan%20Tukad%20Yeh%20Aya%20no%20135B%2C%20Denpasar%20-%20BALI&t=&z=17&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
          </div>
		</div>
      </div>
    </section>
    
    <!-- Contact form -->
    <section id="contact-form" class="mt50">
      <div class="col-md-7">
        <h2 class="lined-heading"><span>Send a message</span></h2>
        <!-- Error message display -->
		  <?php if(isset($this->msg)){ echo $this->msg;}?>
        <form class="clearfix mt50" role="form" method="POST" action="" name="form" id="form">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="name" accesskey="U"><span class="required">*</span> Your Name</label>
                <input name="name" type="text" id="name" class="form-control" required value=""/>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="email" accesskey="E"><span class="required">*</span> E-mail</label>
                <input name="email" type="text" id="email" value="" required class="form-control"/>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="subject" accesskey="S">Subject</label>
            
              <input name="subject" type="text" id="subject" class="form-control" value=""/>
          </div>
          <div class="form-group">
            <label for="comments" accesskey="C"><span class="required">*</span> Your message</label>
            <textarea name="comments" rows="9" id="comments" class="form-control"></textarea>
          </div>
          
          <button type="submit" class="btn  btn-lg btn-primary">Send message</button>
        </form>
      </div>
    </section>
  </div>
</div>
