// глобальная переменная для хранения объекта лайтбокса
let lightBox = null;

// функция для возврата на один шаг назад в истории браузера
function goBack() {
    window.history.back();
}

// обработчик события загрузки страницы в браузер
document.addEventListener('DOMContentLoaded', function () {
    // подключение лайтбокса к изображениям в галерее фотографий
    if(document.querySelector('#LightBox')) {
        lightBox = new bootstrap.Modal("#LightBox");
        if (lightBox) {
            lightBox._element.addEventListener('hidden.bs.modal', event => {
                const lbBody = lightBox._element.querySelector('.modal-body .container-fluid');
                if (lbBody) {
                    const lbHeader = lightBox._element.querySelector('.modal-header h1');
                    if (lbHeader) {
                        lbHeader.innerText = "";
                    }
                    lbBody.innerHTML = "";
                }
            });
            const images = document.querySelectorAll('.card img');
            if (images) {
                Array.from(images).forEach(image => {
                    image.addEventListener('click', (evt) => {
                        evt.preventDefault();
                        evt.stopPropagation();
                        if (lightBox) {
                            const lbBody = lightBox._element.querySelector('.modal-body .container-fluid');
                            if(lbBody) {
                                const lbHeader = lightBox._element.querySelector('.modal-header h1');
                                if(lbHeader){
                                    lbHeader.innerText=image.alt;
                                }
                                lbBody.innerHTML='<img src="'+image.dataset.src+'" alt="'+image.alt+'"/>';
                                lightBox.show();
                            }
                        }
                    });
                });
            }
        }
    }

    // валидация для формы обратной связи
    var formPointer = document.querySelector('.col-12.needs-validation');
    const frm = document.querySelector('.needs-validation');
    const btn = document.querySelector('.needs-validation button[type="submit"]');
    if (frm && btn) {
        btn.addEventListener('click', (e) => {
            if (!frm.checkValidity()) {
                e.preventDefault();
                e.stopPropagation();
                frm.classList.add('was-validated');
                alert('This form contains some errors, please check and try again.');
            } else {
                frm.classList.add('was-validated');
                alert('Submit request, yes or no?');
            }
        });
    }

    // управление флажком gdpr в форме обратной связи
    const accept = document.getElementById('acceptGdpr'); // document.querySelector('#acceptGdpr ');
    const gdpr = document.getElementById('gdpr');
    if (accept && gdpr) {
        accept.addEventListener('click', () => {
            if (gdpr) {
                gdpr.checked = true;
            }
        });
    }
    const cancel = document.getElementById('cancelGdpr');
    if (cancel && gdpr) {
        cancel.addEventListener('click', () => {
            if (gdpr) {
                gdpr.checked = false;
            }
        });
    }
});

