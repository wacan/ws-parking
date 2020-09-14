@extends('layouts.app')

@section('content')
<div class="row">
    <div class="panel panel-default">
        <div class="panel-heading">           
            <strong>
                <span class="glyphicon glyphicon-th"></span>
                 <span>Agregar usuario</span>
            </strong>                
        </div>
        <div class="col-sm-6">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                         @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif   
        </div>
        <div class="panel-body">
            <div class="col-md-12">    
                <form action="/usuarios" method="POST" enctype="multipart/form-data" >
                        @csrf <!--este codiguito es el token-->
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Nombres</label>
                                <input type="text" class="form-control" name="name" placeholder="Escribir nombres">
                            </div>           
                            <div class="form-group col-md-6">
                                <label>Apellidos</label>
                                <input type="text" class="form-control" name="lastname" placeholder="Escribir apellidos">
                            </div>
                        </div>    
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>password</label>
                                <input type="password" class="form-control" name="password" placeholder="Escriba una contraseña">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Confirmar password</label>
                                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirmar contraseña">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Estado</label>
                                <select name="estado" class="form-control" required>
                                    <option selected disable>Seleccione un estado...</option>
                                    <option value="1">Activo</option>
                                    <option value="0">Inactivo</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Nombre de usuario</label>
                                <input type="text" name="userName" class="form-control" placeholder="Escriba un nombre de usuario">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Rol</label>
                                <select name="rol" class="form-control" required>
                                    <option selected disable>Seleccione un rol...</option>
                                    @foreach($roles as $role)
                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Registrar</button>
                        <button type="button" onclick="location='{{ url('/usuarios') }}'" class="btn btn-danger">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection