<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categorias') }}
        </h2>
    </x-slot>

    <div class="py-5">
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

        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 bg-white rounded-lg">
            <x-jet-action-message on="deleted">
                {{ __("Categoria eliminada") }}
            </x-jet-action-message>
            <table class="table">
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->title}}</td>
                            <td>
                                <x-jet-button>Actualizar</x-jet-button>
                                <x-jet-danger-button wire:click="showDialog({{$category}})">Eliminar</x-jet-danger-button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$categories->links()}}
        </div>
    </div>
    
</div>
