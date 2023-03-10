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
                       <nav class="navbar navbar-expand-lg" style="width: 100vw;">


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
                                       <a class="nav-link" href="#">Pricing</a>
                                   </li>
                                   <li class="nav-item">
                                       <a class="nav-link disabled" href="#" tabindex="-1"
                                           aria-disabled="true">Disabled</a>
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
                               <a href="http://">
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
       <div class="mt-bottom-bar py-2" >

           <div class="container">
               <div class="row">
                   <div class="col-xs-12">

                       <ul class="mt-icon-list pt-2 pt-md-0 pt-lg-2 pt-xl-0 pt-xxl-0">
                           {{-- <li class="hidden-lg hidden-md">
                            <a href="" class="bar-opener mobile-toggle">
                              <span class="bar small"></span>
                                <span class="bar"></span>
                                <span class="bar"></span>
                            </a>
                        </li> --}}
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
                       </ul><!-- mt icon list end here -->
                       <!-- navigation start here -->
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
