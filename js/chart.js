function loaded(){

    //data
    const data = {
        
            labels: ['January', 'February', 'March', 'April','May', 'June', 'July ', 'August','September', 'October', 'November', 'December'],
            datasets: [{
                label: 'Percentage performance of staff by this month',
                data: [<?php echo $data1; ?>],
                backgroundColor: [
                    '#DEA26A',
                    '#DEA26A',
                    '#DEA26A',             
                    '#DEA26A',
                    '#DEA26A',
                    '#DEA26A',
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
        
        labels: ['January', 'February', 'March', 'April','May', 'June', 'July ', 'August','September', 'October', 'November', 'December'],
        datasets: [{
            label: 'new joining',
            data: [<?php echo $data2; ?>],
            backgroundColor: [
                    '#DEA26A',
                    '#DEA26A',
                    '#DEA26A',             
                    '#DEA26A',
                    '#DEA26A',
                    '#DEA26A',
                    '#DEA26A',             
                    '#DEA26A',
                    '#DEA26A',
                    '#DEA26A',
                    '#DEA26A',             
                    '#DEA26A'
                ],
        }, {
            label: 'out',
            data: [28, 48, 40, 19, 96, 27, 100],
            backgroundColor: [
                    '#22223b',
                    '#22223b',
                    '#22223b',             
                    '#22223b',
                    '#22223b',
                    '#22223b',
                    '#22223b',             
                    '#22223b',
                    '#22223b',
                    '#22223b',
                    '#22223b',             
                    '#22223b'
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