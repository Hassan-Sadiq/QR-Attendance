<?php
include('header.php');
include('sidebar.php');

$student_id = $_GET['id'];

$sql ="SELECT * FROM student WHERE ID = $student_id";
$query = $conn->query($sql);
$row = $query->fetch_assoc();
?>
<main>
    <div class="container-fluid px-4">
        <!-- <h1 class="mt-4">Dashboard</h1> -->
        <ol class="breadcrumb mb-4">
            <!-- <li class="breadcrumb-item active">Dashboard</li> -->
        </ol>
        
        
        <div class="card mb-4">
            <div class="card-header">
            </div>
            <div class="card-body">
            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg">
                                    <div class="simple-success" style="display: none;">
                                        <h3>Student Updated Successfully!</h3>
                                    </div>
                                    <div class="simple-error hidden" style="display: none;">
                                        <h3>Student Updated Failed!</h3>
                                    </div>
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Edit Student</h3></div>
                                    <div class="card-body">
                                        <form action="student_update.php" method="post" id="student_update_form">
                                            <div class="row mb-4">
                                                <div class="col-md-4">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="STUDENTID" type="text" name="STUDENTID" value="<?=$row['STUDENTID']?>" placeholder="Enter your first name" />
                                                        <label for="STUDENTID">STUDENTID</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-md-4">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="FIRSTNAME" type="text" name="FIRSTNAME" value="<?=$row['FIRSTNAME']?>" placeholder="Enter your first name" />
                                                        <label for="inputFirstName">First name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="MNAME" type="text" name="MNAME" value="<?=$row['MNAME']?>" placeholder="Enter your middle name" />
                                                        <label for="inputLastName">Last name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="LASTNAME" name="LASTNAME" value="<?=$row['LASTNAME']?>" type="text" placeholder="Enter your last name" />
                                                        <label for="inputLastName">Last name</label>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-md-4">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="AGE" name="AGE" value="<?=$row['AGE']?>" type="number" placeholder="Enter your Age" />
                                                        <label for="AGE">AGE</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="GENDER" name="GENDER" value="<?=$row['GENDER']?>" type="text" placeholder="Enter your Gender" />
                                                        <label for="GENDER">GENDER</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3 d-none">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input type="number" name="ID" value="<?= $student_id ?>" id="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button type="submit" class="btn btn-primary btn-block">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
            </div>
        </div>
    </div>
</main>

<script>
    $(document).ready(function() {
        $("#student_update_form").submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "student_update.php",
                data: $(this).serialize(),
                success: function() {
                    $('.simple-success').fadeIn(100).show();                    
                }
            })
        })
    })
</script>
<?php
include('footer.php');
?>