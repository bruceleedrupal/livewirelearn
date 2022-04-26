<div>
    <form wire:submit.prevent="register">

        <div>
            <label for="email">email</label>
            <input wire:model.lazy="email" type="text" id="email" name="email">
            @error('email')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="password">password</label>
            <input wire:model="password" type="text" id="password" name="password">
            @error('password')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="passwordConfirmation">passwordConfirmation</label>
            <input wire:model="passwordConfirmation" type="text" id="passwordConfirmation" name="passwordConfirmation">
            @error('passwordConfirmation')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <input type="submit" value="Submit" />
        </div>
    </form>
</div>
