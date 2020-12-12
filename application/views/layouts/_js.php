<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="SB-Mid-client-vsojdpBZePd4bSa7">
</script>
<script type="text/javascript">
$('#pay-button').click(function(event) {
    event.preventDefault();
    $(this).attr("disabled", "disabled");

    var id = $("#idk").val();
    var price = $("#price").val();
    var quantity = $("#quantity").val();
    var name = $("#name").val();
    var gross_amount = $("#gross_amount").val();

    $.ajax({
        method: 'POST',
        url: '<?=base_url('member/')?>snap/token',
        data: {
            id: id,
            price: price,
            quantity: quantity,
            name: name,
            gross_amount: gross_amount
        },
        cache: false,

        success: function(data) {
            //location = data;

            console.log('token = ' + data);

            var resultType = document.getElementById('result-type');
            var resultData = document.getElementById('result-data');

            function changeResult(type, data) {
                $("#result-type").val(type);
                $("#result-data").val(JSON.stringify(data));
                //resultType.innerHTML = type;
                //resultData.innerHTML = JSON.stringify(data);
            }

            snap.pay(data, {

                onSuccess: function(result) {
                    changeResult('success', result);
                    console.log(result.status_message);
                    console.log(result);
                    $("#payment-form").submit();
                },
                onPending: function(result) {
                    changeResult('pending', result);
                    console.log(result.status_message);
                    $("#payment-form").submit();
                },
                onError: function(result) {
                    changeResult('error', result);
                    console.log(result.status_message);
                    $("#payment-form").submit();
                }
            });
        }
    });
});
</script>

<!-- jQuery -->
<script src="<?= base_url() ?>assets/vendor/AdminLTE-3/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>assets/vendor/AdminLTE-3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url() ?>assets/vendor/AdminLTE-3/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/AdminLTE-3/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/AdminLTE-3/plugins/datatables-responsive/js/dataTables.responsive.min.js">
</script>
<script src="<?= base_url() ?>assets/vendor/AdminLTE-3/plugins/datatables-responsive/js/responsive.bootstrap4.min.js">
</script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/vendor/AdminLTE-3/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>assets/vendor/AdminLTE-3/dist/js/demo.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url('assets/vendor/AdminLTE-3');?>/plugins/summernote/summernote-bs4.min.js"></script>
<script src="<?php echo base_url('assets/vendor/summernote');?>/summernote-bs4.js"></script>
<script>
$(function() {
    $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
    });
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
});
</script>
<script>
$(document).ready(function() {
    $('#summernote').summernote({
        height: "300px",
        callbacks: {
            onImageUpload: function(image) {
                uploadImage(image[0]);
            },
            onMediaDelete: function(target) {
                deleteImage(target[0].src);
            }
        }
    });

    function uploadImage(image) {
        var data = new FormData();
        data.append("image", image);
        $.ajax({
            url: "<?php echo site_url('admin/postingan/upload_image')?>",
            cache: false,
            contentType: false,
            processData: false,
            data: data,
            type: "POST",
            success: function(url) {
                $('#summernote').summernote("insertImage", url);
            },
            error: function(data) {
                console.log(data);
            }
        });
    }

    function deleteImage(src) {
        $.ajax({
            data: {
                src: src
            },
            type: "POST",
            url: "<?php echo site_url('admin/postingan/delete_image')?>",
            cache: false,
            success: function(response) {
                console.log(response);
            }
        });
    }

});
</script>
<script>
function readImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#img_load').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#preview_img").change(function() {
    readImage(this);
});
</script>
<script>
$('#myalert').delay('slow').slideDown('slow').delay(4100).slideUp(600);
</script>