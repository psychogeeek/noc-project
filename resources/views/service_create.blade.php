
<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
           <h5>Create Service Type Form</h5>
        </x-slot>
<head>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>


        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('store_service_type') }}">
        @csrf
        <!-- Name -->
            <div class="mt-4">
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('first_name')" required autofocus />
            </div>

            <div class="mt-4">
                <x-label for="number" :value="__('Number')" />

                <x-input id="number" class="block mt-1 w-full" type="text" name="number" :value="old('last_name')" required autofocus />
            </div>

            <div>
                <br>
            </div>
                <label for="id_label_single">
                    <x-label for="servicetype" :value="__('Service Types')"/>
                    <select name="service_type" id="serviceType" class="types js-states form-control js-example-responsive input-lg dynamic" style="width: 100%" data-depndemt = "service_type" >
                        @foreach($servicetypes as $servicetype)
                            <option value="{{$servicetype->id}}">{{$servicetype->name}} </option>
                        @endforeach
                    </select>
                </label>

            <div>
                <br>
            </div>

            <label for="id_label_single">
                <x-label for="poppoint" :value="__('Pop and Point')" />
                <select name="info[]" id="pop_point" class="type js-states form-control js-example-responsive input-lg dynamic" style="width: 100%" >
                    @foreach($poppoints as $poppoint)
                        <option value="{{$poppoint->id}}">{{$poppoint->name . "-" . $poppoint->type}} </option>
                    @endforeach
                </select>

            </label>
                <div>
                    <br>


                </div>
{{--                <label for="id_label_multiple">--}}
{{--                    <select class="types js-states form-control js-example-responsive" style="width: 50%" id="id_label_multiple" multiple="multiple"> </select>--}}
{{--                </label>--}}

            <div>
                <br>
            </div>


            <div style="display:flex;justify-content:space-between ">

                <x-button class="mr-5">
                    {{ __('Create') }}
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








{{--        <script>--}}

{{--        $(document).ready(function() {--}}
{{--                $('.js-example-basic-multiple').select2();--}}
{{--            });--}}
{{--            $('#mySelect2').select2({--}}
{{--                dropdownParent: $('#myModal')--}}
{{--            });--}}
{{--            $('.js-example-basic-single').select2({--}}
{{--                placeholder: 'Select an option'--}}
{{--            });--}}

{{--            $(".js-example-disabled").select2();--}}
{{--            $(".js-example-disabled-multi").select2();--}}

{{--            $(".js-programmatic-enable").on("click", function () {--}}
{{--                $(".js-example-disabled").prop("disabled", false);--}}
{{--                $(".js-example-disabled-multi").prop("disabled", false);--}}
{{--            });--}}

{{--            $(".js-programmatic-disable").on("click", function () {--}}
{{--                $(".js-example-disabled").prop("disabled", true);--}}
{{--                $(".js-example-disabled-multi").prop("disabled", true);--}}
{{--            });--}}
{{--        </script>--}}





    </x-auth-card>
</x-guest-layout>
