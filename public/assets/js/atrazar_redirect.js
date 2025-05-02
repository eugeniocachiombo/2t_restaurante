document.addEventListener('livewire:init', function () {
    Livewire.on('atrazar_redirect', function (data) {
        setTimeout(() => {
            window.location = data[0].path
        }, data[0].time);
    });
});