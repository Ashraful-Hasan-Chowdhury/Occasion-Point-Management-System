@extends('user.layouts.app')
@section('homeactive','active')
@section('content')
<rs-module-wrap id="rev_slider_3_1_wrapper" data-source="gallery">
    <rs-module id="rev_slider_3_1" data-version="6.1.2" class="rev_slider_3_1_height">
        <rs-slides>

            <rs-slide data-key="rs-5316" data-title="Catering Can Make Any Special Meal a Celebration"
                data-thumb="{{asset('public/user/images/slides/postslider-3-100x50.jpg')}}" data-seoz="front"
                data-anim="ei:d;eo:d;s:600;r:0;t:fade;sl:d;">

                <img src="{{asset('public/user/images/slides/postslider-3.jpg')}}" title="postslider-3" width="1200"
                    height="800" data-parallax="off" class="rev-slidebg" data-no-retina>

                <rs-layer id="slider-12-slide-5316-layer-5" data-type="shape"
                    data-bsh="c:rgba(0,0,0,0.21);b:9px,9px,4px,4px;" data-rsp_ch="on" data-xy="x:c;y:m;"
                    data-text="w:normal;s:20,20,11,11;l:0,0,14,14;"
                    data-dim="w:735px,735px,550px,500px;h:443px,443px,350px,300px;" data-frame_999="o:0;st:w;"
                    style="z-index:8;background-color:#ffffff;">
                </rs-layer>

                @if (Auth::check())

                <h3 id="slider-12-slide-5316-layer-6" class="rs-layer" target="_self" rel="nofollow"
                    data-color="#121f38" data-rsp_ch="on"
                    data-xy="x:c;xo:-85px,-85px,-65px,0;y:m;yo:95px,95px,74px,80px;"
                    data-text="w:normal;s:19,19,15,15;l:29,29,25,25;fw:500;" data-dim="minh:0px,0px,none,none;"
                    data-padding="t:8,8,5,5;r:25,25,15,15;b:8,8,5,5;l:25,25,15,15;" data-frame_0="y:100%;"
                    data-frame_1="e:power4.inOut;st:540;sp:500;sR:540;" data-frame_999="o:0;st:w;sR:7960;"
                    data-frame_hover="c:#c78665;bgc:#fff;boc:#c78665;bor:3px,3px,3px,3px;bos:solid;bow:1px,1px,1px,1px;e:power1.inOut;"
                    style="z-index:12;background-color:#c78665;font-family:Cormorant; margin-left: 180px;font-size: 30px;">
                    Hellow
                    {{auth()->user()->name}},
                    you are now logged in.
                </h3>
                @else
                <a id="slider-12-slide-5316-layer-6" class="rs-layer rev-btn" href="{{ route('register') }}"
                    target="_self" rel="nofollow" data-type="button" data-color="#121f38" data-rsp_ch="on"
                    data-xy="x:c;xo:-85px,-85px,-65px,0;y:m;yo:95px,95px,74px,80px;"
                    data-text="w:normal;s:19,19,15,15;l:29,29,25,25;fw:500;" data-dim="minh:0px,0px,none,none;"
                    data-padding="t:8,8,5,5;r:25,25,15,15;b:8,8,5,5;l:25,25,15,15;"
                    data-border="bos:solid;boc:#121f38;bow:1px,1px,1px,1px;bor:3px,3px,3px,3px;" data-frame_0="y:100%;"
                    data-frame_1="e:power4.inOut;st:540;sp:500;sR:540;" data-frame_999="o:0;st:w;sR:7960;"
                    data-frame_hover="c:#c78665;bgc:#fff;boc:#c78665;bor:3px,3px,3px,3px;bos:solid;bow:1px,1px,1px,1px;e:power1.inOut;"
                    style="z-index:12;background-color:#ffffff;font-family:Cormorant;">Register
                </a>

                <a id="slider-12-slide-5316-layer-8" class="rs-layer rev-btn" href="{{ route('login') }}" target="_self"
                    rel="nofollow" data-type="button" data-rsp_ch="on"
                    data-xy="x:c;xo:89px,89px,65px,0;yo:421px,421px,281px,188px;"
                    data-text="w:normal;s:19,19,15,15;l:29,29,25,25;fw:500;" data-dim="minh:0px,0px,none,none;"
                    data-padding="t:9,9,5,5;r:40,40,23,23;b:9,9,5,5;l:40,40,23,23;" data-border="bor:3px,3px,3px,3px;"
                    data-frame_0="y:100%;" data-frame_1="e:power4.inOut;st:580;sp:500;sR:580;"
                    data-frame_999="o:0;st:w;sR:7920;"
                    data-frame_hover="bgc:#0c0900;bor:3px,3px,3px,3px;sp:100;e:power1.inOut;bri:120%;"
                    style="z-index:13;background-color:#c78665;font-family:Cormorant;">Login
                </a>
                @endif

                <a id="slider-12-slide-5316-layer-9" class="rs-layer" href="responsible-sourcing.html" target="_blank"
                    rel="noopener" data-type="text" data-color="#000000" data-rsp_ch="on"
                    data-xy="x:c;yo:259px,259px,147px,60px;"
                    data-text="w:normal;s:48,48,38,33;l:58,58,55,55;fw:700;a:center;"
                    data-dim="w:585px,585px,503px,463px;h:102,102,auto,auto;" data-basealign="slide"
                    data-frame_0="y:100%;" data-frame_1="e:power4.inOut;st:210;sp:800;sR:210;"
                    data-frame_999="o:0;st:w;sR:7990;"
                    style="z-index:11;font-family:Cormorant;text-transform:capitalize;">Find the Best Convension Center
                    for You
                </a>

                <rs-layer id="slider-12-slide-5316-layer-10" data-type="text" data-color="#c78665" data-rsp_ch="on"
                    data-xy="x:c;xo:0,0,0,583px;y:m;yo:-106px,-106px,-101px,-51px;"
                    data-text="w:normal;s:18,18,15,15;l:28,28,18,18;a:center;" data-vbility="t,t,t,f"
                    data-frame_0="y:100%;" data-frame_1="e:power4.inOut;st:90;sp:400;sR:90;"
                    data-frame_999="o:0;st:w;sR:8510;" style="z-index:10;font-family:Hind;">Planning & Budgets
                </rs-layer>

                <rs-layer id="slider-12-slide-5316-layer-11" data-type="image" data-rsp_ch="on"
                    data-xy="x:c;y:m;yo:20px,20px,11px,11px;" data-text="w:normal;s:20,20,11,11;l:0,0,14,14;"
                    data-dim="w:339px,339px,196px,196px;h:406px,406px,235px,235px;" data-frame_999="o:0;st:w;"
                    style="z-index:9;"><img src="{{asset('public/user/images/slides/catring-slid-bg.png')}}" alt="img"
                        width="339" height="406" data-no-retina>
                </rs-layer>

            </rs-slide>

            <rs-slide data-key="rs-5314" data-title="Tips for Making Business Catering Affordable"
                data-thumb="{{asset('public/user/images/slides/postslider-2-100x50.jpg')}}" data-seoz="front"
                data-anim="ei:d;eo:d;s:600;r:0;t:fade;sl:d;">

                <img src="{{asset('public/user/images/slides/postslider-2.jpg')}}" title="postslider-2" width="1200"
                    height="800" data-parallax="off" class="rev-slidebg" data-no-retina>

                <rs-layer id="slider-12-slide-5314-layer-5" data-type="shape"
                    data-bsh="c:rgba(0,0,0,0.21);b:9px,9px,4px,4px;" data-rsp_ch="on" data-xy="x:c;y:m;"
                    data-text="w:normal;s:20,20,11,11;l:0,0,14,14;"
                    data-dim="w:735px,735px,550px,500px;h:443px,443px,350px,300px;" data-frame_999="o:0;st:w;"
                    style="z-index:8;background-color:#ffffff;">
                </rs-layer>

                @if (Auth::check())

                <h3 id="slider-12-slide-5316-layer-6" class="rs-layer" target="_self" rel="nofollow"
                    data-color="#121f38" data-rsp_ch="on"
                    data-xy="x:c;xo:-85px,-85px,-65px,0;y:m;yo:95px,95px,74px,80px;"
                    data-text="w:normal;s:19,19,15,15;l:29,29,25,25;fw:500;" data-dim="minh:0px,0px,none,none;"
                    data-padding="t:8,8,5,5;r:25,25,15,15;b:8,8,5,5;l:25,25,15,15;" data-frame_0="y:100%;"
                    data-frame_1="e:power4.inOut;st:540;sp:500;sR:540;" data-frame_999="o:0;st:w;sR:7960;"
                    data-frame_hover="c:#c78665;bgc:#fff;boc:#c78665;bor:3px,3px,3px,3px;bos:solid;bow:1px,1px,1px,1px;e:power1.inOut;"
                    style="z-index:12;background-color:#c78665;font-family:Cormorant; margin-left: 180px;font-size: 30px;">
                    Hellow
                    {{auth()->user()->name}},
                    you are now logged in.
                </h3>
                @else
                <a id="slider-12-slide-5316-layer-6" class="rs-layer rev-btn" href="{{ route('register') }}"
                    target="_self" rel="nofollow" data-type="button" data-color="#121f38" data-rsp_ch="on"
                    data-xy="x:c;xo:-85px,-85px,-65px,0;y:m;yo:95px,95px,74px,80px;"
                    data-text="w:normal;s:19,19,15,15;l:29,29,25,25;fw:500;" data-dim="minh:0px,0px,none,none;"
                    data-padding="t:8,8,5,5;r:25,25,15,15;b:8,8,5,5;l:25,25,15,15;"
                    data-border="bos:solid;boc:#121f38;bow:1px,1px,1px,1px;bor:3px,3px,3px,3px;" data-frame_0="y:100%;"
                    data-frame_1="e:power4.inOut;st:540;sp:500;sR:540;" data-frame_999="o:0;st:w;sR:7960;"
                    data-frame_hover="c:#c78665;bgc:#fff;boc:#c78665;bor:3px,3px,3px,3px;bos:solid;bow:1px,1px,1px,1px;e:power1.inOut;"
                    style="z-index:12;background-color:#ffffff;font-family:Cormorant;">Register
                </a>

                <a id="slider-12-slide-5316-layer-8" class="rs-layer rev-btn" href="{{ route('login') }}" target="_self"
                    rel="nofollow" data-type="button" data-rsp_ch="on"
                    data-xy="x:c;xo:89px,89px,65px,0;yo:421px,421px,281px,188px;"
                    data-text="w:normal;s:19,19,15,15;l:29,29,25,25;fw:500;" data-dim="minh:0px,0px,none,none;"
                    data-padding="t:9,9,5,5;r:40,40,23,23;b:9,9,5,5;l:40,40,23,23;" data-border="bor:3px,3px,3px,3px;"
                    data-frame_0="y:100%;" data-frame_1="e:power4.inOut;st:580;sp:500;sR:580;"
                    data-frame_999="o:0;st:w;sR:7920;"
                    data-frame_hover="bgc:#0c0900;bor:3px,3px,3px,3px;sp:100;e:power1.inOut;bri:120%;"
                    style="z-index:13;background-color:#c78665;font-family:Cormorant;">Login
                </a>
                @endif

                <a id="slider-12-slide-5314-layer-9" class="rs-layer"
                    href="http://wedco.themetechmount.net/blog/2020/10/30/tips-for-making-business-catering-affordable-2/"
                    target="_blank" rel="noopener" data-type="text" data-color="#000000" data-rsp_ch="on"
                    data-xy="x:c;yo:259px,259px,147px,60px;"
                    data-text="w:normal;s:48,48,38,33;l:58,58,55,55;fw:700;a:center;"
                    data-dim="w:585px,585px,503px,463px;h:102,102,auto,auto;" data-basealign="slide"
                    data-frame_0="y:100%;" data-frame_1="e:power4.inOut;st:210;sp:800;sR:210;"
                    data-frame_999="o:0;st:w;sR:7990;"
                    style="z-index:11;font-family:Cormorant;text-transform:capitalize;">
                    Get the Best Bridal Looks Book Parlours
                </a>

                <rs-layer id="slider-12-slide-5314-layer-10" data-type="text" data-color="#c78665" data-rsp_ch="on"
                    data-xy="x:c;xo:0,0,0,583px;y:m;yo:-106px,-106px,-101px,-51px;"
                    data-text="w:normal;s:18,18,15,15;l:28,28,18,18;a:center;" data-vbility="t,t,t,f"
                    data-frame_0="y:100%;" data-frame_1="e:power4.inOut;st:90;sp:400;sR:90;"
                    data-frame_999="o:0;st:w;sR:8510;" style="z-index:10;font-family:Hind;">Planning & Budgets
                </rs-layer>

                <rs-layer id="slider-12-slide-5314-layer-11" data-type="image" data-rsp_ch="on"
                    data-xy="x:c;y:m;yo:20px,20px,11px,11px;" data-text="w:normal;s:20,20,11,11;l:0,0,14,14;"
                    data-dim="w:339px,339px,196px,196px;h:406px,406px,235px,235px;" data-frame_999="o:0;st:w;"
                    style="z-index:9;"><img src="{{asset('public/user/images/slides/catring-slid-bg.png')}}" alt="img"
                        width="339" height="406" data-no-retina>

                </rs-layer>
            </rs-slide>

            <rs-slide data-key="rs-5309" data-title="Special Considerations for Outdoor Wedding Catering"
                data-thumb="{{asset('public/user/images/slides/postslider-1-100x50.jpg')}}" data-seoz="front"
                data-anim="ei:d;eo:d;s:600;r:0;t:fade;sl:d;">

                <img src="{{asset('public/user/images/slides/postslider-1.jpg')}}" title="postslider-1" width="1200"
                    height="800" data-parallax="off" class="rev-slidebg" data-no-retina>

                <rs-layer id="slider-12-slide-5309-layer-5" data-type="shape"
                    data-bsh="c:rgba(0,0,0,0.21);b:9px,9px,4px,4px;" data-rsp_ch="on" data-xy="x:c;y:m;"
                    data-text="w:normal;s:20,20,11,11;l:0,0,14,14;"
                    data-dim="w:735px,735px,550px,500px;h:443px,443px,350px,300px;" data-frame_999="o:0;st:w;"
                    style="z-index:8;background-color:#ffffff;">
                </rs-layer>

                @if (Auth::check())

                <h3 id="slider-12-slide-5316-layer-6" class="rs-layer" target="_self" rel="nofollow"
                    data-color="#121f38" data-rsp_ch="on"
                    data-xy="x:c;xo:-85px,-85px,-65px,0;y:m;yo:95px,95px,74px,80px;"
                    data-text="w:normal;s:19,19,15,15;l:29,29,25,25;fw:500;" data-dim="minh:0px,0px,none,none;"
                    data-padding="t:8,8,5,5;r:25,25,15,15;b:8,8,5,5;l:25,25,15,15;" data-frame_0="y:100%;"
                    data-frame_1="e:power4.inOut;st:540;sp:500;sR:540;" data-frame_999="o:0;st:w;sR:7960;"
                    data-frame_hover="c:#c78665;bgc:#fff;boc:#c78665;bor:3px,3px,3px,3px;bos:solid;bow:1px,1px,1px,1px;e:power1.inOut;"
                    style="z-index:12;background-color:#c78665;font-family:Cormorant; margin-left: 180px;font-size: 30px;">
                    Hellow
                    {{auth()->user()->name}},
                    you are now logged in.
                </h3>
                @else
                <a id="slider-12-slide-5316-layer-6" class="rs-layer rev-btn" href="{{ route('register') }}"
                    target="_self" rel="nofollow" data-type="button" data-color="#121f38" data-rsp_ch="on"
                    data-xy="x:c;xo:-85px,-85px,-65px,0;y:m;yo:95px,95px,74px,80px;"
                    data-text="w:normal;s:19,19,15,15;l:29,29,25,25;fw:500;" data-dim="minh:0px,0px,none,none;"
                    data-padding="t:8,8,5,5;r:25,25,15,15;b:8,8,5,5;l:25,25,15,15;"
                    data-border="bos:solid;boc:#121f38;bow:1px,1px,1px,1px;bor:3px,3px,3px,3px;" data-frame_0="y:100%;"
                    data-frame_1="e:power4.inOut;st:540;sp:500;sR:540;" data-frame_999="o:0;st:w;sR:7960;"
                    data-frame_hover="c:#c78665;bgc:#fff;boc:#c78665;bor:3px,3px,3px,3px;bos:solid;bow:1px,1px,1px,1px;e:power1.inOut;"
                    style="z-index:12;background-color:#ffffff;font-family:Cormorant;">Register
                </a>

                <a id="slider-12-slide-5316-layer-8" class="rs-layer rev-btn" href="{{ route('login') }}" target="_self"
                    rel="nofollow" data-type="button" data-rsp_ch="on"
                    data-xy="x:c;xo:89px,89px,65px,0;yo:421px,421px,281px,188px;"
                    data-text="w:normal;s:19,19,15,15;l:29,29,25,25;fw:500;" data-dim="minh:0px,0px,none,none;"
                    data-padding="t:9,9,5,5;r:40,40,23,23;b:9,9,5,5;l:40,40,23,23;" data-border="bor:3px,3px,3px,3px;"
                    data-frame_0="y:100%;" data-frame_1="e:power4.inOut;st:580;sp:500;sR:580;"
                    data-frame_999="o:0;st:w;sR:7920;"
                    data-frame_hover="bgc:#0c0900;bor:3px,3px,3px,3px;sp:100;e:power1.inOut;bri:120%;"
                    style="z-index:13;background-color:#c78665;font-family:Cormorant;">Login
                </a>
                @endif

                <a id="slider-12-slide-5309-layer-9" class="rs-layer"
                    href="http://wedco.themetechmount.net/blog/2020/10/30/special-considerations-for-outdoor-wedding-catering-2/"
                    target="_blank" rel="noopener" data-type="text" data-color="#000000" data-rsp_ch="on"
                    data-xy="x:c;yo:259px,259px,147px,60px;"
                    data-text="w:normal;s:48,48,38,33;l:58,58,55,55;fw:700;a:center;"
                    data-dim="w:585px,585px,503px,463px;h:102,102,auto,auto;" data-basealign="slide"
                    data-frame_0="y:100%;" data-frame_1="e:power4.inOut;st:210;sp:800;sR:210;"
                    data-frame_999="o:0;st:w;sR:7990;"
                    style="z-index:11;font-family:Cormorant;text-transform:capitalize;">Special Considerations
                    for Event Photographers
                </a>

                <rs-layer id="slider-12-slide-5309-layer-10" data-type="text" data-color="#c78665" data-rsp_ch="on"
                    data-xy="x:c;xo:0,0,0,583px;y:m;yo:-106px,-106px,-101px,-51px;"
                    data-text="w:normal;s:18,18,15,15;l:28,28,18,18;a:center;" data-vbility="t,t,t,f"
                    data-frame_0="y:100%;" data-frame_1="e:power4.inOut;st:90;sp:400;sR:90;"
                    data-frame_999="o:0;st:w;sR:8510;" style="z-index:10;font-family:Hind;">Planning & Budgets
                </rs-layer>

                <rs-layer id="slider-12-slide-5309-layer-11" data-type="image" data-rsp_ch="on"
                    data-xy="x:c;y:m;yo:20px,20px,11px,11px;" data-text="w:normal;s:20,20,11,11;l:0,0,14,14;"
                    data-dim="w:339px,339px,196px,196px;h:406px,406px,235px,235px;" data-frame_999="o:0;st:w;"
                    style="z-index:9;"><img src="{{asset('public/user/images/slides/catring-slid-bg.png')}}" alt="img"
                        width="339" height="406" data-no-retina>
                </rs-layer>
            </rs-slide>

        </rs-slides>
    </rs-module>
</rs-module-wrap>
@endsection