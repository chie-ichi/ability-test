@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
@endsection

@section('title')
<title>Confirm | FashionalblyLate</title>
@endsection

@section('content')
<div class="confirm">
    <h1 class="page-ttl">Confirm</h1>
    <div class="confirm__content">
        <div class="confirm__content-inner">
            <form action="/thanks" method="post" class="contact-form">
            @csrf
                <table class="contact-form__table">
                    <tr class="contact-form__table-row">
                        <th class="contact-form__table-heading">お名前</th>
                        <td class="contact-form__table-data">
                            {{ $contact['last_name'] }}　{{ $contact['first_name'] }}
                            <input type="hidden" name="last_name" class="contact-form__item-hidden" value="{{ $contact['last_name'] }}" />
                            <input type="hidden" name="first_name" class="contact-form__item-hidden" value="{{ $contact['first_name'] }}" />
                        </td>
                    </tr>
                    <tr class="contact-form__table-row">
                        <th class="contact-form__table-heading">性別</th>
                        <td class="contact-form__table-data">
                            @if($contact['gender'] == 1)
                                男性
                            @elseif($contact['gender'] == 2)
                                女性
                            @else
                                その他
                            @endif
                            <input type="hidden" name="gender" class="contact-form__item-hidden" value="{{ $contact['gender'] }}" />
                        </td>
                    </tr>
                    <tr class="contact-form__table-row">
                        <th class="contact-form__table-heading">メールアドレス</th>
                        <td class="contact-form__table-data">
                            <input type="text" name="email" class="contact-form__item-text" value="{{ $contact['email'] }}" readonly />
                        </td>
                    </tr>
                    <tr class="contact-form__table-row">
                        <th class="contact-form__table-heading">電話番号</th>
                        <td class="contact-form__table-data">
                            <input type="text" name="tel" class="contact-form__item-text" value="{{ $contact['tel'] }}" readonly />
                        </td>
                    </tr>
                    <tr class="contact-form__table-row">
                        <th class="contact-form__table-heading">住所</th>
                        <td class="contact-form__table-data">
                            <input type="text" name="address" class="contact-form__item-text" value="{{ $contact['address'] }}" readonly />
                        </td>
                    </tr>
                    <tr class="contact-form__table-row">
                        <th class="contact-form__table-heading">建物名</th>
                        <td class="contact-form__table-data">
                            <input type="text" name="building" class="contact-form__item-text" value="{{ $contact['building'] }}" readonly />
                        </td>
                    </tr>
                    <tr class="contact-form__table-row">
                        <th class="contact-form__table-heading">お問い合わせの種類</th>
                        <td class="contact-form__table-data">
                            @foreach($categories as $category)
                            @if($contact['category_id'] == $category['id'])
                            {{ $category['content'] }}
                            <input type="hidden" name="category_id" class="contact-form__item-hidden" value="{{ $category['id'] }}" />
                            @break
                            @endif
                            @endforeach
                        </td>
                    </tr>
                    <tr class="contact-form__table-row">
                        <th class="contact-form__table-heading">お問い合わせ内容</th>
                        <td class="contact-form__table-data">
                            {{ $contact['detail'] }}
                            <input type="hidden" name="detail" class="contact-form__item-hidden" value="{{ $contact['detail'] }}" />
                        </td>
                    </tr>
                </table>
                <div class="contact-form__button">
                    <button class="contact-form__button-submit" type="submit">送信</button>
                    <button onclick="history.back()" class="contact-form__button-back" type="button">修正</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection