document.addEventListener('livewire:init', function () {
    Livewire.on('alerta', function (data) {
        Swal.fire({
            icon: data[0].icon,
            title: data[0].mensagem,
            toast: data[0].toast ? data[0].toast : true,
            position: data[0].position ? data[0].position : 'top-end',
            showConfirmButton: data[0].btn  ? data[0].btn : false,
            timer: data[0].tempo ? data[0].tempo : 2000
        });
    });
});