<div>
    [お名前] <br />
    {{ $inquiry->name }}
</div>
<div>
    [お問い合わせ内容] <br />
    {!! nl2br(e($inquiry->content)) !!}
</div>