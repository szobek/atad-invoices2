import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;
import './chart/charts'
import $ from 'jquery';
window.$ = window.jQuery = $;

document.addEventListener('DOMContentLoaded', function () {
    const upperDiv = document.querySelector('.upper');
    if (upperDiv !== null) {
        upperDiv.addEventListener('click', function () {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    const yearSelect = document.getElementById('year');
    if (yearSelect !== null) {
        yearSelect.addEventListener('change', function () {
            const selectedYear = this.value;
            window.location.href = `/dashboard/${selectedYear}`;
        });
    }
    
    const partnerSelect = document.getElementById('partner_id');
    const userSelect = document.getElementById('user_id');
    
    if (partnerSelect !== null || userSelect !== null) {
        const link = document.createElement('link');
        link.rel = 'stylesheet';
        link.href = 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css';
        document.head.appendChild(link);
        
        const script = document.createElement('script');
        script.src = 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js';
        script.onload = function() {
            
            if (partnerSelect !== null) {
                $(partnerSelect).select2({
                    placeholder: 'Keress partnerre',
                    allowClear: true,
                    width: '100%',
                    language: {
                        noResults: function() {
                            return "Nincs találat";
                        },
                        searching: function() {
                            return "Keresés...";
                        }
                    }
                });
            }
            
            if (userSelect !== null) {
                $(userSelect).select2({
                    placeholder: 'Keress értékesítőre',
                    allowClear: true,
                    width: '100%'
                });
            }
            
        };
        document.body.appendChild(script);
    }
});