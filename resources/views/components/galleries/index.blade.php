@props([
    'type' => 'image',
    'label' => '',
    'model' => 'images',
    'value' => [],
    'multiple' => false,
])

<div {{ $attributes->merge(['class' => '']) }}>
    <label for="image-preview"> @lang($label) : </label>
    <div id="image-preview" class="mt-0" data-model="{{ $model }}" data-multiple="{{ $multiple }}">
        @forelse ($value as $img)
            @if ($multiple)
                <x-galleries.no-image></x-galleries.no-image>
            @endif
            <x-galleries.preview key="{{ $img->key }}" filename="{{ $img->filename }}" src="{{ $img->src }}"
                alt="{{ $img->alt }}" size="{{ $img->size }}" />
        @empty
            <x-galleries.no-image></x-galleries.no-image>
        @endforelse

    </div>
</div>
