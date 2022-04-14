@props(['field'])
<textarea class="form-textarea w-full" x-init="ClassicEditor.create($el)
    .then(function(editor) {
        editor.model.document.on('change:data', () => {
            $dispatch('input', editor.getData())
        });
        $wire.on('reset-{{ $field }}', () => {
            editor.setData($el.value);
        });
    })
    .catch(error => {
        console.error(error);
    });" wire:model.debounce.99999999ms="{{ $field }}">
</textarea>
