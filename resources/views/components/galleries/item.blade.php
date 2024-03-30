@props([
    'key' => '0',
    'filename' => '',
    'src' => asset('assets/images/no-image.png'),
    'size' => '0 KB',
    'alt' => '',
])

<div class="col col-auto pb-2">
    <div class="custom-control custom-checkbox image-checkbox p-1 rounded border">
        <input type="checkbox" class="custom-control-input gallery-checkbox" id="gallery-image-{{ $key }}">
        <label class="custom-control-label" for="gallery-image-{{ $key }}">
            <img src="{{ $src }}" alt="{{ $alt }}" data-filename="{{ $filename }}"
                data-size="{{ $size }}" data-key="{{ $key }}" width="100" height="100"
                style="object-fit: cover">
        </label>
    </div>
</div>
