<style type="text/css">
   fieldset{font-family: 'Kalpurush', sans-serif;}
   h5{font-family: 'Kalpurush', sans-serif; text-align: left; font-weight: bold; font-size:16px;}
</style>
<div class="row">
   <?php $this->load->view('frontend/right_side_bar'); ?>

   <div class="col-md-9 main-content" style="padding: 15px 15px 15px 15px"> 
      <!-- <div class="col-md-10 col-sm-6 col-md-offset-1 col-sm-offset-1" style="border: 1px solid"> -->
      <ul class="nav nav-tabs">
         <li class="active"><a data-toggle="tab" href="#home"><strong>আমার প্রোফাইল</strong></a></li>
         <li><a data-toggle="tab" href="#menu1"><strong>আবেদনের তালিকা</strong></a></li>
         <li><a data-toggle="tab" href="#menu2"><strong>শিশু তালিকা ভুক্তির আবেদন</strong></a></li>
         <!-- <li><a data-toggle="tab" href="#menu3"><strong>ভর্তুকি আবেদন ফর্ম</strong></a></li> -->
      </ul>

      <div class="tab-content">
         <div id="home" class="tab-pane fade in active">
            <div  class="col-md-12" style="<?php if(!$edit){ echo 'display: none;'; } ?>  border:0px solid; background-color: #fff;padding-top:30px;">
               <?php echo form_open("index.php/my-profile/edit");?>

               <?php if($this->session->flashdata('success')):?>
                  <div class="alert alert-success">
                     <a class="close" data-dismiss="alert">&times;</a>
                     <?php echo $this->session->flashdata('success');?>
                  </div>
               <?php endif; ?> 

               <h4 class="pull-left" style="font-weight: bold">বেসিক তথ্য সংশোধন করুন</h4>
               <div><?php echo validation_errors(); ?></div>

               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="row form-row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label>নামের প্রথম অংশ (বাংলা) <span class="required">*</span></label>
                           <input type="text" name="first_name" value="<?=set_value('first_name' , $user_info->first_name)?>" class="form-control" placeholder="">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label>নামের শেষাংশ (বাংলা) <span class="required">*</span></label>
                           <input type="text" name="last_name" value="<?=set_value('last_name' , $user_info->last_name)?>" class="form-control" placeholder="">
                        </div>
                     </div>
                  </div>

                  <div class="row form-row">

                     <div class="col-md-6">
                        <div class="form-group">
                           <label>মোবাইল নম্বর <span class="required">*</span></label>
                           <input type="text" name="phone" value="<?=set_value('phone' , $user_info->phone)?>" class="form-control" placeholder="">
                        </div>
                     </div>

                     <div class="col-md-6">
                        <div class="form-group">
                           <label>লিঙ্গ</label><br>
                           <input type="radio" name="gender" value="Male" <?=set_value('gender')=='Male'?'checked':'checked';?>> পুরুষ
                           <input type="radio" name="gender" value="Female" <?=set_value('gender')=='Female'?'':'';?>> মহিলা
                        </div>
                     </div>
                  </div>

                  <div class="row form-row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label>পাসওয়ার্ড</label>
                           <input type="password" name="password" value="" class="form-control">
                        </div>
                     </div>

                     <div class="col-md-6">
                        <div class="form-group">
                           <label>পুনরায় পাসওয়ার্ড</label>
                           <input type="password" name="password_confirm" value="" class="form-control">
                        </div>
                     </div>

                  </div>

                  <div class="row form-row">
                     <div class="col-md-12">
                        <div class="form-group">
                           <input type="submit" name="submit" value="সাবমিট করুন" class="btn btn-success pull-right" style="font-weight: bold;">
                        </div>
                     </div>
                  </div>
               </div>
               <input type="hidden" name="hide_update_info" value="11111">
               <?php echo form_close();?>
            </div>
            <div  class="col-md-12" style="<?php if($edit){ echo 'display: none;'; } ?>  border:0px solid; background-color: #fff;padding-top:30px;">
               <?php if($this->session->flashdata('success')):?>
                  <div class="alert alert-success">
                     <a class="close" data-dismiss="alert">&times;</a>
                     <?php echo $this->session->flashdata('success');?>
                  </div>
               <?php endif; ?> 

               <h4 class="pull-left" style="font-weight: bold">বেসিক তথ্য</h4>
               <a class="btn btn-success pull-right" href="<?=base_url();?>index.php/my-profile/edit" style="font-weight: bold">এডিট করুন</a>

               <table class="table table-bordered basic">
                  <tbody>
                     <tr>
                        <th width="150">নাম</th>
                        <td><?=$user_info->first_name.' '.$user_info->last_name?></td>
                     </tr>
                     <tr>
                        <th>ইমেইল</th>
                        <td><?=$user_info->username?></td>
                     </tr>
                     <tr>
                        <th>ফোন নং</th>
                        <td><?=$user_info->phone?></td>
                     </tr>
                     <tr>
                        <th>লিঙ্গ</th>
                        <td><?=$user_info->gender?></td>
                     </tr>
                  </tbody>
               </table> 
            </div>

            <div class="col-md-12">
                  <table class="table table-bordered table-striped table-responsive">
                     <h5 style="font-weight: bold;text-decoration: underline; "> ধানমন্ডি শিশু দিবাযত্ন কেন্দ্র</h5>   
                     
                     <tbody style="background-color: #f3f0f0;">
                        <?php 
                        $sl=0;                     
                        // foreach ($seat_count as $row) { 
                           
                           ?>
                           <tr>
                              <th style="background-color: lightblue;">বয়স ভিত্তিক গ্রূপের নাম</th>
                              <th style="background-color: lightblue;">আসন বাকি</th>
                           </tr>
                           <tr>
                              <td>প্রারম্ভিক উদ্দীপনা পর্যায় ( ৪ মাস - ১২ মাস )</td>
                              <td><?php echo 6-$seat_count[1]['total_sec_1'];?></td>
                           </tr>
                           <tr>   
                              <td>প্রাক-প্রারম্ভিক শিখন পর্যায় ( ১২ মাস - ৩০ মাস)</td>
                              <td><?php echo 12-$seat_count[1]['total_sec_2'];?></td>
                           </tr>   
                           <tr>   
                              <td>প্রারম্ভিক শিখন পর্যায় (৩০ মাস – ৪৮ মাস)</td>
                              <td><?php echo 18-$seat_count[1]['total_sec_3'];?></td>
                           </tr>   
                           <tr>   
                              <td>প্রাক-প্রাথমিক স্কুল পর্যায় ( ৪ বছর - ৬ বছর )</td>
                              <td><?php echo 24-$seat_count[1]['total_sec_4'];?></td> 
                           </tr>
                          
                     </tbody>
                  </table>
                  <table class="table table-bordered table-striped table-responsive">
                     <h5 style="font-weight: bold;text-decoration: underline; "> ভূমি ভবন শিশু দিবাযত্ন কেন্দ্র</h5>   
                     
                     <tbody style="background-color: #f3f0f0;">
                        <?php 
                        $sl=0;                     
                        // foreach ($seat_count as $row) { 
                           
                           ?>
                           <tr>
                              <th style="background-color: lightblue;">বয়স ভিত্তিক গ্রূপের নাম</th>
                              <th style="background-color: lightblue;">আসন বাকি</th>
                           </tr>
                           <tr>
                              <td>প্রারম্ভিক উদ্দীপনা পর্যায় ( ৪ মাস - ১২ মাস )</td>
                              <td><?php echo 6-$seat_count[2]['total_sec_1'];?></td>
                           </tr>
                           <tr>   
                              <td>প্রাক-প্রারম্ভিক শিখন পর্যায় ( ১২ মাস - ৩০ মাস)</td>
                              <td><?php echo 12-$seat_count[2]['total_sec_2'];?></td>
                           </tr>   
                           <tr>   
                              <td>প্রারম্ভিক শিখন পর্যায় (৩০ মাস – ৪৮ মাস)</td>
                              <td><?php echo 18-$seat_count[2]['total_sec_3'];?></td>
                           </tr>   
                           <tr>   
                              <td>প্রাক-প্রাথমিক স্কুল পর্যায় ( ৪ বছর - ৬ বছর )</td>
                              <td><?php echo 24-$seat_count[2]['total_sec_4'];?></td> 
                           </tr>
                          
                     </tbody>
                  </table>
                  <table class="table table-bordered table-striped table-responsive">
                     <h5 style="font-weight: bold;text-decoration: underline; "> গোপালগঞ্জ শিশু দিবাযত্ন কেন্দ্র</h5>   
                     
                     <tbody style="background-color: #f3f0f0;">
                        <?php 
                        $sl=0;                     
                        // foreach ($seat_count as $row) { 
                           
                           ?>
                           <tr>
                              <th style="background-color: lightblue;">বয়স ভিত্তিক গ্রূপের নাম</th>
                              <th style="background-color: lightblue;">আসন বাকি</th>
                           </tr>
                           <tr>
                              <td>প্রারম্ভিক উদ্দীপনা পর্যায় ( ৪ মাস - ১২ মাস )</td>
                              <td><?php echo 6-$seat_count[11]['total_sec_1'];?></td>
                           </tr>
                           <tr>   
                              <td>প্রাক-প্রারম্ভিক শিখন পর্যায় ( ১২ মাস - ৩০ মাস)</td>
                              <td><?php echo 12-$seat_count[11]['total_sec_2'];?></td>
                           </tr>   
                           <tr>   
                              <td>প্রারম্ভিক শিখন পর্যায় (৩০ মাস – ৪৮ মাস)</td>
                              <td><?php echo 18-$seat_count[11]['total_sec_3'];?></td>
                           </tr>   
                           <tr>   
                              <td>প্রাক-প্রাথমিক স্কুল পর্যায় ( ৪ বছর - ৬ বছর )</td>
                              <td><?php echo 24-$seat_count[11]['total_sec_4'];?></td> 
                           </tr>
                          
                     </tbody>
                  </table>
            </div>
         </div>

       <!-- /home -->



         <div id="menu1" class="tab-pane fade">

               <div class="col-md-12" style="background-color: #fff;padding-top:30px;">
                  <div style="float: left;">
                     <h4 style="font-weight: bold;" class="pull-left">আবেদনের তালিকা</h4>
                  </div>
                  <div style="float: right;">
                     <span class="btn btn-success btn-xs list_view" style="display: none;">তালিকা দেখুন</span>
                  </div>

                  <style type="text/css">
                  .tg  {border-collapse:collapse;border-spacing:0; clear: both; width: 100%;}
                  .tg td{font-family:Arial, sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
                  .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
                  .tg .tg-dath{background-color:#a9e9f9;border-color:#9698ed;text-align:right;vertical-align:middle; width: 350px;}
                  .tg .tg-wra3{border-color:#9698ed;text-align:left;vertical-align:middle}
                  </style>
                  
                  <div class="appview"></div>

                  <table class="table table-bordered applications-list" >
                     <thead>
                        <tr>
                           <th>ক্রম </th>
                           <th>তারিখ</th>
                           <th>ডে কেয়ার নাম</th>
                           <th>শিশুর নাম</th>
                           <th width="110">অ্যাকশন</th>
                        </tr>
                     </thead>
                     <tbody>  
                     <?php
                     $sl=0;   
                     if(isset($results) && !empty($results)){
                     
                     foreach ($results as $row) { 
                      // echo "<pre>";  print_r($row);
                        $sl++;   
                        ?>
                       
                           <tr>
                              <td><?=$sl?></td>
                              <td><?=@date('Y-m-d', strtotime($row->created))?></td>
                              <td><?=@$this->Site_model->get_daycare_name($row->day_cares_id)?></td>
                              <td><?=@$row->child_name?></td>
                              <td> 
                                    <?php if($row->status==4&&$row->is_applied==0){ ?>
                                       <!-- <button type="button" class="btn btn-success btn-xs">অ্যাকশন</button> -->
                                       <a href="<?=base_url('index.php/new-application/'.$row->day_cares_id.'/'.$row->id)?>" class="btn btn-success btn-xs">ভর্তির আবেদন করুন</a>
                                       <?php /*
                                 <div class="btn-group">
                                    <button type="button" class="btn btn-success btn-xs">অ্যাকশন</button>
                                    <button type="button" class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                       <span class="caret"></span>
                                       <span class="sr-only">Toggle Dropdown</span>
                                    </button>

                                    <ul class="dropdown-menu" role="menu">
                                       <li><a href="<?=base_url('new-application/'.$row->id)?>">ভর্তির আবেদন করুন</a></li>
                                       <!-- <li><a href="javascript:void()" data-id="<?=$row->ud_table_id?>" onclick="func_details(<?=$row->ud_table_id?>)">বিস্তারিত</a></li> -->
                                       <!-- <li><a href="<?=base_url('my-profile/edit/'.$row->id)?>">সংশোধন করুন</a></li> -->
                                    </ul>
                                 </div>
                                 */ ?>
                                <?php }elseif ($row->status==0) {?>
                                 <p align="center" style="font-size: 12px;color: blue ">আবেদনটি অপেক্ষমান রয়েছে</p>
                                <?php }elseif ($row->status==3) {?>
                                 <p align="center" style="font-size: 12px;color: midnightblue; ">আবেদনটি চুড়ান্ত অনুমোদনের জন্য অপেক্ষমান রয়েছে</p>
                                <?php }elseif ($row->status==5) {?>
                                 <p align="center" style="font-size: 12px;color: red;font-weight: bold; ">আবেদনটি বাতিল করা হয়েছে</p>
                                <?php }elseif ($row->is_applied==1 && $row->subsidies==0 && $row->is_paid==0) {?>
                                 <a href="<?=base_url('index.php/subsidary-application/'.$row->day_cares_id.'/'.$row->id)?>" class="btn btn-success btn-xs">ভর্তুকির আবেদন করুন  </a><p style="text-align:center;">অথবা</p>
                                 <a href="<?=base_url('index.php/payment/'.$row->day_cares_id.'/'.$row->id)?>" class="btn btn-success btn-xs">পেমেন্ট সম্পূর্ণ করুন </a>
                                 <?php }elseif ($row->subsidies==1 && $row->subsidies_approved==0) {?>
                                 <p align="center" style="font-size: 12px;color: green ">ভর্তুকির জন্য আবেদন জমা দেওয়া হয়েছে । অনুমোদনের জন্য অপেক্ষা করুন</p>
                                 <?php }elseif ($row->is_applied==1 && $row->subsidies_approved==1 && $row->is_paid==0) {?>
                                 <a href="<?=base_url('index.php/payment/'.$row->day_cares_id.'/'.$row->id)?>" class="btn btn-success btn-xs">পেমেন্ট সম্পূর্ণ করুন </a>
                                <?php }elseif ($row->is_applied==1 && $row->pament_received==0) {?>
                                 <p align="center" style="font-size: 12px;color: green ">পেমেন্ট জমা দেওয়া হয়েছে এবং অনুমোদনের জন্য অপেক্ষা করুন</p>
                                <?php }elseif ($row->is_applied==1) {?>
                                 <p align="center" style="font-size: 12px;color: green ">ইতিমধ্যে ভর্তি সম্পূর্ণ হয়েছে</p>
                                <?php }else {?>
                                 <p align="center" style="font-size: 12px;color: darkgray ">পরিসমাপ্তি</p>
                                <?php }?>
                              </td>
                           </tr>
                        
                        <?php }}else{ ?>
                           
                           <tr>
                              <td colspan="5" style="text-align: center;">
                                 কোন আবেদন পাওয়া যাইনি
                              </td>
                           </tr>   

                        <?php } ?>   
                        </tbody>
                     </table>

                     
               </div>
         </div> <!-- /menu1 -->            

        
         
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

            <div id="menu2" class="tab-pane fade">
               <form  id="regForm" action="<?=base_url('index.php/my-profile/')?>" method="post" enctype="multipart/form-data" id="jsvalidation" style="font-family: 'arial'">

                  <div><?php //echo validation_errors(); ?></div>
                  <div class="col-md-12" style="background: #fff;padding-top:30px;">
                     
                        <!-- <h2 align="center">শিশু তালিকা ভুক্তির আবেদন</h2> -->
                     <!-- <h1>তালিকা ভুক্তির আবেদন ফর্ম:</h1> -->
                     <!-- One "tab" for each step in the form: -->
                    <div class="tab">
                        <h3 style="text-align: center;">পার্ট ১</h3>
                        <fieldset class="scheduler-border">
                           <legend class="scheduler-border"> সাধারণ তথ্য</legend>
                           <div class="row form-row">             
                              <div class="row form-row">
                                 <div class="col-md-6">
                                      <div class="form-group">
                                          <label>আবেদনকারীর নাম</label>
                                          <input type="text" name="registrations[applicant_name]" value="<?=set_value('applicant_name')?>" class="form-control" placeholder="" required>
                                       </div>
                                   </div>
                                  <!-- </div>
                                   <div class="row form-row"> -->
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label>২. আবেদনকারীর সাথে শিশুর সম্পর্ক </label><br>
                                          <input type="radio" name="registrations[applicant_relation]" value="Mother" <?=set_value('applicant_relation')=='Mother'?'checked':'checked';?>> মা 
                                          <input type="radio" name="registrations[applicant_relation]" value="Father" <?=set_value('applicant_relation')=='Father'?'':'';?>> বাবা
                                           <input type="radio" name="registrations[applicant_relation]" value="Guardian" <?=set_value('applicant_relation')=='Guardian'?'':'';?>> অন্যান্য
                                       </div>
                                    </div>
                              </div>   

                              <h5>৩. মাতার তথ্য</h5>
                              <div class="row form-row">
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label>নাম</label>
                                       <input type="text" name="registrations[child_mother_name]" value="<?=set_value('child_mother_name')?>" class="form-control" placeholder="">
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label>জন্ম তারিখ</label>
                                       <input type="date" name="registrations[child_mother_dob]" value="<?=set_value('child_mother_dob')?>" class="form-control" placeholder="" autocomplete="off">
                                    </div>
                                 </div>  

                                 <div class="col-md-6">
                                    <div class="form-group">
                                          <label>জাতীয় পরিচয়পত্রের নম্বর</label>
                                          <input type="text" name="registrations[child_mother_national_no]" value="<?=set_value('child_mother_national_no')?>" class="form-control" placeholder="">
                                       </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label>ই-মেইল আইডি</label>
                                       <input type="text" name="registrations[child_mother_email]" value="<?=set_value('child_mother_email')?>" class="form-control" placeholder="">
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label>বাসার ফোন নম্বর(যদি থাকে)</label>
                                       <input type="text" name="registrations[child_mother_parmanent_ph_no]" value="<?=set_value('child_mother_parmanent_ph_no')?>" class="form-control" placeholder="">
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label>মোবাইল নম্বর</label>
                                       <input type="text" name="registrations[child_mother_ph_no]" value="<?=set_value('child_mother_ph_no')?>" class="form-control" placeholder="">
                                    </div>
                                 </div>
                                 <div class="col-md-12">
                                    <div class="form-group">
                                          <label>বাসার ঠিকানা</label>
                                          <input type="text" name="registrations[child_mother_permanent_address]" value="<?=set_value('child_mother_permanent_address')?>" class="form-control" placeholder="">
                                       </div>
                                 </div>
                              </div> 

                              <h5>৪. পিতার তথ্য</h5>
                              <div class="row form-row">
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label>নাম</label>
                                       <input type="text" name="registrations[child_father_name]" value="<?=set_value('child_father_name')?>" class="form-control" placeholder="">
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label>জন্ম তারিখ</label>
                                       <input type="date" name="registrations[child_father_dob]" value="<?=set_value('child_father_dob')?>" class="form-control" placeholder="" autocomplete="off">
                                    </div>
                                 </div>  

                                 <div class="col-md-6">
                                    <div class="form-group">
                                          <label>জাতীয় পরিচয়পত্রের নম্বর</label>
                                          <input type="text" name="registrations[child_father_national_no]" value="<?=set_value('child_father_national_no')?>" class="form-control" placeholder="">
                                       </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label>ই-মেইল আইডি</label>
                                       <input type="text" name="registrations[child_father_email]" value="<?=set_value('child_father_email')?>" class="form-control" placeholder="">
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label>বাসার ফোন নম্বর(যদি থাকে)</label>
                                       <input type="text" name="registrations[child_father_permanent_address]" value="<?=set_value('child_father_permanent_address')?>" class="form-control" placeholder="">
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label>মোবাইল নম্বর</label>
                                       <input type="text" name="registrations[child_father_ph_no]" value="<?=set_value('child_father_ph_no')?>" class="form-control" placeholder="">
                                    </div>
                                 </div>
                                 <div class="col-md-12">
                                    <div class="form-group">
                                          <label>বাসার ঠিকানা</label>
                                          <input type="text" name="registrations[child_father_permanent_address]" value="<?=set_value('child_father_permanent_address')?>" class="form-control" placeholder="">
                                       </div>
                                 </div>
                              </div> 

                              <h5>৫. মাতা পিতার অবর্তমানে অভিভাবকের তথ্য</h5>
                              <div class="row form-row">
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label>নাম</label>
                                       <input type="text" name="registrations[child_parents_name]" value="<?=set_value('child_parents_name')?>" class="form-control" placeholder="">
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label>জন্ম তারিখ</label>
                                       <input type="date" name="registrations[child_parents_dob]" value="<?=set_value('child_parents_dob')?>" class="form-control" placeholder="" autocomplete="off">
                                    </div>
                                 </div>  

                                 <div class="col-md-6">
                                    <div class="form-group">
                                          <label>জাতীয় পরিচয়পত্রের নম্বর</label>
                                          <input type="text" name="registrations[child_parents_national_no]" value="<?=set_value('child_parents_national_no')?>" class="form-control" placeholder="">
                                       </div>
                                 </div>
                                 
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label>মোবাইল নাম্বার</label>
                                       <input type="text" name="registrations[child_parents_ph_no]" value="<?=set_value('child_parents_ph_no')?>" class="form-control" placeholder="">
                                    </div>
                                 </div>
                                 <div class="col-md-12">
                                    <div class="form-group">
                                          <label>বাসার ঠিকানা</label>
                                          <input type="text" name="registrations[child_parents_present_address]" value="<?=set_value('child_parents_present_address')?>" class="form-control" placeholder="">
                                       </div>
                                 </div>
                              </div> 
                        </fieldset>
                    </div>
                    <div class="tab">
                        <h3 style="text-align: center;">পার্ট ২</h3>
                        <fieldset class="scheduler-border">
                           <legend class="scheduler-border">মাতা-পিতার পেশা সংক্রান্ত তথ্য (অবশ্যই পূরণীয়)</legend>
                              <h5>৬. মাতার তথ্য</h5>
                           <div class="row form-row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>পেশা</label>
                                    <input type="text" name="registrations[child_mother_work_name]" value="<?=set_value('child_mother_work_name')?>" class="form-control" placeholder="">
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>পেশার ধরণঃ</label><br>
                                    <input type="radio" name="registrations[child_mother_work_type]" value="1"> পূর্ণ কর্মঘন্টার কর্মজীবী
                                    <input type="radio" name="registrations[child_mother_work_type]" value="1"> খন্ডকালীন কর্মজীবী
                                  </div>
                              </div>
                           </div>
                           <div class="row form-row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                       <label>পদবী</label>
                                       <input type="text" name="registrations[child_mother_designation]" value="<?=set_value('child_mother_designation')?>" class="form-control" placeholder="">
                                    </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>প্রতিষ্ঠান নাম</label>
                                    <input type="text" name="registrations[child_mother_working_institute]" value="<?=set_value('child_mother_working_institute')?>" class="form-control" placeholder="">
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>প্রতিষ্ঠান ফোন নম্বর(যদি থাকে)</label>
                                    <input type="text" name="registrations[child_mother_work_ph_no]" value="<?=set_value('child_mother_work_ph_no')?>" class="form-control" placeholder="">
                                 </div>
                              </div>
                               <div class="col-md-6">
                                 <div class="form-group">
                                    <label>প্রতিষ্ঠান ঠিকানা</label>
                                    <input type="text" name="registrations[child_mother_working_place]" value="<?=set_value('child_mother_working_place')?>" class="form-control" placeholder="">
                                 </div>
                              </div>
                               
                              
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>কর্মস্থল কর্তৃপক্ষ নাম ও পদবী</label>
                                    <input type="text" name="registrations[child_mother_work_md]" value="<?=set_value('child_mother_work_md')?>" class="form-control" placeholder="">
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                       <label>কর্মস্থল নিয়ন্ত্রণকারী কর্তৃপক্ষ ঠিকানা</label>
                                       <input type="text" name="registrations[child_mother_work_md_add]" value="<?=set_value('child_mother_work_md_add')?>" class="form-control" placeholder="">
                                    </div>
                              </div>
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label>প্রতিষ্ঠানের ধরণঃ</label>
                                    <input type="radio" name="registrations[child_mother_working_institute_type]" value="1"> সরকারি
                                    <input type="radio" name="registrations[child_mother_working_institute_type]" value="2"> আধা-সরকারি
                                    <input type="radio" name="registrations[child_mother_working_institute_type]" value="3"> স্বায়ত্তশাসিত
                                    <input type="radio" name="registrations[child_mother_working_institute_type]" value="4"> বেসরকারি
                                    <input type="radio" name="registrations[child_mother_working_institute_type]" value="5"> অন্যান্য
                                  </div>
                              </div>
                           </div> 
                           <h5>৭. পিতার তথ্য</h5>
                           <div class="row form-row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>পেশা</label>
                                    <input type="text" name="registrations[child_father_work_name]" value="<?=set_value('child_father_work_name')?>" class="form-control" placeholder="">
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>পেশার ধরণঃ</label><br>
                                    <input type="radio" name="registrations[child_father_work_type]" value="1"> পূর্ণ কর্মঘন্টার কর্মজীবী
                                    <input type="radio" name="registrations[child_father_work_type]" value="1"> খন্ডকালীন কর্মজীবী
                                  </div>
                              </div>
                             </div>
                             <div class="row form-row">
                           
                              <div class="col-md-6">
                                 <div class="form-group">
                                       <label>পদবী</label>
                                       <input type="text" name="registrations[child_father_designation]" value="<?=set_value('child_father_designation')?>" class="form-control" placeholder="">
                                    </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>প্রতিষ্ঠান নাম</label>
                                    <input type="text" name="registrations[child_father_working_institute]" value="<?=set_value('child_father_working_institute')?>" class="form-control" placeholder="">
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>প্রতিষ্ঠান ফোন নম্বর(যদি থাকে)</label>
                                    <input type="text" name="registrations[child_father_work_ph_no]" value="<?=set_value('child_father_work_ph_no')?>" class="form-control" placeholder="">
                                 </div>
                              </div>
                              
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>কর্মস্থল কর্তৃপক্ষ নাম ও পদবী</label>
                                    <input type="text" name="registrations[child_father_work_md]" value="<?=set_value('child_father_work_md')?>" class="form-control" placeholder="">
                                 </div>
                              </div>
                              <div class="col-md-12">
                                 <div class="form-group">
                                       <label>কর্মস্থল নিয়ন্ত্রণকারী কর্তৃপক্ষ ঠিকানা</label>
                                       <input type="text" name="registrations[child_father_work_md_add]" value="<?=set_value('child_father_work_md_add')?>" class="form-control" placeholder="">
                                    </div>
                              </div>
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label>প্রতিষ্ঠানের ধরণঃ</label>
                                    <input type="radio" name="registrations[child_father_working_institute_type]" value="1"> সরকারি
                                    <input type="radio" name="registrations[child_father_working_institute_type]" value="4"> আধা-সরকারি
                                    <input type="radio" name="registrations[child_father_working_institute_type]" value="5"> স্বায়ত্তশাসিত
                                    <input type="radio" name="registrations[child_father_working_institute_type]" value="2"> বেসরকারি
                                    <input type="radio" name="registrations[child_father_working_institute_type]" value="3">অন্যান্য
                                  </div>
                              </div>
                           </div>
                        </fieldset>
                    </div>
                    <div class="tab">
                        <h3 style="text-align: center;">পার্ট ৩</h3>
                        <fieldset class="scheduler-border">
                           <legend class="scheduler-border">শিশু তালিকাভুক্তির তথ্য</legend>
                             <div class="row form-row">
                                 <!-- <div class="col-md-6">
                                    <div class="form-group">
                                       <label>৮. আপনি কতজন শিশু ভর্তি করতে আগ্রহী?</label><br>
                                       <input type="radio" name="registrations[child_number]" value="1"> ০১ জন
                                       <input type="radio" name="registrations[child_number]" value="2"> ০২ জন
                                     </div>
                                 </div> -->
                                 <div class="col-md-8">
                                    <div class="form-group">
                                       <label>৮. আপনি কোন বয়স গ্রুপে শিশুকে ভর্তি করতে আগ্রহী?</label><br>
                                       <input type="radio" name="registrations[child_admit_interest]" value="1"> প্রারম্ভিক পর্যায় (৬ মাস - ১২ মাস)<br>
                                       <input type="radio" name="registrations[child_admit_interest]" value="2"> প্রাক-প্রারম্ভিক পর্যায় (১২ মাস - ৩০মাস)<br>
                                       <input type="radio" name="registrations[child_admit_interest]" value="3"> প্রারম্ভিক পর্যায় (৩০ মাস - ৪৮ মাস)<br>
                                       <input type="radio" name="registrations[child_admit_interest]" value="4"> প্রাক-প্রাথমিক স্কুল পর্যায় (৪ বছর - ৬ বছর)<br>
                                     </div>
                                 </div>

                                 <div class="col-md-8">
                                    <div class="form-group">
                                       <label>৯. এই শিশুর জন্য আপনার কখন শিশু দিবাযত্ন কেন্দ্র প্রোয়োজন হবে?</label>
                                        <input class="col-md-6" type="date" name="registrations[child_doj]" value="<?=set_value('child_doj')?>" class="form-control" placeholder="" autocomplete="off">
                                    </div>
                                 </div>

                             
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <?php echo form_error('day_cares_id'); ?>
                                    <label>১০. নিম্নের কোন কেন্দ্রে শিশু ভর্তি করতে চান?</label>
                                   <label>ডে কেয়ার সেন্টার নাম</label>
                                    <?php 
                                    $more_attr = 'class="form-control" required';
                                    echo form_dropdown('day_cares_id', $day_cares, set_value('day_cares_id'), $more_attr);
                                    ?>
                                 </div>
                              </div>               
                             </div>
                        </fieldset>
                    </div>
                    <div class="tab">
                        <h3 style="text-align: center;">পার্ট ৪</h3>
                        <fieldset class="scheduler-border">
                           <legend class="scheduler-border">শিশুর তথ্য</legend>
                           <h5>১১. শিশু -০১</h5>
                              <div class="row form-row">
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <label>নাম</label>
                                       <input type="text" name="members[child_name]" value="<?=set_value('child_name')?>" class="form-control" placeholder="" required>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label>শিশুর জন্ম তারিখ</label>
                                       <input type="date" name="members[child_dob]" value="<?=set_value('child_dob')?>" class="form-control" placeholder="" autocomplete="off" required>
                                    </div>
                                 </div>  

                                 <div class="col-md-6">
                                    <div class="form-group">
                                          <label>জন্ম নিবন্ধন নম্বর</label>
                                          <input type="text" name="members[birth_certificate_no]" value="<?=set_value('birth_certificate_no')?>" class="form-control" placeholder="" required>
                                       </div>
                                 </div>
                              </div> 
                              <!-- <h5>১৩. শিশু -০২</h5>
                              <div class="row form-row">
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <label>নাম</label>
                                       <input type="text" name="members[child_name_2]" value="<?=set_value('child_name')?>" class="form-control" placeholder="">
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label>শিশুর জন্ম তারিখ</label>
                                       <input type="date" name="members[child_dob_2]" value="<?=set_value('child_dob')?>" class="form-control" placeholder="" autocomplete="off">
                                    </div>
                                 </div>  

                                 <div class="col-md-6">
                                    <div class="form-group">
                                          <label>জন্ম নিবন্ধন নম্বর</label>
                                          <input type="text" name="members[birth_certificate_no_2]" value="<?=set_value('birth_certificate_no')?>" class="form-control" placeholder="">
                                       </div>
                                 </div>
                              
                              </div>  -->
                        </fieldset>
                    </div>
                    <div class="tab">
                        <h3 style="text-align: center;">পার্ট ৫</h3>
                        <fieldset class="scheduler-border">
                           <legend class="scheduler-border">প্রয়োজনীয় সংযুক্তিসমূহ</legend>
                              <div class="row form-row">
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <input type="checkbox" name="registrations[attachment_4]" value="1">  আবেদনকারীর (মাতা-পিতা বা বিকল্প অভিভাবকের) পাসপোর্ট সাইজের ছবি.<div><?php echo form_error('userfile'); ?></div>
                                          <input type="file" name="userfile" ><br>
                                       <input type="checkbox" name="registrations[attachment_5]" value="1">  মাতা-পিতা ও বিকল্প অভিভাবকের জাতীয় পরিচয়পত্রের কপি.<div><?php echo form_error('userfile1'); ?></div>
                                          <input type="file" name="userfile1" ><br>
                                       <input type="checkbox" name="registrations[attachment_6]" value="1">   শিশুর জন্মসনদের কপি.<div><?php echo form_error('userfile2'); ?></div>
                                          <input type="file" name="userfile2" ><br>
                                       <input type="checkbox" name="registrations[attachment_7]" value="1">   মাতা ও পিতার চাকুরী নিয়ন্ত্রণকারী কর্তৃপক্ষ কর্তৃক প্রত্যয়নপত্র.<div><?php echo form_error('userfile3'); ?></div>
                                          <input type="file" name="userfile3" ><br>
                                     </div>
                                 </div>
                              </div>
                        


                             <input type="hidden" name="hide_app_info" value="22222">

                              <!-- <div class="row form-row">
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <input type="submit" name="submit" value="সাবমিট করুন" class="btn btn-success pull-right" style="font-weight: bold;">
                                    </div>
                                 </div>
                              </div> -->

                        </fieldset>
                    </div>
                    <div style="overflow:auto;">
                         <div style="float:right;">
                           <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                           <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                         </div>
                    </div>
                    <!-- Circles which indicates the steps of the form: -->
                    <div style="text-align:center;margin-top:40px;">
                         <span class="step"></span>
                         <span class="step"></span>
                         <span class="step"></span>
                         <span class="step"></span>
                         <span class="step"></span>
                    </div>
                  </div>
               </form>

            </div> <!-- /part2 -->            




         <?php /* 
            <div id="menu3" class="tab-pane fade">

               <form action="<?=base_url('index.php/my-profile/')?>" method="post" enctype="multipart/form-data" id="jsvalidation" style="font-family: 'arial'">

                  <div><?php //echo validation_errors(); ?></div>
                  <div class="col-md-12" style="background: #fff;padding-top:30px;">
                        <!-- <h2 align="center">শিশু তালিকা ভুক্তির আবেদন</h2> -->
                     <fieldset class="scheduler-border">
                        <legend class="scheduler-border">পার্ট-১: সাধারণ তথ্য</legend>
                        <div class="row form-row">
                              <!-- <div class="col-md-12">
                                 <div class="form-group">
                                    <?php echo form_error('day_cares_id'); ?>
                                    <label>ডে কেয়ার সেন্টার নাম</label>
                                    <?php 
                                    $more_attr = 'class="form-control" ';
                                    echo form_dropdown('day_cares_id', $day_cares, set_value('day_cares_id'), $more_attr);
                                    ?>
                                 </div>
                              </div> -->              
                          
                              <div class="col-md-12">
                                   <div class="form-group">
                                       <label>১। আপনি কি পূর্ণ কর্মঘন্টার (৯টা - ৫টা) কর্মজীবী নারী?</label><br>
                                       <input type="radio" name="registrations[child_mother_work_5-9]" value="yes"<?=set_value('applicant_relation')=='yes'?'checked':'checked';?>> হ্যাঁ 
                                       <input type="radio" name="registrations[child_mother_work_5-9]" value="no"<?=set_value('applicant_relation')=='no'?'':'';?>> না
                                    </div>
                              </div>

                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <label>২। আপনার পারিবারিক মাসিক আয় কি ৪৯,৯৯৯/- টাকার নিম্নে? </label><br>
                                       <input type="radio" name="registrations[family_monthly_income_less_50000]" value="yes" <?=set_value('family_monthly_income_less_50000')=='yes'?'checked':'checked';?>> হ্যাঁ 
                                       <input type="radio" name="registrations[family_monthly_income_less_50000]" value="no" <?=set_value('family_monthly_income_less_50000')=='no'?'':'';?>> না
                                        
                                    </div>
                                 </div>
                        </div>
                     
                     </fieldset>


                     <fieldset class="scheduler-border">
                        <legend class="scheduler-border">পার্ট-২: আবেদনকারীর তথ্য </legend>
                             <div class="col-md-12">
                                 <div class="form-group">
                                    <div class="row">
                                       <div class="col-md-3">
                                          <label>৩।  মাতার নাম:</label>
                                       </div>
                                       <div class="col-md-9">
                                          <input type="text" name="registrations[child_mother_name]" value="<?=set_value('child_mother_name')?>" class="form-control"placeholder="" required>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                             <div class="col-md-12">
                                 <div class="form-group">
                                    <div class="row">
                                       <div class="col-md-3">
                                          <label>৪। ভর্তিকৃত শিশুর নাম: </label>
                                       </div>
                                       <div class="col-md-9">
                                          <input type="text" name="registrations[child_name_subsidy]" value="<?=set_value('child_name_subsidy')?>" class="form-control" placeholder="">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <div class="row">
                                       <div class="col-md-3">
                                          <label>৫। ঠিকানা:</label>
                                       </div>
                                       <div class="col-md-9">
                                          <input type="text" name="registrations[child_mother_permanent_address]" value="<?=set_value('child_mother_permanent_address')?>" class="form-control" placeholder="">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <div class="row">
                                       <div class="col-md-3">
                                          <label>ই-মেইল আইডি:</label>
                                       </div>
                                       <div class="col-md-9">
                                          <input type="text" name="registrations[child_mother_email]" value="<?=set_value('child_mother_email')?>" class="form-control" placeholder="">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <div class="row">
                                       <div class="col-md-3">
                                          <label>মোবাইল নম্বর:</label>
                                       </div>
                                       <div class="col-md-9">
                                          <input type="text" name="registrations[child_mother_ph_no]" value="<?=set_value('child_mother_ph_no')?>" class="form-control" placeholder="">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                     </fieldset>

                     <fieldset class="scheduler-border">
                        <legend class="scheduler-border">পার্ট-৩: আর্থিক তথ্য</legend>
                          <div class="row form-row">
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label>৬। মাতার মাসিক আয়ের পরিমাণ</label><br>
                                       <input type="radio" name="registrations[morther_monthly_income]" value="1">  ০ - ৭,৯৯৯ টাকা<br>
                                       <input type="radio" name="registrations[morther_monthly_income]" value="2">  ৮,০০০ - ১৯,৯৯৯ টাকা<br>
                                       <input type="radio" name="registrations[morther_monthly_income]" value="3"> ২০,০০০ - ৩৪,৯৯৯ টাকা<br>
                                       <input type="radio" name="registrations[morther_monthly_income]" value="4"> ৩৫,০০০ - ৪৯,৯৯৯ টাকা<br>
                                       <input type="radio" name="registrations[morther_monthly_income]" value="5"> ৫০,০০০ অথবা ততোধিক<br>
                                       
                                     </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label>৭। পিতার মাসিক আয়ের পরিমাণ</label><br>
                                       <input type="radio" name="registrations[father_monthly_income]" value="1">  ০ - ৭,৯৯৯ টাকা<br>
                                       <input type="radio" name="registrations[father_monthly_income]" value="2">  ৮,০০০ - ১৯,৯৯৯ টাকা<br>
                                       <input type="radio" name="registrations[father_monthly_income]" value="3"> ২০,০০০ - ৩৪,৯৯৯ টাকা<br>
                                       <input type="radio" name="registrations[father_monthly_income]" value="4"> ৩৫,০০০ - ৪৯,৯৯৯ টাকা<br>
                                       <input type="radio" name="registrations[father_monthly_income]" value="5"> ৫০,০০০ অথবা ততোধিক<br>
                                       
                                    </div>
                                 </div>

                                 <div class="col-md-10">
                                    <div class="form-group">
                                       <div class="row">
                                          <div class="col-md-5">
                                             <label>৮। পারিবারিক মোট মাসিক আয়:</label>
                                          </div>
                                          <div class="col-md-5">
                                             <input type="text" name="registrations[family_monthly_income]" value="<?=set_value('family_monthly_income')?>" class="form-control" placeholder="">
                                          </div>
                                       </div>
                                    </div>
                                 </div>

                                 <div class="col-md-10">
                                    <div class="form-group">
                                       <label>৯। সর্বশেষ বাৎসরিক আয়কর রিটার্নে দাখিলকৃত পারিবারিক মোট আয়:</label>
                                          <div class="row">
                                             <div class="col-md-4" style="text-align: center;">
                                                 কর বছর
                                                <input type="text" name="registrations[tax_paying_year]" value="<?=set_value('tax_paying_year')?>" class="form-control" placeholder="">
                                             </div>
                                             <div class="col-md-6" style="text-align: center;">
                                                    পারিবারিক আয়
                                                <input type="text" name="registrations[family_total_monthly_income]" value="<?=set_value('family_total_monthly_income')?>" class="form-control" placeholder="">
                                             </div>
                                          </div>
                                    </div>
                                 </div>
                           </div>
                     </fieldset>

                     <fieldset class="scheduler-border">
                        <legend class="scheduler-border">পার্ট-৪: সংযুক্তিসমূহ</legend>
                           <div class="row form-row">
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <input type="checkbox" name="registrations[attachment_1]" value="1">  নিয়োগকারী কর্তৃপক্ষের নিকট হতে মাতা-পিতার মাসিক বেতনের প্রত্যয়নপত্র অথবা বেতন বিবৃতির ব্যাংক স্টেটমেন্ট;<br>
                                    <input type="checkbox" name="registrations[attachment_2]" value="1">  পারিবারিক মোট মাসিক আয়;<br>
                                    <input type="checkbox" name="registrations[attachment_3]" value="1">  সর্বশেষ বাৎসরিক আয়কর দাখিলের প্রমাণপত্র।<br>
                                  </div>
                              </div>
                           </div>
                     


                        <input type="hidden" name="hide_app_info" value="33333">

                           <div class="row form-row">
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <input type="submit" name="submit2" value="সাবমিট করুন" class="btn btn-success pull-right" style="font-weight: bold;">
                                 </div>
                              </div>
                           </div>

                     </fieldset>
                  </div>
               </form>

            </div>
          */?>   
         </div> <!-- /menu2 -->







      </div>

         
   </div>


   <script>
       function func_details(id){
          // alert(id);

          $.ajax({
             type: "GET",
             url: hostname+'site/app_view/'+id,
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