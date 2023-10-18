@extends('layout.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection



@section('content')  

  <main>
    <div class="contact-form__content">
      <div class="contact-form__heading">
        <h2>お問い合わせ</h2>
      </div>
      <form class="form" action="/contacts/confirm" method="post">
        @csrf
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">お名前</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input class="form__input--text-name" type="text" name="first-name" value="{{ old('first-name', $contact['first-name'] ?? '') }}"/>
              <input class="form__input--text-name" type="text" name="last-name" value="{{ old('last-name', $contact['last-name'] ?? '') }}"/>
            </div>
            <div class="form__input--text-example">
                <span class="form__input--text-example-item-name">例）山田</span>
                <span class="form__input--text-example-item-name">例）太郎</span>
            </div>
            
            <div class="form__error">
            @error('name')
              {{ $message }}
            @enderror
              </div>
          </div>
        </div>

        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">性別</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--radio">
               <input class="form__input--radio-item" type="radio" name="gender" value="1" {{ (old('gender', $contact['gender'] ?? '') == '1') ? 'checked' : '' }} checked/>
                   <span>男</span>
               <input class="form__input--radio-item" type="radio" name="gender" value="2" {{ (old('gender', $contact['gender'] ?? '') == '2') ? 'checked' : '' }}/>
                   <span>女</span>
          </div>
            <div class="form__error">
            @error('gender')
              {{ $message }}
            @enderror
              </div>
          </div>
        </div>

        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">メールアドレス</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="email" name="email" value="{{ old('email', $contact['email'] ?? '') }}"/>
              <div class="form__input--text-example">
                <span class="form__input--text-example-item">例） test@example.com"</span>
              </div>
            </div>
            <div class="form__error">
            @error('email')
              {{ $message }}
            @enderror
              </div>
          </div>
        </div>

        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">郵便番号</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="text" name="postcode" value="{{ old('postcode', $contact['postcode'] ?? '') }}" />
              <button type="submit">住所検索</button>
            </div>
            <div class="form__input--text-example">
                <span class="form__input--text-example-item">例）123-456"</span>
              </div>
            <div class="form__error">
            @error('postcode')
              {{ $message }}
            @enderror
              </div>
          </div>
        </div>

        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">住所</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="text" name="address" value="{{ old('address', $contact['address'] ?? '') }}"/>
            </div>
            <div class="form__input--text-example">
                <span class="form__input--text-example-item">例）東京都渋谷区千駄ヶ谷1-2-3"</span>
              </div>
            <div class="form__error">
            @error('address')
              {{ $message }}
            @enderror
              </div>
          </div>
        </div>

        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">建物名</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="text" name="building_name" value="{{ old('building_name', $contact['building_name'] ?? '') }}"/>
            </div>
            <div class="form__input--text-example">
                <span class="form__input--text-example-item">例）千駄ヶ谷マンション101"</span>
              </div>
            <div class="form__error">
            @error('building_name')
              {{ $message }}
            @enderror
              </div>
          </div>
        </div>


        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">ご意見</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--textarea">
              <textarea name="opinion">{{ old('opinion', $contact['opinion'] ?? '') }}</textarea>
            </div>
            <div class="form__error">
            @error('opinion')
              {{ $message }}
            @enderror
              </div>
          </div>
        </div>
        <div class="form__button">
          <button class="form__button-submit" type="submit">確認</button>
        </div>
      </form>
    </div>
  </main>
@endsection
