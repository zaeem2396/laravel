<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <title>Dashboard</title>
</head>

<body>
    <div class="container mt-5" id="tableData">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Agent code</th>
                    <th scope="col">Agent name</th>
                    <th scope="col">Working area</th>
                    <th scope="col">Commission</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                $x = 1;
                foreach($agents as $agent) :
                @endphp
                <tr>
                    <th scope="row">{{ $x++ }}</th>
                    <td>{{ $agent->AGENT_CODE }}</td>
                    <td>{{ $agent->AGENT_NAME }}</td>
                    <td>{{ $agent->WORKING_AREA }}</td>
                    <td>{{ $agent->COMMISSION }}</td>
                    <td>{{ $agent->PHONE_NO }}</td>
                    <td>
                        @if($agent->STATUS == '1')
                        <button data-id="{{ $agent->AGENT_CODE }}" type="button" onclick="disableAgent(this)" class="btn btn-sm btn-danger">Disable</button>
                        @else
                        <button data-id="{{ $agent->AGENT_CODE }}" type="button" onclick="enableAgent(this)" class="btn btn-sm btn-primary">Enable</button>
                        @endif
                    </td>
                </tr>
                @php
                endforeach;
                @endphp
            </tbody>
        </table>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    const disableAgent = e => {
        let id = e.getAttribute("data-id")
        $.ajax({
            url: "{{ URL::to('/disableAgent') }}",
            method: "POST",
            data: {
                id: id
            },
            success: function(response) {
                let data = JSON.parse(response)
                if (data.status === 200) {
                    document.getElementById("tableData")
                    $("#tableData").load(location.href + ' #tableData');
                }
            }
        })
    }

    const enableAgent = e => {
        let id = e.getAttribute("data-id")
        $.ajax({
            url: "{{ URL::to('/enableAgent') }}",
            method: "POST",
            data: {
                id: id
            },
            success: function(response) {
                let data = JSON.parse(response)
                if (data.status === 200) {
                    document.getElementById("tableData")
                    $("#tableData").load(location.href + ' #tableData');
                }
            }
        })
    }
</script>

</html>