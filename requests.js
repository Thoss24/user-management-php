document.addEventListener("DOMContentLoaded", () => {

    // delete user request handler
    $(".delete-button").each((i, obj) => {
        obj.addEventListener('click', (e) => {
            const id = $(".delete-button").parent().parent()[i].id;
            $.ajax({
                type: 'DELETE',
                url: 'api.php',
                data: JSON.stringify(id),
            })
            location.reload()
        })
    });

   // add new user to db request handler
   $('#new-user-form').on('submit', (e) => {
        e.preventDefault()
        const formData = new FormData(e.target)
        const formValues = Object.fromEntries(formData)
        
        const user = {
            name: formValues.name,
            email: formValues.email,
            position: formValues['select-position']
        };

        $.ajax({
            type: 'POST',
            url: 'api.php',
            data: JSON.stringify(user),
        })

       $('#new-user-form').trigger("reset");

       location.reload()
   });

   // edit user handler
   $(".edit-button").each((i, obj) => {
        obj.addEventListener('click', (e) => {
            const id = $(".edit-button").parent().parent()[i].id;
            window.location.href = `edit-user.php${"?" + id}`
        })
   });

});