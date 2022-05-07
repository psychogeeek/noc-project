<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
           <h5>Create Pop and Point Form</h5>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('poppoint.update' , $poppoint->id ) }}">
        @csrf
        <!-- Name -->
            <div class="mt-4">
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{old('name', $poppoint->name)}}" required autofocus />
            </div>

            <div class="mt-4">
                <x-label for="address" :value="__('Address')" />

                <x-input id="address" class="block mt-1 w-full" type="text" name="address" value="{{old('address', $poppoint->address)}}" required autofocus />
            </div>

            <div class="mt-4">
                <x-label for="type" :value="__('Type')" />

                    <select name="type" id="type" class="block mt-1 w-full" required autofocus>
                        <option value="pop"> pop </option>
                        <option value="point"> point </option>
                    </select>
            </div>



            <!-- Confirm Password -->
{{--            <div class="mt-4">--}}
{{--                <x-input for="service_id" :value="__('Service')" />--}}

{{--                <select data-live-search="true" name="service">--}}

{{--                </select>--}}

{{--            </div>--}}

            <div>
                <br>
            </div>

            <div style="display:flex;justify-content:space-between ">
                {{--                <x-button  >--}}
                {{--                    {{ __('Delete') }}--}}
                {{--                </x-button>--}}
                {{--            <x-button class="ml-5">--}}
                {{--                    {{ __('Edit') }}--}}
                {{--                </x-button>--}}
                <x-button class="mr-5">
                    {{ __('Create') }}
                </x-button>
            </div>



            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
