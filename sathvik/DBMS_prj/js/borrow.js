let a = document.querySelectorAll('.issues');

function render(x){
  var ent=prompt("enter id",);
  data = {
    "name" : x,
    "ent" : ent
  }
   $.ajax({
     url: 'test.php',
     data: data,
     success : function(data){
        console.log(data);
     }

   });
}

for(let i=0;i<6;i++){
    a[i].addEventListener('click',e=>{
        var x = a[i].id;
        //console.log(x);
        render(x);
    })
}


