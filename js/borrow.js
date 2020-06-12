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
if(a){
for(let i=0;i<6;i++){
    a[i].addEventListener('click',e=>{
        var x = a[i].id;
        //console.log(x);
        render(x);
    })
}
}




let a1 = document.querySelectorAll('.borrow');
console.log(a1);
function render1(x){
  data = {
    "name" : x
  }
   $.ajax({
     url: 'borrow1.php',
     data: data,
     success : function(data){
        console.log(data);
     }

   });
}

for(let i=0;i<4;i++){
    a1[i].addEventListener('click',e=>{
        var x = a[i].name;
        //console.log(x);
        render1(x);
    })
}
