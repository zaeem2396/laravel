$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var table = $('#agentData').DataTable({
    "ajax": {
        url: "getAgentData",
        type: 'GET',
        dataSrc: "data",
        serverSide: true,
    }
});


const updateAgentStatus = e => {
    let id = e.getAttribute("data-id");
    let status = e.getAttribute("data-value");
    let btnid = e.getAttribute("id");
    let btnvalue = (status == '0' ? '1' : '0');
    let spanname = (status == '0' ? 'Deactivate' : 'Active');
    let previousbtnname = (status == '1' ? 'Activate' : 'Deactivate');
    let btnname = (status == '0' ? 'Activate' : 'Deactivate');
    let addclass = (status == '0' ? 'success' : 'danger');
    let removeclass = (status == '0' ? 'danger' : 'success');
    if (confirm("Are you sure ?")) {
        $.ajax({
            url: "/updateAgentStatus",
            method: "POST",
            data: { id, status },
            success: function (response) {
                let data = JSON.parse(response)
                if (data.status === 200) {
                    $(`#${btnid}`).attr('data-value', btnvalue);
                    $(`#span-${id}`).removeClass(`badge-${addclass}`);
                    $(`#span-${id}`).addClass(`badge-${removeclass}`);
                    $(`#span-${id}`).text(spanname);
                    $(`#${btnid}`).removeClass(`btn-${removeclass}`);
                    $(`#${btnid}`).addClass(`btn-${addclass}`);
                    $(`#${btnid}`).text(btnname);
                }
            }
        })
    } else {
        $(`#${btnid}`).text(previousbtnname);
    }
}