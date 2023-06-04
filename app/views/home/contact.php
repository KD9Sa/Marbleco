<!DOCTYPE html>
<html lang="en">
  <!-- Home Head -->
  <?php
    include('../../templates/home-head.php');
  ?>
  <!-- !Home Head -->
  <body>
    <header id="header">
      <!-- Home Navigation Bar-->
      <?php
        include('../../templates/home-nav.php');
      ?>
      <!-- !Home Navigation Bar-->
    </header>

    <main id="main">
      <!-- Contact Form -->
      <div id="contact" class="contact-area align-middle font-roboto pt-5" style="height: 610px; max-height: 100vh;">
        <div class="container">
          <div class="section-title text-start">
            <h1>Get in Touch</h1>
          </div>
          <div class="row">
            <div class="col-sm-7">
              <div class="contact">
                <form
                  class="form"
                  name="enq"
                  method="post"
                  action="contact.php"
                  onsubmit="return validation();"
                >
                  <div class="row">
                    <div class="form-group col-md-6 mb-3">
                      <input
                        type="text"
                        name="name"
                        class="form-control"
                        placeholder="Name"
                        required="required"
                      />
                    </div>
                    <div class="form-group col-md-6 mb-3">
                      <input
                        type="email"
                        name="email"
                        class="form-control"
                        placeholder="Email"
                        required="required"
                      />
                    </div>
                    <div class="form-group col-md-12 mb-3">
                      <input
                        type="text"
                        name="subject"
                        class="form-control"
                        placeholder="Subject"
                        required="required"
                      />
                    </div>
                    <div class="form-group col-md-12 mb-3">
                      <textarea
                        rows="6"
                        name="message"
                        class="form-control"
                        placeholder="Your Message"
                        required="required"
                      ></textarea>
                    </div>
                    <div class="col-md-12 text-center mb-3">
                      <button
                        type="submit"
                        value="Send message"
                        name="submit"
                        id="submitButton"
                        class="btn btn-contact-bg"
                        title="Submit Your Message!"
                      >
                        Send Message
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <!--- END COL -->
            <div class="col-sm-5">
              <div class="single_address">
                <i class="fa fa-map-marker"></i>
                <h4>Our Address</h4>
                <p>3481 Melrose Place, Beverly Hills</p>
              </div>
              <div class="single_address">
                <i class="fa fa-envelope"></i>
                <h4>Send your message</h4>
                <p>Info@example.com</p>
              </div>
              <div class="single_address">
                <i class="fa fa-phone"></i>
                <h4>Call us on</h4>
                <p>(+1) 517 397 7100</p>
              </div>
              <div class="single_address">
                <i class="fa-solid fa-clock"></i>
                <h4>Work Time</h4>
                <p>Mon - Fri: 08.00 - 16.00. <br />Sat: 10.00 - 14.00</p>
              </div>
            </div>
            <!--- END COL -->
          </div>
          <!--- END ROW -->
        </div>
        <!--- END CONTAINER -->
      </div>
      <!-- !Contact Form -->
    </main>

    <!-- Home Footer -->
    <?php
        include('../../templates/home-footer.php');
    ?>
    <!-- !Home Footer -->

    <!-- Home Scripts -->
    <?php
        include('../../templates/home-scripts.php');
    ?>
    <!-- !Home Scripts -->
  </body>
</html>
