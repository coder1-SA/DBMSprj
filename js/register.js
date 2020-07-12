let input = document.querySelectorAll('.input');
let sub = document.querySelector('.submit');

const fun = async (data)=>{
    fetch("./register.php",{
        method : "POST",
        headers:{
            'Content-Type': 'application/json',
        },
        body : JSON.stringify(data)
    })
    .then(response=>{
        return response.json();
    })
    .then(dta=>{
        console.log(dta);
    })
    .catch(err=>{
        console.log(err);
    })
}

sub.addEventListener(()=>{
    const data = {
        name:
    }
})