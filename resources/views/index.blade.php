<!DOCTYPE html>
<html lang="en">

<head>
       @include('partials/_head')
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">

        @include('partials/_sidebar')

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <div class="nav toggle">
                    <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                    <ul class=" navbar-right">
                        <li class="nav-item dropdown open" style="padding-left: 15px;">
                            <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                <img src="images/img.jpg" alt="">John Doe
                            </a>
                            <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item"  href="javascript:;"> Profile</a>
                                <a class="dropdown-item"  href="javascript:;">
                                    <span class="badge bg-red pull-right">50%</span>
                                    <span>Settings</span>
                                </a>
                                <a class="dropdown-item"  href="javascript:;">Help</a>
                                <a class="dropdown-item"  href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                            </div>
                        </li>

                        <li role="presentation" class="nav-item dropdown open">
                            <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                                <i style="font-size: 25px !important;" class="fa fa-shopping-basket"></i>
                                <span class="badge bg-green">{{ Cart::getTotalQuantity()}}</span>
                            </a>
                            <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">



                                @foreach ($cartItems as $item)

                                <li class="nav-item">
                                    <a class="dropdown-item">
                                        <span class="image"><img src="{{ asset('img/img.jpg') }}" alt="Profile Image" /></span>
                                        <span>
                                             <span>{{ $item->name }}</span>
                                             </span>

                                        @if($item->attributes->total > 0)
                                             <span class="message">
                                                  {{ $item->attributes->subtotal }} TL - {{ $item->attributes->message }} - {{ $item->attributes->total }} TL
                                            </span>
                                        @else
                                             <span class="message">
                                                  {{ $item->price }} TL
                                            </span>
                                        @endif

                                    </a>
                                    <form style="margin-top: 15px;" action="{{ route('updatecart') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $item->id}}" >
                                        @if($item->attributes->total > 0)
                                            <input type="number" name="quantity" value="{{ $item->attributes->quant }}"
                                        @else
                                            <input type="number" name="quantity" value="{{ $item->attributes->quant }}"
                                        @endif
                                               class="w-6 text-center bg-gray-300" />
                                        <button class="float-right btn-success">Update</button>
                                    </form>
                                    <form action="{{ route('removecart') }}" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{ $item->id }}" name="id">
                                        <button class="float-right btn-danger">x</button>
                                    </form>
                                </li>
                                @endforeach


                                    <li class="nav-item">
                                        <div class="text-center">
                                            <a class="dropdown-item">

                                                <strong>Total: {{ Cart::getTotal() }} </strong>


                                            </a>
                                        </div>
                                    </li>


                                <li class="nav-item">
                                    <div class="text-center">
                                        <a class="dropdown-item">
                                            <strong>Alışverişi Tamamla</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </li>

                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3> Media Gallery <small> gallery design</small> </h3>
                        </div>

                        <div class="title_right">
                            <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search for...">
                                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Go!</button>
                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>

            @yield('content')

    </div>
</div>


<!-- /page content -->

        <!-- footer content -->
        @include('partials/_footer')
        <!-- /footer content -->
    </div>
</div>


@include('partials/_script')
</body>
</html>
