@if  ($errors->any())
<!-- ＄errorsの中にバリデーションに引っかかったものが入る。配列を便利に扱えるメソッドがすでに用意されている。any（）が＄errorsの中に何かしらの配列データが入っていたらtrueを入っていなかったらfalseを返すようにするメソッド -->
    <ul class="alert">
        @foreach ($errors->all() as $error)
        <!-- all（）が＄errorsの中のデータを全取得するもの。foreachでそのデータを$errorにして1件ずつ取り出す。-->
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif