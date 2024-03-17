@extends('layouts.master')

@push('page_title')
    @lang('Medias')
@endpush

@push('css')
    <link href="{{ asset('assets/vendor/dropzone/theme.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/dropzone/dropzone.min.css') }}" rel="stylesheet">
@endpush

@push('js')
    <script src="{{ asset('assets/vendor/dropzone/dropzone.min.js') }}"></script>
    <script>
        const headers = {
            'X-CSRF-TOKEN': document.querySelectorAll('meta[name="csrf-token"]')[0].getAttribute('content'),
        };

        Dropzone.options.myDropzone = {
            url: "{{ route('dashboard.file.upload') }}",
            parallelUploads : 1,
            headers, 
            paramName: "file",
            maxFilesize: 5,
            dictDefaultMessage: "Drag and drop your files here or click to choose",
            success: function(file, response) {

                file.previewProgress.remove();

                var thisDropzone = this;
                file.temporary_name = response.temporary_name

                var filePreview = {...response};

                var previewDiv = document.getElementById("image-preview");
                var imageContainer = document.createElement("div");
                imageContainer.classList.add("image-container");
                var removeButton = document.createElement("span");
                removeButton.classList.add("close-button");
                removeButton.textContent = 'x';

                removeButton.addEventListener("click", function () {
                    // Clear the Dropzone
                    imageContainer.remove();
                    thisDropzone.removeFile(file);
                });

                imageContainer.innerHTML = `
                    <a href="${filePreview.path}" target="_blank">
                        <img class="preview-image" src="${filePreview.path}">
                        <div class="image-info">
                            <p> Name : ${filePreview.name} </p>
                            <p> Size : ${filePreview.size} </p>
                        </div>
                    </a>
                `;

                imageContainer.addEventListener("mouseover", function () {
                    // Clear the Dropzone
                    this.querySelector('.image-info').style.display = 'block';
                });

                imageContainer.addEventListener("mouseout", function () {
                    // Clear the Dropzone
                    this.querySelector('.image-info').style.display = 'none';
                });

                imageContainer.appendChild(removeButton);
                previewDiv.appendChild(imageContainer);

                var hiddenInput = document.createElement('input');
                var attribute = 'dropzoneFiles';
                hiddenInput.type = 'hidden';
                hiddenInput.className = 'file-value';
                hiddenInput.name = attribute + '[]';
                hiddenInput.value = filePreview.temporary_name + '|' + filePreview.name;

                document.getElementById("submit-dropzone").appendChild(hiddenInput);
            },
            addedfile: function (file) {
                var previewProgress = document.createElement("div");
                previewProgress.classList.add("progress", "file-progress");

                previewProgress.innerHTML = `
                    <div class="progress-bar bg-info progress-bar-striped" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 0%; height:3px;" role="progressbar">
                    </div>
                `;
                file.previewProgress = previewProgress
                document.getElementById("image-preview").appendChild(previewProgress);
                
            },
            uploadprogress: function (file, progress) {
                file.previewProgress.firstElementChild.style.width = `${progress}%`;
            },
            removedfile : function(file) {
                fetch("{{ route('dashboard.file.remove') }}", {
                    method : 'POST',
                    headers : { ...headers, 'Content-Type': 'application/json' },
                    body: JSON.stringify({ filename : file.temporary_name })
                })
                .then(response => {
                    // Check if the request was successful (status code 2xx)
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }

                    // Parse the response as JSON
                    return response.json();
                })
                .then(data => {
                    // Process the JSON data
                    console.log('Response:', data);
                    // Find the element with the specified value
                    var elementsToRemove = document.querySelectorAll('.file-value[value="' + file.temporary_name + '|' + file.name + '"]');

                    // Remove each matching element
                    elementsToRemove.forEach(function (element) {
                        element.parentNode.removeChild(element);
                    });

                })
                // .catch(error => {
                //     console.error('Error:', error);
                // });
            }
        };
    </script>

@endpush

@section('content')

    <x-shared.head title="Import Medias" />

    
    <div id="image-preview" class="mb-2"></div>

    <div class="row mb-2">
        <div class="col"> 
            <div class="dropzone mt-4 border-dashed" id="myDropzone">
                <div class="fallback">
                    <input name="file" type="file" multiple />
                </div>
           </div>	
        </div>
    </div>

    <form id="submit-dropzone" method="POST" action="{{ route('dashboard.medias.store') }}" class="mt-4">
        @csrf
        <x-buttons.save></x-buttons.save>
        <x-buttons.cancel class="ml-2" href="{{ route('dashboard.medias.index') }}"></x-buttons.cancel>
    </form>

@endsection