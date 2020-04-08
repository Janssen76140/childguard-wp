$(document).ready(function(){

    // Add new element
    $(".add").click(function(){
   
     // Finding total number of elements added
     var total_element = $(".lesPlus").length;
    
     // last <div> with element class id
     var lastid = $(".lesPlus:last").attr("id");
     var split_id = lastid.split("_");
     var nextindex = Number(split_id[1]) + 1;
   
     var max = 5;
     // Check total number elements
     if(total_element < max ){
      // Adding new div container after last occurance of element class
      $(".lesPlus:last").after("<div class='lesPlus' id='div_"+ nextindex +"'></div>");
    
      // Adding element to <div>
      $("#div_" + nextindex).append("<input type='text' placeholder='Couches fournis' id='lesPlus_pro_"+ nextindex +"'>&nbsp;<span id='remove_" + nextindex + "' class='remove'>X</span>");
    
     }
    
    });
   
    // Remove element
    $('.container').on('click','.remove',function(){
    
     var id = this.id;
     var split_id = id.split("_");
     var deleteindex = split_id[1];
   
     // Remove <div> with id
     $("#div_" + deleteindex).remove();
   
    }); 
   });




   $(document).ready(function(){

    // Add new element
    $(".add2").click(function(){
   
     // Finding total number of elements added
     var total_element = $(".horraire").length;
    
     // last <div> with element class id
     var lastid = $(".horraire:last").attr("id");
     var split_id = lastid.split("_");
     var nextindex = Number(split_id[1]) + 1;
   
     var max = 5;
     // Check total number elements
     if(total_element < max ){
      // Adding new div container after last occurance of element class
      $(".horraire:last").after("<div class='horraire' id='div_"+ nextindex +"'></div>");
    
      // Adding element to <div>
      $("#div_" + nextindex).append("<input type='text' placeholder='Lundi au vendredi 8h 19h' id='horraire_pro_"+ nextindex +"'>&nbsp;<span id='remove_" + nextindex + "' class='remove'>X</span>");
    
     }
    
    });
   
    // Remove element
    $('.container2').on('click','.remove',function(){
    
     var id = this.id;
     var split_id = id.split("_");
     var deleteindex = split_id[1];
   
     // Remove <div> with id
     $("#div_" + deleteindex).remove();
   
    }); 
   });