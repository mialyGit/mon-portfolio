<script>
    showGalleryModalByButton()
    makeGalleryFromApi()

    function showGalleryModalByButton(buttonSelector = '.no-image') {
        $(buttonSelector).click(() => {
            $('#gallery-modal').modal('show');
            $('#gallery-modal .gallery-checkbox:checked').prop('checked', false);
        })
    }

    function checkIfImageAlreadyPreviewed(key) {
        return $('#image-preview .image-container[key="' + key + '"]').length
    }

    function showEditIcon() {
        showGalleryModalByButton('.edit-icon');
        $('.edit-icon').show()
    }

    function addSingleSelectEventToCheckbox() {
        $('.gallery-checkbox').prop('checked', false);

        $('.gallery-checkbox').click(function() {
            $('.gallery-checkbox').not(this).prop('checked', false);
        });
    }

    function toggleImageInfoEvent() {
        $(".image-container").mouseenter(function() {
            $(this).find('.image-info').show();
        }).mouseleave(function() {
            $(this).find('.image-info').hide();
        });
    }

    function addDeleteImageEvent(isMultiple = false) {
        $('.icon-trash').click(function() {
            $(this).closest('.image-container').next('input').remove();
            if (!isMultiple) {
                $(this).closest('.image-container')
                    .replaceWith(`<x-galleries.no-image></x-galleries.no-image>`);
                showGalleryModalByButton();
            } else {
                $(this).closest('.image-container').remove();
            }
        });
    }

    function makeGalleryFromApi() {

        if ($('#image-preview .image-container').not('.no-image').length) {
            if (!!!isMultiple) {
                showEditIcon();
            }
            toggleImageInfoEvent();
            addDeleteImageEvent(isMultiple);
        }

        var imageModel = $('#image-preview').data('model');
        var isMultiple = $('#image-preview').data('multiple');

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'GET',
            url: "{{ route('dashboard.galleries') }}",
            success: function(data) {
                var content = '';
                data.forEach((item, key) => {
                    content += `
                        <x-galleries.item key="${item.id}" filename="${item.filename}" src="${item.image}" alt="${item.alt}" size="${item.human_readable_size}" />
                    `;
                });

                $('#gallery-image-content').append(content);

                if (!isMultiple) addSingleSelectEventToCheckbox();
            },
            error: function(e) {
                console.log(e);
            }
        });

        $('.select-image').click(function(e) {
            e.preventDefault();

            var selectedImages = $('#gallery-modal .gallery-checkbox:checked + label img');
            var content = '';
            selectedImages.each((i, image) => {

                var imageObject = {
                    'key': $(image).data('key'),
                    'filename': $(image).data('filename'),
                    'src': $(image).attr('src'),
                    'size': $(image).data('size'),
                    'alt': $(image).attr('alt')
                }

                if (!!!checkIfImageAlreadyPreviewed(imageObject.key)) {

                    content =
                        `
                    <x-galleries.preview 
                        key="${imageObject.key}" 
                        filename="${imageObject.filename}" 
                        src="${imageObject.src}" 
                        alt="${imageObject.alt}" 
                        size="${imageObject.size}" 
                    />
                    <input type="hidden" name="${imageModel}[]" value="${imageObject.key}"/>
                    `;

                    if (isMultiple) {
                        $('#image-preview').append(content);
                    } else {
                        $('#image-preview').html(content)
                        showEditIcon();
                    }
                }

            });

            toggleImageInfoEvent();
            addDeleteImageEvent(isMultiple);

            $('#gallery-modal').modal('hide');

        });
    }
</script>
