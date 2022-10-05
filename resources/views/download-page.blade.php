@extends('public.layout')
<style>
        .download_box{
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            max-width: 500px;
            padding: 60px 30px;
            border-radius: 15px;
            margin: 0 auto;
            gap: 20px;
            background: linear-gradient(0deg, #0335d6 50%, rgba(3, 53, 214, 0.8) 70%, rgba(3, 53, 214, 0.3) 100%);
            position: relative;
            margin-top: 90px;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        }
        .download_box-logo{
            padding: 20px;
            background: #fff;
            border-radius: 15px;
            position: absolute;
            width: 250px;
            top: -30px;
            left: 50%;
            right: 0;
            transform: translateX(-50%);
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        }
    </style>
@section('title', "Download")

@section('content')
    <section class="error-page-wrap mt-5">
        <div class="container">
            <div class="download_box">
                <a class="logo download_box-logo" href="{{ route('admin.dashboard.index') }}">
                    <img src="{{url('/images/logo.png')}}" width="100%" />
                </a>
                <div class="d-flex align-items-center flex-wrap justify-content-center mt-4" style="gap: 10px 0;">
                    <span class="download_app-store">
                        <a href="https://apps.apple.com/pk/app/asia-mobile-phones/id1554074118" target="_blank">
                        <img src="{{url('/images/download.png')}}" width="auto" />
                    </span>
                    <span class="download_play-store">
                        <a href="https://play.google.com/store/apps/details?id=com.asia.mp&hl=en&gl=US"  target="_blank">
                            <img src="{{url('/images/download-link.png')}}" width="auto" />
                        </a>
                    </span>
                </div>
            </div>
        </div>
    </section>
@endsection
