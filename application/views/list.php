<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">



    <title>User View Page</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">HELLO TECHJOCKEY</a>
        </div>
    </nav>

    <div class="container" style="padding-top: 10px;">
        <div class="row">
            <div class="col-md-12">
                <?php
                $success = $this->session->userdata('success');
                if ($success != "") {
                ?>
                    <div class="alert alert-success"><?php echo $success; ?></div>
                <?php
                }
                ?>
                <?php
                $failure = $this->session->userdata('failure');
                if ($failure != "") {
                ?>
                    <div class="alert alert-failure"><?php echo $failure; ?></div>
                <?php
                }
                ?>

            </div>

        </div>
        <div class="row">
            <div class="col-6">
                <h2>USER VIEW</h2>
            </div>
            <div class="col-6 d-flex justify-content-end" style="padding-bottom: 5px;">
                <a href="<?php echo base_url() . 'user/create' ?>" class="btn btn-primary"><i class="fas fa-plus"></i> CREATE</a>

            </div>
        </div>

        <hr>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>EMAIL</th>
                        <th>CITY</th>
                        <th>USER TYPE</th>
                        <th>UPDATE</th>
                        <th>DELETE</th>
                        
                        
                    </tr>

                    <?php if (!empty($users)) {
                        foreach ($users as $user) {



                    ?>
                            <tr>
                                <td><?php echo $user['id'] ?></td>
                                <td><?php echo $user['Name'] ?></td>
                                <td><?php echo $user['Email'] ?></td>
                                <td><?php echo $user['City'] ?></td>
                                <td><?php echo $user['user_type'] ?></td>
                                <td>
                                    <a href="<?php echo base_url() . 'user/edit/' . $user['id'] ?>" class="btn btn-primary"><i class="fas fa-edit"></i> EDIT</a>
                                </td>
                                <td>
                                    <a href="<?php echo base_url() . 'user/delete/' . $user['id'] ?>" class="btn btn-danger"> <i class="fas fa-trash-alt"></i> DELETE</a>
                                </td>
                            </tr>
                        <?php }
                    } else { ?>
                        <tr>
                            <td colspan="5">Records not found</td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>

    </div>

    </div>
    <!-- <div class="col-2" style="position: absolute; bottom: 0; right: 0;">
        <input type="text" class="form-control" value="<?php echo mdate('%Y-%m-%d %H:%i:%s', now()); ?>" disabled>
    </div> -->

</body>

</html>