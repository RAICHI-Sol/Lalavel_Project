@inject('Test', 'App\Http\Controllers\Test')

@extends('layouts/layout_setting')

@section("title",'設定')

@section('main')
<div class = "setting">
    <h1>プロフィール編集</h1>
    <form action="{{ route('setting') }}" method="POST" autocomplete="off">
        @csrf
        @method('put')
        <fieldset>
            <legend>プロフィール</legend>
            <label>
                <p>名前</p>
                <input type = "text" name = "name" maxlength = "30" value = {{$profile->name}} required
                class = "@error('name') is-invalid @enderror">
                <p class ='red'>※必須</p>
            </label>
            @error('name')
                <p class = 'error'>{{ $message }}</p>
            @enderror
            <article class = "radio_flame">
                <p>性別</p>
                <label>男：<input type = "radio" name = "sex" value = "男" {{$Test->checkbox($profile->sex,"男")}}></label>
                <label>女：<input type = "radio" name = "sex" value = "女" {{$Test->checkbox($profile->sex,"女")}}></label>
                <label>非公開：<input type = "radio" name = "sex" value = "" {{$Test->checkbox($profile->sex,"")}}></label>
            </article>
            <label>
                <p>出身</p>
                <select name = "from">
                    <option value = "">非公開にする</option>
                    @for($i = 0;$i < 47;$i++)
                        <?php $from = $Test->from_select($i)?>
                        @if($profile->from == $from)
                            <option value= {{$from}} selected>{{$from}}</option>
                        @else
                            <option value= {{$from}}>{{$from}}</option>
                        @endif
                    @endfor
                </select>
            </label>
            <label>
                <p>年齢</p>
                <select name = "old">
                    <option value = "">非公開にする</option>
                    @for($i = 1;$i <= 100;$i++)
                        @if($profile->old == $i)
                            <option value = {{$i}} selected>{{$i}}</option>
                        @else
                            <option value = {{$i}}>{{$i}}</option>
                        @endif
                    @endfor
                </select><p>歳</p>
            </label>
            <label>
                <p>職種</p>
                <select name = "job">
                    <option value="">非公開にする</option>
                    @for($i = 0;$i < 16;$i++)
                        <?php $job = $Test->job_select($i)?>
                        @if($profile->job == $job)
                            <option value= {{$job}} selected>{{$job}}</option>
                        @else
                            <option value= {{$job}}>{{$job}}</option>
                        @endif
                    @endfor
                </select>
            </label>
        </fieldset>
        <fieldset>
            <legend>自己紹介</legend>
            <textarea rows = "8" cols="40" name = "profile" wrap = "hard"
            required>{{$profile->profile}}</textarea>
        </fieldset>
        <input type = "submit" value = "投稿">
    </form>
</div>
@endsection