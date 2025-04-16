@props(['class' => '', 'value' => '', 'name', 'label'])

<div
    @class([
        $class, 
        'is-filled' => isset($value)
    ]) 
>
    <label class="form-label">{{ $label }}</label>
    <input type="email" name="{{ $name }}" value="{{ $value }}" class="form-control">
</div>