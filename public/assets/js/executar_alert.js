document.addEventListener('livewire:init', function () {
    Livewire.on('alerta', function (data) {
        Swal.fire({
            icon: data[0].icon,
            title: data[0].title,
            html: data[0].html,
            showConfirmButton: data[0].btn ?? false,
           // timer: data[0].tempo ? data[0].tempo : 2000
        });
    });
});