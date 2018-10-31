@extends('layout.app')
@section('title', 'Registro')
@section('content')
<main class="grey lighten-4">
    <div class="container wow fadein">
         <div class="row d-flex justify-content-center">
            <div class="col-md-8 col-sm-12">
                        </br>
                <form class="text-center border border-light p-5 white">

                <p class="h4 mb-4">Registro</p>

                <div class="form-row mb-4">
                    <div class="col">
                        <!-- First name -->
                        <input type="text" id="nombres" class="form-control" placeholder="Nombres" required />
                    </div>
                    <div class="col">
                        <!-- Last name -->
                        <input type="text" id="apellidos" class="form-control" placeholder="Apellidos" required /> 
                    </div>
                </div>
                <input type="text" id="dni" class="form-control" placeholder="DNI/Cédula" aria-describedby="defaultRegisterFormPhoneHelpBlock" required/>
                </br>

                <!-- E-mail -->
                <input type="email" id="email" class="form-control mb-4" placeholder="Correo Electrónico" required/>

                <!-- Password -->
                <input type="password" id="contraseña" class="form-control" placeholder="Contraseña" aria-describedby="defaultRegisterFormPasswordHelpBlock" required/>
                <input type="password" id="contraseña2" class="form-control" placeholder="Repetir contraseña" aria-describedby="defaultRegisterFormPasswordHelpBlock" required />
                <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                    Al menos 8 caracteres y 1 dígito
                </small>
                

                <!-- Phone number -->
                <input type="tel" id="telefono" class="form-control" placeholder="Número Telefónico" aria-describedby="defaultRegisterFormPhoneHelpBlock" required />
               

                <!-- Newsletter -->
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="boletin" checked>
                    <label class="custom-control-label" for="boletin">Suscríbite a nuestro boletin de noticias</label>
                </div>

                <!-- Sign up button -->
                <button class="btn btn-primary my-4 btn-block" type="submit">Regístrate</button>

                <!-- Social register -->
               <!--  <p>or sign up with:</p>

                <a type="button" class="light-blue-text mx-2">
                    <i class="fa fa-facebook"></i>
                </a>
                <a type="button" class="light-blue-text mx-2">
                    <i class="fa fa-twitter"></i>
                </a>
                <a type="button" class="light-blue-text mx-2">
                    <i class="fa fa-linkedin"></i>
                </a>
                <a type="button" class="light-blue-text mx-2">
                    <i class="fa fa-github"></i>
                </a>

                <hr> -->

                <!-- Terms of service -->
                <p>Al hacer clic en 
                    <em>Registrarse </em> estas aceptando nuestros                    
                    <a href="" target="_blank">términos de servicio</a>. </p>

                </form>
                <!-- Default form register -->
            </div>           
         </div>
    </div>
</main>
@endsection
