<section class="content-header">
   <h1> <?=$meta_title; ?> </h1>
   <ol class="breadcrumb">
      <li><a href="<?=base_url('index.php/adminpanel/dashboard');?>"><i class="fa fa-dashboard"></i> ড্যাশবোর্ড</a></li>
      <li class="active"><?=$meta_title; ?></li>
   </ol>
</section>

<section class="content">

   <div class="row">
      <div class="col-md-12">
         <div class="box box-primary">
            <div style="float: center; margin: 10px 10px -10px 150px;">
               <form class="form-inline" action="<?=base_url('index.php/adminpanel/member/verified_request_search/5');?>" method="GET"> 
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
                      <a class="btn btn-warning" href="<?=base_url('index.php/adminpanel/member/verified_request/5');?>">clear</a>
                    </div>
                  </div>
               </form>
            </div>       

            <div class="box-body">
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
                           <th>নং</th>
                           <th>তারিখ</th>
                           <th>টাইটেল</th>
                           <th>মোট আইটেম</th>
                           <th>অ্যাকশন</th>
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
                           <td><?=date('d, M Y', strtotime($row->created));?></td> 
                           <td><?=$row->title;?></td>
                           <td><?=$row->total_item_count;?></td>                 
                           <td> 
                           <a href="<?=base_url('index.php/adminpanel/budget/monthly_demand_details/'.$row->id.'/'.$item->database_name)?>" class="btn btn-success btn-xs">Details</a>
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
