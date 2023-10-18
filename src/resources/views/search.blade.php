@extends('layout.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/search.css') }}" />
@endsection


@section('content')
    <div class="feedback-form">
        <h2>管理システム</h2>

        <div class="search-contents">
            <form action="{{ route('users.search') }}" method="post">
              @csrf
            <div class="container">
            <div class="name">お名前:
            <input type="text" id="name" name="name">
            </div>
            <div class="gender">
                <div>性別:</div>
                <label><input type="radio" name="gender" value="other" checked > 全て</label>
                <label><input type="radio" name="gender" value="male"> 男性</label>
                <label><input type="radio" name="gender" value="female"> 女性</label>
            </div>
            </div>

            <div class="email">メールアドレス:
            <input type="email"  name="email">
            </div>

            <div class="create_day">登録日:
            <input type="date"  name="opinion-date-start">
            <input type="date"  name="opinion-date-end">
            </div>

            <div class="search-btn">
            <button type="submit" class="search-btn-item">検索</button>
            </div>
            <div class="reset-btn">
                <button type="reset" class="reset-btn-item">リセット</button>
            </div>
        </form>
      </div>
        
        <div class="search-table">
        <table class="search-table__inner">
         <thead>
           <tr class="search-table__row">
             <th class="search-table__header">ID</th>
             <th class="search-table__header">名前</th>
             <th class="search-table__header">性別</th>
             <th class="search-table__header">メールアドレス</th>
             <th class="search-table__header">ご意見</th>
           </tr>
         </thead>
           <tbody>
            @if(isset($contacts) && count($contacts) > 0)
            @foreach($contacts as $contact)
            <tr class="search-table__row">
              <td class="search-table__item">
              <input class="search-form__item-input" type="text" name="ID" value="{{ $contact->id }}"/>
               </td>
              <td class="search-table__item">
              <input class="search-form__item-input" type="text" name="name" value="{{ $contact->fullname }}"/>
              </td>
              <td class="search-table__item">
              <input class="search-form__item-input" type="text" name="gender" value="@if($contact->gender == 1) 男 @else($contact->gender == 2)女@endif"/>
              </td>
            <td class="search-table__item">
              <input class="search-form__item-input" type="text" name="email" value="{{ $contact->email }}"/>
              </td>
            <td class="search-table__item">
              <span class="opinion" title="{{ $contact->opinion }}">{{ $contact->opinion }}</span>
            </td>
             <td class="search-table__item">
              <form class="delete-form" action="{{ route('users.destroy', $contact->id) }}" method="post">
                @csrf
               <input type="hidden" name="_method" value="DELETE">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <button type="submit" class="delete-btn">削除</button>
              </form>
             </td>
            </tr>
            @endforeach
            @else
        <tr>
            <td colspan="6" class="search-table__item">データがありません</td>
        </tr>
    @endif
          </tbody>
        </table>
        <div class="pagination-container">
           {{ $contacts->links() }}
            </div>
      </div>
    </div>
@endsection

