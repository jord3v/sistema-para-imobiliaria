<x-app-layout>
  <x-slot name="header">
     <h2 class="page-title">
        {{ __('Editar imóvel') }}
     </h2>
  </x-slot>
  <form class="needs-validation" action="{{route('properties.update', $property->id)}}" method="post" enctype="multipart/form-data" novalidate>
     @csrf
     @method('PUT')
     @include('dashboard.properties.form', ['page' => 'edit'])
  </form>
  @push('scripts')
  <script>
    // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
    var previewNode = document.querySelector("#template");
    previewNode.id = "";
    var previewTemplate = previewNode.parentNode.innerHTML;
    previewNode.parentNode.removeChild(previewNode);

    // "myAwesomeDropzone" is the camelized version of the HTML element's ID
    Dropzone.options.imageUploader = {
        autoProcessQueue: true,
        acceptedFiles: "image/*",
        paramName: "file", // The name that will be used to transfer the file
        // maxFilesize: 2, // MB
        maxFiles: 5, // 3 Files can be handled by dropzone
        parallelUploads: 1,
        url: "{{route('medias.store')}}",
        resizeQuality: 0.7,
        addRemoveLinks: false,
        thumbnailWidth: 80,
        thumbnailHeight: 80,
        resizeWidth: 1280,
        previewTemplate: previewTemplate,
        previewsContainer: "#template-wrapper", // Define the container to display the previews
        clickable: ".fileinput-button , .dropzone",
        dictMaxFilesExceeded: 'Você não pode enviar mais arquivos.',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        init: function() {

            myDropzone = this;
            // get current images
            const images = @json($property->getMedia('media'));

            $.each(images, function(index, value) {
                var mockFile = {
                    name: value.name,
                    size: value.size,
                    percentage: 100,
                    id: value.uuid
                };

                myDropzone.options.addedfile.call(myDropzone, mockFile);
                myDropzone.options.thumbnail.call(myDropzone, mockFile, value.original_url);
                myDropzone.options.complete.call(myDropzone, mockFile);
                myDropzone.options.success.call(myDropzone, mockFile);
                $(mockFile.previewElement).attr("data-order", value.uuid);

            });

            //Event trigger when just before the  image upload
            this.on("sending", function(file, xhr, formData) {
                formData.append("property", {{$property->id}});
            });

            //add click event to upload all images we have to set autoProcessQueue to false and start process on btn click

            this.on("complete", function() {
                if (
                    this.getQueuedFiles().length == 0 &&
                    this.getUploadingFiles().length == 0
                ) {
                    var _this = this;
                    /* _this.removeAllFiles();*/

                    console.log("all file were uploaded successfully");
                }
                // list_image();
            });

            this.on("uploadprogress", function(file, progress, byteSent) {
                //console.log(file);
                console.log(byteSent);

                file.previewElement.querySelector(".file-uploaded-percentage").innerHTML =
                    (Math.round(progress * 100) / 100).toFixed(2) + "%";

                file.previewElement.querySelector(".progress-bar").style.width =
                    progress + "%";
            });
            this.on("processing", function(file) {
                console.log("File is processing :- " + file.name);
                console.log(myDropzone.getUploadingFiles());
            });

            this.on("success", function(file, response) {
                /*if we want to upload the file which are not in parallel after the success of one */
                myDropzone.processQueue();

                //response = JSON.parse(response);

                // Set the serverFileName so that we can call it when we remove the file
                file.serverFileName = response.file_name;
                file.id = response.uuid;
                $(file.previewElement).attr("data-order", response.uuid);

                //console.log(response);
                file.previewElement
                    .querySelector(".progress-bar")
                    .classList.add("bg-success");
                file.previewElement.querySelector(".file-uploaded-percentage").innerHTML =
                    "<span class='status status-indigo'><span class='status-dot status-dot-animated'></span>Carregado com sucesso</span>";

                Toast.fire({
                    icon: 'success',
                    title: response.file_name
                });
            });
            this.on("removedfile", function(file) {
                console.log(file);

                //Ajax sent to remove file

                $.ajax({
                    url: "{{route('dashboard')}}/medias/" + file.id,
                    type: "delete",
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: "json",

                    beforeSend: function() {
                        //$("#hit_post_wrapper >#spinner").removeClass("d-none");
                    },
                    success: function(data, status, xhr) {
                        Toast.fire({
                            icon: "info",
                            title: "Imagem excluida"
                        });
                    }
                });
            });

            this.on("totaluploadprogress", function(progress) {
                document.querySelector("#upload-total-progress").style.width =
                    progress + "%";

                document.querySelector("#total-upload-percentage").innerHTML =
                    (Math.round(progress * 100) / 100).toFixed(2) + "%";
                document.querySelector("#total-upload-file-length").innerHTML =
                    myDropzone.getAcceptedFiles().length -
                    myDropzone.getQueuedFiles().length +
                    " / " +
                    myDropzone.getAcceptedFiles().length +
                    " Files";
            });

            this.on("maxfilesexceeded", function(file) {
                alert("exceeded");
            });

            this.on('drop', function(file) {
                alert("drop");
            });
        }
    };
  </script>
  @endpush
</x-app-layout>