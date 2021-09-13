const deleteButtons = document.querySelectorAll('.delete-btn');
const formInput = document.querySelector('.modal-footer form input');
const modalHeaderCar = document.querySelector('.car .modal-header h4');
const modalHeaderMan = document.querySelector('.man .modal-header h4');
const modalHeaderFeature = document.querySelector('.feature .modal-header h4');


deleteButtons.forEach( function (elem) {
    elem.addEventListener('click', function (event) {
        let id = event.target.dataset.id;
        let name = event.target.dataset.name;

        formInput.setAttribute('value', `${id}`);

        if(modalHeaderCar) {
            let year = event.target.dataset.year;
            modalHeaderCar.innerHTML = `Delete Car: ${name} ${year}`;
        }
        if(modalHeaderMan) modalHeaderMan.innerHTML = `Delete Manufacturer: ${name}`;
        if(modalHeaderFeature) modalHeaderFeature.innerHTML = `Delete Feature: ${name}`;
    });
});
