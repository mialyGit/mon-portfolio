<div class="image-container" key="{{ $key }}">
    <a href="{{ $src }}" target="_blank">
        <img class="preview-image img-thumbnail" src="{{ $src }}" alt="{{ $alt }}">
        <div class="image-info">
            <p> Name : {{ $filename }}</p>
            <p> Size : {{ $size }}</p>
        </div>
    </a>
    <x-galleries.icons.edit />
    <x-galleries.icons.delete />
</div>
