@props(['initialValue' => ''])

<div {{ $attributes }} wire:ignore>
    <textarea x-init="ClassicEditor.create($el, { extraPlugins: [UploadAdapterPlugin] })
        .then(function(editor) {
            editor.setData('{{ $initialValue }}');
            editor.ui.focusTracker.on('change:isFocused', (evt, name,
                isFocused) => {
                $dispatch('input', editor.getData());
            });
        })
        .catch(error => {
            console.error(error);
        });"></textarea>

</div>
