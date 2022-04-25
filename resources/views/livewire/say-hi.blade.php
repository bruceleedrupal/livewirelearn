<div>

    @livewire("hello-world",["name"=>"hello-world"])

    @livewire("hello-world",["name"=>"hello-world2"])

    <button wire:click="$emit('foo')">Refresh children</button>

    {{ now() }}
</div>
