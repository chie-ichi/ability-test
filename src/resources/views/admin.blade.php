@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
@endsection

@section('title')
<title>Admin | FashionalblyLate</title>
@endsection

@section('header_button')
<form class="form" action="/logout" method="post">
@csrf
<button class="header__button">logout</button>
</form>
@endsection

@section('content')
<div class="admin">
    <h1 class="page-ttl">Admin</h1>
    <div class="admin__content">
        <div class="admin__content-inner">
            <div class="admin-search">
                <form action="/search" class="search-form" method="get">
                    @csrf
                    <div class="search-form__content">
                        <input type="text" name="keyword" value="{{ request('keyword') }}" class="search-form__input-text" placeholder="名前やメールアドレスを入力してください">
                        <div class="search-form__select-wrap">
                            <select name="gender" class="search-form__select search-form__select-gender">
                                <option value="">性別</option>
                                <option value="1" {{ request('gender') == 1 ? 'selected' : '' }}>男性</option>
                                <option value="2" {{ request('gender') == 2 ? 'selected' : '' }}>女性</option>
                                <option value="3" {{ request('gender') == 3 ? 'selected' : '' }}>その他</option>
                            </select>
                        </div>
                        <div class="search-form__select-wrap">
                            <select name="category_id" class="search-form__select  search-form__select-category">
                                <option value="">お問い合わせの種類</option>
                                @foreach($categories as $category)
                                <option value="{{ $category['id'] }}" {{ request('category_id') == $category['id'] ? 'selected' : '' }}>{{ $category['content'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="search-form__date-wrap">
                            <input type="date" name="date" class="search-form__date" value="{{ request('date') }}">
                        </div>
                        <button type="submit" class="search-form__button-search">検索</button>
                        <button type="button" class="search-form__button-reset" onclick="window.location.href = '/admin';">リセット</button>
                    </div>
                </form>
            </div>
            <div class="functions">
                <form action="/csv-download" method="get" class="csv-form">
                    <input type="hidden" name="keyword" value="{{ request('keyword') }}" class="csv-form__hidden">
                    <input type="hidden" name="gender" value="{{ request('gender') }}" class="csv-form__hidden">
                    <input type="hidden" name="category_id" value="{{ request('category_id') }}" class="csv-form__hidden">
                    <input type="hidden" name="date" value="{{ request('date') }}" class="csv-form__hidden">
                    <button class="csv-form__button-export" type="submit">エクスポート</button>
                </form>
                <div class="functions__paging">
                {{ $contacts->links('vendor.pagination.custom') }}
                </div>
            </div>
            
            <table class="admin-table">
                <tr class="admin-table__row">
                    <th class="admin-table__heading">お名前</th>
                    <th class="admin-table__heading">性別</th>
                    <th class="admin-table__heading">メールアドレス</th>
                    <th class="admin-table__heading" colspan="2">お問い合わせの種類</th>
                </tr>
                @foreach($contacts as $contact)
                <tr class="admin-table__row" id="id{{ $contact['id'] }}">
                    <td class="admin-table__data">{{ $contact['last_name'] }}　{{ $contact['first_name'] }}</td>
                    <td class="admin-table__data">
                    @php
                    if($contact['gender'] == 1) {
                        $gender_name = "男性";
                    } elseif($contact['gender'] == 2) {
                        $gender_name = "女性";
                    } else {
                        $gender_name = "その他";
                    }
                    @endphp
                    {{ $gender_name }}
                    </td>
                    <td class="admin-table__data">{{ $contact['email'] }}</td>
                    <td class="admin-table__data">
                    @foreach($categories as $category)
                    @if($contact['category_id'] == $category['id'])
                    @php
                    $category_name = $category['content'];
                    @endphp
                    @break
                    @endif
                    @endforeach
                    {{ $category_name }}
                    </td>
                    <td class="admin-table__data">
                        <div class="admin-table__button">
                            <button type="button" class="admin-table__button-more">詳細</button>
                        </div>
                        <div class="modal">
                            <div class="modal__inner">
                                <div class="modal__window">
                                    <button type="button" class="modal__button-close">
                                        <img src="images/btn-close.svg" alt="close">
                                    </button>
                                    <table class="modal-table">
                                        <tr class="modal-table__row">
                                            <th class="modal-table__heading">お名前</th>
                                            <td class="modal-table__data">{{ $contact['last_name'] }}　{{ $contact['first_name'] }}</td>
                                        </tr>
                                        <tr class="modal-table__row">
                                            <th class="modal-table__heading">性別</th>
                                            <td class="modal-table__data">{{ $gender_name }}</td>
                                        </tr>
                                        <tr class="modal-table__row">
                                            <th class="modal-table__heading">メールアドレス</th>
                                            <td class="modal-table__data">{{ $contact['email'] }}</td>
                                        </tr>
                                        <tr class="modal-table__row">
                                            <th class="modal-table__heading">電話番号</th>
                                            <td class="modal-table__data">{{ $contact['tel'] }}</td>
                                        </tr>
                                        <tr class="modal-table__row">
                                            <th class="modal-table__heading">住所</th>
                                            <td class="modal-table__data">{{ $contact['address'] }}</td>
                                        </tr>
                                        <tr class="modal-table__row">
                                            <th class="modal-table__heading">建物名</th>
                                            <td class="modal-table__data">{{ $contact['building'] }}</td>
                                        </tr>
                                        <tr class="modal-table__row">
                                            <th class="modal-table__heading">お問い合わせの種類</th>
                                            <td class="modal-table__data">{{ $category_name }}</td>
                                        </tr>
                                        <tr class="modal-table__row">
                                            <th class="modal-table__heading">お問い合わせ内容</th>
                                            <td class="modal-table__data">{{ $contact['detail'] }}</td>
                                        </tr>
                                    </table>
                                    <div class="modal__delete">
                                        <form action="/delete" class="modal__delete-form" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $contact['id'] }}">
                                            <button type="submit" class="modal__delete-button">削除</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
<script>
$('.admin-table__button-more').click(function() {
    let modal = $(this).parent().next('.modal');
    if (modal.length > 0) {
        modal.addClass('active');
        $('body').css('overflow', 'hidden');
    }
});

$('.modal__button-close').click(function() {
    $('.modal').removeClass('active');
    $('body').css('overflow', 'auto');
});


</script>
@endsection