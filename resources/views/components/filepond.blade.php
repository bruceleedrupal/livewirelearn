@props(['field'])
<div>
    <input x-data="{ {{ $field }}: @entangle($field).defer }" x-cloak {!! $attributes !!} x-init="() => {
        let headers = { 'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content };
    
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
            onprocessfiles: () => {
                if (Array.isArray({{ $field }})) {
                    {{ $field }} = [];
                    for (let i = 0; i < pond.getFiles().length; i++) {
                        file = pond.getFiles()[i];
                        {{ $field }}.push(file.serverId);
                    }
                } else {
                    if (pond.getFiles().length) {
                        file = pond.getFiles()[0];
                        {{ $field }} = file.serverId;
                    } else
                        {{ $field }} = null;
                };
            },
            onremovefile: () => {
                if (Array.isArray({{ $field }})) {
                    {{ $field }} = [];
                    for (let i = 0; i < pond.getFiles().length; i++) {
                        file = pond.getFiles()[i];
                        {{ $field }}.push(file.serverId);
                    }
                } else {
                    if (pond.getFiles().length) {
                        file = pond.getFiles()[0];
                        {{ $field }} = file.serverId;
                    } else
                        {{ $field }} = null;
                };
            },
    
    
    
            oninit: () => {
                files = [];
                if (Array.isArray({{ $field }})) {
                    for (let i = 0; i < {{ $field }}.length; i++) {
                        files.push({ source: {{ $field }}[i], options: { type: 'limbo' } });
                    }
                } else if ({{ $field }})
                    files.push({ source: {{ $field }}, options: { type: 'limbo' } });
    
                pond.addFiles(files);
            }
        });
    
        if ($el.hasAttribute('maxFiles')) {
            pond.setOptions({
                maxFiles: $el.getAttribute('maxFiles')
            });
        }
    
    
    
    
    
    
    
    }" />


</div>
