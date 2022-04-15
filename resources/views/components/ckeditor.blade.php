@props(['field'])
<textarea x-init="ClassicEditor.create($el, { extraPlugins: [UploadAdapterPlugin] })
    .then(function(editor) {
        editor.model.document.on('change:data', () => {
            $dispatch('input', editor.getData())
        });
        $wire.on('sync-{{ $field }}', () => {
            console.log($el.value);
            editor.setData($el.value);
        });
    })
    .catch(error => {
        console.error(error);
    });" wire:model.debounce.99999999ms="{{ $field }}">
</textarea>
