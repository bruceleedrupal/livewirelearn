@props(['filetypes'=>['image/*']])
@pushOnce('scripts')
    <script src="/asset/filepond/filepond.js"></script>    
    <script src="/asset/filepond/filepond-plugin-image-preview.js"></script>   
    <script src="/asset/filepond/filepond-plugin-file-validate-size.js"></script>   
    <script src="/asset/filepond/filepond-plugin-file-validate-type.js"></script>  
    <script src="/asset/filepond/zh-cn.js"></script>  
    <script>
      FilePond.registerPlugin(FilePondPluginImagePreview)
      FilePond.registerPlugin(FilePondPluginFileValidateSize)
      FilePond.registerPlugin(FilePondPluginFileValidateType);
      FilePond.setOptions(filepond_zh_CN);
    </script>
@endPushOnce

@pushOnce('styles')
  <link href="/asset/filepond/filepond.css" rel="stylesheet" />    
  <link href="/asset/filepond/filepond-plugin-image-preview.css" rel="stylesheet" />      
@endPushOnce


<div
  x-data="{Pond:null}"
  x-on:remove-images="Pond.removeFiles()"
  x-init="
    Pond = FilePond.create($refs.input);
    Pond.setOptions({
        acceptedFileTypes: @if(is_array($filetypes)) {{ json_encode($filetypes, true) }} @else ['{{ $filetypes }}'] @endif,
        imagePreviewHeight: 100,
        maxFileSize: 'Number({{ max_upload_filesize() }}) * 1000',
        allowMultiple: {{ isset($attributes['multiple']) ? 'true' : 'false' }},        
        onprocessfile: (error, file) => {
          if (!error) {            
            Pond.removeFile(file.id);
          }
        },
        server: {
          process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
              @this.upload('{{ $attributes['wire:model'] }}', file, load, error, progress)
          },
          revert: (filename, load) => {
              @this.removeUpload('{{ $attributes['wire:model'] }}', filename, load)
          },
      },

    });  
 
    this.addEventListener('pondReset', e => {
        Pond.removeFiles();
    });
  "
  wire:ignore
>
  <input type="file" x-ref="input" x-cloak>
</div>
