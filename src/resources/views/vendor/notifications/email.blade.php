@component('mail::message')
# メールアドレスの確認

こんにちは！

以下のボタンをクリックして、メールアドレスを確認してください。

@component('mail::button', ['url' => $actionUrl])
メールアドレスを確認する
@endcomponent

アカウントの作成に心当たりがない場合は、このメールを無視してください。

どうぞよろしくお願いします。  
{{ config('app.name') }}

@if(!empty($actionUrl))
「メールアドレスを確認する」ボタンがクリックできない場合は、以下のURLをコピーしてブラウザに貼り付けてください。
[{{ $actionUrl }}]({{ $actionUrl }})
@endif
@endcomponent