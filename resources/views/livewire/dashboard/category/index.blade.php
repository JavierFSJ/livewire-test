<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categorias') }}
        </h2>
    </x-slot>
    <x-card>
        <a href="{{route('create.category')}}" class="button my-5">Crear Categoria</a>
        <x-jet-action-message on="deleted">
            {{-- Definir en css --}}
            <div class="action-message-succes">
                {{__('Categoria Eliminada Correctamente')}}
            </div>
        </x-jet-action-message>
        <table class="table w-full mb-5">
            <thead class="text-left bg-gray-100 rounded-lg">
                <tr class="border-b">
                    <th class="p-2">Titulo</th>
                    <th class="p-2">Descripcion</th>
                    <th class="p-2 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr class="border-b">
                        <td class="py-2">{{ $category->title}}</td>
                        <td class="py-2">{{ $category->text}}</td>
                        <td class="py-2 text-center">
                            <x-jet-button>Actualizar</x-jet-button>
                            <x-jet-danger-button wire:click="selectCategory({{$category}})">Eliminar</x-jet-danger-button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$categories->links()}}
    </x-card>

    
    <x-jet-confirmation-modal wire:model="confirmingUserDeletion">
        <x-slot name="title">
            Borrar Categoria
        </x-slot>
    
        <x-slot name="content">
            La categoria se eliminará de manera permanente.
        </x-slot>
    
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">
                Cancelar
            </x-jet-secondary-button> 
    
            <x-jet-danger-button class="ml-2" wire:click="delete()" wire:loading.attr="disabled">
                Eliminar
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>
</div>
