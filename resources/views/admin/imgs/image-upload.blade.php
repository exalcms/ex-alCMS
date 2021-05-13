@extends('layouts.excms')

@section('conteudo')
    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
        <div id="admin-content">
    <div class="container mt-5 mb-5">
        <h3 class="text-center mb-5">Upload de Imagens para o site</h3>
        <form action="{{route('admin.imageUpload')}}" method="post" enctype="multipart/form-data">
            @csrf
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <strong>{{ $message }}</strong>
                </div>
            @endif

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="user-image mb-3 text-center">
                <div class="imgPreview d-flex"> </div>
            </div>

            <div class="custom-file">
                <input type="file" name="imageFile[]" class="custom-file-input" id="images" multiple="multiple">
                <label class="custom-file-label" for="images">Escolha as imagens</label>
            </div>
            <div class="custom-file mt-2">
                <x-jet-label for="using" value="{{ __('Aplicação das imagens') }}" />
                <x-jet-input id="using" class="block mt-1 w-full" type="text" name="using" :value="old('using')" />
            </div>

            <div class="custom-file mt-2">
                <x-jet-label for="title" value="{{ __('Título') }}" />
                <x-jet-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" />
            </div>

            <div class="custom-file mt-2">
                <x-jet-label for="legenda" value="{{ __('Legenda') }}" />
                <x-jet-input id="legenda" class="block mt-1 w-full" type="text" name="legenda" :value="old('legenda')" />
            </div>

            <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
                Upload Imagens
            </button>
        </form>
    </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script>
        $(function() {
            // Multiple images preview with JavaScript
            var multiImgPreview = function(input, imgPreviewPlaceholder) {

                if (input.files) {
                    var filesAmount = input.files.length;

                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();

                        reader.onload = function(event) {
                            $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                        }

                        reader.readAsDataURL(input.files[i]);
                    }
                }

            };

            $('#images').on('change', function() {
                multiImgPreview(this, 'div.imgPreview');
            });
        });
    </script>

@endsection
