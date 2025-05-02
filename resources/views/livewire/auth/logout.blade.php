@section('title', 'Terminar Sessão')
<style>
    .image-fluid{
        border-radius: 30px;
        animation: anime 2s infinite;
    }
    @keyframes anime{
        0%{
           opacity: 20%;
        }
        50%{
            opacity: 100%;
        }
        100%{
            opacity: 20%;
        }
    }
</style>
<div style="background: #000; min-width:inherit; min-height:100vh" 
class="container-fluid d-flex justify-content-center align-items-center" >
    <img class="image-fluid" style="width: 200px"
    src="{{ asset('assets/images/logo/logo_icon.png') }}" alt="#" />
</div>
