@extends('layouts.layout')
@section('content')
<section class="contact-page-area section-gap">
  <div class="container">
    <div class="row">

      <div class="col-lg-4 d-flex flex-column address-wrap">
        <div class="single-contact-address d-flex flex-row">
          <div class="icon"><i class="ti-home"></i></div>
          <div class="contact-details">
            <h5>Tonalá, Jalisco</h5>
          </div>
        </div>
        <div class="single-contact-address d-flex flex-row">
          <div class="icon"><i class="ti-headphone"></i></div>
          <div class="contact-details">
            <h5>33 28 32 55 84</h5>
            <p>Mon to Fri 9am to 6 pm</p>
          </div>
        </div>
        <div class="single-contact-address d-flex flex-row">
          <div class="icon"><i class="ti-email"></i></div>
          <div class="contact-details">
            <h5>moncadayunuen@gmail.com</h5>
            <p>Send me your query anytime!</p>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <form
          class="form-area "
          id="myForm"
          action="mail.php"
          method="post"
          class="contact-form text-right"
        >
          <div class="row">
            <div class="col-lg-6 form-group form-group-top">
              <input
                name="name"
                placeholder="Enter your name"
                onfocus="this.placeholder = ''"
                onblur="this.placeholder = 'Enter your name'"
                class="common-input mb-20 form-control"
                required=""
                type="text"
              />

              <input
                name="email"
                placeholder="Enter email address"
                pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$"
                onfocus="this.placeholder = ''"
                onblur="this.placeholder = 'Enter email address'"
                class="common-input mb-20 form-control"
                required=""
                type="email"
              />

              <input
                name="subject"
                placeholder="Enter your subject"
                onfocus="this.placeholder = ''"
                onblur="this.placeholder = 'Enter your subject'"
                class="common-input mb-20 form-control"
                required=""
                type="text"
              />
            </div>
            <div class="col-lg-6 form-group">
              <textarea
                class="common-textarea form-control"
                name="message"
                placeholder="Messege"
                onfocus="this.placeholder = ''"
                onblur="this.placeholder = 'Messege'"
                required=""
              ></textarea>
            </div>
            <div class="col-lg-12">
              <div class="alert-msg" style="text-align: left;"></div>

              <button
                class="primary-btn"
                style="float: right;"
                data-text="Send Message"
              >
                <span>E</span> <span>n</span> <span>v</span> <span>i</span>
                <span>a</span> <span>r</span> <span> </span> <span>M</span>
                <span>e</span> <span>n</span> <span>s</span> <span>a</span>
                <span>j</span><span>e</span>
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection