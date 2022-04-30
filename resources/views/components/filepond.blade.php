@pushOnce('scripts')
<script src="/package/filepond/filepond-plugin-image-preview.js"></script>
<script src="/package/filepond/filepond-plugin-file-validate-type.js"></script>
<script src="/package/filepond/zh-cn.js"></script>
<script src="/package/filepond/filepond.js"></script>
<script>
    // Register the plugin
    FilePond.registerPlugin(FilePondPluginImagePreview);
    FilePond.registerPlugin(FilePondPluginFileValidateType);
    FilePond.setOptions(filepond_zh_cn);
</script>
@endPushOnce

@pushOnce('styles')
<link href="/package/filepond/filepond.css" rel="stylesheet" />
<link href="/package/filepond/filepond-plugin-image-preview.css" rel="stylesheet" />
@endPushOnce





<div wire:ignore>
    <input x-data="{ value : @entangle($attributes->wire('model')).defer }" x-cloak {{ $attributes->whereDoesntStartWith('wire:model') }} x-init="() => {       
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
                if (Array.isArray(value)) {
                    value = [];
                    for (let i = 0; i < pond.getFiles().length; i++) {
                        file = pond.getFiles()[i];
                        value.push(file.serverId);
                    }
                } else {
                    if (pond.getFiles().length) {
                        file = pond.getFiles()[0];
                        value = file.serverId;
                    } else
                         value = null;
                };
            },
            onremovefile: () => {
                if (Array.isArray(value)) {
                    value = [];
                    for (let i = 0; i < pond.getFiles().length; i++) {
                        file = pond.getFiles()[i];
                        value.push(file.serverId);
                    }
                } else {
                    if (pond.getFiles().length) {
                        file = pond.getFiles()[0];
                        value = file.serverId;
                    } else
                    value = null;
                };
            },
    
    
    
            oninit: () => {
                files = [];
                if (Array.isArray(value)) {
                    for (let i = 0; i < value.length; i++) {
                        files.push({ source: value[i], options: { type: 'limbo' } });
                    }
                } else if (value)
                    files.push({ source: value, options: { type: 'limbo' } });
                pond.removeFiles();
                pond.addFiles(files);
            }
        });

        window.addEventListener('sync',(event)=>{
            
                files = [];                
                if (Array.isArray(value)) {
                    for (let i = 0; i < value.length; i++) {
                        files.push({ source: value[i], options: { type: 'limbo' } });
                    }
                } else if (value)
                    files.push({ source: value, options: { type: 'limbo' } });
    
                
                pond.removeFiles();
                pond.addFiles(files);
                
            
        });
    
        if ($el.hasAttribute('maxFiles')) {
            pond.setOptions({
                maxFiles: $el.getAttribute('maxFiles')
            });
        }    
    }" />
</div>
