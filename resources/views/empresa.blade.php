<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
   

    <br>
    <br>
    <div class="container">
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Crear Nuevo
      </button>

       <!-- Modal  CREAR NUEVO-->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Crear</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('guardar-empresa') }}" method="post">
            @csrf
        <div class="modal-body">
          <input class="form-control" name='razonsocial' placeholder='razonsocial' type="text"><br>
          @error('razonsocial')
             <div class="alert alert-danger">{{$message}}</div> 
          @enderror
          <input class="form-control" name='nit' placeholder='nit' type="text"><br>
          @error('nit')
          <div class="alert alert-danger">{{$message}}</div> 
       @enderror
          <input class="form-control" name='telefono' placeholder='telefono' type="text"><br> 
          @error('telefono')
          <div class="alert alert-danger">{{$message}}</div> 
       @enderror
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <br>
  <br>
    <div class="col-nd-6">
        <form  method="get" role="search">
            <div class="input-group">
                <input  class="form-control"type="text" name="buscar">
    <div class="input-group-append">
    <button type="submit" class="btn btn-primary">Buscar</button>
        </div>
    </div>
        </form>
</div>
      <table class="table caption-top">
        <caption></caption>
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">RAZON SOCIAL</th>
            <th scope="col">NIT</th>
            <th scope="col">TELEFONO</th>
            <th scope="col">ACCIONES</th>

          </tr>
        </thead>
        <tbody>
          @foreach ($data as $item)
          <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->razonsocial}}</td>
            <td>{{$item->nit}}</td>
            <td>{{$item->telefono}}</td>
            <td>
               <!-- Button trigger modal EDITAR -->
<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editarempresa{{$item->id}}">
  Editar
</button>
<!-- Modal EDITAR-->
<div class="modal fade" id="editarempresa{{$item->id}}" tabindex="-1" role='dialog' aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Empresa{{$item->id}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('modificar-empresa', ['id'=>$item->id]) }}" method="post">
      @csrf
      <div class="modal-body">
          <input class="form-control"  type="text" name='razonsocial' value="{{$item->razonsocial}}"><br>
          <input class="form-control"  type="text" name='nit' value="{{$item->nit}}"><br>
          <input class="form-control"  type="text" name='telefono' value="{{$item->telefono}}">
          <input class="form-control"  type="hidden" name='id' value="{{$item->id}}">


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Modificar</button>
      </div>
    </form>
    </div>
  </div>
</div>
<br>
<form action="{{ route('eliminar-empresa') }}" method="post">
  @csrf
  <input class="form-control"  type="hidden" name='id' value="{{$item->id}}">
<button type='submit' class="btn btn-danger">Eliminar
</button>
</form>
            </td>
          </tr>
          @endforeach
          
        </tbody>
      </table>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>

