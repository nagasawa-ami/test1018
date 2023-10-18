@extends('layout.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/thanks.css') }}" />
@endsection



@section('content')
  <main>
    <div class="thanks-title">
        <h3>ご意見いただきありがとうございました。</h3>
    </div>
    <div class="form__button">
        <button class="form__button-submit" type="submit">トップページへ</button>
    </div>

  </main>
@endsection
