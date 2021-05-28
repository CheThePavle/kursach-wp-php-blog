document.addEventListener('DOMContentLoaded',function () {
    let qrEls = document.querySelectorAll('.qr-el');

    if(qrEls.length) {
        qrEls.forEach(el=> {
            new QRCode(el,{
                'text': window.location.href.split('?')[0],
                width : 150,
                height :150
            })
        });
    }
});