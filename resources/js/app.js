import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;
import './chart/charts'

document.addEventListener('DOMContentLoaded', function () {
    const upperDiv = document.querySelector('.upper');
    if(upperDiv === null){
        return;
    }
    upperDiv.addEventListener('click', function () {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    const yearSelect = document.getElementById('year');
    if(yearSelect === null){
        return;
    }
    yearSelect.addEventListener('change', function () {
        const selectedYear = this.value;
        window.location.href = `/dashboard/${selectedYear}`;
    });
     $(document).ready(function () {
        $('#partner_id').select2({
            placeholder: 'Keress partnerre',
            allowClear: true
        });
    });
});