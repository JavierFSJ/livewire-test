<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Category') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 bg-white  rounded-lg">
            <div class="flex justify-end">
                <div class="w-1/2">
                    <x-jet-action-message on="created">
                        {{ __('Guardado') }}
                    </x-jet-action-message>
                    <form wire:submit.prevent="submit">
                        <div>
                            <x-jet-label for="titulo" value="{{ __('Titulo') }}" />
                            <x-jet-input id="titulo" type="text" class="mt-1 block  w-full" wire:model='title' />
                            @error('title')
                                <x-jet-input-error class="mt-1" for="title">{{ $message }}</x-jet-input-error>
                            @enderror
                        </div>

                        <div class="mt-5">
                            <x-jet-label for="text" value="{{ __('Content') }}" />
                            <x-jet-input id="text" type="text" class="mt-1 block  w-full" wire:model='text' />
                            @error('text')
                                <x-jet-input-error class="mt-1" for="text">{{ $message }}</x-jet-input-error>
                            @enderror
                        </div>

                        <div class="mt-5">
                            <x-jet-label for="file" value="{{ __('File') }}" />
                            <x-jet-input id="file" type="file" class="mt-1 block  w-full" wire:model='image' />
                            @error('text')
                                <x-jet-input-error class="mt-1" for="text">{{ $message }}</x-jet-input-error>
                            @enderror
                        </div>

                        <div class="flex justify-start">
                            <x-jet-button class="mt-5" type="submit">
                                {{ __('Crear') }}
                            </x-jet-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
