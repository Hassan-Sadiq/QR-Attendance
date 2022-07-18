<?php
include('header.php');
include('sidebar.php');

$student_id = $_GET['student_id'];

?>
<main>
    <div class="container-fluid px-4">
        <!-- <h1 class="mt-4">Dashboard</h1> -->
        <ol class="breadcrumb mb-4">
            <!-- <li class="breadcrumb-item active">Dashboard</li> -->
        </ol>
        
        
        <div class="card mb-4">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">QR Code</h3></div>
                    <div class="card-body mx-auto">
                        <div id="qr_code">
                            <button class="d-block" style="height: 50px;width:200px;border:none;display:block"><h5><?=$student_id?></h5></button>
                            <img style="margin:auto" src="https://chart.googleapis.com/chart?cht=qr&chl=<?=$student_id?>&chs=200x200&chld=L|0" class="qr-code img-responsive" />
                            <button class="btn btn-primary text-center d-block mx-auto mt-5" onclick="print_qr_code(this)">Print</button>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    function print_qr_code(e){
        $(e).css('display','none')
        var mywindow = window.open('', 'PRINT', 'height=1000,width=1000');

        mywindow.document.write('<html><head><title>' + document.title  + '</title>');
        mywindow.document.write('</head><body >');
        mywindow.document.write(document.getElementById('qr_code').innerHTML);
        mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10*/

        mywindow.print();
        e.css('display','block')

        return true;
    }
</script>
<?php
include('footer.php');
?>