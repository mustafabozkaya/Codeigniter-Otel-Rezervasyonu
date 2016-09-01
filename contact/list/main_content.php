<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>

                            <th>ID</th>
                            <th>Logo</th>
                            <th>Başlık</th>
                            <th>Misyon</th>
                            <th>Vizyon</th>
                            <th>About Us</th>
                            <th>Web</th>
                            <th>Phone(m<sup>2</sup>)</th>
                            <th>Fax</th>
                            <th>Email</th>
                            <th>Youtube</th>
                            <th>Facebook</th>
                            <th>Twitter</th>
                            <th>Google+</th>
                            <th>Linkedin</th>
                            <th>İnstagram</th>
                            <th>Tax Number</th>
                            <th>Mersis</th>
                            <th>Bank Account</th>
                            <th>Google Analitics</th>
                            <th>Map Att</th>
                            <th>Map Lati</th>
                            <th>Adress</th>
                            <th>Meta Keyword</th>
                            <th>Meta Descriptions</th>
                            <th>isActive</th>
                            <th class="col-md-2">İşlemler</th>
                        </thead>
                        <tbody class="sortableList table-responsive" postUrl="room/rankUpdate">
                            <?php foreach($rows as $row) { ?>
                                <tr id="sortId-<?php echo $row->id;?>">
                                    <td><?php echo $row->id;?></td>
                                    <td >
                                        <a class="thumbnail fancybox" rel="ligthbox"
                                           href="<?php echo (is_file("uploads/$row->logo"))? base_url("uploads") . "/" . $row->logo : base_url("uploads/defaultimg/images.jpg") ?>">
                                            <img  src="<?php
                                            if(is_file("uploads/$row->logo")){
                                                echo base_url("uploads/$row->logo");
                                            }
                                            else{
                                                echo base_url("uploads/defaultimg/images.jpg");
                                            }?>" alt="<?php echo $row->logo; ?>">
                                        </a>

                                    </td>
                                    <td><?php echo $row->title;?></td>
                                    <td><?php echo $row->mission;?></td>
                                    <td><?php echo $row->vision;?></td>
                                    <td><?php echo $row->about_us;?></td>
                                    <td><?php echo $row->web;?></td>
                                    <td><?php echo $row->phone;?></td>
                                    <td><?php echo $row->fax;?></td>
                                    <td><?php echo $row->email;?></td>
                                    <td><?php echo $row->youtube;?></td>
                                    <td><?php echo $row->facebook;?></td>
                                    <td><?php echo $row->twitter;?></td>
                                    <td><?php echo $row->google_plus;?></td>
                                    <td><?php echo $row->linkedin;?></td>
                                    <td><?php echo $row->instagram;?></td>
                                    <td><?php echo $row->tax_id;?></td>
                                    <td><?php echo $row->mersis_id;?></td>
                                    <td><?php echo $row->bank_account;?></td>
                                    <td><?php echo $row->google_analytics;?></td>
                                    <td><?php echo $row->map_att;?></td>
                                    <td><?php echo $row->map_lat;?></td>
                                    <td><?php echo $row->address;?></td>
                                    <td><?php echo $row->meta_keyword;?></td>
                                    <td><?php echo $row->meta_description;?></td>
                                    <td>
                                        <input class = "toggle_check"
                                               data-onstyle="success"
                                               data-size = "mini"
                                               data-on="Aktif"
                                               data-off="Pasif"
                                               data-offstyle="danger"
                                               type="checkbox"
                                               data-toggle="toggle"
                                               dataID="<?php echo $row->id; ?>"
                                            <?php echo ($row->isActive == 1) ? "checked" : ""; ?>
                                        >
                                    </td>
                                    <td>
                                        <a href="<?php echo base_url("contactpage/editPage/$row->id");?>">
                                            <i class="fa fa-edit" style="font-size:16px;"></i>
                                        </a>
                                        <a class="removeBtn"  dataURL="<?php echo base_url("contactpage/delete/$row->id"); ?>">
                                            <i class="fa fa-trash" style="font-size:16px;"></i>
                                        </a>


                                    </td>
                                </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
<!-- /.content -->