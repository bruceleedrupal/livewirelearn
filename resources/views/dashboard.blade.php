<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div x-data="{ open: false }">
        <button x-on:click="open = ! open">Toggle Dropdown</button>

        <div x-cloak x-show="open">
            Dropdown Contents...
        </div>
    </div>

    <div class="py-12" id="test">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <x-jet-welcome />

                <div x-data="{ expanded: false }">
                    <button @click="expanded = ! expanded">Toggle Content</button>

                    <p x-show="expanded" x-collapse.min.50px x-uppercase>
                        Reprehenderit eu excepteur ullamco esse cillum reprehenderit exercitation labore non. Dolore
                        dolore ea dolore veniam sint in sint ex Lorem ipsum. Sint laborum deserunt deserunt amet
                        voluptate cillum deserunt. Amet nisi pariatur sit ut id. Ipsum est minim est commodo id dolor
                        sint id quis sint Lorem.
                        Reprehenderit eu excepteur ullamco esse cillum reprehenderit exercitation labore non. Dolore
                        dolore ea dolore veniam sint in sint ex Lorem ipsum. Sint laborum deserunt deserunt amet
                        voluptate cillum deserunt. Amet nisi pariatur sit ut id. Ipsum est minim est commodo id dolor
                        sint id quis sint Lorem.
                        Reprehenderit eu excepteur ullamco esse cillum reprehenderit exercitation labore non. Dolore
                        dolore ea dolore veniam sint in sint ex Lorem ipsum. Sint laborum deserunt deserunt amet
                        voluptate cillum deserunt. Amet nisi pariatur sit ut id. Ipsum est minim est commodo id dolor
                        sint id quis sint Lorem.
                        Reprehenderit eu excepteur ullamco esse cillum reprehenderit exercitation labore non. Dolore
                        dolore ea dolore veniam sint in sint ex Lorem ipsum. Sint laborum deserunt deserunt amet
                        voluptate cillum deserunt. Amet nisi pariatur sit ut id. Ipsum est minim est commodo id dolor
                        sint id quis sint Lorem.
                    </p>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
