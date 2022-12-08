




function loaded(){

//data
const data = {
    
        labels: ['June', 'July', 'August', 'September', 'October', 'November'],
        datasets: [{
            label: '# of Votes',
            data: [12, 20, 3, 5, 2, 3],
            backgroundColor: [
                '#DEA26A',
                '#DEA26A',
                '#DEA26A',
                '#DEA26A',
                '#DEA26A',
                '#DEA26A'
            ],
            
            
        }]
    
};

const data2 = {
    
    labels: ['June', 'July', 'August', 'September', 'October', 'November'],
    datasets: [{
        label: '# of Votes',
        data: [12, 55, 3, 5, 2, 3],
        backgroundColor: [
            '#DEA26A',
            '#DEA26A',
            '#DEA26A',
            '#DEA26A',
            '#DEA26A',
            '#DEA26A'
        ],
        
        
    }]

};


//config

const config = {
    type: 'bar',
    data,
    options: {
        maintainAspectRatio: true,

        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
};

const config2 = {
    type: 'line',
    data: data2,
    options: {
        
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
};

//render init
const performanceChart = new Chart (
    document.getElementById('performanceChart'),
    config
    
    );


const hiresandquitChart = new Chart (
    document.getElementById('hiresandquitChart'),
    config2
        
    );

    

}