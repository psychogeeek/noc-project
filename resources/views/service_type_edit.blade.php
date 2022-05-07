<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
           <h5>Create Pop and Point Form</h5>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('service_type_update' , $servicetype->id ) }}">
        @csrf
        <!-- Name -->
            <div class="mt-4">
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{old('name', $servicetype->name)}}" required autofocus />
            </div>

            <div class="mt-4">
                <x-label for="number" :value="__('Number')" />

                <x-input id="number" class="block mt-1 w-full" type="text" name="number" value="{{old('address', $servicetype->number)}}" required autofocus />
            </div>


            <div>
                <br>
            </div>

            <div style="display:flex;justify-content:space-between ">
                <x-button class="mr-5">
                    {{ __('Done') }}
                </x-button>
            </div>



            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
