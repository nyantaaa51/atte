@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/attendance.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
@endsection

@section('content')
    <div class="header__wrap">
        <p class="header__text">ユーザー一覧</p>
    </div>
    <div class="table__wrap">
        <table class="attendance__table">
            <tr class="table__row">
                <th class="table__header">No.</th>
                <th class="table__header">名前</th>
                <th class="table__header">  勤怠表</th>
            </tr>
            @php
                $pageNumber = ($users->currentPage() - 1) * $users->perPage() + 1;
            @endphp
            @foreach ($users as $user)
                <tr class="table__row">
                    <td class="table__item">{{ $pageNumber }}</td>
                    <td class="table__item">{{ $user->name }}</td>
                    <td class="table__item">
                    <a href="{{ url('attendance/user', $user->id) }}" class="user_button">勤怠表</a>
                </td>
                   
                    
                </tr>
                @php
                    $pageNumber++;
                @endphp
            @endforeach
        </table>
    </div>
    {{ $users->links('pagination/custom') }}
@endsection