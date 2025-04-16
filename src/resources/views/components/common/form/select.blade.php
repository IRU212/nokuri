@props(['class' => '', 'value' => '', 'name', 'label'])

<div 
    @class([
        $class
    ])
>
    <label for="exampleFormControlSelect1" class="ms-0">{{ $label }}</label>
    <select name="{{ $name }}" class="form-control" id="exampleFormControlSelect1">
        <option value="">選択なし</option>
    </select>
</div>