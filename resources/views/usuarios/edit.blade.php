@extends('layouts.app')

@section('content')
<div class="row">   
        <div class="panel-heading">
            <strong>
                <span class="glyphicon glyphicon-th"></span>
                EDITAR USUARIO: {{$user->name}}
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
            <form action="{{route('usuarios.update', $user->id)}}" method="POST" enctype="multipart/form-data">
                @method('PATCH')<!--este codiguito nos ayuda a actualizar directamente al metodo del cotrolador update-->
                @csrf <!--este codiguito es el token-->
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Nombres</label>
                        <input type="text" class="form-control"  value="{{$user->name}}" name="name" placeholder="Escribir nombre">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Apellidos</label>
                        <input type="text" class="form-control" value="{{$user->lastname}}" name="lastname" placeholder="Escribir  Apellidos">
                    </div>
                </div>    
                
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Estado</label>
                        <select name="estado" class="form-control">
                        @if($user['user_estado']===1)           
                        <option selected  value="1">Activo</option>          
                        <option value="0">Inactivo</option>
                        @else    
                            <option selected  value="0">Inactivo</option>
                            <option value="1">Activo</option>
                        @endif
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Nombre de usuario</label>
                        <input type="text" name="userName" class="form-control" value="{{$user->username}}">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Rol</label>
                        <select name="rol" class="form-control">
                            <option selected>Seleccione un rol...</option>
                            @foreach($roles as $role)
                                @if($role->name == str_replace(array('["', '"]'),'',$user->tieneRol()))    
                                    <option value="{{$role->id}}" selected>{{$role->name}}</option>
                                @else
                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Contraseña <span class="small">(Opcional)</span></label>
                        <input type="password" class="form-control" name="password" placeholder="Escriba una contraseña">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Confirmar Contraseña <span class="small">(Opcional)</span></label>
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Confirmar contraseña">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <button type="button" onclick="location='{{ url('/usuarios') }}'" class="btn btn-danger">Cancelar</button>
                    </div>
                </div>
            </form>
        </div>   
</div>
@endsection