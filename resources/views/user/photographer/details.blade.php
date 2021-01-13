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
                        <h2 class="title"> Photographer Details </h2>
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


<div class="site-main">


    <div class="ttm-row sidebar ttm-sidebar-right ttm-bgcolor-white overflow-hidden clearfix">
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-lg-9 content-area">
                    <div class="ttm-single-product-details">
                        <div class="ttm-single-product-info clearfix">
                            <div class="product-gallery images">
                                <figure class="ttm-product-gallery__wrapper">
                                    <div class="product-gallery__image">
                                        <img class="img-fluid" src="{{asset($photographer->image)}}" alt="product-img"
                                            style="width: 367px;height: 429px;">
                                    </div>
                                </figure>
                            </div>
                            <div class="summary entry-summary">
                                <h3 class="singel_product_title">{{$photographer->name}}</h3>
                                <div class="product-rating clearfix">
                                </div>
                                <p class="price">
                                    <span class="Price-amount amount">
                                        <ins><span class="product-Price-amount">
                                                <span
                                                    class="product-Price-currencySymbol"></span>{{$photographer->packages()->count()}}
                                                Packages
                                            </span>
                                        </ins>

                                    </span>
                                </p>
                                {{-- <div class="product-details__short-description">
                                    <p>
                                        <span>Address:</span> {!!htmlspecialchars_decode($hall->address)!!}
                                    </p>
                                </div> --}}
                                {{-- <form class="cart" action="#" method="post" enctype="multipart/form-data">
                                    <div class="quantity"><label class="screen-reader-text">Quantity</label>
                                        <input type="number" id="quantity" class="form-control qty text border" step="1"
                                            min="1" max="50" name="quantity" value="1" title="Qty">
                                    </div>
                                    <button id="go" name="add-to-cart" type="submit"
                                        class="cart_button ttm-btn ttm-btn-size-md ttm-btn-shape-rounded ttm-btn-style-fill ttm-btn-color-dark"
                                        title="Submit now">Add to cart</button>
                                </form> --}}
                                <div class="product_meta">
                                    <div class="sku_wrapper">
                                        <span>About: </span>
                                        <a href="#" rel="tag">{!!htmlspecialchars_decode($photographer->about)!!}</a>
                                    </div>
                                    <span class="posted_in">Packages & Price:
                                        @foreach ($photographer->packages as $package)
                                        <h5>
                                            {{$loop->index+1}}.{{$package->name}}:
                                            @if($package->discount == "true")

                                            <del>
                                                ৳<span>{{$package->price}}</span>
                                            </del>

                                            <span>৳{{$package->discount_price}}</span>

                                            @else

                                            <span>৳{{$package->price}}</span>

                                            @endif
                                        </h5>
                                        @endforeach
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="ttm-tabs tabs-for-single-products" data-effect="fadeIn">
                            <ul class="tabs clearfix">
                                <li class="tab active"><a href="#">Packages</a></li>
                                <li class="tab"><a href="#">Portfloios</a></li>
                                <li class="tab"><a href="#">Reviews ({{$photographer->reviews()->count()}})</a></li>
                            </ul>
                            <div class="content-tab ttm-bgcolor-white">
                                <!-- content-inner -->
                                <div class="content-inner active">
                                    @foreach ($photographer->packages as $package)
                                    <div class="card offset-md-2" style="width: 500px;">
                                        <img class="card-img-top" src="{{asset($package->image)}}" alt="Card image cap">
                                        <div class="card-body">
                                            <h4>{{$package->name}}</h4>
                                            <p class="card-text">
                                                {!!htmlspecialchars_decode($package->details)!!}
                                            </p>

                                        </div>
                                        <div class="card-footer">
                                            <span class="product-price">
                                                <!-- product-Price -->
                                                <span class="product-Price-currencySymbol">
                                                    @if ($package->discount == "true")
                                                    <del><span class="product-Price-amount">
                                                            <span class="product-Price-currencySymbol">৳
                                                            </span>{{$package->price}}
                                                        </span>
                                                    </del>
                                                    <ins><span class="product-Price-amount">
                                                            <span
                                                                class="product-Price-currencySymbol">৳</span>{{$package->discount_price}}
                                                        </span>
                                                    </ins>
                                                    @else
                                                    <ins><span class="product-Price-amount">
                                                            <span
                                                                class="product-Price-currencySymbol">৳</span>{{$package->price}}
                                                        </span>
                                                    </ins>
                                                    @endif
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                    <br>
                                    @endforeach
                                </div><!-- content-inner end-->
                                <!-- content-inner -->
                                <div class="content-inner">
                                    @foreach ($photographer->portfolios as $portfolio)
                                    <div class="card offset-md-2" style="width: 500px;">
                                        <img class="card-img-top" src="{{asset($portfolio->imageone)}}"
                                            alt="Card image cap">
                                        <div class="card-body">
                                            <h4>{{$portfolio->title}}</h4>
                                            <p class="card-text">
                                                {!!htmlspecialchars_decode($portfolio->details)!!}
                                            </p>
                                            <div class="row">
                                                <div class="col-md-6"><img class="card-img-top"
                                                        src="{{asset($portfolio->imageone)}}"
                                                        style="width: 200px;height: 150px;"></div>
                                                <div class="col-md-6"><img class="card-img-top"
                                                        src="{{asset($portfolio->imagetwo)}}"
                                                        style="width: 200px;height: 150px;"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6"><img class="card-img-top"
                                                        src="{{asset($portfolio->imagethree)}}"
                                                        style="width: 200px;height: 150px;"></div>
                                                <div class="col-md-6"><img class="card-img-top"
                                                        src="{{asset($portfolio->imagefour)}}"
                                                        style="width: 200px;height: 150px;"></div>
                                            </div>
                                        </div>

                                    </div>
                                    <br>
                                    @endforeach
                                </div><!-- content-inner end-->
                                <!-- content-inner -->
                                <div class="content-inner">
                                    <div id="reviews" class="woocommerce-Reviews">
                                        <div id="comments">
                                            <h2 class="woocommerce-Reviews-title">{{$photographer->reviews()->count()}}
                                                review
                                                for {{$photographer->name}}</h2>
                                            <ol class="commentlist">
                                                {{-- Review Start --}}
                                                @foreach ($photographer->reviews as $review)
                                                <li class="review">
                                                    <div class="comment_container">
                                                        <img class="avatar" src="{{asset($review->users[0]->photo)}}"
                                                            alt="comment-img">
                                                        <div class="comment-text">

                                                            <p class="meta">
                                                                <strong
                                                                    class="eview__author">{{$review->users[0]->name}}
                                                                </strong><span class="review__dash">–</span>
                                                                <time class="woocommerce-review__published-date"
                                                                    datetime="2018-11-01T04:58:58+00:00">{{$review->created_at->diffForHumans()}}</time>
                                                            </p>
                                                            <div class="description">
                                                                <p>{{$review->body}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                @endforeach
                                                {{-- Reivew end --}}
                                            </ol>
                                        </div>
                                        @if (Auth::check())
                                        <div id="review_form_wrapper">
                                            <div class="comment-respond">
                                                <span class="comment-reply-title">Add a review</span>
                                                <form
                                                    action="{{ route('review.store.photographer',$photographer->id) }}"
                                                    method="post" id="commentform" class="comment-form">
                                                    @csrf


                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label>Your review*</label>
                                                                <textarea name="body" rows="3" placeholder=""
                                                                    required="required"></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <div class="form-group text-left mt-30">
                                                                <button type="submit" id="submit"
                                                                    class="ttm-btn ttm-btn-size-md ttm-btn-shape-rounded ttm-btn-style-fill ttm-btn-color-dark"
                                                                    value="">
                                                                    Submit
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        @else
                                        <h5>Login to the system to post a review.</h5>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3 widget-area sidebar-right widget_border">
                    <aside class="widget with-title">
                        @if (Auth::check())

                        <form role="search" method="post" action="{{ route('photographer.book',$photographer->id) }}"
                            id="searchForm">
                            @csrf
                            <h5 style="letter-spacing: 2px;">Select Booking Date:</h5>
                            <div id="datepicker" style="width: 100%;"></div>
                            <input type="hidden" name="bookingdate" id="date">
                            <br>
                            <h5>Bkash No: {{$photographer->phone}}</h5>

                            <select class="form-control" name="package_id">
                                <option>-- select package --</option>
                                @foreach ($photographer->packages as $package)
                                <option value="{{$package->id}}">{{$package->name}}</option>
                                @endforeach
                            </select>

                            @if ($photographer->discount == "true")
                            <input type="hidden" name="bookingamount" value="{{$photographer->discount_amount}}">
                            @else
                            <input type="hidden" name="bookingamount" value="{{$photographer->amount}}">
                            @endif
                            <p style="color: brown;">** send Your selected package price to the bkash number above
                                and insert the trxid
                                below.</p>

                            <input type="text" name="trxid" class="form-control border" placeholder="bikas trxid">
                            <br>
                            <button
                                class="btn ttm-btn ttm-btn-size-md ttm-btn-shape-square ttm-btn-style-fill ttm-btn-color-skincolor btn-block"
                                type="submit" id="searchBtn" value="Search">
                                Book Now </button>
                        </form>
                        @else
                        <h4>Login Now to Book the Hall</h4>
                        @endif
                    </aside>

                </div>
            </div><!-- row end -->
        </div>
    </div>

</div>

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