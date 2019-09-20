@extends('layouts.layout')
@section('content')
<section class="pt-5">
  <div class="container">
    <div class="row py-5">

      @if (session()->has('success'))
      <div class="col-12">
      <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fa fa-check"></i> ¡El correo se ha enviado con éxito!</h5>
        {{ session('success') }}
      </div>
      </div>
      @endif

      <div class="col-lg-4 d-flex flex-column address-wrap">
        <div class="single-contact-address d-flex flex-row">
          <div class="icon"><i class="fa fa-home pr-3"></i></div>
          <div class="contact-details">
            <h5>Tonalá, Jalisco</h5>
          </div>
        </div>
        <div class="single-contact-address d-flex flex-row">
          <div class="icon"><i class="fa fa-user-alt pr-3"></i></div>
          <div class="contact-details">
            <h5>33 28 32 55 84</h5>
            <p>Lun a Vie de 9a.m. a 6 p.m.</p>
          </div>
        </div>
        <div class="single-contact-address d-flex flex-row">
          <div class="icon"><i class="fa fa-envelope pr-3"></i></div>
          <div class="contact-details">
            <h5>moncadayunuen@gmail.com</h5>
            <p>¡Envíame tus preguntas en cualquier momento!</p>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <form class="form-area" action="{{ route('contact') }}" method="post" autocomplete="off">
          @csrf
          <div class="row">
            <div class="col-lg-6 form-group form-group-top">
              <input
                name="name"
                placeholder="Ingresa tu nombre"
                class="form-control"
                required
                type="text"
              />

              <input
                name="email"
                placeholder="Ingresa un correo electrónico"
                pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$"
                class="form-control"
                required
                type="email"
              />

              <input
                name="subject"
                placeholder="Ingresa asunto"
                class="form-control"
                required
                type="text"
              />
            </div>
            <div class="col-lg-6 form-group">
              <textarea
                rows="9"
                class="form-textarea"
                name="message"
                placeholder="Mensaje"
                required
              ></textarea>
            </div>
            <div class="col-lg-12">
              <div style="text-align: left;"></div>
              <button class="btn btn-secondary" style="float: right;"><span>Enviar Mensaje</span></button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection