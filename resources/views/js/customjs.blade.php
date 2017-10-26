<script >
$(function() {




/*global vaibales*/
var record_id;
var record_update_id;
/*===================showin question and mcqs==============================*/
/*  $('#qt').change(function(){
  	var value=$( "#qt option:selected" ).val();
  	console.log(value);
  });*/
/*===========delete button event=====================================*/
$('.delete_btn').on('click',function (argument) {
  var id=$(this).closest('tr').attr('id');
  record_id=id  
 
});

$('.edit_record').on('click',function (argument) {
 var rec_id=$(this).closest('tr').find('.record_id').attr('data-id');
 var rec_name=$(this).closest('tr').find('.record_name').attr('data-name');
 var rec_duration=$(this).closest('tr').find('.record_duration').attr('data-duration');
 var rec_time=$(this).closest('tr').find('.record_duration').attr('data-time');
 var rec_resumeable=$(this).closest('tr').find('.record_resumeable').attr('data-resumeable');
$("#id").val(rec_id);
$("#name").val(rec_name);
$("#duration").val(rec_duration);
$("#time").val(rec_duration);
if (rec_resumeable == 1) {
  $('#radio2').attr('checked', false); 
  $('#radio1').attr('checked', true); 
 
}else{
  $('#radio1').attr('checked', false);  
   $('#radio2').attr('checked', true); 
     
}
console.log(rec_time);
if (rec_time == 'hour') {
   /*$('#min').attr("selected", false);*/
  $('#hour').attr("selected", true); 
  
}else{
/*  $('#hour').attr("selected", false);*/
  $('#min').attr("selected", true);
}

 
});



$('.confirm_btn').on('click',function (argument) {

 var token = $('input[name=_token]').val();
       $.ajax({

        type:"POST",
        url:'{{url("/questionairs/destroy")}}',
        headers: {'X-CSRF-TOKEN': token},
        data:{id:record_id},
        datatype: 'JSON', 
        success: function(data){
          if (data.response=="ok") {
             console.log(data.id);
            $('#'+data.id).remove();
          }
           
        },
        error: function(data){

        }
    });


});

/*=======================Question peage Events======================*/
var counter=0;
$('.add_question').on('click',function () {
	counter++;
  $('.Questions_main_container').append('<div class="row ques_list"> <div class="question_selector"> <div class="form-group"> <label class="col-md-4 control-label" >Question Type</label> <div class="col-md-3"><select name="data[from_'+counter+'][qt]" class="form-control qt"> <option value="null" selected>---Select Type----</option> <option value="text">Text</option> <option value="mcq">Multiple Choice (Single Option)</option> </select> </div><div class="col-md-2"> <button class="btn btn-danger btn-sm pull-right delete_question" > <span class="glyphicon glyphicon-trash "></span> Delete Question </button> </div></div></div><div class="question_container"> </div><hr> </div>');
});

$('.Questions_main_container').on('click','.delete_question',function () {
  console.log('entering');
  $(this).closest('.row').remove();
});


$('.Questions_main_container').on('change','.qt',function () {
var value=$( ".qt option:selected" ).val();
  var period = this.value;


if (this.value =='text') {
$(this).closest('.row').find('.question_container').empty();  
$(this).closest('.row').find('.question_container').append(' <div class="single_questions"> <div class="form-group"> <label class="col-md-4 control-label" for="Name">Question</label> <div class="col-md-4"> <input id="question_name" name="data[from_'+counter+'][question]" type="text" placeholder="Enter Question" class="form-control input-md question" required=""> </div></div><div class="form-group"> <label class="col-md-4 control-label" for="Name">Answer</label> <div class="col-md-4"> <input id="Name" name="data[from_'+counter+'][answer][]" type="text" placeholder="Enter Answer" class="form-control input-md answer" required=""> </div></div> </div>');

}else if(this.value=='mcq'){
$(this).closest('.row').find('.question_container').empty();
$(this).closest('.row').find('.question_container').append(' <div class="form-group"> <label class="col-md-4 control-label">Question</label> <div class="col-md-4"> <input id="Name" name="data[from_'+counter+'][question]" type="text" placeholder="Enter Question" class="form-control input-md mcq_quest" required=""> </div></div>  <div class="choices"> </div><div class="row "> <div class="col-md-2 col-md-offset-4 "> <div class="btn btn-sm btn-warning add_choice_btn"> <span class="glyphicon glyphicon-plus"></span> Add Choice </div> </div></div>');
}else if(this.value=='null'){
$(this).closest('.row').find('.question_container').empty();  
}


});

$('.Questions_main_container').on('click','.add_choice_btn',function () {
 
    $(this).closest('.question_container').find('.choices').append(' <div class="form-group mcqs"><div class="child"> <label class="col-md-4 control-label" for="Name">Choice 1</label> <div class="col-md-4"> <input id="Name" name="data[from_'+counter+'][answer][]" type="text" placeholder="Enter Option" class="form-control input-md choice" required=""> </div><div class="col-md-1"> <input name="data[from_'+counter+'][correct'+counter+'][]" type="radio" class="radio_correct"> Correct? </div><div class="col-md-2"> <button class="btn btn-danger btn-sm pull-right delete_choice" > <span class="glyphicon glyphicon-trash"></span> Delete Choice </button> </div></div></div>');
});
$('.Questions_main_container').on('click','.delete_choice',function () {

    $(this).closest('.form-group').remove();
});


/*===========save aquestion Button============*/
/*$('.save_Q').on('click',function(){

  var params=[];
  var mcqs_list=[];
  var cout=1;
    $('.ques_list').each(function() {
       var qes_t= $(this).find('.qt').val();

       if (qes_t=='text') {
        var question= $(this).find('.question').val();
        var answer= $(this).find('.answer').val();

      params.push({
            question_type:qes_t,
            question : question,
            answer : answer
            });
         

       }else if (qes_t=='mcq') {
            var mcq_question= $(this).find('.mcq_quest').val();
            
            $('.child').each(function(){
                var mcq_values= $(this).find('.choice').val();
                var mcq_correct= $(this).find('.radio_correct').val();
                console.log(mcq_values);
                mcqs_list.push({
                  value:mcq_values,
                  iscorrect:mcq_correct
                })
               
            });

      params.push({
            question_type:qes_t,
            question : mcq_question,
            answer : mcqs_list
            });
      console.log(cout)
     mcqs_list=[];
       }
  });

var question_id=$('.Questions_main_container').attr('id');
var token = $('input[name=_token]').val();
       $.ajax({

        type:"POST",
        url:"{{url('/questions/crud')}}",
        headers: {'X-CSRF-TOKEN': token},
        data:{data:params,id:question_id},
        datatype: 'JSON', 
        success: function(data){

           
        },
        error: function(data){

        }
    });

});*/







$('.save_Qq').on('click',function () {
var token = $('input[name=_token]').val();

var qt=$('[name=qt]').val();


console.log(qt);

var qt={};
var question=[];
var mcq=[];
qt.push(question);















    
});







});	
</script>