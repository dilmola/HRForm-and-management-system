<?php 

ob_start();
require_once('./classes/DBConnection.php');
$db = new DBConnection();

$page = isset($_GET['p']) ? $_GET['p'] : "forms";
ob_end_flush();

?>

<h3>Form List</h3>
<hr class="border-primary">
<div class="col-md-12">
    <table id="forms-tbl" class="table table-stripped">
        <thead>
            <tr>
                <th>#</th>
                <th>DateTime</th>
                <th>Code</th>
                <th>Title</th>
                <th>URL</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

        
            <?php 
            $i = 1;
                $forms = $db->conn->query("SELECT * FROM `form_list` order by date(date_created) desc");
                while($row = $forms->fetch_assoc()):
            ?>
                <tr>
                    <td class="text-center"><?php echo $i++ ?></td>
                    <td><?php echo date("M d,Y h:i A",strtotime($row['date_created'])) ?></td>
                    <td><?php echo $row['form_code'] ?></td>
                    <td><?php echo $row['title'] ?></td>
                    <td><a href="./form.php?code=<?php echo $row['form_code'] ?>">form.php?code=<?php echo $row['form_code'] ?></a></td>
                    <td class='text-center'>
                        <a href="./index.php?p=view_form&code=<?php echo $row['form_code'] ?>" class="btn btn-default border">View</a>
                        <a href="./index.php?p=view_responses&code=<?php echo $row['form_code'] ?>" class="btn btn-default border">Responses</a>
                        <a href="javascript:void(0)" class="btn btn-default border rem_form" data-id='<?php echo $row['form_code'] ?>'><span class="fa fa-trash text-danger"></span></a>
                    </td>
                </tr>
            <?php endwhile;  ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.6.15/sweetalert2.min.js"></script>

        <script src="js/delete-data.js"></script>
        <script src="js/sweetalert.js"></script>
        <script src="js/chart.js"></script>
        <script src="js/pulldown-menu.js"></script>
        <script src="js/datatables.js"></script>
