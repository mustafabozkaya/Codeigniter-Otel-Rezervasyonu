<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-success">
                <!-- form start -->

                <form role="form" method="post"  enctype="multipart/form-data" action="<?php echo base_url("contactpage/edit/$row->id");?>">

                    <div class="box-body col-md-6">
                        <div class="box-header with-border">
                            <h3 class="box-title">Company</h3>
                        </div>
                        <div class="form-group">

                            <div class="col-md-6">
                                <label >Current Logo (img) </label>
                                <a class="thumbnail fancybox" rel="ligthbox"
                                   href="<?php echo (is_file("uploads/$row->logo")) ? base_url("uploads") . "/" . $row->logo : base_url("uploads/defaultimg/images.jpg") ?>">
                                    <img class="img-responsive "  src="<?php
                                    if(is_file("uploads/$row->logo")){
                                        echo base_url("uploads/$row->logo");
                                    }
                                    else{
                                        echo base_url("uploads/defaultimg/images.jpg");
                                    }?>" alt="<?php echo $row->logo; ?>">
                                </a>
                            </div>

                            <div class="col-md-6">
                                <label >Selected Logo (img) </label>
                                <a id="select" class="thumbnail fancybox" rel="ligthbox"
                                   href="">
                                    <img class="img-responsive " id="blah"
                                         src="<?php echo base_url("uploads/defaultimg/images.jpg"); ?>"
                                         alt="<?php echo $row->title; ?>">
                                </a>

                            </div>
                             <div class="col-lg-12">
                                 <input value="<?php echo $row->logo ?>" id="imgInp" type="file"  name="logofile"  >
                             </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Corporation Name</label>
                            <input value="<?php echo $row->title ?>" type="text" class="form-control" name="title" >
                        </div>
                        <div class="form-group">
                            <label>Mission</label>
                            <textarea  name="mission" class="form-control" rows="3" placeholder="Enter ..."><?php echo $row->mission ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Vision</label>
                            <textarea name="vision" class="form-control" rows="3" placeholder="Enter ..."><?php echo $row->vision ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>About Us</label>
                            <textarea name="about_us" class="form-control" rows="3" placeholder="Enter ..."><?php echo $row->about_us ?></textarea>
                        </div>
                    </div>
                    <div class="box-body col-md-6">
                        <div class="box-header with-border">
                            <h3 class="box-title">Contact İnformation</h3>
                        </div>
                        <div class="form-group">
                            <label>Fax</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-fax"></i>
                                </div>
                                <input value="<?php echo $row->fax ?>" type="text" name="fax" class="form-control" data-inputmask="&quot;mask&quot;: &quot;(999) 999-9999&quot;" data-mask="">
                            </div>
                            <!-- /.input group -->
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input value="<?php echo $row->email ?>" type="email" name="email" class="form-control" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Phone</label>

                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <input value="<?php echo $row->phone ?>" type="text" name="phone" class="form-control" data-inputmask="&quot;mask&quot;: &quot;(999) 999-9999&quot;" data-mask="">
                            </div>
                            <!-- /.input group -->
                        </div>
                        <div class="form-group">
                            <label>Web Address</label>

                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-laptop"></i>
                                </div>
                                <input value="<?php echo $row->web ?>" type="text" name="web" class="form-control" data-inputmask="'alias': 'ip'" data-mask="">
                            </div>
                            <!-- /.input group -->
                        </div>
                        <div class="form-group">
                            <label>Adress</label>
                            <textarea name="address" class="form-control" rows="3" placeholder="Enter ..."><?php echo $row->address ?></textarea>
                        </div>
                    </div>

                    <div class="box-body col-md-6">
                        <div class="box-header with-border">
                            <h3 class="box-title">Social Media Accounts</h3>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-facebook-official"></i></span>
                                <input value="<?php echo $row->facebook ?>" name="facebook" type="text" class="form-control" placeholder="Username">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-twitter-square"></i></span>
                                <input value="<?php echo $row->twitter ?>" name="twitter" type="text" class="form-control" placeholder="Username">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-youtube-square"></i></span>
                                <input value="<?php echo $row->youtube ?>" name="youtube" type="text" class="form-control" placeholder="Username">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-instagram"></i></span>
                                <input value="<?php echo $row->instagram ?>" name="instagram" type=text" class="form-control" placeholder="Username">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-google-plus"></i></span>
                                <input value="<?php echo $row->google_plus ?>" name="google_plus" type="text" class="form-control" placeholder="Username">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-linkedin-square"></i></span>
                                <input value="<?php echo $row->linkedin ?>" name="linkedin" type="text" class="form-control" placeholder="Username">
                            </div>
                        </div>

                    </div>



                    <div class="box-body col-md-6">
                        <div class="box-header with-border">
                            <h3 class="box-title"> Seo Settings</h3>
                        </div>
                        <div class="form-group">

                            <label>Google Analitics</label>

                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-link"></i></span>
                                <input value="<?php echo $row->google_analytics ?>" name="google_analytics" type="text" class="form-control" placeholder="Username">
                            </div>
                            <!-- /.input group -->
                        </div>
                        <div class="form-group">
                            <label>Meta Descripion</label>
                            <textarea name="meta_description" class="form-control" rows="3" placeholder="Enter ..."><?php echo $row->meta_description ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Meta Keyword</label>
                            <input value="<?php echo $row->meta_keyword ?>" type="text" class="form-control" name="meta_keyword">
                        </div>


                    </div>

                    <div class="box-body col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Map Att</label>
                            <input value="<?php echo $row->map_att?>" type="text" class="form-control" name="map_att">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Map Latt</label>
                            <input value="<?php echo $row->map_lat ?>" type="text" class="form-control" name="map_lat">
                        </div>
                    </div>

                    <div class="box-body col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Bank Account</label>
                            <input value="<?php echo $row->bank_account?>" type="text" class="form-control" name="bank_account">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mersis No</label>
                            <input value="<?php echo $row->mersis_id ?>" type="text" class="form-control" name="mersis_id">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tax Number</label>
                            <input value="<?php echo $row->tax_id ?>" type="text" class="form-control" name="tax_id">
                        </div>
                    </div>

                    <!-- /.box-body -->
                    <div class="clearfix"></div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>

            </div>
            <!-- /.box -->
        </div>
</section>
<!-- /.content -->