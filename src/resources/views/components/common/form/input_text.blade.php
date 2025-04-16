@props(['class' => '', 'vale' => '', 'name', 'label'])

<div
    @class([
        $class, 
        'is-filled' => true
    ]) 
>
    <label class="form-label">{{ $label }}</label>
    <input type="text" name="{{ $name }}" value="{{ $vale }}" class="form-control">
</div>