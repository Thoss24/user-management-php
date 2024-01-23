document.addEventListener("DOMContentLoaded", () => {
    $(".edit-button").each((i, obj) => {
        obj.addEventListener('click', (e) => {
            console.log($(".edit-button").parent()[i].id)
        })
    })

    // $(".edit-button").forEach((el) => el.addEventListener('click', () => {
    //     console.log(el)
    // }))
});