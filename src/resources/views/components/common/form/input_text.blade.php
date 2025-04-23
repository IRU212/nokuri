@props(['class' => '', 'value' => '', 'name', 'label'])

<div
    @class([
        $class, 
        'is-filled' => !empty($value)
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
    <input 
        type="text" 
        name="{{ $name }}" 
        value="{{ $value }}" 
        class="form-control"
    >
</div>