const disableAgent = e => {
    let id = e.getAttribute("data-id")
    $.ajax({
        url: "disableAgent",
        method: "POST",
        data: { id: id },
        success: function (response) {
            let data = JSON.parse(response)
            if (data.response === 200) {
                $("#agentData").load(location.href + ' #agentData');
            }
        }
    })
}

const enableAgent = e => {
    let id = e.getAttribute("data-id")
    $.ajax({
        url: "enableAgent",
        method: "POST",
        data: { id: id },
        success: function (response) {
            let data = JSON.parse(response)
            if (data.response === 200) {
                $("#agentData").load(location.href + ' #agentData');
            }
        }
    })
}