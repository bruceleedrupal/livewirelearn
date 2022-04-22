@props(['field'])
<div>
    <input type="file" name="{{ $field }}" {!! $attributes !!}
        wire:model.debounce.99999999ms="{{ $field }}" x-init="let headers = { 'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content };
        
        if ($el.hasAttribute('data-private')) {
            headers['X-DATA-PRIVATE'] = 1;
        }
        let processUrl = './file';
        
        if ($el.hasAttribute('accept') && $el.getAttribute('accept') == 'image/*') {
            processUrl = './image';
        }
        const pond = FilePond.create($el, {
            allowImagePreview: true,
            imagePreviewHeight: 100,
            chunkUploads: true,
            chunkSize: 2000000,
            server: {
                url: '/upload/',
                process: processUrl,
                revert: './delete',
                allowImagePreview: false,
                headers: headers,
            },
        });
        let dataFiles = $el.getAttribute('data-files');
        let files = [];
        if (dataFiles) {
            dataFiles = dataFiles.split('|');
            for (let i = 0; i < dataFiles.length; i++) {
                files.push({ source: dataFiles[i], options: { type: 'limbo' }, });
            }
            pond.addFiles(files);
        }" />
</div>
