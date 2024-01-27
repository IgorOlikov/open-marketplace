


fetch('http://api.localhost/api')
    .then(data => {
        return data.json();
    })
    .then(data => {
        console.log(data);
    });