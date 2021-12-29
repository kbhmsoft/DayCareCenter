<style type="text/css">
	fieldset{font-family: 'Kalpurush', sans-serif;}
	h3{font-family: 'Kalpurush', sans-serif; text-align: center; font-weight: bold; font-size:16px;}
	h4{font-family: 'Kalpurush', sans-serif; text-align: left; font-weight: bold; font-size:16px;}
	h5{font-family: 'Kalpurush', sans-serif; text-align: left; font-weight: bold; font-size:16px;}
</style>
<style>
   * {
     box-sizing: border-box;
   }

   body {
     background-color: #f1f1f1;
   }

   /*#regForm {
     background-color: #ffffff;
     margin: 100px auto;
     font-family: Raleway;
     padding: 40px;
     width: 70%;
     min-width: 300px;
   }*/

   h1 {
     text-align: center;  
   }

   /*input {
     padding: 10px;
     width: 100%;
     font-size: 17px;
     font-family: Raleway;
     border: 1px solid #aaaaaa;
   }*/

   /* Mark input boxes that gets an error on validation: */
   input.invalid {
     background-color: #ffdddd;
   }

   /* Hide all steps by default: */
   .tab {
     display: none;
   }

   button {
     background-color: #04AA6D;
     color: #ffffff;
     border: none;
     padding: 10px 20px;
     font-size: 17px;
     font-family: Raleway;
     cursor: pointer;
   }

   button:hover {
     opacity: 0.8;
   }

   #prevBtn {
     background-color: #bbbbbb;
   }

   /* Make circles that indicate the steps of the form: */
   .step {
     height: 15px;
     width: 15px;
     margin: 0 2px;
     background-color: #bbbbbb;
     border: none;  
     border-radius: 50%;
     display: inline-block;
     opacity: 0.5;
   }

   .step.active {
     opacity: 1;
   }

   /* Mark the steps that are finished and valid: */
   .step.finish {
     background-color: #04AA6D;
   }
</style>
<div class="row">
	<?php $this->load->view('frontend/right_side_bar'); ?>   
	
   <div class="col-md-9 main-content" style="padding: 15px 15px 15px 15px"> 
      
            <script>
               function func_details(id){
                  // alert(id);

                  $.ajax({
                     type: "GET",
                     url: hostname+'index.php/site/app_view/'+id,
                     success: function(response) {
                        // AppendResponse(response);
                        // alert(response);
                        $('.appview').show();
                        $('.applications-list').hide();
                        $('.list_view').show();
                        $('.appview').html(response);
                        // console.log(response);
                     }
                  });
               }

               $(".list_view").click(function(){
                $('.applications-list').show();
                $('.appview').hide();
                $('.list_view').hide();

             });
          </script>

          <div>

            <form id="regForm" action="<?=base_url('index.php/new-application/'.$student_info->day_cares_id.'/'.$student_info->member_id)?>" method="post" enctype="multipart/form-data" id="jsvalidation" style="font-family: 'arial'">

               <div><?php echo validation_errors(); ?></div>
               <div class="col-md-12" style="background: #fff;padding-top:30px;">
               	<h3>ভর্তি ফরম</h3>
                  <div class="tab">
                     <fieldset class="scheduler-border">
                        <legend class="scheduler-border">পার্ট-১: শিশুর তথ্য  </legend>
                        <!-- <div class="row form-row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <?php //echo form_error('day_cares_id'); ?>
                                 <label>ডে কেয়ার সেন্টার নাম</label>
                                 <?php 
                                 //$more_attr = 'class="form-control" ';
                                 //echo form_dropdown('day_cares_id', $day_cares, set_value('day_cares_id'), $more_attr);
                                 ?>
                              </div>
                           </div>               
                        </div> -->

                        <div class="row form-row">
                           <div class="col-md-8">
                              <div class="form-group">
                                 <label>১. শিশুর নাম</label>
                                 <input type="text" name="members[child_name]" value="<?=set_value('child_name', $student_info->child_name)?>" class="form-control" placeholder="">
                              </div>
                           </div>

                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>২. লিঙ্গ</label><br>
                                 <input type="radio" name="members[gender]" value="Male" <?=set_value('gender')=='Male'?'checked':'checked';?>> পুরুষ 
                                 <input type="radio" name="members[gender]" value="Female" <?=set_value('gender')=='Female'?'':'';?>> মহিলা
                              </div>
                           </div>                   
                        </div>

                        <div class="row form-row">
                              <div class="form-group">
                                 <div class="col-md-5">
                                    <label>৩. শিশুর জন্ম তারিখ ও জন্ম সনদ নম্বর:</label>
                                 </div> 
                                 <div class="col-md-7">
                                    <input type="date" name="members[child_dob]" value="<?=set_value('child_dob',$student_info->child_dob)?>" class="form-control" placeholder="" autocomplete="off"><br>
                                    <input type="number" name="members[birth_certificate_no]" value="<?=set_value('birth_certificate_no', $student_info->birth_certificate_no)?>" class="form-control"><br>
                                 </div>
                              </div>
                        </div>
                        <div class="row ">
                           <div class="form-group">
                              <div class="col-md-4">
                                 <label>৪।  ভর্তির তারিখ:</label>
                              </div>
                              <div class="col-md-8">
                                 <input type="date" name="members[admission_date]" value="<?=set_value('admission_date')?>" class="form-control" placeholder=""><br>
                              </div>
                           </div>
                        </div>
                        <div class="row ">
                           <div class="form-group">
                              <div class="col-md-4">
                                 <label>৫।  ভর্তির তারিখে শিশুর বয়স</label>
                              </div>
                              <div class="col-md-8">
                                 <input type="text" name="members[child_age]" value="<?=set_value('child_age')?>" class="form-control" placeholder=""><br>
                              </div>
                           </div>
                        </div>

                         
                        <div class="row form-row">
                           <div class="form-group">
                                 <div class="col-md-3">
                                    <label>৬। শিশুর বর্তমান ওজনঃ</label>
                                 </div>   
                                 <div class="col-md-2">
                                    <input type="text" name="members[child_weight]" value="<?=set_value('child_weight')?>" class="form-control" placeholder="">
                                 </div>
                                 <div class="col-md-1">
                                    <label>উচ্চতাঃ</label>
                                 </div>   
                                 <div class="col-md-2">
                                    <input type="text" name="members[child_height]" value="<?=set_value('child_height')?>" class="form-control" placeholder="">
                                 </div>
                                  <div class="col-md-2">
                                    <label>জন্ম চিহ্নঃ</label>
                                 </div>   
                                 <div class="col-md-2">
                                    <input type="text" name="members[birth_mark]" value="<?=set_value('birth_mark')?>" class="form-control" placeholder="">
                                 </div>
                           </div>   
                        </div>


                     </fieldset>
                  </div>
                  <div class="tab">
                     <fieldset class="scheduler-border">
                        <legend class="scheduler-border">পার্ট-২: শিশুর চিকিৎসা সংক্রান্ত তথ্য </legend>

                        <div class="row form-row">
                           <div class="col-md-8">
                              <div class="form-group">
                                 <label>৭। শিশুর বিশেষ কোন শারিরীক অসুস্থতা (মারাত্বক যখম বা অপারেশন) থাকলে তার বর্ণনা: </label>
                                 <input type="text" name="members[child_diseases_name]" value="<?=set_value('child_diseases_name')?>" class="form-control">
                              </div>
                           </div>

                           <div class="col-md-8">
                              <div class="form-group">
                                 <label>৮। শিশু নিয়মিত কোন ঔষধ সেবন করে কিনা?</label>
                                  <input type="radio" name="members[child_diseases_medicine]" value="Yes" <?=set_value('child_diseases_medicine')=='Yes'?'checked':'checked';?>> হ্যাঁ 
                                 <input type="radio" name="members[child_diseases_medicine]" value="No" <?=set_value('child_diseases_medicine')=='No'?'':'';?>> না
                              </div>
                           </div>
                        </div> 

                        <h5>হ্যাঁ হলে</h5>

                        <div class="row form-row"> 
                           <div class="col-md-8">
                              <div class="form-group">
                                 <label>ক. ঔষধের নাম ও সেবনের মাত্রা</label>
                                 <input type="text" name="members[child_diseases_medicine_range]" value="<?=set_value('child_diseases_medicine_range')?>" class="form-control">
                              </div>
                           </div>
                            <div class="col-md-8">
                              <div class="form-group">
                                 <label>খ. রোগের কারণ</label>
                                 <input type="text" name="members[child_diseases_reason]" value="<?=set_value('child_diseases_reason')?>" class="form-control">
                              </div>
                           </div>
                           <div class="col-md-8">
                              <div class="form-group">
                                 <label>গ. প্রেসক্রিপশন সংযুক্ত করেছেন কিনা?</label>
                                  <input type="radio" name="members[child_diseases_prescription]" value="Yes" <?=set_value('child_diseases_prescription')=='Yes'?'checked':'checked';?>> হ্যাঁ 
                                 <input type="radio" name="members[child_diseases_prescription]" value="No" <?=set_value('child_diseases_prescription')=='No'?'':'';?>> না
                              </div>
                           </div>

                           <div class="col-md-8">
                              <div class="form-group">
                                 <label>৯। ক)  শিশুর চোখ, কান, দাঁতের পরিক্ষা করা হয়েছে কিনা?</label>
                                  <input type="radio" name="members[describe_health_problem]" value="Yes" <?=set_value('describe_health_problem')=='Yes'?'checked':'checked';?>> হ্যাঁ 
                                 <input type="radio" name="members[describe_health_problem]" value="No" <?=set_value('describe_health_problem')=='No'?'':'';?>> না
                              </div>
                           </div>
                           <div class="col-md-8">
                              <div class="form-group">
                                 <label>খ) হ্যাঁ হলে পরীক্ষার ফলাফল: </label>
                                 <input type="text" name="members[child_diseases_result]" value="<?=set_value('child_father_name')?>" class="form-control">
                              </div>
                           </div>

                            <div class="col-md-8">
                              <div class="form-group">
                                 <label>১০। ক)  শিশুর বিশেষ কোন খাদ্যে সমস্যা/এলারজি আছে কি?</label>
                                  <input type="radio" name="members[child_allergic_food]" value="Yes" <?=set_value('child_allergic_food')=='Yes'?'checked':'checked';?>> হ্যাঁ 
                                 <input type="radio" name="members[child_allergic_food]" value="No" <?=set_value('child_allergic_food')=='No'?'':'';?>> না
                              </div>
                          </div>


                              <div class="col-md-8">
                              <div class="form-group">
                                 <label>খ) হ্যাঁ হলে তার বর্ণনা</label>
                                 <input type="text" name="members[describe_food]" value="<?=set_value('describe_food')?>" class="form-control">
                              </div>
                           </div>
                           <div class="col-md-8">
                              <div class="form-group">
                                 <label>গ) নির্দিষ্ট খাদ্যের নাম</label>
                                 <input type="text" name="members[child_allergic_food_name]" value="<?=set_value('child_allergic_food_name')?>" class="form-control">
                              </div>
                           </div>


                           <div class="col-md-8">
                              <div class="form-group">
                                 <label>১১। ক) শিশুর করোনা/জল্বসন্ত/মাম্পস/অন্যান্য কোন সংক্রামণ রোগ হয়েছিল কিনা?</label>
                                  <input type="radio" name="members[child_viral_disease]" value="Yes" <?=set_value('child_viral_disease')=='Yes'?'checked':'checked';?>> হ্যাঁ 
                                 <input type="radio" name="members[child_viral_disease]" value="No" <?=set_value('child_viral_disease')=='No'?'':'';?>> না
                              </div>
                          </div>
                           <div class="col-md-8">
                              <div class="form-group">
                                 <label>খ) হ্যাঁ হলে তার প্রমাণপত্রঃ </label>
                                 <input type="text" name="members[child_viral_disease_proof]" value="<?=set_value('child_viral_disease_proof')?>" class="form-control">
                              </div>
                           </div>

                          <div class="col-md-8">
                              <div class="form-group">
                                 <label>১২। ক)  বয়স অনুযায়ী শিশুর প্রয়োজনীয় টিকাসমুহ সম্পন্ন হয়েছে কিনা?</label><br>
                                  <input type="radio" name="members[child_vaccination]" value="Yes" <?=set_value('child_vaccination')=='Yes'?'checked':'checked';?>> হ্যাঁ 
                                 <input type="radio" name="members[child_vaccination]" value="No" <?=set_value('child_vaccination')=='No'?'':'';?>> না
                              </div>
                          </div>

                          <div class="col-md-8">
                              <div class="form-group">
                                 <label>খ) (উত্তর "না" হলে) কোন কোন টিকা দেওয়া হয়নি?</label>
                                 <input type="text" name="members[child_novaccine_reason]" value="<?=set_value('child_novaccine_reason')?>" class="form-control">
                              </div>
                           </div>

                       </div>

                       
                     </fieldset>
                  </div>
                  <div class="tab">
                     <fieldset class="scheduler-border">
                       
                        <div class="row form-row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label>১৩। আপনার শিশুর শীর্ষ তিনটি উল্লেখযোগ্য গুনাবলী চিহ্নিত করুন:</label><br>
                                 <table class="table">
                                 <tr>
                                <td> <input type="checkbox" name="members[child_strong_side]" value="1"> অ্যাথলেটিক</td></td>
                                <td> <input type="checkbox" name="members[child_strong_side]" value="1"> সহানুভুতিশিল</td>
                                <td> <input type="checkbox" name="members[child_strong_side]" value="1"> স্নহময়</td>
                                <td> <input type="checkbox" name="members[child_strong_side]" value="1"> আত্মসচেতন<br></td>
                                 </tr>
                                 <tr>

                                 <td><input type="checkbox" name="members[child_strong_side]" value="1"> সাহসী</td>
                                 <td><input type="checkbox" name="members[child_strong_side]" value="1"> উৎসাহী</td>
                                 <td><input type="checkbox" name="members[child_strong_side]" value="1"> অনুগত</td>
                                 <td><input type="checkbox" name="members[child_strong_side]" value="1"> সামাজিক<br></td>
                                 </tr>
                                 <tr>
                                 <td><input type="checkbox" name="members[child_strong_side]" value="1"> সহযোগী</td>
                                 <td><input type="checkbox" name="members[child_strong_side]" value="1"> উদ্যমী</td>
                                 <td><input type="checkbox" name="members[child_strong_side]" value="1"> সঙ্গীতপ্রমী</td>
                                 <td><input type="checkbox" name="members[child_strong_side]" value="1"> চিন্তাশিল<br></td>
                                 </tr>
                                 <tr>
                                 <td><input type="checkbox" name="members[child_strong_side]" value="1"> সৃজনশীল</td>
                                 <td><input type="checkbox" name="members[child_strong_side]" value="1"> ক্ষমাশীল</td>
                                 <td><input type="checkbox" name="members[child_strong_side]" value="1"> আশাবাদী</td>
                                 <td><input type="checkbox" name="members[child_strong_side]" value="1"> সুনিয়ন্ত্রিত<br></td>
                                 </tr>
                                 <tr>
                                 <td><input type="checkbox" name="members[child_strong_side]" value="1"> কৌতুহলি</td>
                                 <td><input type="checkbox" name="members[child_strong_side]" value="1"> বন্ধুসুলভ</td>
                                 <td><input type="checkbox" name="members[child_strong_side]" value="1"> কৌতকপূর্ণ</td>
                                 <td><input type="checkbox" name="members[child_strong_side]" value="1"> হস্যোউজ্জল<br></td>
                                 </tr>
                                 <tr>
                                 <td><input type="checkbox" name="members[child_strong_side]" value="1"> সিদ্ধান্তমূলক</td>
                                 <td><input type="checkbox" name="members[child_strong_side]" value="1"> সৎ</td>
                                 <td><input type="checkbox" name="members[child_strong_side]" value="1"> সম্ভাবনাময়য়</td>
                                 <td><input type="checkbox" name="members[child_strong_side]" value="1"> মনোযোগী<br></td>
                                 </tr>
                                 <tr>
                                 <td><input type="checkbox" name="members[child_strong_side]" value="1"> অধ্যাবসায়ী</td>
                                 <td><input type="checkbox" name="members[child_strong_side]" value="1"> কল্পনাপ্রবণ<br></td>
                                 </tr>
                                 <tr>
                                 <td><input type="checkbox" name="members[child_strong_side]" value="1"> ন্যায়পরায়ণ</td>
                                 <td><input type="checkbox" name="members[child_strong_side]" value="1"> দয়ালু<br></td>
                                 </tr>
                                 </table>
                              </div>
                           </div>
                        </div>
                     </fieldset>
                  </div>   
                  <div class="tab">
                     <fieldset class="scheduler-border">
                       
                        <div class="row form-row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label>১৪। আপনার শিশুর শীর্ষ তিনটি দূর্বল দিক চিহ্নিত করুন:</label><br>
                                 <table class="table">
                                 <tr>
                                <td> <input type="checkbox" name="members[child_week_side]" value="1"> আগ্রাসী মনোভাব</td></td>
                                <td> <input type="checkbox" name="members[child_week_side]" value="1"> নিয়ম ভঙ্গ</td>
                                <td> <input type="checkbox" name="members[child_week_side]" value="1"> শ্রবণ ক্ষমতার হ্রাস</td>
                                
                                 </tr>
                                 <tr>

                                 <td><input type="checkbox" name="members[child_week_side]" value="1"> বাড়িতে অন্যদের প্রতি আক্রমনাত্মক মনোভাব</td>
                                 <td><input type="checkbox" name="members[child_week_side]" value="1"> জটিল</td>
                                 <td><input type="checkbox" name="members[child_week_side]" value="1"> ভাষায় বিলম্ব</td>
                                 
                                 </tr>
                                 <tr>
                                 <td><input type="checkbox" name="members[child_week_side]" value="1"> অস্থিরতা</td>
                                 <td><input type="checkbox" name="members[child_week_side]" value="1"> প্রানির প্রতি নিষ্ঠুরতা</td>
                                 <td><input type="checkbox" name="members[child_week_side]" value="1"> সেখার অক্ষমতা</td>
                                
                                 </tr>
                                 <tr>
                                 <td><input type="checkbox" name="members[child_week_side]" value="1"> উদ্বেগ/অস্বস্থি</td>
                                 <td><input type="checkbox" name="members[child_week_side]" value="1"> হতাশা</td>
                                 <td><input type="checkbox" name="members[child_week_side]" value="1"> কম আত্মসম্মান</td>
                                 
                                 </tr>
                                 <tr>
                                 <td><input type="checkbox" name="members[child_week_side]" value="1"> ম্নোযোগ</td>
                                 <td><input type="checkbox" name="members[child_week_side]" value="1"> বিকাশে বিলম্ব</td>
                                 <td><input type="checkbox" name="members[child_week_side]" value="1"> মিথ্যা বলা</td>
                                
                                 </tr>
                                 <tr>
                                 <td><input type="checkbox" name="members[child_week_side]" value="1"> ব্যাধি</td>
                                 <td><input type="checkbox" name="members[child_week_side]" value="1"> সৎবেদনশীল</td>
                                 <td><input type="checkbox" name="members[child_week_side]" value="1"> অবহেলা করা</td>
                                
                                 </tr>
                                 <tr>
                                 <td><input type="checkbox" name="members[child_week_side]" value="1"> আচরণগত</td>
                                 <td><input type="checkbox" name="members[child_week_side]" value="1"> মানসিক বা শারীরিক নির্যাতন<br></td>
                                 <td><input type="checkbox" name="members[child_week_side]" value="1"> বিরোধী প্রতীবাদ<br></td>
                                 </tr>
                                 <tr>
                                 <td><input type="checkbox" name="members[child_week_side]" value="1"> সামাজিক সমস্যা</td>
                                 <td><input type="checkbox" name="members[child_week_side]" value="1"> সহিংসতা বা ট্রমার পরে যত্নশীল<br></td>
                                 </tr>
                                 </table>
                       
                        	  <div class="col-md-8">
                                 <div class="form-group">
                                    <label>১৫। (ক) আপনার শিশুর সামাজিক, আবেগীক, স্পর্শকাতর ও আচরণগত কোন উদ্বেগ আপনার আছে কি ?</label>
                                    <input type="radio" name="members[child_social_describe_value]" value="Yes" <?=set_value('child_social_describe_value')=='Yes'?'':'';?>> হ্যাঁ 
                                    <input type="radio" name="members[child_social_describe_value]" value="No" <?=set_value('child_social_describe_value')=='No'?'checked':'checked';?>> না<br>
                                    <label>(খ) (উত্তর হ্যাঁ হলে) তার সংক্ষিপ্ত বিবরণ</label>
                                    <input type="text" name="members[child_social_describe]" value="<?=set_value('child_social_describe')?>" class="form-control">
                                 </div>
                              </div>

                     </fieldset>
                  </div>
                  <div class="tab">
                     <fieldset class="scheduler-border">
                           <legend class="scheduler-border">পার্ট-৩: জরুরি যোগাযোগ ও সেন্টারে শিশুকে দেওয়া-নেওয়ায় নিয়োজিত ব্যক্তিবর্গের তালিকা </legend>
                           <div class="row form-row">
                              
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>১৬। ক)  নাম</label>
                                    <input type="text" name="registrations[child_parents_name]" value="<?=set_value('child_parents_name')?>" class="form-control">
                                 </div>
                              </div>
      						<div class="col-md-6">
                                 <div class="form-group">
                                    <label>ঠিকানা</label>
                                    <input type="text" name="registrations[child_parents_present_address]" value="<?=set_value('child_parents_present_address')?>" class="form-control">
                                 </div>
                              </div>

                               <div class="row form-row">   
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>অভিভাবকের জাতীয় পরিচয় পত্রের নম্বর</label>
                                    <input type="number" name="registrations[child_parents_national_no]" value="<?=set_value('child_parents_national_no')?>" class="form-control">
                                 </div>
                              </div>

                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>মোবাইল নম্বর</label>
                                    <input type="number" name="registrations[child_parents_ph_no]" value="<?=set_value('child_parents_ph_no')?>" class="form-control">
                                 </div>
                              </div>
                           </div>

                          

                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>শিশুর সাথে সম্পর্ক</label>
                                    <input type="text" name="registrations[child_parents_relation]" value="<?=set_value('child_parents_relation')?>" class="form-control">
                                 </div>
                              </div> 
                           </div>


                          <div class="row form-row">
                             
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>খ) নাম</label>
                                    <input type="text" name="registrations[child_parents_name_2]" value="<?=set_value('child_parents_name_2')?>" class="form-control">
                                 </div>
                              </div>
      						<div class="col-md-6">
                                 <div class="form-group">
                                    <label>ঠিকানা</label>
                                    <input type="text" name="registrations[child_parents_present_address_2]" value="<?=set_value('child_parents_present_address_2')?>" class="form-control">
                                 </div>
                              </div>

                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>অভিভাবকের জাতীয় পরিচয় পত্রের নম্বর</label>
                                    <input type="number" name="registrations[child_parents_ph_no_2]" value="<?=set_value('child_parents_ph_no_2')?>" class="form-control">
                                 </div>
                              </div>
                          </div>

                          <div class="row form-row">   
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>মোবাইল নম্বর</label>
                                    <input type="number" name="registrations[child_parents_national_no_2]" value="<?=set_value('child_parents_national_no_2')?>" class="form-control">
                                 </div>
                              </div>

                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>শিশুর সাথে সম্পর্ক</label>
                                    <input type="text" name="registrations[child_parents_relation_2]" value="<?=set_value('child_mother_designation_2')?>" class="form-control">
                                 </div>
                              </div> 
                          </div>
                     </fieldset>	
                  </div><!-- 
                  <div class="tab">
                     <fieldset class="scheduler-border">
                     	<legend class="scheduler-border">পার্ট-৪: প্রয়োজনীয় সংযুক্তিসমূহ</legend>
                        <div class="row form-row">
                        	<div class="col-md-12">
                              <div class="form-group">
                              	<table>
                                    <tr>
                                       <td></td><input type="checkbox" name="" value="1" <?=set_value('')==''?'':'';?>>  পিতা-মাতা বা অভিভাবকের ২ (দুই) কপি পাসপোর্ট সাইজের ছবি;
                                    </tr>	
                              		<tr>
      	                              <td><input type="checkbox" name="" value="1" <?=set_value('')==''?'checked':'checked';?>>  শিশুর ২ (দুই) কপি পাসপোর্ট সাইজের ও ২ (দুই) কপি স্ট্যাম্প সাইজের ছবি;</td>
      	                           </tr>

   	                            <tr>
                                    <td><input type="checkbox" name="" value="1" <?=set_value('')==''?'checked':'checked';?>> শিশুর ২ (দুই) কপি টিকা কার্ড;</td>
                                  </tr>
                                  <tr>

                                    <td><input type="checkbox" name="" value="1" <?=set_value('')==''?'checked':'checked';?>> এককালীন অফেরতযোগ্য ভর্তি ফি;</td>
                                  </tr>
                                  <tr>
                                    <td><input type="checkbox" name="" value="1" <?=set_value('')==''?'checked':'checked';?>> ২ (দুই) মাসের মাসিক সেবামূল্য ( এক মাসের অগ্রীম জামানত+চলতি মাস);</td>
                                  </tr>
                                  <tr>
                                   <td><input type="checkbox" name="" value="1" <?=set_value('')==''?'':'';?>> শিশুর অসুস্থতা নীতি সংক্রান্ত অজ্ঞিকারনামা</td>
                                 </tr>
                                 <tr>  
                                   <td><input type="checkbox" name="" value="1" <?=set_value('')==''?'':'';?>> শিশুকে জরুরি চিকিৎসা সেবা প্রদানের সম্মতিপত্র; </td>
                                 </tr>
                                  <tr>
                                    <td><input type="checkbox" name="" value="1" <?=set_value('')==''?'checked':'checked';?>>   শিশুর একজোড়া ইউনিফর্ম ( শিশু দিবাযত্ন কেন্দ্রের জন্য নির্ধারিত ইউনিফর্ম);</td>
                                  </tr>
                                  <tr>  
   	                              <td><input type="checkbox" name="" value="1" <?=set_value('')==''?'':'';?>> শিশুর কারযবলি ও বিশেষ অনুষ্ঠানের ছবি ও তথ্যচিত্র ব্যাবহারের অনুমতি</td>
                                 </tr>
         								<tr>  
         								  <td><input type="checkbox" name="" value="1" <?=set_value('')==''?'':'';?>> শিশুর পরিচয়পত্র সরবরাহের জন্য এককালীন ২৫০/- (কার্ড হোল্ডার ,ঝুলানোর ফিতা, প্রিন্টিং ও লেমিনেটিং খরচ বাবদ)।</td>
         								</tr>
                             </table>
                              </div>
                           </div>
                       </div>  
                     </fieldset>
                  </div> -->
                  <div class="tab">   
                     <fieldset class="scheduler-border">
                        <legend class="scheduler-border">পার্ট-৪: শিশুর অসুস্থতা নীতি সংক্রান্ত অঙ্গীকারনামা</legend>
                        <p>•  দিবাযত্ন কেন্দ্রে আপনার সন্তান এবং অন্য শিশুদের সুস্থতার স্বার্থে আপনার শিশু রোগাক্রান্ত হলে তাকে ঘরেই রাখবেন।</p>

                        <p>•  যদি কোভিড-১৯ ভাইরাসে পরিবারের কোন সদস্য সংক্রমিত হয়ে থাকে তবে অবশ্যই কোয়ারেন্টাইনে থাকবেন এবং স্বাস্থ্য মন্ত্রণালয় কর্তৃক প্রদত্ত  সুস্থতার প্রত্যয়ণ পাওয়ার পর সেন্টারে শিশুকে নিয়মিত করবেন।</p>

                        <p>•  জ্বর হলে শিশুকে দিবাযত্ন কেন্দ্রে প্রেরণ করা থেকে বিরত থাকবেন। সেক্ষেত্রে জ্বর কমে যাওয়ার পর পরবর্তী ২৪ ঘন্টা পর্যন্ত শিশুর দেহের স্বাভাবিক তাপমাত্রা (৯৮.৬ ডিগ্রি ফারেনহাইট) থাকলে তবেই তাকে দিবাযত্ন কেন্দ্রে পাঠাবেন।</p>

                        <p>•  ডায়রিয়া, বদহজম, পেটে ব্যথা দেখা দিলে সেন্টারে পাঠানো থেকে বিরত থাকবেন। এ অবস্থায় দ্রুত চিকিৎসকের পরামর্শ অনুযায়ী ব্যবস্থা নিবেন। ডায়রিয়া থেকে সুস্থ হবার পর ২৪ ঘন্টা পর্যবেক্ষণ করে শিশুকে কেন্দ্রে পাঠাতে পারবেন। এক্ষেত্রে চিকিৎসকের ব্যবস্থাপত্র সংযুক্ত করতে হবে। </p>

                        <p>•  চোখ উঠা, চোখে এলার্জি কিংবা চোখ থেকে তরল নিঃসরণ হলে  সুস্থ না হওয়া পর্যন্ত  দিবাযত্ন কেন্দ্রে  পাঠানো থেকে বিরত থাকবেন। সুস্থ হওয়ার পর ২৪ ঘন্টা বাড়িতে পর্যবেক্ষণ করে কেন্দ্রে পাঠাবেন।</p>

                        <p>•  যে কোন কারণে বমি হলে শিশুর  বমি বন্ধ হওয়ার পর  ২৪ ঘন্টা পর্যবেক্ষণ করে কেন্দ্রে পাঠাবেন।</p>

                        <p>•  বিভিন্ন চর্মরোগ যেমন- একজিমা, স্ক্যাবিস, চুলকানী প্রভৃতি দেখা দিলে শিশুকে সুস্থ না হওয়া পর্যন্ত সেন্টারে পাঠানো থেকে বিরত থাকবেন এবং দ্রুত চিকিৎসকের পরামর্শ অনুযায়ী ব্যবস্থা নিবেন।</p>

                        <p>•  চিকেন পক্স অথবা জলবসন্ত হলে সুস্থ হবার (১৮-২১) দিন পর শিশুকে কেন্দ্রে নিয়মিত করবেন।</p>

                        <p>•  শিশুর মাথায় উকুন ও অন্যান্য পরজীবীর  সংক্রমণ হলে সেন্টারে পাঠানো থেকে বিরত থাকবেন এবং দ্রুত চিকিৎসকের পরামর্শ অনুযায়ী ব্যবস্থা নিবেন।</p>

                        <p>•  যদি কেন্দ্রে আপনার শিশু অসুস্থ হয়ে পড়ে এবং ঐ মুহূর্তে আপনাকে অবগত করা হয় তবে যত দ্রুত সম্ভব আপনার শিশুকে দিবাযত্ন কেন্দ্র থেকে নিয়ে যাওয়ার জন্য অনুরোধ করা হলো। শিশু পরিপূর্ণরুপে সুস্থ না হওয়া পর্যন্ত কেন্দ্রে শিশুকে কখনই গ্রহণ করা হবে না। </p>


                        <!-- <div class="row">
                           <div class="col-md-12">
                              <div class="col-md-8">
                                 মাতা-পিতা বা অভিভাবকের স্বাক্ষর: ____________________<br> স্বাস্থ্য শিক্ষিকার স্বাক্ষর: ____________________ 
                              </div>
                              <div class="col-md-4">
                                    তারিখ: _______________  <br> তারিখ: _______________ 
                              </div>

                           </div>
                        </div> -->

                     </fieldset>
                  </div>
                  <div class="tab">   
                     <fieldset class="scheduler-border">
                        <legend class="scheduler-border">পার্ট-৫: জরুরি চিকিৎসা সেবা প্রদানের সম্মতি</legend>
                        <p>কোন দুর্ঘটনা বা অসুস্থতার কারণে উদ্ভূত জরুরি পরিস্থিতিতে শিশুকে তাৎক্ষণিক চিকিৎসা দেওয়ার প্রয়োজন হলে এবং সেই মুহূর্তে পিতামাতা বা অভিভাবকের সাথে যোগাযোগ করা সম্ভব না হলে নিম্নে উল্লিখিত শিশুকে প্রয়োজনীয় চিকিৎসা সেবা প্রদানের জন্য নিকটস্থ হাসপাতালে বা চিকিৎসা কেন্দ্রে নিয়ে যাওয়ার অনুমতি প্রদান করা হলো। স্বাস্থ্য শিক্ষিকা শিশুটির সঙ্গে চিকিৎসা কেন্দ্রে  যাবেন এবং চিকিৎসকের পরামর্শ অনুযায়ী শিশুটিকে চিকিৎসা সেবা প্রদান করবেন। আমি আরও সম্মতি প্রদান করছি যে, এ জরুরি অবস্থায় আমার শিশুর সকল চিকিৎসা সংক্রান্ত ব্যয় বহন করা আমার দায়িত্ব।</p><br>
                        
                     </fieldset>
                  </div>
                  <div class="tab">   
                     <fieldset class="scheduler-border">
                        <legend class="scheduler-border">পার্ট-৬: শিশুর কার্যাবলী ও বিশেষ অনুষ্ঠানের ছবি ও তথ্যচিত্র ব্যবহারের অনুমতি</legend>
                        আমি আমার শিশু 
                         <p><?php echo $student_info->child_name;?><p> এর  ছবি ও তথ্যচিত্র  ব্যবহারে সম্মতি দিলাম।
                        <table>
                           <tr>
                              <td>১. কেন্দ্রের সামাজিক যোগাযোগ মাধ্যম যেমন ফেসবুকে ব্যবহারের জন্য     </td><td>&nbsp;</td><td>:</td><td>&nbsp;</td>
                              <td><input type="radio" name="hello">হ্যাঁ             <input type="radio" name="hello">না</td>
                           </tr>
                           <tr>
                              <td>২. দিবাযত্ন কেন্দ্রের ওয়েবসাইটে ব্যবহারের     </td><td>&nbsp;</td><td>:</td><td>&nbsp;</td>
                              <td><input type="radio" name="hello1">হ্যাঁ             <input type="radio" name="hello1">না</td>
                           </tr>
                           <tr>
                              <td>৩. অন্যান্য অভিভাবকের ব্যবহারের     </td><td>&nbsp;</td><td>:</td><td>&nbsp;</td>
                              <td><input type="radio" name="hello2">হ্যাঁ             <input type="radio" name="hello2">না</td>
                           </tr>
                           <tr>
                              <td>৪. পোস্টার বা লিফলেটে ব্যবহারের জন্য     </td><td>&nbsp;</td><td>:</td><td>&nbsp;</td>
                              <td><input type="radio" name="hello3">হ্যাঁ             <input type="radio" name="hello3">না</td>
                           </tr>
                        </table>
                        


                       

                     </fieldset>
                  </div>
                  <div class="tab">   
                     <fieldset class="scheduler-border">
                        <legend class="scheduler-border">শিশু ভর্তির অঙ্গীকারনামা</legend>
                        <p>
                           আমি বুঝতে পেরেছি যে সময়মত মাসিক সেবামূল্য প্রদান করতে ব্যর্থ হলে আমার শিশুর দিবাকালীন সেবা অব্যাহত রাখা হবে না। আমার শিশুকে অবশ্যই বিকাল ৬.০০ ঘটিকার মধ্যে কেন্দ্র থেকে নেওয়ার ব্যবস্থা করবো। তবে বিশেষ প্রয়োজনে আমার শিশুকে বিকাল ৬:০০ টার পরে নিতে আসলে প্রতি মিনিটের জন্য ৫/- (পাঁচ) টাকা এবং ৬:৩০ টার পর প্রতি মিনিটের জন্য ২৫/- (পচিশ) টাকা ফি প্রযোজ্য হবে যা দায়িত্বে নিয়োজিত কর্মীকে দিতে বাধ্য থাকবো।
                           এই শর্তগুলি মেনে শিশু দিবাযত্ন কেন্দ্রে আমি আমার শিশু ভর্তি করার জন্য ভর্তি ফরমের সাথে নিম্নলিখিত কাগজ পত্রাদি সংযুক্ত করেছি।

                        </p>
                        <h4>(<i class="fa fa-check" aria-hidden="true"></i> চিহ্ন দিন)</h4>

                              
                              <br><input type="checkbox" name="">  শিশুর পাসপোর্ট সাইজের ও ২ (দুই) কপি স্ট্যাম্প সাইজের ছবি;
                              <div><?php echo form_error('userfile1'); ?></div>
                              <input type="file" name="userfile1" required>
                              <br><input type="checkbox" name="">  শিশুর টিকা কার্ড;
                              <div><?php echo form_error('userfile2'); ?></div>
                              <input type="file" name="userfile2" required>


                              <br><br><br>
                              <!-- <table>
                                 <tr><td>অভিভাবকের নাম</td><td>:</td><td>___________________</td></tr>    

                                 <tr><td>অভিভাবকের স্বাক্ষর</td><td>:</td><td>___________________</td></tr>                                               

                                 <tr><td>তারিখ</td><td>:</td><td>___________________</td></tr>                  


                                 <tr><td>ডে-কেয়ার অফিসারের নাম</td><td>:</td><td>___________________</td><td>&nbsp;&nbsp;</td><td>স্বাক্ষর</td><td>:</td><td>___________________</td></tr>


                                 <tr><td>ডে-কেয়ার সেন্টারের নাম</td><td>:</td><td>___________________</td><td>&nbsp;&nbsp;</td><td>তারিখ</td><td>:</td><td>___________________</td></tr>
                              </table> -->



                     </fieldset>
                     

                     <fieldset>
                        <h4>এই মর্মে প্রত্যয়ন করা যাচ্ছে যে, উপরের সকল তথ্যাবলী আমার জানা মতে সত্য ও সঠিক এবং শিশু ভর্তির সকল নিয়ম মেনে আমার শিশু কে সেন্টারে ভর্তি করছি</h4><br>

                        <div class="row form-row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>মাতা বা পিতা বা অভিভাবকের স্বাক্ষর</label>
                                 <div><?php echo form_error('userfile'); ?></div>
                                 <input type="file" name="userfile" required>
                                 <!-- <p class="help-block">File type jpg, png, jpeg are allowed.</p> -->
                                 
                              </div>
                           </div>

                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>তারিখ</label>
                                 <input type="date" name="registrations[reg_date]" value="<?=set_value('reg_date')?>" class="form-control" placeholder="" autocomplete="off">
                                 
                              </div>
                           </div>
                        </div>



                     </fieldset>
                  </div>   
                  <div style="overflow:auto;">
                         <div style="float:right;">
                           <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                           <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                         </div>
                  </div>
                  <div style="text-align:center;margin-top:40px;">
                         <span class="step"></span>
                         <span class="step"></span>
                         <span class="step"></span>
                         <span class="step"></span>
                         <span class="step"></span>
                         <span class="step"></span>
                         <span class="step"></span>
                         <!-- <span class="step"></span> -->
                         <span class="step"></span>
                         <span class="step"></span>
                  </div>

                      <!-- <input type="hidden" name="hide_app_info" value="22222"> -->

                        <!-- <div class="row form-row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <input type="submit" name="submit" value="সাবমিট করুন" class="btn btn-success pull-right" style="font-weight: bold;">
                              </div>
                           </div>
                        </div> -->
                  </div>
               </form>
            </div>
         </div>


      </div>

      
   </div>

  <script>
      var currentTab = 0; // Current tab is set to be the first tab (0)
      showTab(currentTab); // Display the current tab

      function showTab(n) {
        // This function will display the specified tab of the form...
        var x = document.getElementsByClassName("tab");
        x[n].style.display = "block";
        //... and fix the Previous/Next buttons:
        if (n == 0) {
          document.getElementById("prevBtn").style.display = "none";
        } else {
          document.getElementById("prevBtn").style.display = "inline";
        }
        if (n == (x.length - 1)) {
          document.getElementById("nextBtn").innerHTML = "Submit";
        } else {
          document.getElementById("nextBtn").innerHTML = "Next";
        }
        //... and run a function that will display the correct step indicator:
        fixStepIndicator(n)
      }

      function nextPrev(n) {
        // This function will figure out which tab to display
        var x = document.getElementsByClassName("tab");
        // Exit the function if any field in the current tab is invalid:
        if (n == 1 && !validateForm()) return false;
        // Hide the current tab:
        x[currentTab].style.display = "none";
        // Increase or decrease the current tab by 1:
        currentTab = currentTab + n;
        // if you have reached the end of the form...
        if (currentTab >= x.length) {
          // ... the form gets submitted:
          document.getElementById("regForm").submit();
          return false;
        }
        // Otherwise, display the correct tab:
        showTab(currentTab);
      }

      function validateForm() {
        // This function deals with validation of the form fields
        var x, y, i, valid = true;
        x = document.getElementsByClassName("tab");
        y = x[currentTab].getElementsByTagName("input");
        // A loop that checks every input field in the current tab:
        for (i = 0; i < y.length; i++) {
          // If a field is empty...
          if (y[i].value == "") {
            // add an "invalid" class to the field:
            y[i].className += " invalid";
            // and set the current valid status to false
            valid = false;
          }
        }
        // If the valid status is true, mark the step as finished and valid:
        if (valid) {
          document.getElementsByClassName("step")[currentTab].className += " finish";
        }
        return valid; // return the valid status
      }

      function fixStepIndicator(n) {
        // This function removes the "active" class of all steps...
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
          x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class on the current step:
        x[n].className += " active";
      }
   </script>