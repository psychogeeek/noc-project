
<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
           <h5>Create Service Type Form</h5>
        </x-slot>
<head>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>


        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

{{--        {{dd($customers)}}--}}

        <form method="POST" action="{{ route('store_service') }}">
        @csrf
        <!-- Name -->
            <div class="mt-4">
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('first_name')" required autofocus />
            </div>

            <div class="mt-4">
                <x-label for="address" :value="__('Address')" />

                <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autofocus />
            </div>

            <div>
                <br>
            </div>

{{--            <label for="id_label_single1">--}}
{{--                    <x-label for="customers" :value="__('Customer')"/>--}}
{{--                <select name="customers" id="customers" class="customers js-states form-control js-example-responsive input-lg" style="width: 100%" >--}}
{{--                    <option value="">Select</option>--}}

{{--                    @foreach($customers as $customer)--}}
{{--                        <option value="{{$customer->id}}">{{$customer->name}} </option>--}}
{{--                    @endforeach--}}

{{--                </select>--}}
{{--            </label>--}}

{{--            <div>--}}
{{--                <br>--}}
{{--            </div>--}}

{{--            <label for="id_label_single1">--}}
{{--                <x-label for="customers" :value="__('Customer')"/>--}}
{{--                <select name="customers" id="customers"  style="width: 100%" >--}}
{{--                    <option value="">Select</option>--}}

{{--                    @foreach($customers as $customer)--}}
{{--                        <option value="{{$customer->id}}">{{$customer->name}} </option>--}}
{{--                    @endforeach--}}

{{--                </select>--}}
{{--            </label>--}}

{{--            <div>--}}
{{--                <br>--}}
{{--            </div>--}}

            <label for="id_label_single">
                <x-label for="customers" :value="__('Customer')"/>

                <select name="customer_id" id="customer" class="customers js-states form-control js-example-responsive input-lg dynamic" style="width: 100%" >
                    <option value="">Select</option>
                    @foreach($customers as $customer)
                        <option value="{{$customer->id}}">{{$customer->first_name . ' ' .$customer->last_name}} </option>
                    @endforeach
                </select>
            </label>

            <div>
                <br>
            </div>

            <label for="id_label_single">
                    <x-label for="servicetype" :value="__('Service Type')"/>

                    <select name="service_type_id" id="service_type_id" class="types js-states form-control js-example-responsive input-lg dynamic" style="width: 100%" data-dependent ="pop_point_id" >
                        <option value="">Select</option>
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

                <select name="pop_point_id" id="pop_point_id" class="type js-states form-control js-example-responsive input-lg" style="width: 100%" >
                    <option value="">Select</option>
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
        <script>
            $(document).ready(function() {
                $('.type').select2();
            });
        </script>

        <script>
            $(document).ready(function() {
                $('.customers').select2();
            });
        </script>


        <script>
            $(document).ready(function(){

                $('.dynamic').change(function(){

                    if($(this).val() != ''){
                        var select = $(this).attr("id");
                        var value = $(this).val();
                        var dependent = $(this).data('dependent');
                        var _token = $('input[name="_token"]').val();
                        console.log(select,value,dependent)
                        $.ajax({
                            url:"{{ route('fetch_service') }}",
                            method:"POST",
                            data:{
                                select:select,
                                value:value,
                                _token:_token,
                                dependent:dependent},

                            success:function(result)
                            {
                                $('#'+dependent).html(result);
                                // alert(result);
                            }

                        })
                    }
                });


            });

            $('#service_type_id').change(function(){
                $('#pop_point_id').val('');

            });
        </script>








    </x-auth-card>
</x-guest-layout>
