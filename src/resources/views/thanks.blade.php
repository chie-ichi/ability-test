@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}" />
@endsection

@section('title')
<title>Thanks | FashionalblyLate</title>
@endsection

@section('content')
<div class="thanks">
    <div class="thanks__content">
        <div class="thanks__bg">Thank you</div>
        <div class="thanks__content-inner">     
            <div class="thanks__content-text">
                <h1 class="thanks__message">お問い合わせありがとうございました</h1>
                <div class="thanks__button">
                    <a href="/" class="thanks__button-home">HOME</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection