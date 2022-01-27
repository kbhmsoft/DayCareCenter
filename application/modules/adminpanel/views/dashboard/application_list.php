

<section class="content">
   <div class="row">
      <div class="col-md-12">
         <div class="box box-primary">
            <div style="float: center; margin: 10px 10px 10px 150px;">
               <form class="form-inline" action="<?=base_url('index.php/adminpanel/member/verified_request_search/1');?>" method="GET"> 
                  <div class="input-group">
                     <select name="year_group" class="form-control">
                       <option value="">সিলেক্ট বয়সভিত্তিক গ্রুপ</option>
                       <option value="1">প্রারম্ভিক পর্যায় (৬ মাস - ১২ মাস)</option>
                       <option value="2">প্রাক-প্রারম্ভিক পর্যায় (১২ মাস - ৩০মাস)</option>
                       <option value="3">প্রারম্ভিক পর্যায় (৩০ মাস - ৪৮ মাস)</option>
                       <option value="4">প্রাক-প্রাথমিক স্কুল পর্যায় (৪ বছর - ৬ বছর)</option>
                     </select>
                  </div>
                  <div class="input-group">
                    <input type="text" name="date_dirth" class="form-control" id="datepickers" autocomplete="off" placeholder="জন্ম তারিখ"/>
                  </div>
                  <div class="input-group">
                    <input type="text" name="date_joining" class="form-control" id="datepicker" autocomplete="off" placeholder="যোগদানের তারিখ" />
                    <div class="input-group-btn">
                      <button class="btn btn-primary" type="submit">
                        <span class="glyphicon glyphicon-search"></span>
                      </button>
                    </div>
                    <div class="input-group-btn">
                      <a class="btn btn-warning" href="<?=base_url('index.php/adminpanel/member/verified_request/1');?>">clear</a>
                    </div>
                  </div>
               </form>
            </div>
      

            <div class="box-body">
               <!-- <div id="infoMessage"><?php //echo $message;?></div>             -->
               <?php if($this->session->flashdata('success')):?>
                  <div class="alert alert-success">
                     <a class="close" data-dismiss="alert">&times;</a>
                     <?php echo $this->session->flashdata('success');?>
                  </div>
               <?php endif; ?>

               
               <?php foreach ($day_care_list as $item) { ?>
                  <?php if($results[$item->id]){ ?>

                  <table class="table table-bordered table-striped table-responsive">
                     <h5 style="font-weight: bold;text-decoration: underline; "><?php echo $item->title; ?></h5>   
                     <thead style="background-color: lightblue;">
                        <tr>
                           <th width="20">নং</th>
                           <th>শিশুর নাম</th>
                           <th>জন্ম তারিখ</th>
                           <!-- <th>যোগদানের তারিখ</th> -->
                           <th>কবে থেকে প্রয়োজন</th>
                           <th>বয়সভিত্তিক গ্রুপ</th>
                           <th>মায়ের নাম</th>
                           <th>মায়ের প্রতিষ্ঠানের নাম</th>
                           <th>পদবী</th>
                           <th>কর্মস্থান</th>
                           <th>বেতন</th>
                           <th>পেমেন্ট</th>
                           <th width="100">পদক্ষেপ</th>
                        </tr>
                     </thead>
                     <tbody style="background-color: #f3f0f0;">
                        <?php 
                        $sl=0;                     
                        foreach ($results[$item->id] as $row) { 
                           $sl++;
                           ?>
                           <tr>
                              <td><?=$sl;?></td>
                              <td><?php echo $row->child_name;?></td>
                              <td><?php echo $row->child_dob;?></td>
                              <td><?php echo $row->child_doj;?></td>
                              <td><?=$row->child_admit_interest== 1 ? ' প্রারম্ভিক পর্যায় (৬ মাস - ১২ মাস)':($row->child_admit_interest == 2 ? 'প্রাক-প্রারম্ভিক পর্যায় (১২ মাস - ৩০মাস)':($row->child_admit_interest == 3 ? 'প্রারম্ভিক পর্যায় (৩০ মাস - ৪৮ মাস)':($row->child_admit_interest == 4 ? 'প্রাক-প্রাথমিক স্কুল পর্যায় (৪ বছর - ৬ বছর)': ''))) ;?>
                              </td>                
                              <td><?php echo $row->child_mother_name;?></td>
                              <td><?php echo $row->child_mother_working_institute;?></td> 
                              <td><?php echo $row->child_mother_designation;?></td>
                              <td><?php echo $row->child_mother_working_place;?></td>
                              <td><?php echo $row->monthly_fee;?></td>
                              <td><?php echo $row->is_paid==1 ?'ইতোমধ্যে পরিশোধিত' :'পরিশোধ করেনি';?></td>
                                                          <td> 
                                 <div class="btn-group">
                                    <!-- <button type="button" class="btn btn-success btn-xs">পদক্ষেপ</button> -->
                                    <a href="<?=base_url('index.php/adminpanel/member/details_all/'.$row->id.'/'.$row->day_cares_id)?>"><button type="button" class="btn btn-success btn-xs">বিস্তারিত</button></a>
                                    <!-- <button type="button" class="btn btn-success btn-xs dropdown-toggle w-100" data-toggle="dropdown" aria-expanded="true">
                                       পদক্ষেপ &nbsp;<span class="caret"></span>
                                       <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                       <li>
                                          <a href="<?=base_url('index.php/adminpanel/member/details_all/'.$row->id.'/'.$row->day_cares_id)?>" >বিস্তারিত</a>
                                       </li>
                                    </ul> -->
                                 </div>
                              </td>
                              
                               
                           </tr>
                           <?php } ?>
                        </tbody>
                     </table>
                     <?php } ?>
                     <?php } ?>
                  </div>
                  <!-- /.box-body -->

                  <div class="box-footer">                
                  </div>
               </div>
               <!-- /.box -->
            </div>
         </div>
         <!-- /.row -->

      </section>
      <!-- /.content -->
<script type="text/javascript">
  $( document ).ready(function() {
    // $('#date_joining').attr('placeholder', 'Placeholder text');
  });
</script>
