document.addEventListener('livewire:load', function () {
    Livewire.on('alerta', function (data) {
        Swal.fire({
            icon: data.icon,
            title: data.mensagem,
            toast: data.toast ? data.toast : true,
            position: data.position ? data.position : 'top-end',
            showConfirmButton: data.btn  ? data.btn : false,
            timer: data.tempo ? data.tempo : 2000
        });
    });
});