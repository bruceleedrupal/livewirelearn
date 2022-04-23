@props(['field'])
<div>
    <input x-data="{ {{ $field }}: @entangle($field).defer }" x-cloak {!! $attributes !!} x-init="() => {
        let headers = { 'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content };
    
    
        if (!{{ $field }})
            {{ $field }} = [];
        else
            {{ $field }} = [{{ $field }}];
    
        console.log({{ $field }});
        console.log('大厦');
    
    
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
            onprocessfile: (error, file) => {
                for (let i = 0; i < pond.getFiles().length; i++) {
                    file = pond.getFiles()[i];
                    {{ $field }}.push(file.serverId);
                }
                console.log('onprocessfile');
            }
        });
    
        files = [];
        for (let i = 0; i < {{ $field }}.length; i++) {
            files.push({ source: {{ $field }}[i], options: { type: 'limbo' } });
        }
    
        pond.addFiles(files);
    
    
    
    
    }" />


</div>
