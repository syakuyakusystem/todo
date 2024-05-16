@extends('layouts.app')


@section('css')
  <link rel="stylesheet" href="{{ asset('css/category.css') }}" />
@endsection


@section('content')

<div class="error">
@error('name')
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
<form class="form" action="/categories" method="POST">
    @csrf
    <div class="foromcategory">
    <div class="form__group-content">
        
        <div class="form__input--text">
            <input type="text" name="name" value="{{ old('name') }}">
        </div>
        
    </div>


    <div class="form__button">
        <button class="form__button-submit" type="submit">作成</button>
    </div>
    </div>
</form>
</div>






<div class="textbox">
    <div class="text">
        <div class="text__sab">
            <h2 class="title">Todo</h2>
        </div>
    </div>
</div>




<div>
<tbody class="body">

    @foreach($categories as $item)
      <span class="declaration">
        <tr class="body_text">
            <form class="updatetext" action="/categories/update" method="post" role="menuitem" tabindex="-1">
                @csrf
                 @method('PATCH')
                <td class="body_text-content inline-block">
                    <div class="body_text">
                       <input type="text" name="name" value="{{ $item['name']}}" class="body_text-item">
                       <input type="hidden" name="id" value="{{ $item['id'] }}">
                    </div>
                </td>

                <td class="tablebody">
                    <span class="tablebody_top">      
                        <div class="tablebody_create">
                       
                            
                           
                            <button class="tablebody_edit" type="submit">
                                更新
                            </button>
                       
                        </div>

                </td>
            </form> 
                <td class="tablebody">
                        <div class="tablebody_delete">
                            <form action="/categories/delete"  method="post" role="menuitem" tabindex="-1">
                            @csrf
                            @method('DELETE')
                                <button class="tablebody_button" type="submit">
                                    <input type="hidden" name="id" value="{{ $item['id'] }}">
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