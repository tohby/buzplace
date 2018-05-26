@extends('layouts.app')
 <style>
    body,
    html {
      height: 100%;
      margin: 0;
    }

    .hero-image {
      background-image: url("/images/erik-odiin.jpg");
      height: 55%;
      margin-top: -30px;
      background-attachment: fixed;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      /* position: relative; */
    }

    .hero-text {
      text-align: center;
      position: absolute;
      top: 40%;
      left: 50%;
      transform: translate(-50%, -50%);
      font-weight: bold;
      color: white;
    }

    .hero-text button {
      border: none;
      outline: 0;
      display: inline-block;
      padding: 10px 25px;
      color: black;
      background-color: #ddd;
      text-align: center;
      cursor: pointer;
    }

    .hero-text button:hover {
      background-color: #555;
      color: white;
    }
  </style>
@section('content')
  <div class="hero-image">
    <div class="hero-text">
      <div id="typed-strings">
      </div>
      <span id="typed5"></span>
    </div>
  </div>
  <script>
    var typed5 = new Typed('#typed5', {
    strings: [
      '<h1>Seafood supplier to the US from SE Asia? </h4>',
       '<h1>Cashew nut supply Capacity:(200MT).</h4>',
        '<h1>Our agents provide fast global custom clearance.</h4>',
        '<h1> Contact agency@buzplace.com .</h4>'

        ],
    typeSpeed: 150,
    backSpeed: 50,
    shuffle: true,
    smartBackspace: false,
    loop: true
  });
  </script>
  <section>
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 order-lg-2">
          <div class="p-5">
            <img class="img-fluid rounded-circle" src="{{asset('/images/buy.jpg')}}" alt="">
          </div>
        </div>
        <div class="col-lg-6 order-lg-1">
          <div class="p-5">
            <h1><strong>Showcase Products</strong></h1>
            <p class="h5" >Buzplace creates an ecosystem of business clients and users, providing global solutions to users of import/export goods.
              Typically, selling or buying products, machinery or services across borders. We have registered our presence in the global market
              as the go-to place for faciliation of Business solutions, sales and purchases of goods for large, medium and small scale businesses internationally.
              Sign up and enjoy all our services.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <div class="p-5">
            <img class="img-fluid rounded-circle" src="{{asset('/images/sell.jpg')}}" alt="">
          </div>
        </div>
        <div class="col-lg-6">
          <div class="p-5">
            <h1><strong>Inquire a product</strong></h1>
            <p class="h5">Connecting businesses is a major component of Buzplace. You can inquire a product by creating a post for a particular productuct
              or service you need or can provide. This element of Buzplace connect a lot of business across borders from South-East Asian 
              to Central America. Connecting business has never been more effective, Buzplace, your best decision for business networking
              platform.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 order-lg-2">
          <div class="p-5">
            <img class="img-fluid rounded-circle" src="{{asset('/images/consult.jpg')}}" alt="">
          </div>
        </div>
        <div class="col-lg-6 order-lg-1">
          <div class="p-5">
            <h1><strong>Consultation</strong></h1>
            <p class="h5">Alongside being a platform for business network, we bring our strength and connection to many companies, resources and 
              potential to our user via consultancy. With our experience in business and logistics, partners from technology companies 
              and active relationship with firms, manufacturers and suppliers across the globe and major market such as China, Japan,
              Vietnam,South africa and Korea. We are able to connect your goods or services with your intented clients/customer as well as 
              producers to the targeted customer. We connect individual client needs or enquiries with specific business for faster and immediate 
              access to market.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
  @include('layouts.footer')
@endsection