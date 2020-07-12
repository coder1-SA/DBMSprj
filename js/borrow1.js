let a = document.querySelectorAll('.issues'); 
let timeout = document.querySelector('.para');

function render(x){
    data = {
      "name" : x,
    }
     $.ajax({
       url: 'test.php',
       data: data,
       success : function(data){         
        data_json = JSON.parse(data);  
        console.log(data_json);
        html= `<p class="para" style="margin-left:500px;margin-top:30px;color:red;font-size:20px">${data_json.name}</p>`;
        $("#para").html(html);
         
       }
     });
    }
  
  for(let i=0;i<a.length;i++){
      a[i].addEventListener('click',e=>{
          let x = a[i].id;
          render(x);
      })
  }