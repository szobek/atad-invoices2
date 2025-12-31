import { bar_data, line_data,amount_data } from './datas.js'
const config_bar = {
    type: 'bar',
    data: bar_data,
    options: {
        plugins: {
            title: {
                display: true,
                text: 'Számlák és sztornó számlák havi bontásban',
            },
        },
        responsive: true,
        scales: {
            x: {
                stacked: true,
            },
            y: {
                stacked: true
            }
        }
    }
};

const config_line = {
    type: 'line',
    data: line_data,
    options: {
        plugins: {
            title: {
                display: true,
                text: 'Számlák és sztornó számlák havi bontásban',
            },
        },
        responsive: true,

    }
}

const config_amount = {
    type: 'bar',
    data: amount_data,
    options: {
        plugins: {
            title: {
                display: true,
                text: 'Számlák és sztornó számlák összege havi bontásban',
            },
        },
        responsive: true,
        scales: {
            x: {
                stacked: true,
            },
            y: {
                stacked: true
            }
        }
    }
};

export {config_bar, config_line, config_amount}