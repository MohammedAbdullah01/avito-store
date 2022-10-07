@props([
    'class' => 'text-center',
    'colorButton' => 'main',
    'type' => 'submit',
    'value' => '',
    'modal' => '',
])

<div class="{{ $class }}">
    <button type="{{ $type }}" class="btn btn-{{ $colorButton }} {{ $class }}"
        data-bs-dismiss="{{ $modal }}">
        {{ __($value) }}
    </button>
</div>
