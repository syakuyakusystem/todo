@extends('layouts.app')


@section('css')
  <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection


@section('content')

<div class="error">
@error('content')
  <div class="error__top">
    <span class="error__top-message"> {{ $message }}</span>
  </div> 
@enderror
</div>


@if(session('message'))
   <div class="message">
      {{session('message')}}
   </div>
@endif



<div class="textmargin">
    <h2 class="textmargin__logo">新規作成</h2>
</div>

<!-- 送信フォーム -->
<div class="todo__content">
<form class="form" action="/todos" method="POST">
    @csrf
    <div class="form__group-content">
        
        <div class="form__input--text">
            <input type="text" name="content" value="{{ old('content') }}"/>
        </div>
        
    </div>

    <div class="form__button">
        <button class="form__button-submit" type="submit">作成</button>
    </div>
</form>
</div>





<div class="textmargin">
    <h2 class="textmargin__logo">Todo検索</h2>
</div>

<!-- 送信フォーム -->
<div class="todo__content">
<form class="form" action="/todos" method="POST">
    @csrf
    <div class="form__group-content">

        <div class="form__input--text">
            <input type="text" name="content" value="{{ old('content') }}"/>
        </div>
        
    </div>

    <div class="form__button">
        <button class="form__button-submit" type="submit">作成</button>
    </div>
</form>
</div>

<div class="text">
    <div class="text__sab">
        <h2 class="title">Todo</h2>
    </div>
</div>





<div>
<tbody class="body">

    @foreach($text_names as $item)
      <span class="declaration">
        <tr class="body_text">
            <form class="updatetext" action="/todos/{{ $item->id }}" method="post" role="menuitem" tabindex="-1">
                <td class="body_text-content inline-block">
                    <div class="body_text">
                       <input type="text" name="content" value="{{ $item->content }}" class="body_text-item">
                       <input type="hidden" name="id" value="{{ $item['id'] }}">
                    </div>
                </td>

                <td class="tablebody">
                    <span class="tablebody_top">      
                        <div class="tablebody_create">
                       
                            @csrf
                            @method('PATCH')
                           
                            <button class="tablebody_edit" type="submit">
                                更新
                            </button>
                       
                        </div>

                </td>
            </form> 
                <td class="tablebody">
                        <div class="tablebody_delete">
                            <form action="/todos/{{ $item->id }}"  method="post" role="menuitem" tabindex="-1">
                            @csrf
                            @method('DELETE')
                                <button class="tablebody_button" type="submit">
                                    削除
                                </button>
                            </form>
                        </div>

                    </span>
                </td>
        </tr>
      </span>
    @endforeach

</tbody>
</div>



@endsection