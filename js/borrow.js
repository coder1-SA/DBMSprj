let a1 = document.querySelectorAll(".submit_c");
let table = document.querySelector('#table');


function render(x){
  let ent=prompt("enter id",);

  data = {
    "name" : x,
    "ent" : ent,
  }
   $.ajax({
     url: 'test.php',
     data: data,
     success : function(data){
       console.log(data);
     }
   });
  }

function render_table(x){
  data1 = {
    "name" : x
  }
  
   $.ajax({
     url: 'table_server.php',
     data: data1,
     success : function(data1){   
       let data = $.parseJSON(data1);
       let html = '';
       console.log(data);
       for(let i = 0; i < data.length; i++){
           res_data = data[i];

            html+= `<tr><td>${res_data.book_name}</td><td>${res_data.publication}</td><td>${res_data.genere}</td><td>${res_data.permitions}</td><td><input type='submit' class='issue' onclick="render(${res_data.book_id})" id = ${res_data.book_id} value =issue></td></tr>`;
          }
          $("#table").append(html);
          
     }
           
   });
  }

  for(let i=0;i<a1.length;i++){
    a1[i].addEventListener('click',e1=>{
        table.innerHTML = 
        `<tr>
        <th>Book name</th>
        <th>Author</th>
        <th>Genere</th>
        <th>Availiable to</th>
        <th> </th>
       </tr>`;
        let x1 = a1[i].id;
        render_table(x1);
    })
}  
  