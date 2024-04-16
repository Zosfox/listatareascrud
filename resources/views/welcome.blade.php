<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/646ac4fad6.js" crossorigin="anonymous"></script>
</head>

<body> 
    <h1 class="text-center">Lista de tareas</h1>    

    @if(@session('correcto'))
    <div class="alert alert-success">{{session("correcto")}}</div>        
    @endif

    @if(@session('incorrecto'))
    <div class="alert alert-danger">{{session("incorrecto")}}</div>        
    @endif


    <script>
        var res=function(){
            var not=confirm("Estas seguro que deseas eliminar esta tarea");
            return not
        }
    </script>

    <!-- Modal de insertar datos-->
    <div class="modal fade" id="insertarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Creación de tarea</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route("crud.create")}}"  method="post">
                    @csrf
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Id tarea</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtid">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Título tarea</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txttitulo">
                      </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Descripción tarea</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtdescripcion">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Estado tarea</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtestado">
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary">Crear</button>
                        </div>
                  </form>
            </div>
            
        </div>
        </div>
    </div>


    <div class="p-5 table-responsive">
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#insertarModal">Crear nueva tarea</button>
        <br><br>
        <table class="table table-striped tabled-bordered table-hover">
            <thead class="alert alert-success" role="alert" >
              <tr>
                <th scope="col">#Id</th>
                <th scope="col">Titulo</th>
                <th scope="col">Descripción</th>
                <th scope="col">Estado</th>
                <th scope="col">Fecha Creación</th>  
                <th scope="col">Fecha Actualización</th>  
                <th></th>  
              </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach($datos as $item)
                  <tr>
                    <th>{{$item->idTarea}}</th>
                    <td>{{$item->tituloTarea}}</td> 
                    <td>{{$item->descripcionTarea}}</td>
                    <td>{{$item->estadoTarea}}</td>
                    <td>{{$item->fechacreacionTarea}}</td>
                    <td>{{$item->fechaactualizacionTarea}}</td>
                    <td>
                        <a href="" data-bs-toggle="modal" data-bs-target="#editarModal{{$item->idTarea}}" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="{{route("crud.delete",$item->idTarea)}}" onclick="return res()" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                    </td>

                  
                    
                    <!-- Modal de editar datos-->
                    <div class="modal fade" id="editarModal{{$item->idTarea}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edición de tarea</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route("crud.update")}}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                      <label for="exampleInputEmail1" class="form-label">Id tarea</label>
                                      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtid" value={{$item->idTarea}}>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Título tarea</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txttitulo" value={{$item->tituloTarea}}>
                                      </div>
                                    <div class="mb-3">
                                      <label for="exampleInputEmail1" class="form-label">Descripción tarea</label>
                                      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtdescripcion" value={{$item->descripcionTarea}}>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Estado tarea</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtestado" value={{$item->estadoTarea}}>
                                    </div>
                                    
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <button type="button" class="btn btn-primary">Editar</button>
                                        </div>
                                  </form>
                            </div>
                            
                        </div>
                        </div>
                    </div>

                  </tr>
                    
                @endforeach
              
              
            </tbody>
          </table>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html> 
