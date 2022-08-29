const app = new (function () {
  this.tbody = document.getElementById("tbody");
  this.id = document.getElementById("id");
  this.nombre = document.getElementById("nombre");
  this.apellido = document.getElementById("apellido");
  this.edad = document.getElementById("edad");
  this.formPersona = document.getElementById("formPersona");

  this.guardar = () => {
    let form = new FormData();
    form.append("nombre", this.nombre.value);
    form.append("apellido", this.apellido.value);
    form.append("edad", +this.edad.value);

    if (this.id.value === "") {
      fetch("../controllers/guardar.php", {
        method: "POST",
        body: form,
      })
        .then((res) => res.json())
        .then((data) => {
          if (data.respuesta === 1) {
            this.formPersona.reset();
            this.listado();
          } else {
            console.log("error en guardar persona");
          }
        })
        .catch((e) => console.log("error en guardar"));
    } else {
      form.append("id", this.id.value);
      this.actualizar(form);
    }
  };

  this.actualizar = (formData) => {
    fetch("../controllers/actualizar.php", {
      method: "POST",
      body: formData,
    })
      .then((res) => res.json())
      .then((data) => {
        if (data.respuesta === 1) {
          this.formPersona.reset();
          this.listado();
        } else {
          console.log("error en editar persona");
        }
      })
      .catch((e) => console.log("error en editar"));
  };

  this.listado = () => {
    fetch("../controllers/listado.php")
      .then((res) => res.json())
      .then((data) => {
        this.tbody.innerHTML = "";

        data.forEach((item, i) => {
          let persona = `
          <tr>
            <th scope="row">${i + 1}</th>
            <td>${item.nombre}</td>
            <td>${item.apellido}</td>
            <td>${item.edad}</td>
            <td>
                <button class="btn btn-sm btn-warning" onclick="app.editar(${
                  item.id
                })">Editar</button>
                <button class="btn btn-sm btn-danger" onclick="app.eliminar(${
                  item.id
                })">Eliminar</button>
            </td>
         </tr>`;

          this.tbody.innerHTML += persona;
        });
      })
      .catch((e) => console.log("error en listado"));
  };

  this.editar = (id) => {
    console.log("editando: ", id);
    let form = new FormData();
    form.append("id", id);

    fetch("../controllers/editar.php", {
      method: "POST",
      body: form,
    })
      .then((res) => res.json())
      .then((data) => {
        console.log(data);
        this.id.value = data.id;
        this.nombre.value = data.nombre;
        this.apellido.value = data.apellido;
        this.edad.value = data.edad;
      })
      .catch((e) => console.log("error en editar"));
  };

  this.eliminar = (id) => {
    let form = new FormData();
    form.append("id", id);

    fetch("../controllers/eliminar.php", {
      method: "POST",
      body: form,
    })
      .then((res) => res.json())
      .then((data) => {
        console.log(data.respuesta);
        if (data.respuesta === 1) {
          this.listado();
        } else {
          console.log("error al eliminar");
        }
      })
      .catch((e) => console.log("error en eliminar"));
  };
})();

app.listado();
