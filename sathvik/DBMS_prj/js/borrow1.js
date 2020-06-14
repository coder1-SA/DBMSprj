let a = document.querySelectorAll('.issues');  
console.log(a);
function render(x){
    let ent=prompt("enter id",);
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
  
  
  for(let i=0;i<a.length;i++){
      a[i].addEventListener('click',e=>{
          let x = a[i].id;
          console.log(1);
          render(x);
          e.target.value="issued"
      })
  }