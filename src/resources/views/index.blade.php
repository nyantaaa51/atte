@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
    <div class="stamp__content">
        <p class="header__alert">
            {{ \Auth::user()->name }}さんお疲れ様です！
        </p>
    </div>

    <form class="stamp__panel" action="{{ route('work') }}" method="post">
        @csrf
        <div class="form__item">
            @if($status == 0)
                <button class="form__item-button" type="submit" name="start_work">勤務開始</button>
            @else
                <button class="form__item-button" type="submit" name="start_work" disabled>勤務開始</button>
            @endif
        </div>
        <div class="form__item">
            @if($status == 1)
                <button class="form__item-button" type="submit" name="end_work">勤務終了</button>
            @else
                <button class="form__item-button" type="submit" name="end_work" disabled>勤務終了</button>
            @endif
        </div>
        <div class="form__item">
            @if($status == 1)
                <button class="form__item-button" type="submit" name="start_rest">休憩開始</button>
            @else
                <button class="form__item-button" type="submit" name="start_rest" disabled>休憩開始</button>
            @endif
        </div>
        <div class="form__item">
            @if($status == 2)
                <button class="form__item-button" type="submit" name="end_rest">休憩終了</button>
            @else
                <button class="form__item-button" type="submit" name="end_rest" disabled>休憩終了</button>
            @endif
        </div>
    </form>
@endsection