<div x-data="{ value: @entangle($attributes->wire('model')) }" x-init="new Pikaday({ field: $refs.input, format: 'MM/DD/YYYY' })" @change="value = $event.target.value">
    <span x-model="value">
        <input type="text" placeholder="DD/MM/YYYY" x-ref="input" x-bind:value="value" />
    </span>
</div>
