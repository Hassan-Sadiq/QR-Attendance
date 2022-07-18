<?php
include('header.php');
include('sidebar.php');
?>
                <main>
                    <div class="simple-success" style="display: none;">
                        <h3>Attendance Deleted Successfully!</h3>
                    </div>
                    <div class="simple-error hidden" style="display: none;">
                        <h3>Attendance Deleted Failed!</h3>
                    </div>
                    <div class="container-fluid px-4">
                        <!-- <h1 class="mt-4">Dashboard</h1> -->
                        <ol class="breadcrumb mb-4">
                            <!-- <li class="breadcrumb-item active">Dashboard</li> -->
                        </ol>
                        
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Attendance List
                                <button class="btn btn-warning py-1" style="float:right" onclick="deleteAllAttendance()">Delete All</button>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>NAME</th>
                                            <th>STUDENT ID</th>
                                            <th>TIME IN</th>
                                            <th>TIME OUT</th>
                                            <th>LOGDATE</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php
                                            $sql ="SELECT attendance.ID as AID, attendance.*, student.* FROM attendance LEFT JOIN student ON attendance.STUDENTID=student.STUDENTID";
                                            $query = $conn->query($sql);
                                            while ($row = $query->fetch_assoc()){
                                        ?>
                                            <tr id="row_<?= $row['AID'];?>">
                                                <td><?php echo $row['FIRSTNAME'].' '.$row['MNAME'].' '.$row['LASTNAME'];?></td>
                                                <td><?php echo $row['STUDENTID'];?></td>
                                                <td><?php echo $row['TIMEIN'];?></td>
                                                <td><?php echo $row['TIMEOUT'];?></td>
                                                <td><?php echo $row['LOGDATE'];?></td>
                                                <td>
                                                    <button class="btn btn-danger py-0" onclick="deleteAttendance(<?php echo $row['AID'];?>)">Delete</button>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>

<script>
    function deleteAttendance(e){
        var ID = e;
        // console.log(ID);
        $.ajax({
            type: "POST",
            url: "attendance_delete.php",
            data: {ID: ID },
            success: function() {
                $('.simple-success').fadeIn(100).show();
                $('#row_'+ID).remove();
                setTimeout(function(){
                    window.location.reload();
                }, 1000);      
            }
        })
    }
    function deleteAllAttendance(){
        $.ajax({
            type: "POST",
            url: "attendance_delete.php",
            data: {delete: 'all'},
            success: function() {
                $('.simple-success').fadeIn(100).show();
                $('#datatablesSimple tr').remove();
                setTimeout(function(){
                    window.location.reload();
                }, 1000);
            }
        })
    }
    
</script>
<?php
include('footer.php');
?>