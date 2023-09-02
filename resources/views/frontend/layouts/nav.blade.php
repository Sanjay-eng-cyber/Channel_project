   <!-- mt header style3 start here -->
   <header id="mt-header" class="style3 position-relative ">

       <img src="frontend/images/nav-sb.png" alt="" class="img-fluid position-absolute" draggable="false"
           style="width: 110px;right:0; top:0">

       {{-- navbar header --}}
       <div class="mt-top-bar" style="background-color: white;color:black">
           <div class="container py-4">
               <div class="row ">
                   <nav class="navbar navbar-expand-lg bg-body-tertiary">
                       <div class="container-fluid  d-flex flex-row">
                           <a class="navbar-brand d-inline d-lg-none  " href="{{ url('/') }}" style="">
                               <img height="35" src="{{ asset('frontend/images/channel-logo.svg') }}" alt="channel"
                                   class="img-fluid " style="width:130px">
                           </a>
                           <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                               data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                               aria-expanded="true" aria-label="Toggle navigation">
                               <span class="navbar-toggler-icon"></span>
                           </button>
                           <div class="navbar-collapse collapse  justify-content-between flex-row-reverse navdrop-style"
                               id="navbarSupportedContent" style="">
                               <ul class="navbar-nav d-none d-lg-flex gap-3 align-items-center">

                                   <li class="nav-item text-red position-relative">
                                       <a class=" "
                                           href="{{ route('frontend.cart.index') }}">
                                           <svg width="50" height="49" viewBox="0 0 87 87" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g filter="url(#filter0_d_1629_264)">
                                            <circle cx="43.1372" cy="43.5" r="36.5" fill="white"/>
                                            </g>
                                            <path d="M54.0642 54.7296H33.2727C31.7323 54.7296 30.8242 53.5537 30.7236 52.3914C30.6451 51.4838 31.0506 50.4826 31.9556 49.9619L28.626 35.0545C28.5677 34.7932 28.6313 34.5192 28.7989 34.3101C28.9662 34.1009 29.2199 33.9791 29.4877 33.9791H60.0669C60.3524 33.9791 60.6211 34.1177 60.7866 34.3507C60.952 34.5836 60.9944 34.8828 60.9004 35.1524L57.3779 45.2463C56.9407 46.4986 55.8574 47.4177 54.5513 47.6458L33.1412 51.3876C33.1386 51.388 33.1359 51.3885 33.1328 51.3889C32.4714 51.5067 32.4679 52.0689 32.4829 52.2387C32.4974 52.4091 32.598 52.9642 33.2736 52.9642H54.0651C54.5522 52.9642 54.9476 53.3595 54.9476 53.8466C54.9476 54.3338 54.5518 54.7296 54.0642 54.7296ZM30.5886 35.7446L33.6623 49.5052L54.2473 45.9082C54.9237 45.7899 55.485 45.3138 55.7114 44.6652L58.8243 35.745L30.5886 35.7446Z" fill="#EC268F"/>
                                            <path d="M33.5242 61.8694C31.9291 61.8694 30.6319 60.5721 30.6319 58.977C30.6319 57.3819 31.9291 56.0842 33.5242 56.0842C35.1193 56.0842 36.417 57.3815 36.417 58.977C36.4166 60.5721 35.1189 61.8694 33.5242 61.8694ZM33.5242 57.8496C32.9025 57.8496 32.3968 58.3553 32.3968 58.9774C32.3968 59.5987 32.9025 60.1048 33.5242 60.1048C34.1459 60.1048 34.652 59.5992 34.652 58.9774C34.6516 58.3553 34.1459 57.8496 33.5242 57.8496Z" fill="#EC268F"/>
                                            <path d="M51.6148 61.8694C50.0197 61.8694 48.722 60.5721 48.722 58.977C48.722 57.3819 50.0193 56.0842 51.6148 56.0842C53.2104 56.0842 54.5076 57.3815 54.5076 58.977C54.5072 60.5721 53.2099 61.8694 51.6148 61.8694ZM51.6148 57.8496C50.9931 57.8496 50.487 58.3553 50.487 58.9774C50.487 59.5987 50.9927 60.1048 51.6148 60.1048C52.237 60.1048 52.7427 59.5992 52.7427 58.9774C52.7422 58.3553 52.2365 57.8496 51.6148 57.8496Z" fill="#EC268F"/>
                                            <path d="M29.4864 35.7446C29.0822 35.7446 28.7177 35.4653 28.626 35.0545L28.0051 32.2742C27.7064 30.9359 26.5397 30.0013 25.1688 30.0013H22.1198C21.6327 30.0013 21.2373 29.606 21.2373 29.1188C21.2373 28.6317 21.6327 28.2363 22.1198 28.2363H25.1684C27.3724 28.2363 29.2472 29.7383 29.7277 31.8894L30.3486 34.6697C30.4549 35.1453 30.1553 35.617 29.6797 35.7234C29.6148 35.7379 29.5499 35.7446 29.4864 35.7446Z" fill="#EC268F"/>
                                            <circle cx="55.3886" cy="34.5151" r="8.93308" fill="#F64D4D"/>
                                            <defs>
                                            <filter id="filter0_d_1629_264" x="0.000844002" y="0.363637" width="86.2727" height="86.2727" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                            <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                            <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                            <feOffset/>
                                            <feGaussianBlur stdDeviation="3.31818"/>
                                            <feComposite in2="hardAlpha" operator="out"/>
                                            <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                                            <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_1629_264"/>
                                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_1629_264" result="shape"/>
                                            </filter>
                                            </defs>
                                            </svg>

                                           <span
                                               class="cart-has-item-icon cart-count"> {{ $cartItemsCount }}</span>
                                       </a>
                                   </li>

                                   @auth
                                       <li class="nav-item text-red">
                                           <a class=" " href="{{ route('frontend.profile') }}">
                                               {{-- <i class="fas fa-user nn-top-cart-icon"></i> --}}

                                               <svg width="50" height="49" viewBox="0 0 88 87" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g filter="url(#filter0_d_1629_261)">
                                                <circle cx="43.978" cy="43.5" r="36.5" fill="white"/>
                                                </g>
                                                <path d="M56.6447 56.7825H31.3691V56.1452C31.3691 49.1766 37.0384 43.5074 44.0069 43.5074C50.9754 43.5074 56.6447 49.1766 56.6447 56.1452V56.7825ZM32.6614 55.5078H55.3521C55.021 49.5374 50.0586 44.7821 44.0069 44.7821C37.9552 44.7821 32.9931 49.5374 32.6614 55.5078Z" fill="#EC268F"/>
                                                <path d="M44.0069 42.1141C40.1436 42.1141 37.0008 38.971 37.0008 35.1077C37.0008 31.2447 40.1436 28.1016 44.0069 28.1016C47.8702 28.1016 51.013 31.2447 51.013 35.1077C51.013 38.971 47.8702 42.1141 44.0069 42.1141ZM44.0069 29.3763C40.8466 29.3763 38.2755 31.9474 38.2755 35.1077C38.2755 38.268 40.8466 40.8394 44.0069 40.8394C47.1672 40.8394 49.7383 38.2683 49.7383 35.1077C49.7383 31.9474 47.1672 29.3763 44.0069 29.3763Z" fill="#EC268F"/>
                                                <defs>
                                                <filter id="filter0_d_1629_261" x="0.841664" y="0.363637" width="86.2727" height="86.2727" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                                <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                                <feOffset/>
                                                <feGaussianBlur stdDeviation="3.31818"/>
                                                <feComposite in2="hardAlpha" operator="out"/>
                                                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                                                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_1629_261"/>
                                                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_1629_261" result="shape"/>
                                                </filter>
                                                </defs>
                                                </svg>


                                           </a>
                                       </li>
                                       <li class="text-end ">
                                           <form action="{{ route('frontend.logout') }}" method="POST">
                                               @csrf
                                               <button class="btn text-pink p-0 m-0 fw-bold" type="submit">
                                                   LOGOUT
                                               </button>
                                           </form>
                                       </li>
                                   @else
                                       <li class="text-end ">
                                           <a href="#" data-bs-toggle="modal" data-bs-target="#loginPopup">
                                               <span class="text-red fw-bold">Login</span>
                                           </a>
                                       </li>
                                   @endauth

                               </ul>
                               <div class="navbar-nav d-inline d-lg-none text-start">
                                   <ul class="list-unstyled nav-dd-color">
                                       <li class="nav-item dd-cl mt-3">
                                           <a class="nav-link px-4  {{ URL::current() == route('frontend.index') ? 'active-red' : '' }} "
                                               aria-current="page" href="{{ route('frontend.index') }}">Home</a>
                                       </li>
                                       @foreach ($navCategories as $navCategory)
                                           <li class="nav-item dd-cl">
                                               <a class="nav-link px-4 {{ URL::current() == route('frontend.cat.show', $navCategory->slug) ? 'active-red' : '' }}"
                                                   href="{{ route('frontend.cat.show', $navCategory->slug) }}">{{ $navCategory->name }}</a>
                                           </li>
                                       @endforeach
                                       {{-- <li class="nav-item dd-cl">
                                           <a class="nav-link px-4 {{ URL::current() == route('frontend.cat.show', 'skin') ? 'active-red' : '' }}"
                                               href="{{ route('frontend.cat.show', 'skin') }}">Skin</a>
                                       </li>
                                       <li class="nav-item dd-cl">
                                           <a class="nav-link px-4 {{ URL::current() == route('frontend.cat.show', 'fragrances') ? 'active-red' : '' }}"
                                               href="{{ route('frontend.cat.show', 'fragrances') }}">Fragrances</a>
                                       </li>
                                       <li class="nav-item dd-cl">
                                           <a class="nav-link px-4 {{ URL::current() == route('frontend.cat.show', 'hair-care') ? 'active-red' : '' }}"
                                               href="{{ route('frontend.cat.show', 'hair-care') }}"> Hair Care</a>
                                       </li>
                                       <li class="nav-item dd-cl">
                                           <a class="nav-link px-4 {{ URL::current() == route('frontend.cat.show', 'personal-care') ? 'active-red' : '' }}"
                                               href="{{ route('frontend.cat.show', 'personal-care') }}"> Personal
                                               Care</a>
                                       </li>
                                       <li class="nav-item dd-cl">
                                           <a class="nav-link px-4 {{ URL::current() == route('frontend.cat.show', 'home-decor') ? 'active-red' : '' }}"
                                               href="{{ route('frontend.cat.show', 'home-decor') }}"> Home Decor</a>
                                       </li>
                                       <li class="nav-item dd-cl">
                                           <a class="nav-link px-4 {{ URL::current() == route('frontend.cat.show', 'gift') ? 'active-red' : '' }}"
                                               href="{{ route('frontend.cat.show', 'gift') }}">Gift</a>
                                       </li> --}}
                                       @auth
                                           <li class="nav-item dd-cl">
                                               <form action="{{ route('frontend.logout') }}" method="POST">
                                                   @csrf
                                                   <a class="nav-link px-4" href="!#"
                                                       onclick="event.preventDefault();this.closest('form').submit();">
                                                       LOGOUT</a>

                                               </form>
                                           </li>
                                       @endauth
                                   </ul>
                               </div>
                               <ul class="nav navbar-nav d-none d-lg-inline">
                                   <a href="/">
                                       <img height="35" src="{{ asset('frontend/images/channel-logo.svg') }}"
                                           alt="schon" class="">
                                   </a>
                               </ul>
                               <div class="header-sub-1 header-top-search-icon d-none d-lg-inline">
                                   <form action="{{ route('frontend.search.index') }}" method="GET" class="position-relative" style="isolation: isolate">
                                       <input type="text" class="form-control px-4 search-btn-newp" placeholder="Search Product"
                                           aria-label="Search" aria-describedby="basic-addon1" name="q"
                                           value="{{ request('q') }}" style="padding-top: 9px;padding-bottom:9px">
                                       <button class="position-absolute  border-0 bg-transparent header-seach-icon"
                                           type="submit">
                                           <i class="fas fa-search fa-fw " style="color:#EC268F"></i>
                                       </button>
                                   </form>
                               </div>
                           </div>
                       </div>
                   </nav>
               </div>
           </div>
       </div>

       {{-- navbar --}}
       <div class="mt-bottom-bar py-0">
           <div class="container d-none d-lg-block px-0">
               <div class="row">
                   <div class="col-xs-12">
                       <ul class="mt-icon-list pt-2 pt-md-0 pt-lg-2 pt-xl-0 pt-xxl-0">

                           <li class="bg-red px-2 rounded my-2">
                               <a href="{{ route('frontend.cart.checkout') }}" class="text-white">
                                   CHECKOUT
                               </a>
                           </li>
                       </ul>

                       <nav id="nav" class="navbar hide-navbar py-0 h-100 align-items-center">
                           <ul style="margin-right: 0px">
                               <li><a href="{{ route('frontend.index') }} "
                                       class=" {{ URL::current() == route('frontend.index') ? 'active-red' : '' }} text-capitalize">Home</a>
                               </li>
                               @foreach ($navCategories as $navCategory)
                                   <li class="nav-item dropdown">
                                       <a href="{{ route('frontend.cat.show', $navCategory->slug) }}"
                                           class="{{ URL::current() == route('frontend.cat.show', $navCategory->slug, $navCategory->slug) ? 'active-red' : '' }} nav-link text-capitalize">
                                           {{ $navCategory->name }}
                                       </a>
                                       <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                                           <div class="text-capitalize p-2">
                                               @foreach ($navCategory->subCategories as $navSubCategory)
                                                   <a class="dropdown-item"
                                                       href="{{ route('frontend.sub-category.index', ['categorySlug' => $navCategory->slug, 'subCategorySlug' => $navSubCategory->slug]) }}">{{ $navSubCategory->name }}</a>
                                               @endforeach

                                           </div>
                                       </div>
                                   </li>
                               @endforeach

                           </ul>
                       </nav>
                   </div>
               </div>
           </div>
       </div>
       <div class="d-lg-none d-block bg-white pb-3">
           <div class="container">
               <div class="row row-cols-4 ">
                   <div class="col">
                       <a href="{{ route('frontend.index') }}" class="gap-2 d-flex flex-column align-items-center">
                           <span>
                               <img src="{{ url('frontend/images/svg/footer/home.svg') }}" alt="">
                           </span>
                           <span>Home</span>
                       </a>
                   </div>
                   <div class="col">
                       <a class="gap-2 d-flex flex-column align-items-center toggle-display-trigger-by-id"
                           data-target="phone-search" href="#">
                           <span>
                               <img src="{{ url('frontend/images/svg/footer/search.svg') }}" alt="">
                           </span>
                           <span>Search</span>
                       </a>
                   </div>
                   <div class="col">
                       @auth
                           <a href="{{ route('frontend.profile') }}" class="gap-2 d-flex flex-column align-items-center">
                               <span>
                                   <img src="{{ url('frontend/images/svg/footer/account.svg') }}" alt="">
                               </span>
                               <span>Account</span>

                           </a>
                       @else
                           <a href="#" data-bs-toggle="modal" data-bs-target="#loginPopup"
                               class="gap-2 d-flex flex-column align-items-center">
                               <span>
                                   <img src="{{ url('frontend/images/svg/footer/account.svg') }}" alt="">
                               </span>
                               <span>Login</span>

                           </a>
                       @endauth
                   </div>
                   <div class="col" style="position: relative;z-index: 9999;">
                       <a href="{{ route('frontend.cart.index') }}"
                           class="gap-2 d-flex flex-column align-items-center">
                           <span>
                               <img src="{{ url('frontend/images/svg/footer/cart.svg') }}" alt="">
                           </span>
                           <span>Cart</span>
                       </a>
                   </div>
               </div>

               <div class="row" id="phone-search" style="display: none;">
                   <div class="col-12">
                       <form action="{{ route('frontend.search.index') }}" method="GET">
                           <div class="input-group mt-3">
                               <input type="text" class="form-control" placeholder="Search for products"
                                   aria-label="Search for products" aria-describedby="button-addon2" name="q"
                                   required value="{{ request('q') }}">
                               <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i
                                       class="fas fa-search"></i></button>
                           </div>
                       </form>
                   </div>
               </div>
           </div>
       </div>
   </header>
   <script>
       const {
           createApp
       } = Vue;
   </script>

   @guest('web')
       {{-- <livewire:log-in /> --}}
       <div id="login_div">
           <!-- login Modal -->
           <div class="modal fade auth-popup" id="loginPopup" tabindex="-1" aria-labelledby="loginPopupLabel"
               aria-hidden="true">
               <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                   <div class="modal-content">

                       <div class="modal-body">
                           <button class="auth-popup-close-button mb-4" type="button" data-bs-dismiss="modal"
                               aria-label="Close">
                               <img src="{{ url('frontend/images/icons/icon-close.svg') }}" style="width: 51px;"
                                   alt="">
                           </button>

                           {{-- if otp not send --}}

                           {{-- @if ($step == 1) --}}
                           <div class="auth-popup-body" v-if="!requested">
                               <h4 class="text-pink  font-body my-4">
                                   Log in/Create Account
                               </h4>
                               <form v-on:submit="submitMobileNo">
                                   <div class="input-group phone-number-arrow mb-3">
                                       <input type="text" class="form-control form-control-login px-0"
                                           placeholder="Enter Your Mobile Number" required minlength="10" maxlength="10"
                                           v-model="mobile_no">
                                       <button class="input-group-text" type="submit">
                                           <i class="fas fa-arrow-right"></i>
                                       </button>
                                   </div>
                                   <div v-if="error" v-for="(errorArray, idx) in errorTexts" :key='idx'>
                                       <div v-for="(allErrors, idx) in errorArray" :key='idx'>
                                           <span class="text-danger" v-text='allErrors'></span>
                                       </div>
                                   </div>
                                   {{-- <div class="row justify-content-center mx-auto">
                                       <p class="text-center text-black h6 py-3">Or Connect With</p>
                                       <div class="col-6 text-center">
                                           <button class="border-0 d-flex pt-2 links-btns mx-auto"><img
                                                   src="{{ url('frontend/images/icons/icon-fb.png') }}" alt=""
                                                   class="mx-2 icon-img-size"> Facebook</button>
                                       </div>

                                       <div class="col-6">
                                           <button class="border-0 d-flex pt-2 links-btns mx-auto"><img
                                                   src="{{ url('frontend/images/icons/icon-google.png') }}"
                                                   alt="" class="mx-2 icon-img-size"> Google</button>
                                       </div>
                                   </div> --}}
                               </form>
                           </div>
                           {{-- @elseif($step == 2) --}}
                           {{-- else otp sent --}}
                           <div class="auth-popup-body" v-if="requested">
                               <h4 class="text-pink  font-body my-4">
                                   Welcome
                               </h4>
                               <p class="text-muted text-start">OTP Has Been Sent To Your Registered Mobile Number
                                   @{{ mobile_no }}
                               </p>
                               <form v-on:submit="verifyOtp">
                                   <div class="input-group phone-number-arrow mb-2">
                                       <input type="text" class="form-control px-0 form-control-login"
                                           placeholder="Please Enter OTP" required id="otpNew" v-model="otp">
                                   </div>
                                   @if ($errors->has('otp'))
                                       <span class="text-danger">{{ $errors->first('otp') }}</span>
                                   @endif
                                   <div class=" justify-content-between mb-2 d-inline">
                                       <button type="button" class="f-left btn d-inline text-pink p-0 m-0 border-0"
                                           id="resend-otp-btn" id="resendOtpBtn" v-if="showResend"
                                           @click="resend">Resend OTP
                                       </button>
                                       <span class="text-muted m-0 f-right" id="otp-timer" v-if="showTimer"></span>
                                   </div>
                                   <div class="mb-3">
                                       <button type="submit" class="btn btn-pink w-100 mt-4">Verify OTP</button>
                                   </div>
                                   <button class="text-muted text-center btn" @click="back">Back To
                                       Log In</button>
                               </form>
                           </div>
                           {{-- @endif --}}

                       </div>
                   </div>
               </div>
           </div>
       </div>

       <script>
           createApp({
               data() {
                   return {
                       mobile_no: null,
                       otp: null,
                       requested: false,
                       error: false,
                       showTimer: false,
                       showResend: false,
                       countDown: null,
                       error: false,
                       errorTexts: '',
                       timer: 30,
                   }
               },
               methods: {
                   clearErrorMessage() {
                       this.error = false;
                       this.errorTexts = '';
                   },
                   sendOtp() {
                       this.clearErrorMessage();
                       axios.post("{{ route('frontend.send-otp') }}", {
                               phone: this.mobile_no
                           })
                           .then(res => {
                               if (res.data.success) {
                                   Snackbar.show({
                                       text: res.data.message,
                                       pos: 'top-right',
                                       actionTextColor: '#fff',
                                       backgroundColor: '#1abc9c'
                                   });
                                   this.requested = true;
                                   this.beginTimer();
                               }
                               if (!res.data.success) {
                                   this.requested = false;
                                   Snackbar.show({
                                       text: res.data.message,
                                       pos: 'top-right',
                                       actionTextColor: '#fff',
                                       backgroundColor: '#e7515a'
                                   });
                               }
                           })
                           .catch(err => {
                               this.requested = false;
                               this.error = true;
                               this.errorTexts = err.response.data.errors;
                           });
                   },
                   verifyOtp(e) {
                       e.preventDefault();
                       this.clearErrorMessage();
                       axios.post("{{ route('frontend.verify-otp') }}", {
                               phone: this.mobile_no,
                               otp: this.otp
                           })
                           .then(res => {
                               if (res.data.success) {
                                   this.showTimer = false;
                                   this.showResend = false;
                                   Snackbar.show({
                                       text: res.data.message,
                                       pos: 'top-right',
                                       actionTextColor: '#fff',
                                       backgroundColor: '#1abc9c'
                                   });
                                   setTimeout(() => {
                                       window.location.href = res.data.redirect_url ?? '/';
                                   }, 1000);
                               } else {
                                   Snackbar.show({
                                       text: res.data.message,
                                       pos: 'top-right',
                                       actionTextColor: '#fff',
                                       backgroundColor: '#e7515a'
                                   });
                               }
                           })
                           .catch(err => {
                               this.error = true;
                               this.errorTexts = err.response.data.errors;
                               Snackbar.show({
                                   text: "Something Went Wrong",
                                   pos: 'top-right',
                                   actionTextColor: '#fff',
                                   backgroundColor: '#e7515a'
                               });
                           });
                   },
                   resend() {
                       this.timer = 30;
                       this.sendOtp();
                   },
                   otpNew() {
                       //    $('#otpNew').focus();
                   },
                   beginTimer() {
                       this.clearErrorMessage();
                       this.showResend = false;
                       this.countDown = window.setInterval(() => {
                           if (this.timer == -1) {
                               clearTimeout(this.countDown);
                               this.showTimer = false;
                               this.showResend = true;
                               this.otpNew();
                           } else {
                               this.showTimer = true;
                               $('#otp-timer').text(`Resend OTP in ${this.timer} seconds`)
                               this.timer--;
                               this.otpNew();
                           }
                       }, 1000);
                   },
                   submitMobileNo(e) {
                       e.preventDefault();
                       this.sendOtp();
                   },
                   back() {
                       this.requested = false;
                       this.showTimer = false;
                       this.showResend = false;
                       this.timer = 30;
                       this.clearErrorMessage();
                       clearTimeout(this.countDown);
                   }
               },
               created() {
                   //    console.log(this.timer) // 30
               }
           }).mount('#login_div')
       </script>
   @endguest

   {{-- we will move this styles in css file before production --}}

   <style>


   </style>
