<?php
include('header.php');
include('sidebar.php');
?>
                <main>
                    <div class="container-fluid px-4">
                        <!-- <h1 class="mt-4">Dashboard</h1> -->
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
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
                                        $server = "localhost";
                                        $username="root";
                                        $password="";
                                        $dbname="qrcode_attendance";
                                    
                                        $conn = new mysqli($server,$username,$password,$dbname);
                                        $date = date('Y-m-d');
                                        if($conn->connect_error){
                                            die("Connection failed" .$conn->connect_error);
                                        }
                                        $sql ="SELECT * FROM attendance LEFT JOIN student ON attendance.STUDENTID=student.STUDENTID";
                                        $query = $conn->query($sql);
                                        while ($row = $query->fetch_assoc()){
                                        ?>
                                            <tr>
                                                <td><?php echo $row['LASTNAME'].', '.$row['FIRSTNAME'].' '.$row['MNAME'];?></td>
                                                <td><?php echo $row['STUDENTID'];?></td>
                                                <td><?php echo $row['TIMEIN'];?></td>
                                                <td><?php echo $row['TIMEOUT'];?></td>
                                                <td><?php echo $row['LOGDATE'];?></td>
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
<?php
include('footer.php');
?>