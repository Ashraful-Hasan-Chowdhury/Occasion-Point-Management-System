@extends('user.layouts.app')
@section('photographeractive','active')
@section('content')
<!--page-title-->
<div class="ttm-page-title-row">
    <div class="ttm-page-title-row-inner ttm-bgcolor-darkgrey">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="page-title-heading">
                        <h2 class="title"> Photographers </h2>
                    </div>
                    <div class="heading-seperator">
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--page-title end-->

{{-- Main start --}}
<div class="site-main">


    <div class="ttm-row sidebar ttm-sidebar-right ttm-bgcolor-white overflow-hidden clearfix">
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-lg-9 content-area">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-sm-flex align-items-center justify-content-between">


                            </div>
                        </div>
                    </div>
                    <div class="row">
                        {{-- loop starting part --}}
                        @foreach ($photographers as $photographer)
                        @if ($photographer->block == "false" && $photographer->approve == "approved")
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="product">
                                <!-- product -->
                                <div class="product-thumbnail">
                                    <!-- product-thumbnail -->
                                    @if ($photographer->discount == "true")
                                    <span class="onsale">Discount</span>
                                    @endif
                                    <img class="img-fluid w-100" src="{{asset($photographer->sampleOne)}}" alt=""
                                        style="height: 275px;">
                                    <div class="ttm-shop-icon">
                                        <!-- ttm-shop-icon -->
                                        <div class="product-btn add-to-cart-btn"><a
                                                href="{{ route('photographer.details', ['id'=>$photographer->id]) }}">View
                                                Details</a>
                                        </div>
                                    </div>
                                </div><!-- product-thumbnail end -->
                                <div class="product-content">
                                    <!-- product-content -->
                                    <div class="product-title">
                                        <!-- product-title -->
                                        <h2><a
                                                href="{{ route('photographer.details', ['id'=>$photographer->id]) }}">{{$photographer->name}}</a>
                                        </h2>
                                    </div>
                                    <div class="ttm-ratting-star">
                                        <!-- ratting-star -->
                                        <span style="color: black;font-size: 15px;">
                                            {{$photographer->email}}
                                        </span>
                                    </div>
                                    <span class="product-price">
                                        <!-- product-Price -->
                                        <span class="product-Price-currencySymbol">
                                            <ins><span class="product-Price-amount">
                                                    <span
                                                        class="product-Price-currencySymbol"></span>{{$photographer->packages()->count()}}
                                                    Packages
                                                </span>
                                            </ins>
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach

                        {{-- Loop Ending part --}}
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="pagination-block">
                                {{ $photographers->links() }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 widget-area sidebar-right widget_border">
                    <aside class="widget  with-title">
                        <form role="search" method="get" action="{{ route('photographer.date') }}" id="searchForm">
                            @csrf
                            <h5 style="letter-spacing: 6px;">Search By Date:</h5>
                            <div id="datepicker" style="width: 100%;"></div>
                            <input type="hidden" name="date" id="date">
                            <br>
                            <button
                                class="btn ttm-btn ttm-btn-size-md ttm-btn-shape-square ttm-btn-style-fill ttm-btn-color-skincolor btn-block"
                                type="submit" id="searchBtn" value="Search"> <i class="fa fa-search"
                                    aria-hidden="true"></i> </button>
                        </form>
                    </aside>
                    {{-- <aside class="widget widget-price-filter">
                        <h3 class="widget-title">Filter by price</h3>
                        <div class="product_content">
                            <div class="price_slider_wrapper">
                                <form method="get">
                                    <div id="slider-range" class="price-filter-range"></div>
                                    <!-- price_slider_amount -->
                                    <div class="price_slider_amount">Price:
                                        <input type="text" id="min_price" name="min_price" value="$0" data-min="$0"
                                            placeholder="Min price" />—
                                        <input type="text" id="max_price" name="max_price" value="$780" data-max="$2400"
                                            placeholder="Max price" />
                                        <button type="submit" class="button">Filter</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </aside> --}}
                    {{-- <aside class="widget widget-categories">
                        <h3 class="widget-title">Product Categories</h3>
                        <ul>
                            <li><a href="#">Night Party Event</a></li>
                            <li><a href="#">Photography</a></li>
                            <li><a href="#">Uncategorized</a></li>
                            <li><a href="#">Wedding Cake</a></li>
                            <li><a href="#">Wedding Dresses</a></li>
                            <li><a href="#">Wedding Music</a></li>
                            <li><a href="#">Wedding Planning</a></li>
                        </ul>
                    </aside> --}}
                    {{-- <aside class="widget widget-top-rated-products">
                        <h3 class="widget-title">Product</h3>
                        <ul class="product_list_widget">
                            <li class="clearfix">
                                <a href="#"><img src="images/product/product-one.jpg" alt="">
                                    <span class="product-title">Gift Basket</span>
                                </a>
                                <div class="ttm-ratting-star">
                                    <!-- ratting-star -->
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <span class="product-Price-amount amount">
                                    <span class="product-Price-currencySymbol">
                                        <del><span class="product-Price-amount">
                                                <span class="product-Price-currencySymbol">$</span>11.05
                                            </span>
                                        </del>
                                        <ins><span class="product-Price-amount">
                                                <span class="product-Price-currencySymbol">$</span>10.00
                                            </span>
                                        </ins>
                                    </span>
                                </span>
                            </li>
                            <li class="clearfix">
                                <a href="#"><img src="images/product/product-two.jpg" alt="">
                                    <span class="product-title">Cake Candles</span>
                                </a>
                                <div class="ttm-ratting-star">
                                    <!-- ratting-star -->
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <span class="product-Price-amount amount"><span
                                        class="product-Price-currencySymbol">$</span>35.00</span>
                            </li>
                            <li class="clearfix">
                                <a href="#"><img src="images/product/product-eight.jpg" alt="">
                                    <span class="product-title">Birthday Banner</span>
                                </a>
                                <div class="ttm-ratting-star">
                                    <!-- ratting-star -->
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <span class="product-Price-amount amount">
                                    <span class="product-Price-currencySymbol">
                                        <del><span class="product-Price-amount">
                                                <span class="product-Price-currencySymbol">$</span>20.00
                                            </span>
                                        </del>
                                        <ins><span class="product-Price-amount">
                                                <span class="product-Price-currencySymbol">$</span>15.00
                                            </span>
                                        </ins>
                                    </span>
                                </span>
                            </li>
                        </ul>
                    </aside> --}}
                    {{-- <aside class="widget tagcloud-widget">
                        <h3 class="widget-title">Product Tags</h3>
                        <div class="tagcloud">
                            <a href="#" class="tag-cloud-link">Accessories</a>
                            <a href="#" class="tag-cloud-link">Decor</a>
                            <a href="#" class="tag-cloud-link">Hoodies</a>
                            <a href="#" class="tag-cloud-link">Music</a>
                            <a href="#" class="tag-cloud-link">Tshirts</a>
                        </div>
                    </aside> --}}
                </div>
            </div><!-- row end -->
        </div>
    </div>


</div>
{{-- Main End --}}

{{-- Datepicker --}}
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $( function() {
    $( "#datepicker" ).datepicker({
        changeMonth: true,
        changeYear: true
    });
  } );
</script>

<script>
    $(document).on("click","#searchBtn",function(e){
            e.preventDefault();            
            $('#date').val($('#datepicker').val());
            $('#searchForm').submit();
            });
</script>
@endsection