@pushOnce('scripts')
<script src="/package/ckeditor/ckeditor.js"></script>
<script src="/package/ckeditor/uploadAdapter.js"></script>

@endPushOnce

<div wire:ignore>
    <textarea @if($attributes->get('wire:model')) x-data="{ value: @entangle($attributes->wire('model')).defer }" @endif x-init="ClassicEditor.create($el, { extraPlugins: [UploadAdapterPlugin] })
        .then(function(editor) {
            @if($attributes->get('wire:model'))
            editor.model.document.on('change:data', () => {
                $dispatch('input', editor.getData());
                value = editor.getData();
            });            
            window.addEventListener('sync',(event)=>{
                if(value)
                    editor.setData(value);
                else editor.setData('');
            });

            @endif
        })
        .catch(error => {
            console.error(error);
        });" @if($attributes->get('wire:model')) x-bind:value="value" @endif>
    </textarea>
</div>