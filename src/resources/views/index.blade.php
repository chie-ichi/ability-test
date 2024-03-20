@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('title')
<title>FashionalblyLate</title>
@endsection

@section('content')
<div class="contact">
    <h1 class="page-ttl">Contact</h1>
    <div class="contact__content">
        <div class="contact__content-inner">
            <form action="/confirm" method="post" class="contact-form">
            @csrf
                <table class="contact-form__table">
                    <tr class="contact-form__table-row">
                        <th class="contact-form__table-heading">お名前<span class="contact-form__required">※</span></th>
                        <td class="contact-form__table-data">
                            <div class="contact-form__item contact-form__item-name">
                                <input type="text" class="contact-form__item-input" placeholder="例: 山田" name="last_name" value="{{ old('last_name') }}">
                                <input type="text" class="contact-form__item-input" placeholder="例: 太郎" name="first_name" value="{{ old('first_name') }}">
                            </div>
                            <div class="contact-form__error">
                            @error('last_name')
                                <p class="contact-form__error-txt">{{ $message }}</p>
                            @enderror
                            @error('first_name')
                                <p class="contact-form__error-txt">{{ $message }}</p>
                            @enderror
                            </div>
                        </td>
                    </tr>
                    <tr class="contact-form__table-row">
                        <th class="contact-form__table-heading">性別<span class="contact-form__required">※</span></th>
                        <td class="contact-form__table-data">
                            <div class="contact-form__item contact-form__item-gender">
                                <label class="contact-form__item-radio-label">
                                    <input type="radio" name="gender" id="gender01" value="1" class="contact-form__item-radio" {{ (old('gender') == 1 || !old('gender')) ? 'checked' : '' }}>
                                    男性
                                </label>
                                <label class="contact-form__item-radio-label">
                                    <input type="radio" name="gender" id="gender02" value="2" class="contact-form__item-radio" {{ old('gender') == 2 ? 'checked' : '' }}>
                                    女性
                                </label>
                                <label class="contact-form__item-radio-label">
                                    <input type="radio" name="gender" id="gender03" value="3" class="contact-form__item-radio" {{ old('gender') == 3 ? 'checked' : '' }}>
                                    その他
                                </label>
                            </div>
                            <div class="contact-form__error">
                            @error('gender')
                                <p class="contact-form__error-txt">{{ $message }}</p>
                            @enderror
                            </div>
                        </td>
                    </tr>
                    <tr class="contact-form__table-row">
                        <th class="contact-form__table-heading">メールアドレス<span class="contact-form__required">※</span></th>
                        <td class="contact-form__table-data">
                            <div class="contact-form__item">
                                <input type="text" class="contact-form__item-input" placeholder="例: test@example.com" name="email" value="{{ old('email') }}">
                            </div>
                            <div class="contact-form__error">
                            @error('email')
                                <p class="contact-form__error-txt">{{ $message }}</p>
                            @enderror
                            </div>
                        </td>
                    </tr>
                    <tr class="contact-form__table-row">
                        <th class="contact-form__table-heading">電話番号<span class="contact-form__required">※</span></th>
                        <td class="contact-form__table-data">
                            <div class="contact-form__item contact-form__item-tel">
                                <input type="text" class="contact-form__item-input" placeholder="080" name="tel01" value="{{ old('tel01') }}">
                                <input type="text" class="contact-form__item-input" placeholder="1234" name="tel02" value="{{ old('tel02') }}">
                                <input type="text" class="contact-form__item-input" placeholder="5678" name="tel03" value="{{ old('tel03') }}">
                            </div>
                            <div class="contact-form__error">
                            @error('tel01')
                                <p class="contact-form__error-txt">{{ $message }}</p>
                            @enderror
                            @error('tel02')
                                <p class="contact-form__error-txt">{{ $message }}</p>
                            @enderror
                            @error('tel03')
                                <p class="contact-form__error-txt">{{ $message }}</p>
                            @enderror
                            </div>
                        </td>
                    </tr>
                    <tr class="contact-form__table-row">
                        <th class="contact-form__table-heading">住所<span class="contact-form__required">※</span></th>
                        <td class="contact-form__table-data">
                            <div class="contact-form__item">
                                <input type="text" class="contact-form__item-input" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" name="address" value="{{ old('address') }}">
                            </div>
                            <div class="contact-form__error">
                            @error('address')
                                <p class="contact-form__error-txt">{{ $message }}</p>
                            @enderror
                            </div>
                        </td>
                    </tr>
                    <tr class="contact-form__table-row">
                        <th class="contact-form__table-heading">建物名</th>
                        <td class="contact-form__table-data">
                            <div class="contact-form__item">
                                <input type="text" class="contact-form__item-input" placeholder="例: 千駄ヶ谷マンション101" name="building" value="{{ old('building') }}">
                            </div>
                        </td>
                    </tr>
                    <tr class="contact-form__table-row">
                        <th class="contact-form__table-heading">お問い合わせの種類<span class="contact-form__required">※</span></th>
                        <td class="contact-form__table-data">
                            <div class="contact-form__item">
                                <div class="contact-form__item-select-wrap">
                                    <select id="select-category" name="category_id" class="contact-form__item-select">
                                        <option value="" disabled {{ !old('category_id') ? 'selected' : '' }}>選択してください</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category['id'] }}" {{ old('category_id') == $category['id'] ? 'selected' : '' }}>{{ $category['content'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="contact-form__error">
                            @error('category_id')
                                <p class="contact-form__error-txt">{{ $message }}</p>
                            @enderror
                            </div>
                        </td>
                    </tr>
                    <tr class="contact-form__table-row">
                        <th class="contact-form__table-heading">お問い合わせ内容<span class="contact-form__required">※</span></th>
                        <td class="contact-form__table-data">
                            <div class="contact-form__item">
                                <textarea name="detail" class="contact-form__item-textarea" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
                            </div>
                            <div class="contact-form__error">
                            @error('detail')
                                <p class="contact-form__error-txt">{{ $message }}</p>
                            @enderror
                            </div>
                        </td>
                    </tr>
                </table>
                <div class="contact-form__button">
                    <button class="contact-form__button-submit" type="submit">確認画面</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function changeColor(selectObj) {
    // 初期値が選択されている場合
    if (selectObj.value == "") {
        selectObj.classList.add("initial");
    } else { // 初期値以外が選択されている場合
        selectObj.classList.remove("initial");
    }
}
window.addEventListener('DOMContentLoaded', (event) => {
    const selectElement = document.getElementById('select-category');
    
    // ページ読み込み時に関数を呼び出す
    changeColor(selectElement);

    // 値が変わったときにも関数を呼び出す
    selectElement.addEventListener('change', () => {
        changeColor(selectElement);
    });
});
</script>
@endsection