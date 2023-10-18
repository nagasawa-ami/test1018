@extends('layout.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
@endsection




@section('content')
  
  <main>
    <div class="confirm-form__content">
      <div class="confirm-form__heading">
        <h2>内容確認</h2>
      </div>
      <form class="form" action="/contacts" method="post">
        @csrf
        <div class="confirm__group">
          <div class="confirm__group-title">
            <span class="confirm__label--item">お名前</span>
          </div>
          <div class="confirm__group-content">
            <div class="confirm__input--text">
              <input class="confirm__input--text-name" type="text" name="fullname" value="{{ $contact['fullname'] }}" readonly/>
              <input type="hidden" name="first-name" value="{{ $contact['first-name'] }}">
            <input type="hidden" name="last-name" value="{{ $contact['last-name'] }}">
            </div>
          </div>
        </div>

        <div class="confirm__group">
          <div class="confirm__group-title">
            <span class="confirm__label--item">性別</span>
          </div>
           <div class="confirm__group-content">
            {{ $contact['gender'] == 1 ? '男' : '女' }}
            <input type="hidden" name="gender" value="{{ $contact['gender'] }}">
           </div>
          </div>
        

        <div class="confirm__group">
          <div class="confirm__group-title">
            <span class="confirm__label--item">メールアドレス</span>
          </div>
          <div class="confirm__group-content">
            <div class="confirm__input--text">
              <input type="email" name="email" value="{{ $contact['email'] }}" readonly/>
              <input type="hidden" name="email" value="{{ $contact['email'] }}">
            </div>
          </div>
        </div>

        <div class="confirm__group">
          <div class="confirm__group-title">
            <span class="confirm__label--item">郵便番号</span>
          </div>
          <div class="confirm__group-content">
            <div class="confirm__input--text">
              <input type="text" name="postcode" value="{{ $contact['postcode'] }}" readonly/>
              <input type="hidden" name="postcode" value="{{ $contact['postcode'] }}">
            </div>
          </div>
        </div>

        <div class="confirm__group">
          <div class="confirm__group-title">
            <span class="confirm__label--item">住所</span>
          </div>
          <div class="confirm__group-content">
            <div class="confirm__input--text">
              <input type="text" name="address" value="{{ $contact['address'] }}" readonly/>
              <input type="hidden" name="address" value="{{ $contact['address'] }}">
            </div>
          </div>
        </div>

        <div class="confirm__group">
          <div class="confirm__group-title">
            <span class="confirm__label--item">建物名</span>
          </div>
          <div class="confirm__group-content">
            <div class="confirm__input--text">
              <input type="text" name="building_name" value="{{ $contact['building_name'] }}" readonly/>
              <input type="hidden" name="building_name" value="{{ $contact['building_name'] }}">
            </div>
          </div>
        </div>


        <div class="confirm__group">
          <div class="confirm__group-title">
            <span class="confirm__label--item">ご意見</span>
          </div>
          <div class="confirm__group-content">
            <div class="confirm__input--textarea">
                 <input type="text" name="opinion" value="{{ $contact['opinion'] }}" readonly />
                 <input type="hidden" name="opinion" value="{{ $contact['opinion'] }}">
            </div>
          </div>
        </div>
      
        <div class="confirm__button">
          <button class="confirm__button-submit" type="submit">送信</button>
        </div>
     </form>
    <form action="{{ route('contact.index') }}" method="get">
    @csrf
    <button class="content-return-fix" type="submit">修正する</button>
        </form>
      </div>
    </div>
  </main>
@endsection

