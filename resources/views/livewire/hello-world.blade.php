<div class="p-4">
    <input type="text" wire:model.debounce.defer="name" />
    <input type="checkbox" wire:model="loud">
    <select name="" wire:model="greeting" id="" multiple>
        <option>Hello</option>
        <option>Goodby</option>
        <option>Adios</option>
    </select>

    <form action="" wire:submit.prevent="$set('name',$event.target.innerText)">
        <button
            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">Reset
            Name</button>
    </form>
    @if ($loud)
        {{ $name }}
    @endif

    {{ now() }}

    <button wire:click="emitFoo">Refresh</button>




</div>
