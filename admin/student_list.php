<?php
include('header.php');
include('sidebar.php');
?>
                <main>
                    <div class="simple-success" style="display: none;">
                        <h3>Student Deleted Successfully!</h3>
                    </div>
                    <div class="simple-error hidden" style="display: none;">
                        <h3>Student Deleted Failed!</h3>
                    </div>
                    <div class="container-fluid px-4">
                        <!-- <h1 class="mt-4">Dashboard</h1> -->
                        <ol class="breadcrumb mb-4">
                            <!-- <li class="breadcrumb-item active">Dashboard</li> -->
                        </ol>
                        
                        
                        <div class="card mb-4">
                            <div class="card-header">
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>STUDENT ID</th>
                                            <th>NAME</th>
                                            <th>AGE</th>
                                            <th>GENDER</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php
                                            $sql ="SELECT * FROM student";
                                            $query = $conn->query($sql);
                                            while ($row = $query->fetch_assoc()){
                                        ?>
                                            <tr id="row_<?= $row['ID'];?>">
                                                <td><?php echo $row['ID'];?></td>
                                                <td><?php echo $row['STUDENTID'];?></td>
                                                <td><?php echo $row['FIRSTNAME'].' '.$row['MNAME'].' '.$row['LASTNAME'];?></td>
                                                <td><?php echo $row['AGE'];?></td>
                                                <td><?php echo $row['GENDER'];?></td>
                                                <td>
                                                    <a href="student_edit.php?id=<?=$row['ID']?>"><button class="btn btn-primary py-0">Edit</button></a>
                                                    <button class="btn btn-danger py-0" onclick="deleteStudent(<?php echo $row['ID'];?>)">Delete</button>
                                                    <a href="qr_code.php?student_id=<?=$row['STUDENTID']?>"><button class="btn btn-info py-0">QR Code</button></a>
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
    function deleteStudent(e){
        var ID = e;
        // console.log(ID);
        $.ajax({
            type: "POST",
            url: "student_delete.php",
            data: {ID: ID },
            success: function() {
                $('.simple-success').fadeIn(100).show();
                $('#row_'+ID).remove();         
            }
        })
    }
</script>
<?php
include('footer.php');
?>