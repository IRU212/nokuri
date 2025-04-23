@props(['class' => '', 'value' => '', 'name', 'label'])

<div
    @class([
        $class, 
        'is-filled' => isset($value)
    ]) 
    @style([
        'border: #ccc solied 1px' => isset($value)
    ])
>
    <label 
        class="form-label" 
        @style([
            'color: #737373' => !empty($value)
        ])
    >
        {{ $label }}
    </label>
    <input type="password" name="{{ $name }}" value="{{ $value }}" class="form-control">
</div>