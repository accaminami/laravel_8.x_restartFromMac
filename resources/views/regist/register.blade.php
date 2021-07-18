<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>ユーザー登録フォーム</title>
    </head>
    <body>
    <form name="registform" action="/register" method="post" id="registform">
        {{ csrf_field() }}
        <dd>
        <dt>名前：</dt>
        <dd><input type="text" name="name" size="30" value="{{ old('name') }}">
            <span>{{ $errors->first('name') }}</span></dd>
        </dl>
        <dd>
        <dt>メールアドレス：</dt>
        <dd><input type="text" name="email" size="30" {{ old('email') }}>
            <span>{{ $errors->first('email') }}</span></dd>
        </dl>
        <dd>
        <dt>パスワード：</dt>
        <dd><input type="password" name="password" size="30">
            <span>{{ $errors->first('password') }}</span></dd>
        </dl>
        <dd>
            <dt>パスワード（確認）：</dt>
            <dd><input type="password" name="password_confirmation" size="30">
            <span>{{ $errors->first('password_confirmation') }}</span></dd>
        </dl>
        <button type="submit" name="action" value="send">送信</button>
    </form>
    </body>
</html>
