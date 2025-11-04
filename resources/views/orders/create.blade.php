@extends('layouts.app')

@section('post_head')
<style>
    body{
        margin-top:20px;
        background-color: #f8f9fa !important;
        }
        .accordion-style .card {
            background: transparent;
            box-shadow: none;
            margin-bottom: 15px;
            margin-top: 0 !important;
            border: none;
        }
        .accordion-style .card:last-child {
            margin-bottom: 0;
        }
        .accordion-style .card-header {
            border: 0;
            background: none;
            padding: 0;
            border-bottom: none;
        }
        .accordion-style .btn-link {
            color: #f99218;
            position: relative;
            display: block;
            width: 100%;
            text-align: left;
            white-space: normal;
            box-shadow: none;
            padding: 15px 55px;
            text-decoration: none;
        }
        .mx-auto {
            margin-right: auto !important;
            margin-left: auto !important;
        }
        .rounded {
            border-radius: 0.25rem !important;
        }
        img {
            max-width: 100%;
            height: auto;
            vertical-align: top;
        }
        .accordion-style .btn-link:hover {
            text-decoration: none;
        }
        .accordion-style .btn-link.collapsed {
            color: #575a7b;
        }
        .accordion-style .btn-link.collapsed:after {
            content: "+";
            position: absolute;
            top: 50%;
            left: 0;
            font-size: 1rem;
            color: #f99218;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            transform: translateY(-50%);
            box-shadow: 8px 8px 30px 0 rgba(0, 0, 0, 0.12);
        }
        .accordion-style .btn-link:after {
            content: "-";
            position: absolute;
            top: 50%;
            left: 0;
            font-size: 1rem;
            color: #fff;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #f99218;
            display: flex;
            align-items: center;
            justify-content: center;
            transform: translateY(-50%);
            box-shadow: 8px 8px 30px 0 rgba(0, 0, 0, 0.12);
        }
        .accordion-style .card-body {
            padding-top: 0px;
            padding-left: 3.5rem;
            padding-bottom: 0;
        }
        .accordion-style .card-body:before {
            position: absolute;
            content: "";
            border-style: dashed;
            border-width: 0 0 0 1.2px;
            border-color: #f99218;
            left: 20px;
            top: 0;
            z-index: 1;
            bottom: 0;
        }
        #carrusel_imagenes{
            display:none;
        }
        #images{
            display: none;
        }
        .carousel-item img{
            border-radius: 5px;
        }
        .btn-upload{
            background-color: #0d6efd;
            color:white;
            border: none;
            padding: 10px 18px;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            transition: 0.3s
        }
        .btn-upload:hover{
            background-color: #0b5ed7
        }
        .error_message{
            color:red;
            font-weight: bold;
        }
        @media screen and (max-width: 767px) {
            .accordion-style .btn-link {
                padding: 15px 40px 15px 55px;
            }
        }
        @media screen and (max-width: 575px) {
            .accordion-style .btn-link {
                padding: 15px 30px 15px 55px;
            }
        }
</style>
    
@endsection
@section('content')


<div class="container">
    <div class="row align-items-center">

        <div class="col-lg-6 mb-4 mb-lg-0">
            
            <div id="carrusel_imagenes" class="mx-auto text-center mb-4">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner" id="carrusel_inner_container">
                        
                      
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                    </div>
            </div>

            <div class="mx-auto text-center" id="errors">

            </div>
            <div class="mx-auto text-center">
                <label for="images" class="btn-upload"> 
                    <i class="bi bi-upload">Seleccionar imágenes</i>
                </label>
                <input type="file" id="images" name="images[]" multiple accept="image/*">
            </div>
        </div>

        
        <div class="col-lg-6">
            <div class="ps-lg-6 ps-xl-10 w-lg-90">
                <div class="mb-4">
                    <div class="main-title title-left">Getting a Loan<span class="line-left"></span></div>
                    <h2 class="w-90">The greater part of the people trust on us</h2>
                </div>
                <p class="mb-4">
                    There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.
                </p>



                <div id="accordion" class="accordion-style">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">How quick will my credit be subsidized?</button>
                            </h5>
                        </div>
                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-bs-parent="#accordion" style="">
                            <div class="card-body position-relative">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.There are many variations
                                of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">What is outsourced financial support?</button>
                            </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-bs-parent="#accordion">
                            <div class="card-body position-relative">
                                It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here,
                                content here', making it look like readable English.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">How long is an affirmed financing cost and credit offer substantial?</button>
                            </h5>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-bs-parent="#accordion">
                            <div class="card-body position-relative">
                                Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident,
                                sometimes on purpose (injected humour and the like).
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingFour">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">What sorts of commercial enterprise financing do you offer?</button>
                            </h5>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-bs-parent="#accordion">
                            <div class="card-body position-relative">
                                It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingFive">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">How might I roll out an improvement to my application?</button>
                            </h5>
                        </div>
                        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-bs-parent="#accordion">
                            <div class="card-body position-relative">
                                All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, Making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to
                                generate Lorem Ipsum which looks reasonable.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
    </div>
</div>
<script>
    const carrusel_imagenes = document.getElementById('carrusel_imagenes');
    const carrusel_inner_container = document.getElementById('carrusel_inner_container');
    const file_allow = ["image/jpeg","image/jpg","image/png"];
    const container_errors = document.getElementById('errors');
    const TAM_MAX = 6250000 //bytes
    document.getElementById('images').addEventListener('change',(e)=>{
        const files = Array.from(e.target.files)
        const validFiles = files.filter(file => {
            if(file.size <= TAM_MAX /*Verificar tipo de fichero*/ ){
                return true;
            }else{
                const p = document.createElement('p');
                p.classList.add("error_message");
                p.textContent = "Imagen no válida: "+file.name+", se ha ignorado en el carrusel.";
                container_errors.appendChild(p);
                return false;
            }
        })
        if(validFiles.length > 0){
            validFiles.forEach((file,index)=> {
                //file_allow.
                const reader = new FileReader();
                reader.onload = function(event){
                    const div = document.createElement('div')
                    div.classList.add("carousel-item")
                    if(index==0){
                        div.classList.add("active")
                    }
                    div.innerHTML = `<img src="${event.target.result}" class="d-block w-100" alt="${file.name}">`
                
                    
                    carrusel_inner_container.appendChild(div);
                }
                reader.readAsDataURL(file)

            });
            
            carrusel_imagenes.style.display = "block";
            const dataTransfer = new DataTransfer();
            validFiles.forEach(file => dataTransfer.items.add(file));
            e.target.files = dataTransfer.files;

            console.log(e.target.files)

        }else{
             
           alert('Debes sunir al menos una imagen!'); 
        }
       


      //  e.target.files
    })



</script>

@endsection

