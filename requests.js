document.addEventListener("DOMContentLoaded", () => {
  const getUsers = async () => {
    const response = await fetch(
      "http://localhost/user_management_php/api.php",
      {
        method: "GET",
      }
    );

    if (!response.ok) {
      throw new Error("Something went wrong!");
    }

    const data = await response.json();

    return data;
  };

  const displayUsers = async () => {
    const data = await getUsers();

    const position = $("#filter-users")[0].value;

    const list = $(".users-list");
    list.empty()

    const users =
      position === "All Staff"
        ? data
        : data.filter((user) => user.position === position);

    users.map((user) => {
      const list = $(".users-list")[0];
      const shell = $(`<div class="user-shell" id={${user.id}}></div>`);
      // name
      const name = $(`<p><strong>Name: </strong>${user.name}</p>`);
      shell.append(name);
      // email
      const email = $(`<p><strong>Email: </strong>${user.email}</p>`);
      shell.append(email);
      // position
      const position = $(`<p><strong>Position: </strong>${user.position}</p>`);
      shell.append(position);
      // last edited
      const lastEdited = $(
        `<p><strong>Last Edited: </strong>${user.last_edited}</p>`
      );
      shell.append(lastEdited);
      // edit & delete buttons
      const buttonContainer = $('<div class="btn-container"></div>');
      const editBtn = $('<button class="edit-button">Edit</button>');

      editBtn.on("click", (e) => {
        window.location = `edit-user.php?=${user.id}`;
      });

      const deleteBtn = $('<button class="delete-button">Delete</button>');
      deleteBtn.on("click", (e) => {
        const confirmDelete = window.confirm(
          `Delete '${user.name}' from database?`
        );

        if (confirmDelete) {
          $.ajax({
            type: "DELETE",
            url: "api.php",
            data: JSON.stringify(user.id),
          });
          location.reload();
        } else {
          return;
        }
      });

      buttonContainer.append(editBtn);
      buttonContainer.append(deleteBtn);
      shell.append(buttonContainer);
      //append child elements

      list.append(shell[0]);
    });
  };

  displayUsers();

  $('#filter-users').on('change', displayUsers)

  // add new user to db request handler
  $("#new-user-form").on("submit", (e) => {
    e.preventDefault();
    const formData = new FormData(e.target);
    const formValues = Object.fromEntries(formData);

    const user = {
      name: formValues.name,
      email: formValues.email,
      position: formValues["select-position"],
    };

    $.ajax({
      type: "POST",
      url: "api.php",
      data: JSON.stringify(user),
    });

    $("#new-user-form").trigger("reset");

    location.reload();
  });

  // edit user handler
  $('#edit-user-form').on('submit', (e) => {

    e.preventDefault()

    const name = $('#edit-name').value
    const email = $('#edit-email').value
    const position = $('#edit-position').value

    console.log(window.location.href)

    const user = {
        name,
        email,
        position
    };

    $.ajax({
        type: 'PATCH',
        url: 'api.php',
        data: JSON.stringify(user)
    })
  })

});
