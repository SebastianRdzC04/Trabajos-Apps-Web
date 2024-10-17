<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">IIIIIII ya mamaste</h4>
        <p>Que come caca, estas bloqueado porque no aceptamos a nacos aqui</p>
        <hr>
        <p class="mb-0">Igual Tkm cuidate mucho bais.</p>
        </div>
        <div class="text-end d-flex align-items-center">
          <form action="{{route('logout')}}" method="POST">
            @csrf
            <button type="submit" class="btn btn-secondary">Logout</button>
          </form>
        </div>
</body>
</html>