<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="content">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Dependent AJAX Dropdown Tutorial</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <h2 class="mb-4">Laravel AJAX Dependent Country State City Dropdown Example</h2>
                <form>
                    <div class="form-group mb-3">
                        <select  id="branch" class="form-control">
                            <option value="">Select Country</option>
                            @foreach ($branches as $data)
                            <option value="{{$data->id}}">
                                {{$data->name}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <select id="company" class="form-control">
                        </select>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#branch').on('change', function () {
                var branch_id = this.value;
                $("#company").html('');
                $.ajax({
                    url: "{{url('api/fetch-states')}}",
                    type: "POST",
                    data: {
                        branch_id: branch_id,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#company').html('<option value="">Select State</option>');
                        $.each(result.client_company, function (key, value) {
                            $("company").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });
            
        });
    </script>
</body>
</html>