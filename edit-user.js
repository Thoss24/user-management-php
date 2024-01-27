document.addEventListener("DOMContentLoaded", () => {
    $('#edit-user-form').on('submit', (e) => {

        e.preventDefault()
    
        const name = $('#edit-name')[0].value
        const email = $('#edit-email')[0].value
        const position = $('#edit-position')[0].value

        const url = window.location.href
    
        const id = url.substring(url.indexOf('?') + 1)
    
        const user = {
            name,
            email,
            position,
            id
        };
    
        $.ajax({
            type: 'PATCH',
            url: 'api.php',
            data: JSON.stringify(user)
        })

        window.location = 'http://localhost/user_management_php/'
      })    
});
  