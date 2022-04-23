<div class="p-6">
    <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">

        <x-jet-button wire:click="dispatchEvent">
            {{ __('DispatchEvent') }}
        </x-jet-button>

        <x-jet-button wire:click="createShowModal">
            {{ __('Create') }}
        </x-jet-button>
    </div>
    {{-- The data table --}}
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th
                                    class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Title
                                </th>
                                <th
                                    class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Created
                                </th>
                                <th
                                    class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($data as $item)
                                <tr>
                                    <td class="px-6 py-4 text-sm whitespace-nowrap">
                                        <a href="{{ route('page.show', $item->slug) }}"
                                            target="_blank">{{ $item->title }}</a>
                                    </td>
                                    <td class="px-6 py-4 text-sm whitespace-nowrap">
                                        {{ $item->created_at->format('Y-m-d H:i:s') }}
                                    </td>
                                    <td class="px-6 py-4 text-sm whitespace-nowrap">
                                        <x-jet-button wire:click="updateShowModal({{ $item->id }})">
                                            {{ __('Update') }}
                                        </x-jet-button>
                                        <x-jet-danger-button wire:click="deleteShowModal({{ $item->id }})">
                                            {{ __('Delete') }}
                                        </x-jet-danger-button>

                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
    <br />
    {{ $data->links() }}
    <x-jet-dialog-modal wire:model="modalFormVisible">
        <x-slot name="title">
            {{ __('Save Page') }} {{ $modelId }}
        </x-slot>



        <x-slot name="content">
            <div class="mt-4">
                <x-jet-label for="title" value="{{ __('Title') }}" />
                <x-jet-input id="title" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="title"
                    wire:change="" />
                @error('title')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="slug" value="{{ __('Slug') }}" />
                <div class="mt-1 flex rounded-md shadow-sm">
                    <span
                        class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                        http://livewirelearn.test/
                    </span>
                    <input wire:model.debounce.800ms="slug" type="text"
                        class="form-input flex-1 block w-full border-gray-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-none rounded-r-md transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                        placeholder="url-slug" id="slug">
                </div>
                @error('slug')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>



            <div class="mt-4">
                <x-jet-label value="{{ __('Content') }}" />
                <div class="rounded-md shadow-sm">
                    <div class="mt-1 bg-white">
                        <div class="body-content" wire:ignore>
                            <x-ckeditor field="content" />
                        </div>
                    </div>
                </div>
                @error('content')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="mt-4">
                <x-jet-label value="{{ __('Cover') }}" />
                <x-filepond field="cover_media_id" accept="image/*" multiple />
                @error('cover_media_id')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>




            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">

                </label>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalFormVisible')" wire:loading.attr="disabled">
                {{ __('NeverMind') }}
            </x-jet-secondary-button>

            @if ($modelId)
                <x-jet-danger-button class="ml-3" wire:click="update" wire:loading.attr="disabled">
                    {{ __('Update') }}
                </x-jet-danger-button>
            @else
                <x-jet-danger-button class="ml-3" wire:click="create" wire:loading.attr="disabled">
                    {{ __('Save') }}
                </x-jet-danger-button>
            @endif
        </x-slot>
    </x-jet-dialog-modal>


    <!-- Delete Page Confirmation Modal -->
    <x-jet-dialog-modal wire:model="modalDeleteVisible">
        <x-slot name="title">
            {{ __('Delete Page') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to delete this page?') }}

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalDeleteVisible')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-3" wire:click="delete" wire:loading.attr="disabled">
                {{ __('Delete Page') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>

</div>
