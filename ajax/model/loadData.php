
<?php
require_once('../config/config.php');

if (isset($_POST['action']) && $_POST['action'] == 'save_student_status') {

    $data['frist_name'] = $_POST['frist_name'];
    $data['last_name'] = $_POST['last_name'];

    $stuSaveSql = "INSERT INTO `student` (`frist_name`, `last_name`) VALUES ('{$data['frist_name']}', '{$data['last_name']}');";
    $stuSaveQuery = mysqli_query($con, $stuSaveSql);

    if ($stuSaveQuery) {
        echo 1;
    } else {
        echo 0;
    }
} elseif (isset($_POST['action']) && $_POST['action'] == 'student_delete_status') {

    $student_id = $_POST['student_id'];

    $stuDeleteSql = "DELETE FROM `student` WHERE id = {$student_id};";
    $stuDeleteQuery = mysqli_query($con, $stuDeleteSql);

    if ($stuDeleteQuery) {
        echo 1;
    } else {
        echo 0;
    }
} elseif (isset($_POST['action']) && $_POST['action'] == 'student_update_model_status') {

    $student_id = $_POST['student_id'];
    $stuSql = "SELECT * FROM `student` WHERE id = {$student_id};";
    $stuQuery = mysqli_query($con, $stuSql);
    $stuOutput = '';
    if (mysqli_num_rows($stuQuery) > 0) {
        while ($stuData = mysqli_fetch_assoc($stuQuery)) {
            $stuOutput .= "
            <div class='mb-3'>
                <input type='hidden' id='model_student_id' value='{$stuData["id"]}'>
                <label>Frist Name:</label>
                <input type='text' id='model_frist_name' value='{$stuData["frist_name"]}' class='form-control'>
            </div>
            <div class='mb-3'>
                <label>Last Name:</label>
                <input type='text' id='model_last_name' value='{$stuData["last_name"]}' class='form-control'>
            </div>
            <div class='mb-3'>
                <input type='submit' class='btn btn-info' id='model_student_update_btn' value='Update Student'>
            </div>
            ";
        }
    }
    echo $stuOutput;
} elseif (isset($_POST['action']) && $_POST['action'] == 'model_student_update_status') {

    $model_student_id = $_POST['model_student_id'];
    $model_frist_name = $_POST['model_frist_name'];
    $model_last_name = $_POST['model_last_name'];

    $stuUpdateSql = "UPDATE `student` SET `frist_name` = '{$model_frist_name}', `last_name` = '{$model_last_name}' WHERE id = {$model_student_id}";
    $stuUpdateQuery = mysqli_query($con, $stuUpdateSql);

    if ($stuUpdateQuery) {
        echo 1;
    } else {
        echo 0;
    }
} elseif (isset($_POST['action']) && $_POST['action'] == 'search_act_status') {


    function loadSearchStudentData($con)
    {
        // pagination code 
        $limit_per_page = 8;
        $page = '';
        if (isset($_POST['page'])) {
            $page = $_POST['page'];
        } else {
            $page = 1;
        }
        $offset = ($page - 1) * $limit_per_page;
        $search_word = $_POST['search_word'];
        $stuSql = "SELECT * FROM `student` WHERE `frist_name` LIKE '%{$search_word}%' OR `last_name` LIKE '%{$search_word}%' LIMIT {$offset}, {$limit_per_page};";

        $stuQuery = mysqli_query($con, $stuSql);
        $stuOutput = '';
        $stuCount = 0;
        $stuOutput .= '<table class="table mt-3">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>';
        if (mysqli_num_rows($stuQuery) > 0) {
            while ($stuData = mysqli_fetch_assoc($stuQuery)) {
                $stuCount += 1;
                $stuOutput .= "<tr>
                            <td>{$stuCount}</td>
                            <td>{$stuData["frist_name"]}</td>
                            <td>{$stuData["last_name"]}</td>
                            <td> <button class='student_show_model_btn btn btn-danger' data-bs-toggle='modal' data-bs-target='#showModal' data-student-id='{$stuData["id"]}'>Edit</button> </td>
                            <td> <button class='student_delete_btn btn btn-danger' data-student-id='{$stuData["id"]}'>Delete</button> </td>
                        </tr>";
            }
            $stuOutput .= '</tbody></table>';

            // pagination code 
            $totalSql = "SELECT * FROM `student` WHERE `frist_name` LIKE '%{$search_word}%' OR `last_name` LIKE '%{$search_word}%'";
            $totalQuery = mysqli_query($con, $totalSql);
            $totalRacords = mysqli_num_rows($totalQuery);
            $totalPage = ceil($totalRacords / $limit_per_page);

            $stuOutput .= '<div id="pagination">';
            for ($i = 1; $i <= $totalPage; $i++) {
                if ($i == $page) {
                    $active = 'active';
                } else {
                    $active = '';
                }
                $stuOutput .= "<a class='{$active}' id='{$i}'>{$i}</a>";
            }
            $stuOutput .= '</div>';
            echo $stuOutput;
        } else {
            echo "There are no data for student";
        }
    }
    loadSearchStudentData($con);
} else {
    function loadStudentData($con)
    {
        // pagination code 
        $limit_per_page = 8;
        $page = '';
        if (isset($_POST['page'])) {
            $page = $_POST['page'];
        } else {
            $page = 1;
        }
        $offset = ($page - 1) * $limit_per_page;

        $stuSql = "SELECT * FROM `student` ORDER BY id DESC LIMIT {$offset}, {$limit_per_page};";
        $stuQuery = mysqli_query($con, $stuSql);
        $stuOutput = '';
        $stuCount = 0;
        $stuOutput .= '<table class="table mt-3">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>';
        if (mysqli_num_rows($stuQuery) > 0) {
            while ($stuData = mysqli_fetch_assoc($stuQuery)) {
                $stuCount += 1;
                $stuOutput .= "<tr>
                                    <td>{$stuCount}</td>
                                    <td>{$stuData["frist_name"]}</td>
                                    <td>{$stuData["last_name"]}</td>
                                    <td> <button class='student_show_model_btn btn btn-danger' data-bs-toggle='modal' data-bs-target='#showModal' data-student-id='{$stuData["id"]}'>Edit</button> </td>
                                    <td> <button class='student_delete_btn btn btn-danger' data-student-id='{$stuData["id"]}'>Delete</button> </td>
                                </tr>";
            }
            $stuOutput .= '</tbody></table>';

            // pagination code 
            $totalSql = "SELECT * FROM `student`";
            $totalQuery = mysqli_query($con, $totalSql);
            $totalRacords = mysqli_num_rows($totalQuery);
            $totalPage = ceil($totalRacords / $limit_per_page);

            $stuOutput .= '<div id="pagination">';
            for ($i = 1; $i <= $totalPage; $i++) {
                if ($i == $page) {
                    $active = 'active';
                } else {
                    $active = '';
                }
                $stuOutput .= "<a class='{$active}' id='{$i}'>{$i}</a>";
            }
            $stuOutput .= '</div>';
            echo $stuOutput;
        } else {
            echo "There are no data for student";
        }
    }
    loadStudentData($con);
}





?>