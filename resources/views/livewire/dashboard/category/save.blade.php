<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if ($category)
            {{ __('Editar categoria') }}
            @else
            {{ __('Crear categoria') }}
            @endif
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <x-jet-form-section submit="submit">
                <x-slot name="title">
                    @if ($category)
                    {{ __('Editar categoria') }}
                    @else
                    {{ __('Crear categoria') }}
                    @endif
                </x-slot>

                
                <x-slot name="description">
                    {{ __('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam omnis suscipit, qui cumque excepturi laborum!') }}
                </x-slot>

                <x-slot name="form">
                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label for="titulo" value="{{ __('Titulo *') }}" />
                        <x-jet-input id="titulo" type="text" class="mt-1 block w-full" wire:model.defer="title" />
                        <x-jet-input-error for="title" class="mt-2" />
                    </div>
                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label for="descripcion" value="{{ __('Descripcion  *') }}" />
                        <x-jet-input id="descripcion" type="text" class="mt-1 block w-full" wire:model.defer="text" />
                        <x-jet-input-error for="text" class="mt-2" />
                    </div>
                    <div class="col-span-6 sm:col-span-4">
                        <input type="file" accept="image/*" wire:model="image">
                        <x-jet-input-error for="image" class="mt-2" />
                        <div class="my-3">
                            @if ($category && $category->image)
                                <img class="rounded" src="{{$category->imageUrl()}}" alt="{{$category->image}}">
                            @endif
                        </div>
                    </div>
                </x-slot>

                <x-slot name="actions">
                    <x-jet-action-message class="mr-3 text-xl" on="created">
                        {{ __('Categoria guardada') }}
                    </x-jet-action-message>
            
                    <x-jet-button type="submit">
                        {{ __('Guardar') }}
                    </x-jet-button>
                </x-slot>
            </x-jet-form-section>
        </div>
    </div>
</div>
