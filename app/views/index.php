<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>App Personas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
    <main class="container  mt-4 row justify-content-center">

        <section class="col-md-6 col-lg-6 col-sm-12">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card ">
                        <div class="card-header text-bg-primary p-2">
                            <h2 class="text-center  text-white">Registrar</h1>
                        </div>
                        <div class="card-body">
                            <form id="formPersona" action="javascript:void(0);" onsubmit="app.guardar()">
                                <div class="mb-3 visually-hidden">
                                    <input type="number" class="form-control" id="id">
                                </div>
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombre"  required
                                        autofocus>
                                </div>
                                <div class="mb-3">
                                    <label for="apellido" class="form-label">Apellido</label>
                                    <input type="text" id="apellido"  class="form-control" required
                                        autofocus>
                                </div>
                                <div class="mb-3">
                                    <label for="edad" class="form-label">Edad</label>
                                    <input type="number" min="16" max="99" class="form-control" id="edad"
                                        required autofocus>
                                </div>
                                <div class="d-grid gap-2 p-3">
                                <button type="submit" class="btn btn-outline-success">Guardar</button>
                                    <button type="reset" class="btn btn-secondary">Cancelar</button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="col-md-6 col-lg-6 col-sm-12">
            <table class="table mt-5">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Edad</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody id="tbody">

                </tbody>
            </table>
        </section>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
        crossorigin="anonymous"></script>
    <script src="../assets/code.js"></script>
</body>

</html>
