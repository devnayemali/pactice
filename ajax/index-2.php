<?php require_once('header.php'); ?>


<section class="pt-5 mt-5">


    <div class="container">
        <div class="row justify-content-cener">
            <div class="col-xl-8">
                <div class="student_form">
                    <form id="student_form">
                        <div class="form-group mb-3">
                            <label>Name:</label>
                            <input type="text" name="name" class="form-control" id="name">
                        </div>
                        <div class="form-group mb-3">
                            <label>Age:</label>
                            <input type="text" class="form-control" name="age" id="age">
                        </div>
                        <div class="form-group mb-3">
                            <label>Gender: </label>
                            <input type="radio" name="gender" value="male" id="gender">
                            <label for="male">Male</label>
                            <input type="radio" name="gender" value="female" id="female">
                            <label for="female">Female</label>
                        </div>
                        <div class="form-group mb-3">
                            <label>Select A Country: </label>
                            <select class="form-control" name="country" id="country">
                                <option value="bangladesh">Bangladesh</option>
                                <option value="india">India</option>
                                <option value="pakistan">Pakistan</option>
                                <option value="amarica">Amarica</option>
                                <option value="england">England</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <input type="submit" class="btn btn-info" name="submit" id="submit" value="Submit">
                        </div>
                    </form>
                    <span style="color:white;padding: 10px 20px;" id="response"></span>
                </div>
            </div>
        </div>
    </div>

</section>


<?php require_once('jsfiles.php'); ?>


<script>
    $(document).ready(function() {

        $("#submit").on('click', function(e) {
            e.preventDefault();
            var name = $('#name').val();
            var age = $('#age').val();
            var gender = $('#country input:radio[name=gender]').is(':checked');
            var country = $("#country :selected").val();

            if (name != '' && age != '' && country != '') {
                var formData = $('#student_form').serialize();
                $.ajax({
                    data: formData,
                    url: 'model/savedata.php',
                    type: 'POST',
                    success: function(data) {
                        $("#student_form").trigger("reset");
                        $('#response').fadeIn();
                        $('#response').addClass('bg-success').removeClass('bg-danger').html(data);
                        setTimeout(function() {
                            $("#response").fadeOut('slow');
                        }, 4000);
                    }
                });
            } else {
                $("#response").fadeIn();
                $('#response').removeClass('bg-success').addClass('bg-danger').html("All Fields are requried.");

            }
        });

    });
</script>


<?php require_once('footer.php'); ?>