<?php require_once('header.php'); ?>


<section class="table-data-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <h2>Table Data</h2>
                <h5 id="show_error" class="error"></h5>
                <h5 id="show_success" class="success"></h5>
                <div class="row">
                    <div class="col-xl-7">
                        <form id="form_empty">
                            <label>Frist Name:</label>
                            <input type="text" id="frist_name" placeholder="Frist Name">
                            <label>Last Name:</label>
                            <input type="text" id="last_name" placeholder="Last Name">
                            <input type="submit" id="save_student_btn" class="btn btn-info" value="Save Student">
                        </form>
                    </div>
                    <div class="col-xl-5">
                        <div class="search-area text-end">
                            <input class="d-inline-block" type="text" autocomplete="off" id="search" placeholder="Search Here">
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div id="load_table_data" class="table-data">
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Modal -->
<div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="showModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="showModalLabel">Student Info Update</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="student_info_show_model" class="student_info">
                    
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once('jsfiles.php'); ?>


<script>
    $(document).ready(function() {

        // Load Student Data 
        function loadData(page) {
            $.ajax({
                data : {
                    page : page,
                },
                url: "model/loadData.php",
                type: "POST",
                success: function(data) {
                    $("#load_table_data").html(data);
                }
            });
        };
        loadData();

        //pagination code
        $(document).on('click', '#pagination a', function(e){
            e.preventDefault();
            var page_id = $(this).attr('id');
            loadData(page_id);
        });

        // Save Student Info 
        $("#save_student_btn").on('click', function(e) {
            e.preventDefault();
            var act = "save_student_status";
            var frist_name = $("#frist_name").val();
            var last_name = $("#last_name").val();

            if (frist_name != '' && frist_name != null && last_name != '' && last_name != null) {
                $.ajax({
                    data: {
                        frist_name: frist_name,
                        last_name: last_name,
                        action: act
                    },
                    url: "model/loadData.php",
                    type: "POST",
                    success: function(data) {
                        if (data = 1) {
                            loadData();
                            $("#form_empty").trigger("reset");
                            $('#show_success').text("Successfully Added Your Data");
                            $('#show_error').text("");
                        } else {
                            $('#show_error').text("Can not save the data. Please try again..");
                            $('#show_success').text("");
                        }
                    }
                });
            } else {
                $('#show_error').text("All Fields are requred");
                $('#show_success').text("");
            }
        });

        // Delete Studnet Info 
        $(document).on('click', '.student_delete_btn', function() {
            if (confirm("Are you sure delete this data")) {
                var student_id = $(this).data('student-id');
                var act = 'student_delete_status';
                var element = this;
                $.ajax({
                    data: {
                        student_id: student_id,
                        action: act,
                    },
                    url: "model/loadData.php",
                    type: "POST",
                    success: function(data) {
                        if (data == 1) {
                            $(element).closest("tr").fadeOut();
                            $('#show_error').text("");
                            $('#show_success').text("Successfully Student Data deleted");
                        } else {
                            $('#show_error').text("Student Data not deleted");
                            $('#show_success').text("");
                        }
                    }

                });
            }
        });

        // Show Data In Model 
        $(document).on('click', '.student_show_model_btn', function() {
            var student_id = $(this).data('student-id');
            var act = "student_update_model_status";

            $.ajax({
                data: {
                    student_id: student_id,
                    action: act,
                },
                url: "model/loadData.php",
                type: "POST",
                success: function(data) {
                    $("#student_info_show_model").html(data);
                }
            });

        });

        // Save Updated Data
        $(document).on('click', '#model_student_update_btn', function() {
            var model_student_id = $('#model_student_id').val();
            var model_frist_name = $('#model_frist_name').val();
            var model_last_name = $('#model_last_name').val();
            var act = "model_student_update_status";

            $.ajax({
                data: {
                    model_student_id: model_student_id,
                    model_frist_name: model_frist_name,
                    model_last_name: model_last_name,
                    action: act,
                },
                url: "model/loadData.php",
                type: "POST",
                success: function(data) {
                    if (data == 1) {
                        $("#showModal").modal('hide');
                        loadData();
                        $('#show_error').text("");
                        $('#show_success').text("Successfully Student Data Updated");
                    } else {
                        $('#show_error').text("Student Data not Updated");
                        $('#show_success').text("");
                    }

                }
            })
        });

        // Search 
        $(document).on('keyup', '#search', function(){
            var search_word = $("#search").val();
            console.log(search_word);
            var act = "search_act_status";
            $.ajax({
                data : {
                    search_word : search_word,
                    action : act,
                },
                url : "model/loadData.php",
                type : "POST",
                success : function(data){
                    $("#load_table_data").html(data);
                }
            });

        });

    });
</script>


<?php require_once('footer.php'); ?>