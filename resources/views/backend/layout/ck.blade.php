<script src="/backend/ckeditor/ckeditor.js"></script>

<script type="text/javascript">
    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

        CKEDITOR.replace( 'aciklama{{$localeCode}}', {
            filebrowserUploadUrl: "{{ route('page.postUpload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form',
            height : 400
        });

        CKEDITOR.replace( 'short{{$localeCode}}', {
            filebrowserUploadUrl: "{{ route('page.postUpload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form',
            height : 200
        });

    @endforeach
</script>
