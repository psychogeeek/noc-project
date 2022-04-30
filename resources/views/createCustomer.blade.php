<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
           <h5>Create Customer Form</h5>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('store_customer') }}">
        @csrf
        <!-- Name -->
            <div class="mt-4">
                <x-label for="first_name" :value="__('First Name')" />

                <x-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required autofocus />
            </div>

            <div class="mt-4">
                <x-label for="last_name" :value="__('Last Name')" />

                <x-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required autofocus />
            </div>

            <div class="mt-4">
                <x-label for="address" :value="__('Address')" />

                    <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autofocus />
            </div>

            <div class="mt-4">
                <x-label for="phone_number" :value="__('Phone Number')" />

                <x-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" :value="old('phone_number')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                         type="password"
                         name="password"
                         required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
{{--            <div class="mt-4">--}}
{{--                <x-label for="service_id" :value="__('Service')" />--}}

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
