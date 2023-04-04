   <!-- mt header style3 start here -->
   <header id="mt-header" class="style3">
       <!-- mt top bar start here -->
       <div class="mt-top-bar" style="background-color: white;color:black">
           <div class="container">
               <div class="row row-cols-3 py-4">
                   <div class="col header-sub-1 header-top-search-icon">
                       <form action="" method="post" class="">
                           @csrf
                           <i class="fas fa-search fa-fw header-seach-icon" style="color:#EC268F"></i>
                           <input type="text" class="form-control" placeholder="Search Product" aria-label="Search"
                               aria-describedby="basic-addon1">
                       </form>
                   </div>
                   <div class="col hide-nav-top nav-custom-width p-0">
                       <nav class="navbar navbar-expand-lg">
                           <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                               data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                               aria-label="Toggle navigation">
                               <span class="navbar-toggler-icon"></span>
                           </button>
                           <div class="collapse navbar-collapse" id="navbarNav">
                               <ul class="navbar-nav">
                                   <li class="nav-item">
                                       <a class="nav-link active" aria-current="page" href="#">Home</a>
                                   </li>
                                   <li class="nav-item">
                                       <a href="{{ route('skin') }}">Skin</a>
                                   </li>
                                   <li class="nav-item">
                                       <a class="nav-link" href="{{ route('fragrances') }}">fragrances</a>
                                   </li>
                                   <li class="nav-item">
                                       <a class="nav-link" href="#">Haircare</a>
                                   </li>
                                   <li class="nav-item">
                                       <a class="nav-link" href="#">PersonalCare</a>
                                   </li>
                                   <li class="nav-item">
                                       <a class="nav-link" href="#">Home Decor</a>
                                   </li>
                                   <li class="nav-item">
                                       <a class="nav-link" href="#">Gift</a>
                                   </li>
                               </ul>
                           </div>
                       </nav>
                   </div>
                   <div class="col header-sub-2">
                       <a href="frontend/#">
                           <img height="35" src="{{ asset('frontend/images/channel-logo.svg') }}" alt="schon">
                       </a>
                   </div>
                   <div class="col header-sub-3">
                       <ul class="gap-4">
                           <li class="text-end text-red position-relative">
                               <i class="fas fa-cart-plus top-nav-carticon"></i>
                               <span
                                   class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary">+99
                                   <span class="visually-hidden">unread messages</span></span>
                           </li>
                           @auth
                               <li class="text-end text-red">
                                   <a href="{{ route('frontend.profile') }}">
                                       <i class="fas fa-user top-nav-usericon"></i>
                                   </a>
                               </li>
                               <li class="text-end ">
                                   <form action="{{ route('frontend.logout') }}" method="POST">
                                       @csrf
                                       <button class="btn text-pink p-0 m-0" type="submit">
                                           LOGOUT
                                       </button>
                                   </form>
                               </li>
                           @else
                               <li class="text-end ">
                                   <a href="http://" data-bs-toggle="modal" data-bs-target="#loginPopup">
                                       LOGIN
                                   </a>
                               </li>
                           @endauth
                       </ul>
                   </div>
               </div>
           </div>
       </div>
       <!-- mt top bar end here -->
       <!-- mt bottom bar start here -->
       <div class="mt-bottom-bar py-2">
           <div class="container">
               <div class="row">
                   <div class="col-xs-12">
                       <ul class="mt-icon-list pt-2 pt-md-0 pt-lg-2 pt-xl-0 pt-xxl-0">

                           <li class="px-2 ">
                               <a href="http://" class="text-black">
                                   ORDER TRACK
                               </a>
                           </li>
                           <li class="bg-red px-2 rounded">
                               <a href="http://" class="text-white">
                                   CHECKOUT
                               </a>
                           </li>
                       </ul>
                       <div class="header-sub-1 nav-top-search-icon">

                           <form action="" method="post">
                               @csrf
                               <i class="fas fa-search fa-fw header-seach-icon" style="color:#EC268F"></i>
                               <input type="text" class="form-control" placeholder="Search Product"
                                   aria-label="Search" aria-describedby="basic-addon1">

                           </form>
                       </div>
                       <nav id="nav" class="navbar hide-navbar">
                           <ul style="margin-right: 0px">
                               <li><a href="{{ route('index') }}">Home</a></li>
                               <li><a href="{{ route('skin') }}">Skin</a></li>
                               <li><a href="{{ route('fragrances') }}">fragrances</a></li>
                               <li><a href="{{ route('about') }}">Haircare</a></li>
                               <li><a href="{{ route('about') }}">PersonalCare</a></li>
                               <li><a href="{{ route('about') }}">Home Decor</a></li>
                               <li><a href="{{ route('contact') }}">gift</a></li>
                           </ul>
                       </nav>

                       <!-- mt icon list end here -->

                   </div>
               </div>
           </div>

       </div>
       <!-- mt bottom bar end here -->
       <span class="mt-side-over"></span>
   </header><!-- mt header end here -->
   <!-- mt search popup start here -->
   <div class="mt-search-popup">
       <div class="mt-holder">
           <a href="" class="search-close"><span></span><span></span></a>
           <div class="mt-frame">
               <form action="#">
                   <fieldset>
                       <input type="text" placeholder="Search...">
                       <span class="icon-microphone"></span>
                       <button class="icon-magnifier" type="submit"></button>
                   </fieldset>
               </form>
           </div>
       </div>
   </div><!-- mt search popup end here -->
   <!-- mt main start here -->
   {{-- <li><a href="{{route('about')}}">About</a></li>
                            <li><a href="{{route('contact')}}">Contact</a></li> --}}

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
                                       <input type="text" class="form-control" placeholder="Enter Your Mobile Number"
                                           required minlength="10" maxlength="10" v-model="mobile_no">
                                       <button class="input-group-text" type="submit">
                                           <i class="fas fa-arrow-right"></i>
                                       </button>
                                   </div>
                                   <div v-if="error" v-for="(errorArray, idx) in errorTexts" :key='idx'>
                                       <div v-for="(allErrors, idx) in errorArray" :key='idx'>
                                           <span class="text-danger" v-text='allErrors'></span>
                                       </div>
                                   </div>
                               </form>
                           </div>
                           {{-- @elseif($step == 2) --}}
                           {{-- else otp sent --}}
                           <div class="auth-popup-body" v-if="requested">
                               <h4 class="text-pink  font-body my-4">
                                   Welcome
                               </h4>
                               <p class="text-muted text-start">OTP Has Been Sent To Your Registered Mobile Number  @{{ mobile_no }}
                               </p>
                               <form v-on:submit="verifyOtp">
                                   <div class="input-group phone-number-arrow mb-2">
                                       <input type="text" class="form-control" placeholder="Please Enter OTP" required
                                           id="otpNew" v-model="otp">
                                   </div>
                                   @if ($errors->has('otp'))
                                       <span class="text-danger">{{ $errors->first('otp') }}</span>
                                   @endif
                                   <div class="d-flex justify-content-between mb-2 flex-row-reverse">
                                       <button type="button" class="btn text-pink p-0 m-0 border-0" id="resend-otp-btn"
                                           id="resendOtpBtn" v-if="showResend" @click="resend">Resend
                                       </button>
                                       <span class="text-muted m-0" id="otp-timer" v-if="showTimer"></span>
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
       <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
       <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
       <script>
           const {
               createApp
           } = Vue;
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
                                       window.location.href = '/';
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
