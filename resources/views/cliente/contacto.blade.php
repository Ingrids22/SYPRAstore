@extends('cliente/plantilla/app')

@section('Titulo', 'SYPRA')

@section('contenido')

<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
<style>
    h1 {
        font-family: 'Montserrat';
        font-size: 3rem;
        color: #333;
        text-align: center;
    }

    .custom-form-container {
        background: #fff;
        padding: 2rem;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 600px;
        margin: 2rem auto;
        border: 2px solid #0f0265;
    }

    .custom-form-group {
        display: flex;
        flex-direction: column;
        margin-bottom: 1.5rem;
    }

    .custom-form-group label {
        margin-bottom: 0.5rem;
        font-weight: bold;
        color: #0f0265;
    }

    .custom-form-control {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #ccc;
        border-radius: 4px;
        transition: border-color 0.3s;
    }

    .custom-form-control:focus {
        border-color: #0f0265;
        box-shadow: 0 0 5px rgba(15, 2, 101, 0.5);
        outline: none;
    }

    .custom-form-control::placeholder {
        color: #aaa;
    }

    .custom-form-button {
        background: #0f0265;
        color: #fff;
        padding: 0.75rem 1.5rem;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s;
        font-size: 1rem;
        font-weight: bold;
    }

    .custom-form-button:hover {
        background: #ff0000;
    }

    .custom-form-title {
    font-size: 2rem;
    color: #0f0265;
    margin-bottom: 1.5rem;
    text-align: center;
}
</style>
<body
    style="background-image: url('https://http2.mlstatic.com/adesivo-de-parede-lavavel-liso-cor-azul-claro-310-x-058-D_NQ_NP_921758-MLB27046683137_032018-F.jpg'); background-size: cover; background-position: center;">
    <link href="assets/css/contactocss.css" rel="stylesheet" />
    <div class="container">
        <h1 class="text-center">¡Contáctanos!</h1>
        <hr>
    </div>
    <div class="row">
        <div class="col-sm-8">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3732.68049690535!2d-103.34408112621406!3d20.6825736995817!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428b1eea7495943%3A0xce930352bd12b1d9!2sC.%20Alameda%20402%2C%20El%20Retiro%2C%2044280%20Guadalajara%2C%20Jal.!5e0!3m2!1ses-419!2smx!4v1706242737050!5m2!1ses-419!2smx"
                width="100%" height="400" frameborder="0" allowfullscreen
                style="width: 100%; max-width: 800px; margin: 0 auto; padding: 20px; box-sizing: border-box;"></iframe>
        </div>
        <div class="col-sm-4" id="contact2">
            <h3>SYPRA</h3>
            <hr align="left" width="50%">
            <h4 class="pt-2">Ubicación</h4>
            <i class="fas fa-globe" style="color:#0f0265"></i> Alameda 402, El Retiro, Guadalajara, Jal.<br>
            <h4 class="pt-2">Contatti</h4>
            <i class="fas fa-phone" style="color:#0f0265"></i> <a href="tel:+"> 33 1617 7204 </a><br>
            <i class="fab fa-whatsapp" style="color:#0f0265"></i><a href="tel:+"> 33 3146 0241 </a><br>
            <h4 class="pt-2">Email</h4>
            <a href="mailto:ventas@sypra.com.mx">
                <i class="fa fa-envelope" style="color:#0f0265"></i> ventas@sypra.com.mx
            </a><br>
        </div>
    </div>

    <div class="custom-form-container">
        <h2 class="custom-form-title">Contáctanos</h2><br>
        <form>
            <div class="custom-form-group">
                <label for="customFormControlInput1">Email</label>
                <input type="email" class="custom-form-control" id="customFormControlInput1" placeholder="name@example.com">
            </div>
            <div class="custom-form-group">
                <label for="customFormControlSelect1">Motivo</label>
                <select class="custom-form-control" id="customFormControlSelect1">
                    <option>Atención personalizada</option>
                    <option>Dudas generales</option>
                    <option>Problemas de envío</option>
                    <option>Retraso del servicio</option>
                    <option>Presupuestos</option>
                </select>
            </div>
            <div class="custom-form-group">
                <label for="customFormControlTextarea1">Mensaje</label>
                <textarea class="custom-form-control" id="customFormControlTextarea1" rows="3"></textarea>
            </div>
            <button type="submit" class="custom-form-button">Enviar</button>
        </form>
    </div>
</body>

@endsection
