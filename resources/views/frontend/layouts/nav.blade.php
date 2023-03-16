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
                       <nav class="navbar navbar-expand-lg" >
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
                                       <a class="nav-link" href="#">Features</a>
                                   </li>
                                   <li class="nav-item">
                                       <a class="nav-link" href="#">fragrances</a>
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
                           <li class="text-end text-red">
                               <i class="fas fa-user top-nav-usericon"></i>
                           </li>
                           <li class="text-end ">
                               <a href="http://" data-bs-toggle="modal" data-bs-target="#loginPopup">
                                   LOGIN
                               </a>
                           </li>
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
                               <li><a href="{{ route('products') }}">Skin</a></li>
                               <li><a href="{{ route('about') }}">fragrances</a></li>
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


   <!-- login Modal -->
   <div class="modal fade auth-popup" id="loginPopup" tabindex="-1" aria-labelledby="loginPopupLabel"
       aria-hidden="true">
       <div class="modal-dialog  modal-lg modal-dialog-centered modal-dialog-scrollable">
           <div class="modal-content">

               <div class="modal-body">
                   <button class="auth-popup-close-button mb-5" type="button" data-bs-dismiss="modal"
                       aria-label="Close">
                       <img src="frontend/images/icons/icon-close.svg" alt="">
                   </button>

                   <div class="auth-popup-body">

                       <h3 class="text-pink h2 font-body mb-5">
                           Log in/create account
                       </h3>
                       <form action="">

                           <div class="input-group phone-number-arrow mb-5">
                               <input type="text" class="form-control" placeholder="enter your mobile number*">
                               <button class="input-group-text">
                                   <i class="fas fa-arrow-right"></i>
                                </button>
                            </div>
                        </form>
                       <div class="h4 mb-5">
                           or connect with`
                       </div>
                       <div class="d-flex flex-wrap justify-content-around ">
                           <a href="" class="social-button px-3 py-2 mb-5">
                               <img src="frontend/images/icons/icon-fb.png" class="pe-3" alt="">
                               facebook
                           </a>
                           <a href="" class="social-button px-3 py-2 mb-5">
                               <img src="frontend/images/icons/icon-google.png" class="pe-3" alt="">
                               google
                           </a>
                       </div>
                   </div>


               </div>

           </div>
       </div>
   </div>

   {{-- we will move this styles in css file before production --}}

   <style>
       .modal-backdrop {
           background-color: #fff;
       }

       .auth-popup.modal {
           backdrop-filter: blur(14px);
       }

       .auth-popup .auth-popup-close-button {
           background: none;
           border: none;
       }

       .auth-popup .modal-content {
           background: none;
           border: none;
           text-align: center;

       }

       .auth-popup-body {
           background: #FFFFFF;
           box-shadow: 11px 16px 21px 2px rgba(0, 0, 0, 0.13);
           border-radius: 15px;
           padding: 4em;
           color: #979797;
       }

       @media (max-width: 992px) {
           .auth-popup-body {
               padding: 4em 1em;

           }
       }

       .social-button {
           background: #FFFFFF;
           box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
           display: flex;
           align-items: center;
           justify-content: center;
           color: #979797;
           font-weight: 500;
           font-size: 20px;
       }

       .phone-number-arrow {
           display: flex;
           justify-content: center;
           align-items: center;
           border-bottom: 1px solid #000000;
           padding-bottom: 5px;
       }

       .phone-number-arrow input{
        background: none;
       }
       .phone-number-arrow * {
           font-size: 1.4em;
           border: none;
       }

       .phone-number-arrow .input-group-text {
           border-radius: 4em !important;
           display: flex;
           align-items: center;
           justify-content: center;
           width: 2em;
           height: 2em;

           background: #EC268F;
           color: white
       }
   </style>
