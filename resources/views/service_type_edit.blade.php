<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
           <h5>Edit Pop and Point Form</h5>
        </x-slot>

        <head>

            <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
            <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        </head>

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

            <label for="id_label_single">

                <select name="info[]" id="pop_point" class="types js-states form-control js-example-responsive" style="width: 50%"  multiple="multiple">
                    @foreach($poppoints as $poppoint)
                        <option value="{{$poppoint->id}}">{{$poppoint->name . "-" . $poppoint->type}} </option>
                    @endforeach
                </select>

            </label>

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
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.types').select2();
            });
        </script>

    </x-auth-card>
</x-guest-layout>
