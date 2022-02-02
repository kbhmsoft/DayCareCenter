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
               <form class="form-inline" action="<?=base_url('index.php/adminpanel/budget/monthly_demand_search');?>" method="GET"> 
                  <div class="input-group">
                    <select name="db_name" class="form-control">
                      <option value="">সিলেক্ট শিশু দিবাযত্ন কেন্দ্র</option>
                      <?php foreach ($day_care_list as $item) {  ?>
                        <option value="<?php echo $item->database_name; ?>"><?php echo $item->title; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="input-group">
                    <input type="text" name="start_date" class="form-control" id="datepickers" autocomplete="off" placeholder="from"/>
                  </div>
                  <div class="input-group">
                    <input type="text" name="end_date" class="form-control" id="datepicker" autocomplete="off" placeholder="to" />
                    <div class="input-group-btn">
                      <button class="btn btn-primary" type="submit">
                        <span class="glyphicon glyphicon-search"></span>
                      </button>
                    </div>
                    <div class="input-group-btn">
                      <a class="btn btn-warning" href="<?=base_url('index.php/adminpanel/budget/monthly_demand_all');?>">clear</a>
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
