@extends('layouts.frontend')

@section('page-title', 'HSG')

@section('content')
    <img class="banner-page" src="{{ url('assets/frontend/images/phanphoi-img.png')}}"/>
    <div class="slider-top">
        <div class="cover-title">
            <h3 class="title-herbs">HỆ THỐNG PHÂN PHỐI</h3>
        </div>
        <div class="gioithieu-content" data-ride="carousel" data-type="multi" data-interval="40000" >
            <P>
                "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
            </P>
        </div>

    </div>
    <div class="news-herbs">
        <div class="phanphoi-content-top">
            <div class="div-left-map" >
                <img src="{{ url('assets/frontend/images/phanphoi-map.png')}}" />
            </div>
            <div class="div-right-form">
                <div  class="gioithieu-title-group"><img src="{{ url('assets/frontend/images/gioithieu-title-icon.png')}}" /><h3> Miền Nam - 20 chi nhánh</h3></div>
                <hr>
                <div class="phanphoi-chinhanh-content">
                    <p></p>
                </div>
                <div  class="gioithieu-title-group"><img src="{{ url('assets/frontend/images/gioithieu-title-icon.png')}}" /><h3> Miền Trung - 15 chi nhánh</h3></div>
                <hr>
                <div class="phanphoi-chinhanh-content">
                    <p></p>
                </div>
                <div  class="gioithieu-title-group"><img src="{{ url('assets/frontend/images/gioithieu-title-icon.png')}}" /><h3> Miền Bắc - 10 chi nhánh</h3></div>
                <hr>
                <div class="phanphoi-chinhanh-content">
                    <p></p>
                </div>
            </div>
        </div>
        <div class="phanphoi-content-diachi" >
            <div class="cover-title">
                <h3 class="title-herbs">Văn phòng chính tại các khu vực</h3>
            </div>
            <div class="phanphoi-khuvuc-content">
                <h3>KHU VỰC MIỀN NAM</h3>
                <div class="chinhanh-detail">
                    <div class="chinhanh-detail-diachi">
                        Địa chỉ: <br>
                    </div>
                    <div class="chinhanh-detail-diachi">
                        <div class="chinhanh-detail-diachi-col">Email:  </div>
                        <div class="chinhanh-detail-diachi-col">+Điện thoại:  </div>
                        <div class="chinhanh-detail-diachi-col">+Fax:</div>
                    </div>
                </div>
            </div>
            <div class="phanphoi-khuvuc-content">
                <h3>KHU VỰC MIỀN TRUNG</h3>
                <div class="chinhanh-detail">
                    <div class="chinhanh-detail-diachi">
                        Địa chỉ: <br>
                    </div>
                    <div class="chinhanh-detail-diachi">
                        <div class="chinhanh-detail-diachi-col">Email:  </div>
                        <div class="chinhanh-detail-diachi-col">+Điện thoại:  </div>
                        <div class="chinhanh-detail-diachi-col">+Fax:</div>
                    </div>
                </div>
            </div>
            <div class="phanphoi-khuvuc-content">
                <h3>KHU VỰC MIỀN BẮC</h3>
                <div class="chinhanh-detail">
                    <div class="chinhanh-detail-diachi">
                        Địa chỉ: <br>
                    </div>
                    <div class="chinhanh-detail-diachi">
                        <div class="chinhanh-detail-diachi-col">Email:  </div>
                        <div class="chinhanh-detail-diachi-col">+Điện thoại:  </div>
                        <div class="chinhanh-detail-diachi-col">+Fax:</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
