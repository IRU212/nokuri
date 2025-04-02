@props(['class' => '', 'name'])

@if (session($name))
    <div 
        @class([
            'flash-message', 
            $class
        ])
    >
        {{ session($name) }}
    </div>
@endif