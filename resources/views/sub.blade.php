
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title1')
        @section('title1')
            Tự Nhiên
        @show
       
    </title>
    <base href="{{ asset('/') }}" target="_blank">
    <link rel="icon" type="image/png" href="{{ asset('public/login') }}/images/icons/favicons.ico"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('public/tunhien') }}/lib/bootstrap/css/bootstrap.min.css">

    <!-- Font Montserrat CSS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:700&amp;subset=vietnamese" rel="stylesheet">

    <!-- Font awesome CSS -->
    <link rel="stylesheet" href="{{ asset('public/tunhien') }}/lib/font-awesome/css/font-awesome.min.css">

    <!-- Nivo CSS -->
    <link rel="stylesheet" href="{{ asset('public/tunhien') }}/lib/nivo/themes/default/default.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="{{ asset('public/tunhien') }}/lib/nivo/nivo-slider.css" type="text/css" media="screen" />

    <!-- Wow CSS -->
    <link rel="stylesheet" href="{{ asset('public/tunhien') }}/lib/wow/css/animate.css">

    <!-- Slick -->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/tunhien') }}/lib/slick/css/slick.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/tunhien') }}/lib/slick/css/slick-theme.css">

    <!-- SCroll down CSS -->
    <link rel="stylesheet" href="{{ asset('public/tunhien') }}/lib/scroll-down/scroll-down.css">

    <!-- My style CSS -->
    <link rel="stylesheet" href="{{ asset('public/tunhien') }}/lib/css/myStyle.css">

    <title>TỰ NHIÊN</title>
  </head>
  <body>
    <!-- Content -->
    <div id="root">
      <div id="Main">
        <!-- Header -->
        <div id="Header">
          <!-- Nav -->
          <div id="Nav">
            <nav class="navbar navbar-expand-lg">
              <!-- Logo -->
              
              <a href="{{ URL::to('/') }}" class="navbar-brand">
                @php
                $datalogo = file_get_contents(storage_path().'/header/datalogo.json',true);
              @endphp
              @if(json_decode($datalogo,true))
              @php
                  $namelogo = json_decode($datalogo,true);
              @endphp
              @foreach($namelogo as $key => $value)
                <img src="{{ asset('public/upload/image') }}/{{ $value['namelogo'] }}" class="{{ $value['typelogo'] }}"/>
                @endforeach @endif
              </a>
              
              <!-- End Logo -->

              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-align-justify"></i>
              </button>

              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                  <!-- Link -->

                   @php
                  $contentslidebar = file_get_contents(storage_path().'/header/datamenu.json',true);
                  @endphp
                  @if(json_decode($contentslidebar,true))
                  @php    
                      $get_data = json_decode($contentslidebar,true);
                  @endphp
                  @foreach($get_data as $key => $value)

                  <li class="nav-item">
                    <a class="nav-link" href="{{ $value['linkmenu'] }}" target="_blank">{{ $value['namemenu'] }}</a>
                  </li>
                  @endforeach @endif

                  <!-- End link -->

                  <li class="line"></li>

                  <!-- Social -->

                  @php
                            $GetDataSocial = file_get_contents(storage_path()."/footer/socialfooter.json",true);
                  @endphp
                  @if (json_decode($GetDataSocial,true)) 
                  @php         
                    $ArDataSocial = json_decode($GetDataSocial,true); 
                  @endphp
                  @foreach ($ArDataSocial as $key => $value) 
                  

                  <li class="nav-item">
                    <a class="nav-link social" href="{{ $value['linksocial'] }}" target="_blank"><i class="fa fa-{{ $value['typesocial'] }}" aria-hidden="true"></i></a>
                  </li>
                  @endforeach @endif
                  <!-- End Social -->
                </ul>
              </div>
            </nav>
          </div>
          <!-- End Nav -->

          <!-- Slide -->
          <div id="Slide">
            <div class="container-fluid">
              <div id="ShowSlide">

                @php
                  $contentslidebar = file_get_contents(storage_path().'/slidebar/datasldiebar.json',true);
              @endphp
              @if(json_decode($contentslidebar,true))
              @php    
                  $get_data = json_decode($contentslidebar,true);
              @endphp
              @foreach($get_data as $key => $value)

                <img src="{{ asset('public/upload/image') }}/{{$value['nameimageslidebar']}}" data-thumb="{{$value['nameimageslidebar']}}" />

                @endforeach @endif
              </div>
            </div>
          </div>
          <!-- End Slide -->
        </div>
        <!-- End Header -->

        <!--About-->
        <div id="About">

          <section id="section07" class="demo">
            <a href="#About"><span></span><span></span><span></span></a>
          </section>

          <div class="container-fluid">
            <div class="row">
              @php
                  $contentabouts = file_get_contents(storage_path().'/about/dataabout.json',true);
              @endphp
              @if(json_decode($contentabouts,true))
              @php    
                  $get_data = json_decode($contentabouts,true);
              @endphp
              @foreach($get_data as $key => $value)
              <div class="col-sm-6 col-md-6 col-lg-3 wow slideInLeft" data-wow-duration="2s" data-wow-offset="180">
                <div class="itemAbout">
                  <div class="front">
                    <div class="IconAbout">
                      <i class="fa fa-{{ $value['typeabout'] }}"></i>
                    </div>
                    <div class="title">
                      <h1>{{ $value['text1'] }}</h1>
                      <p>{{ $value['text2'] }}</p>
                    </div>
                  </div>

                  <div class="back">
                    <div class="title">
                      <h1>{{ $value['text1'] }}</h1>
                      <p>{{ $value['text2'] }}</p>
                    </div>
                    <p class="text">{{ $value['desabout'] }}</p>
                    <a href="{{ $value['linkabout'] }}" target="_blank">XEM THÊM <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                  </div>
                </div>
              </div>
              @endforeach @endif

            </div>
          </div>

          <section id="section05" class="demo demoAbout2">
            <a href="#"><span></span></a>
          </section>
          
        </div>
        <!--End About-->

        <!-- Product -->
        <?php
               $titlwhy = file_get_contents(storage_path().'/product/titleproduct.json',true);
            if(json_decode($titlwhy)){
            $ar_data_title_why = json_decode($titlwhy,true);
            foreach ($ar_data_title_why as $key => $value) {
                  $text1 = $value['content1title'];
                  $text2 = $value['content2title'];
        ?>
        <div id="Product">
          <div class="container-fluid">
            <div class="title">
              <span class="text1"><?php echo $text1;?></span> <span class="text2"><?php echo $text2;?></span>
            </div>
            <div class="row">

              <?php
                   $datacontentrowsproduct = file_get_contents(storage_path().'/product/dataproduct.json',true);
                      if (json_decode($datacontentrowsproduct,true)) {
                         $ar_data_rowproduct = json_decode($datacontentrowsproduct,true);
                          foreach ($ar_data_rowproduct as $key => $value) {
                            $namepro = $value['nameproduct'];
                            $linkpro = $value['linkproduct'];
                            $nameimagepro = $value['nameimageproduct'];
              ?>

              <div class="col-sm-6 col-md-4 wow slideInRight" data-wow-duration="2s" data-wow-offset="180">
                <div class="item">
                  <a href="<?php echo $linkpro;?>">
                    <img src="{{ asset('public/upload/image') }}/<?php echo $nameimagepro;?>" class="w-100"/>
                    <h5><?php echo $namepro;?></h5>
                  </a>
                </div>
              </div>

                <?php }}?>
             

            </div>
          </div>

          <section id="section05" class="demo">
            <a href="#"><span></span></a>
          </section>

        </div>
        <?php
            }}
        ?>
        <!-- End Product -->

        <!-- Why choose -->
        <?php
              $titlwhy = file_get_contents(storage_path().'/why/titlewhy.json',true);
            if(json_decode($titlwhy)){
            $ar_data_title_why = json_decode($titlwhy,true);
            foreach ($ar_data_title_why as $key => $value) {
                  $text1 = $value['content1title'];
                  $text2 = $value['content2title'];
        ?>
        <div id="Why">
          <div class="title">
            <span class="text1"><?php echo $text1;?></span> <span class="text2"><?php echo $text2;?></span>
          </div>
          <div class="container-fluid">
            <div class="row">

              <!-- Chú ý phần 'data-wow-delay' trong mỗi phần tử sẽ tăng dần -->

              <?php
                  $datacontentrowswhy = file_get_contents(storage_path().'/why/datawhy.json',true);
                      if (json_decode($datacontentrowswhy,true)) {
                         $ar_data_rowwhy = json_decode($datacontentrowswhy,true);
                          foreach ($ar_data_rowwhy as $key => $value) {
                            $typeicon = $value['typeiconwhy'];
                            $textwhy = $value['textwhy'];
                            $descriptionwhy = $value['deswhy'];
              ?>

              <div class="col-sm-6 col-md-4 wow flipInY" data-wow-delay="<?php echo $key;?>s" data-wow-duration="2s" data-wow-offset="180">
                <div class="item">
                  <i class="fa fa-<?php echo $typeicon;?>"></i>
                  <h1><?php echo $textwhy;?></h1>
                  <p class="text"><?php echo $descriptionwhy;?></p>
                </div>
              </div>

              <?php }}?>

            </div>
          </div>

          <section id="section05" class="demo">
            <a href="#"><span></span></a>
          </section>

        </div>
        <?php }}?>
        <!-- End Why choose -->

        <!-- Statistical -->
        <?php
             $titleandbackgrostt = file_get_contents(storage_path().'/statistical/titleandbackgroundstt.json',true);
            if(json_decode($titleandbackgrostt)){
            $ar_data_title_background_stt = json_decode($titleandbackgrostt,true);
            foreach ($ar_data_title_background_stt as $key => $value) {
                  $name_image_backgruond_stt = $value['nameimage'];
                  $text1 = $value['titlelstt1'];
                  $text2 = $value['titlelstt2'];
        ?>

        <div id="Statistical" style="background-image: url('{{ asset('public/upload/image') }}/<?php echo $name_image_backgruond_stt;?>');">
          <div class="bg">
            <div class="container-fluid">
              <div class="title">
                <h1><?php echo $text1;?></h1>
                <p><?php echo $text2;?></p>
              </div>

              <div class="row">

                <!-- Chú ý phần 'data-wow-delay' trong mỗi phần tử sẽ tăng dần -->

                <?php
                     $datacontentrowstt = file_get_contents(storage_path().'/statistical/datacontentstt.json',true);
                      if (json_decode($datacontentrowstt,true)) {
                         $ar_data_rowstt = json_decode($datacontentrowstt,true);
                          foreach ($ar_data_rowstt as $key => $value) {
                ?>
                <div class="col-sm-12 col-md-4">
                  <div class="item">
                    <div class="row NumBer">
                      <div class="col-6">
                        <div class="num counter wow bounceIn" data-wow-delay="<?php echo $key;?>s" data-wow-duration="2s" data-wow-offset="180"><?php echo $value['number'];?></div>
                      </div>
                      <div class="col-6">
                        <div class="title">
                          <p><?php echo $value['text1'];?></p>
                          <h1><?php echo $value['text2'];?></h1>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <?php }}?>

              </div>
            </div>
          </div>
        </div>

        <?php }}?>
        <!-- End Statistical -->

        <!-- Testimonial -->
        <?php 
            $databackgruondtmn = file_get_contents(storage_path().'/testimonial/backgroundimagetmn.json',true);
            if(json_decode($databackgruondtmn)){
            $ar_data_backgruondtmn = json_decode($databackgruondtmn,true);
            foreach ($ar_data_backgruondtmn as $key => $value) {
                  $name_image_backgruond_tmn = $value['nameimage'];
            
        ?>
        <div id="Testimonial" class="wow flipInX" data-wow-duration="2s" data-wow-offset="180" style="background-image: url('{{ asset('public/upload/image') }}/<?php echo $name_image_backgruond_tmn;?>');">
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
            
               <?php
                $datatmn = file_get_contents(storage_path().'/testimonial/datacontenttmn.json',true);
                  if (json_decode($datatmn,true)) {
                      $ar_data_tmn = json_decode($datatmn,true);
                      foreach ($ar_data_tmn as $key => $value) {
            ?>
              <div class="carousel-item <?php if($key == 1){echo "active";}?>">
                <img src="{{ asset('public/upload/image') }}/<?php echo $value['nameimage'];?>" class="avatar animated slideInDown"/>
                <div class="txt1"><?php echo $value['description'];?></div>
                <div class="txt2"><?php echo $value['name'];?></div>
                <div class="txt3"><?php echo $value['postion'];?></div>
              </div>
              
             <?php  }}?>
              
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
        <?php }}?>
        <!-- End Testimonial -->

        <!-- Slide partner -->
        <?php 
            $databackgruondlogoslide = file_get_contents(storage_path().'/logoslide/logoslide.json',true);
            if(json_decode($databackgruondlogoslide)){
            $ar_data_backgruondimage = json_decode($databackgruondlogoslide,true);
            foreach ($ar_data_backgruondimage as $key => $value) {
                  $name_image_backgruond_logoslide = $value['nameimage'];
            
        ?>
        <div id="LogoSlide" class="wow fadeIn" data-wow-duration="4s" data-wow-offset="180" style="background-image: url('{{ asset('public/upload/image') }}/<?php echo $name_image_backgruond_logoslide;?>');">
          <?php
              $datatitle = file_get_contents(storage_path().'/logoslide/logoslide.json',true);
              if (json_decode($datatitle,true)) {
                $ar_data_title = json_decode($datatitle,true);
                foreach ($ar_data_title as $key => $value) {
          ?>
          <div class="titleItem">
            <span class="text1"><?php echo $value['titlelogoslide1'];?></span> <span class="text2"><?php echo $value['titlelogoslide2'];?></span>
          </div>
          <?php }}?>
          <div id="ShowSlide">
            <?php
                $datacontent = file_get_contents(storage_path().'/logoslide/contentlogoslide.json',true);
              if (json_decode($datacontent,true)) {
                $ar_data_content = json_decode($datacontent,true);
                foreach ($ar_data_content as $key => $value) {
            ?>
            <a href="<?php echo $value['linklogoslide'];?>" target="_blank">
              <p class="avatar" style="background-image: url('{{ asset('public/upload/image') }}/<?php echo $value['nameimage'];?>')"></p>
              <h4 class="title"><?php echo $value['titlesocial'];?></h4>
              <p class="description"><?php echo $value['description'];?></p>
            </a>
            <?php }}?>

          </div>
        </div>
        <?php }}?>
        <!-- End Slide partner -->

        <!-- Contact -->
        @php 
            $datacontact = file_get_contents(storage_path().'/contact/datacontact.json',true); @endphp
            @if(json_decode($datacontact,true))
            @php $ar_data_contact = json_decode($datacontact,true);@endphp
            @foreach ($ar_data_contact as $key => $value) 
        
        <div id="Contact" style="background-image: url('{{ asset('public/upload/image') }}/{{$value['nameimage']}}');">
          <div class="bg">
            <div class="title">
              <span class="text2">{{$value['titlecontatc1']}}</span> <span class="text1">{{$value['titlecontatc2']}}</span> <span class="text2"><?php echo $value['titlecontatc3'];?></span>
            </div>

            <form name="frm" id="frmContact" method="post" action="/mail">
              <div class="form-row">
                <div class="form-group col-md-6 wow slideInRight" data-wow-duration="2s" data-wow-offset="180">
                  <label htmlFor="inputName">Họ và tên</label>
                  <input type="text" class="form-control mb-3" name="inputName" placeholder="Nhập họ và tên" required/>

                  <label htmlFor="inputEmail">Email</label>
                  <input type="email" class="form-control mb-3" name="inputEmail" placeholder="Nhập Email" required/>

                  <label htmlFor="inputPhone">Số điện thoại</label>
                  <input type="phone" class="form-control" name="inputPhone" placeholder="Nhập số điện thoại" required/>
                </div>

                <div class="form-group col-md-6 wow slideInLeft" data-wow-duration="2s" data-wow-offset="180">
                  <label htmlFor="inputContent">Nội dung</label>
                  <textarea class="form-control" name="inputContent" rows="8" placeholder="Nhập nội dung" required></textarea>
                </div>
              </div>

              <button type="submit" class="btn btn-danger">GỬI NGAY</button>
            </form>
          </div>
        </div>
        @endforeach @endif
        <!-- End Contact -->

        <!-- Footer -->
        <div id="Footer">
          <div class="bg">
            <div class="container-fluid">
              <!--  style="background-image: url('');" -->
              <!-- Info Address -->
              <div class="row showFooter infoAddress">

                <!-- Chú ý phần 'data-wow-delay' trong mỗi phần tử sẽ tăng dần -->
                <?php
                    $ContentFile = file_get_contents(storage_path()."/apm/dataapm.json",true);
                    if(json_decode($ContentFile,true)){
                      $datas = json_decode($ContentFile,true);
                      foreach ($datas as $key => $value) {
                ?>
                <div class="col-md-4 wow bounceIn" data-wow-delay="0s" data-wow-duration="2s" data-wow-offset="180">
                  <a href="https://www.google.com/maps/place/3+Tr%E1%BA%A7n+H%C6%B0ng+%C4%90%E1%BA%A1o,+L%E1%BB%99c+Th%E1%BB%8D,+Th%C3%A0nh+ph%E1%BB%91+Nha+Trang,+Kh%C3%A1nh+H%C3%B2a+650000,+Vi%E1%BB%87t+Nam/@12.2490403,109.1926201,17z/data=!3m1!4b1!4m5!3m4!1s0x3170678230132497:0x9958456dc2f4ef31!8m2!3d12.249035!4d109.194808">
                    <div class="item">
                      <div class="row">
                        <div class="col-3">
                          <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                        </div>
                        <div class="col-9">
                          <div class="text">
                            <p>địa chỉ:<br/><?php echo $value['address'];?></p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>

                <div class="col-md-4 wow bounceIn" data-wow-delay="1s" data-wow-duration="2s" data-wow-offset="180">
                    <div class="item">
                      <div class="row">
                        <div class="col-3">
                          <div class="icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
                        </div>
                        <div class="col-9">
                          <div class="text">
                            <p>alo:<br/>
                            <a href="tel:<?php echo $value['address'];?>"><?php echo $value['phone'];?></a>
                          </p>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>

                <div class="col-md-4 wow bounceIn" data-wow-delay="2s" data-wow-duration="2s" data-wow-offset="180">
                  <a href="mailto:<?php echo $value['email'];?>">
                    <div class="item">
                      <div class="row">
                        <div class="col-3">
                          <div class="icon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                        </div>
                        <div class="col-9">
                          <div class="text">
                            <p>email:<br/><?php echo $value['email'];?></p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
                <?php }}?>
              </div>
              <!--End Info Address -->
            </div>
          </div>

          <!-- Map -->
          <?php
                    $get_dt_googlemap = file_get_contents(storage_path()."/googlemap/datagooglemap.json",true);
                    if (json_decode($get_dt_googlemap,true)) {
                      $dataggm = json_decode($get_dt_googlemap,true);
                        foreach ($dataggm as $key => $value) {                  ?>
          <div id="map" class="wow fadeIn" data-lat="<?php echo $value['lat'];?>" data-lng="<?php echo $value['long'];?>" data-wow-duration="4s" data-wow-offset="180">
             
    
          </div>
           <?php 
                      }}
                  ?>
          <!-- End Map -->

          <div id="textAuthor">
            <div class="container-fluid">
              <div class="row">
                <div class="col-6">
                  <?php
                    $Copyright = file_get_contents(storage_path()."/footer/copyright.json",true);
                    if (json_decode($Copyright,true)) {
                      $datacp = json_decode($Copyright,true);
                        foreach ($datacp as $key => $value) {                  ?>
                  <div class="designBy">
                    
                    <p><?php echo $value['content1coppyright'];?> <a href="<?php echo $value['linkcoppyright'];?>" target="_blank"><?php echo $value['content2coppyright'];?></a></p>
                    
                  </div>
                  <?php 
                      }}
                  ?>
                  
                </div>

                <div class="col-6">
                  <div class="social">
                    <ul class="nav justify-content-end">
                      <?php
                            $GetDataSocial = file_get_contents(storage_path()."/footer/socialfooter.json",true);
                            if (json_decode($GetDataSocial,true)) {
                              $ArDataSocial = json_decode($GetDataSocial,true);
                              foreach ($ArDataSocial as $key => $value) {
                      ?>
                      <li class="nav-item">
                        <a class="nav-link social" href="<?php echo $value['linksocial'];?>" target="_blank"><i class="fa fa-<?php echo $value['typesocial'];?>" aria-hidden="true"></i></a>
                      </li>
                      <?php  }}?>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- End Footer -->
      </div>
    </div>
    <!-- End content -->

    <!-- Back top -->
    <div id="Top">
      <img src="{{ asset('public/tunhien') }}/images/top.png">
    </div>
    <!-- End Back top -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('public/tunhien') }}/lib/jquery/jquery.min.js"></script>
    <script src="{{ asset('public/tunhien') }}/lib/bootstrap/js/popper.min.js"></script>
    <script src="{{ asset('public/tunhien') }}/lib/bootstrap/js/bootstrap.min.js"></script>

    <!-- Wow JS -->
    <script src="{{ asset('public/tunhien') }}/lib/wow/js/wow.min.js"></script>

    <script type="text/javascript" src="{{ asset('public/tunhien') }}/lib/nivo/jquery.nivo.slider.js"></script>

    <!-- Slick -->
    <script type="text/javascript" src="{{ asset('public/tunhien') }}/lib/slick/js/slick.min.js"></script>

    <!-- Flip JS -->
    <script src="{{ asset('public/tunhien') }}/lib/flip/js/jquery.flip.min.js"></script>

    <!-- Counter -->
    <script src="{{ asset('public/tunhien') }}/lib/counter/waypoints.min.js"></script>
    <script src="{{ asset('public/tunhien') }}/lib/counter/jquery.counterup.min.js"></script>



    <!-- Scroll down JS -->
    <script src="{{ asset('public/tunhien') }}/lib/scroll-down/scroll-down.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAUiAnxcqBBx--aWmR1PHXEVuDhTcyi9k&callback=initMap"
  type="text/javascript"></script>
    <!-- My script JS -->
    <script src="{{ asset('public/tunhien') }}/lib/js/myScript.js"></script>
  </body>
</html>
