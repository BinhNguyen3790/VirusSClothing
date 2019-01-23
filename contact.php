<div class="contact">
  <div class="row justify-content-center">
    <div class="col-12 col-md-10 col-lg-10 pt-4 pb-4">
      <!--Form with header-->
      <form action="mail.php" method="post">
        <div class="card rounded-0">
          <div class="card-header p-0">
            <div class="bg-info text-white text-center py-2">
              <h3><i class="fa fa-envelope"></i> Contact Now</h3>
              <p class="m-0">We will be happy to assist you</p>
            </div>
          </div>
          <div class="card-body p-3">
            <!--Body-->
            <div class="form-group">
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fa fa-user text-info"></i></div>
                </div>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Full Name" required>
              </div>
            </div>
            <div class="form-group">
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fa fa-envelope text-info"></i></div>
                </div>
                <input type="email" class="form-control" id="nombre" name="email" placeholder="yourmail@gmail.com" required>
              </div>
            </div>
            <div class="form-group">
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fa fa-comment text-info"></i></div>
                </div>
                <textarea class="form-control" placeholder="Your Message" rows="3" required></textarea>
              </div>
            </div>
            <div class="text-center">
              <input type="submit" value="Sent" class="btn btn-info btn-block rounded-0 py-2">
            </div>
          </div>
        </div>
      </form>
      <!--Form with header-->
    </div>
  </div>
</div>