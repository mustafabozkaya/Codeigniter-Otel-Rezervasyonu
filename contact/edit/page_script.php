
<script src="<?php echo base_url("assets"); ?>/dist/js/third_party/dropzone.js"></script>
<script src="<?php echo base_url("assets"); ?>/dist/js/third_party/jquery.fancybox.min.js"></script>

<script>

    $(document).ready(function(){
       $("#select").attr("href","<?php echo  base_url("uploads/defaultimg/images.jpg") ?>");
   //preview input img before upload
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                    $('#blah').parent().attr('href', e.target.result);
                    alert(e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function(){
            readURL(this);
        });

        //FANCYBOX
        //https://github.com/fancyapps/fancyBox
        $(".fancybox").fancybox({
            openEffect: "none",
            closeEffect: "none"
        });
    });



</script>

